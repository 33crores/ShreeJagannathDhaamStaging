<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use App\Models\NitiadminLogin;

class TempleNitiLoginController extends Controller
{
  
    protected function formatWhatsAppNumber(string $number): string
    {
        // Keep digits only
        $digits = preg_replace('/\D/', '', $number ?? '');

        // Remove leading zeros
        $digits = ltrim($digits, '0');

        // Default to India if no country code
        $countryCode = env('MSG91_DEFAULT_COUNTRY_CODE', '91');

        if (!Str::startsWith($digits, $countryCode)) {
            $digits = $countryCode . $digits;
        }

        return $digits;
    }

    public function sendOtp(Request $request)
    {
        $request->validate([
            'phone' => 'required|string',
        ]);

        $rawPhone = $request->phone;

        // WhatsApp “to” number (must include country code)
        $waPhone = $this->formatWhatsAppNumber($rawPhone);

        // Store / lookup in DB as pure digits
        $dbPhone = preg_replace('/\D/', '', $rawPhone);

        $otp        = rand(100000, 999999);
        $shortToken = Str::random(6); // Must be < 15 chars for button url var

        // Find or create user
        $user = NitiadminLogin::where('mobile_no', $dbPhone)->first();
        if ($user) {
            $user->otp = $otp;
            $user->save();
            $status = 'existing';
        } else {
            $user = NitiadminLogin::create([
                'mobile_no' => $dbPhone,
                'otp'       => $otp,
            ]);
            $status = 'new';
        }

        // language code from env (en_US etc.)
        $langCode = env('MSG91_WA_LANG_CODE', 'en_US');

        // Build components for MSG91 bulk format
        // matches docs: body_1 + button_1
        $components = [
            'body_1' => [
                'type'  => 'text',
                'value' => (string) $otp,
            ],
        ];

        // Add button component only if configured
        if (filter_var(env('MSG91_WA_URL_HAS_PARAM', true), FILTER_VALIDATE_BOOL)) {
            $components['button_1'] = [
                'subtype' => 'url',
                'type'    => 'text',
                'value'   => $shortToken, // this becomes <{{url text variable}}>
            ];
        }

        // ✅ MSG91 BULK WhatsApp template payload (same structure as your cURL)
        $payload = [
            'integrated_number' => env('MSG91_WA_NUMBER'),    // 919124420330
            'content_type'      => 'template',
            'payload'           => [
                'messaging_product' => 'whatsapp',
                'type'              => 'template',
                'template'          => [
                    'name'      => env('MSG91_WA_TEMPLATE'),   // 33_crores_flowerdelivery
                    'language'  => [
                        'code'   => $langCode,                 // en_US
                        'policy' => 'deterministic',
                    ],
                    'namespace' => env('MSG91_WA_NAMESPACE'),
                    'to_and_components' => [
                        [
                            'to'         => [$waPhone],        // list_of_phone_numbers
                            'components' => $components,       // body_1, button_1
                        ],
                    ],
                ],
            ],
        ];

        try {
            $endpoint = env(
                'MSG91_WA_BULK_ENDPOINT',
                'https://api.msg91.com/api/v5/whatsapp/whatsapp-outbound-message/bulk/'
            );

            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
                'authkey'      => env('MSG91_AUTHKEY'),
            ])->post($endpoint, $payload);

            $result = $response->json();

            // Optional: log for debugging
            // \Log::info('MSG91 WA sendOtp', [
            //     'endpoint' => $endpoint,
            //     'payload'  => $payload,
            //     'status'   => $response->status(),
            //     'result'   => $result,
            // ]);

            // If MSG91 returned non-2xx, bubble it up
            if (!$response->successful()) {
                return response()->json([
                    'success'     => false,
                    'message'     => 'MSG91 API error',
                    'status_code' => $response->status(),
                    'error'       => $result,
                ], $response->status());
            }

            // Specific check for "blocked prefixes"
            $reason = $result['reason'] ?? ($result['error'] ?? null);
            if ($reason && str_contains(strtolower($reason), 'blocked prefixes')) {
                return response()->json([
                    'success' => false,
                    'message' => 'MSG91 has blocked this country / number prefix. Please enable this prefix in MSG91 WhatsApp Country Block settings.',
                    'error'   => $reason,
                ], 400);
            }

            return response()->json([
                'success'      => true,
                'message'      => 'OTP sent successfully via WhatsApp.',
                'user_status'  => $status,
                'phone'        => $dbPhone,
                'whatsapp_to'  => $waPhone,
                'token'        => $shortToken,
                'api_response' => $result,
            ], 200);

        } catch (\Throwable $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to send OTP due to server error.',
                'error'   => $e->getMessage(),
            ], 500);
        }
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'phoneNumber' => 'required|string',
            'otp'         => 'required|string',
        ]);

        $dbPhone = preg_replace('/\D/', '', $request->phoneNumber);

        $user = NitiadminLogin::where('mobile_no', $dbPhone)->first();

        if (!$user) {
            return response()->json([
                'message' => 'Mobile number not found. Please request OTP first.',
            ], 404);
        }

        if ($user->otp != $request->otp) {
            return response()->json([
                'message' => 'Invalid OTP.',
            ], 401);
        }

        // OTP is valid — clear it
        $user->otp = null;
        $user->save();

        // Sanctum token
        $token = $user->createToken('Temple User Token')->plainTextToken;

        return response()->json([
            'message'    => 'User authenticated successfully.',
            'token'      => $token,
            'token_type' => 'Bearer',
            'user'       => $user,
        ], 200);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Logged out successfully.',
        ]);
    }
}
