<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\NitiadminLogin;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;

class TempleNitiLoginController extends Controller
{
    /**
     * Send OTP via WhatsApp (MSG91)
     * POST /api/admin/niti-send-otp
     */
    public function sendOtp(Request $request)
    {
        // Just to be 1000% sure which method is coming in:
        // return response()->json(['method' => $request->method()], 200);

        $validator = Validator::make($request->all(), [
            'phone' => ['required', 'string', 'min:10', 'max:15'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'  => false,
                'message' => 'Validation error',
                'errors'  => $validator->errors(),
            ], 422);
        }

        $mobile = $request->input('phone');

        // Normalize mobile: keep only digits and ensure 91 prefix
        $normalizedMobile = preg_replace('/\D/', '', $mobile);
        if (strlen($normalizedMobile) === 10) {
            $normalizedMobile = '91' . $normalizedMobile;
        }

        // Generate OTP
        $otpLength = 6;
        $otp = (string) random_int(10 ** ($otpLength - 1), (10 ** $otpLength) - 1);

        // Store / update in DB
        $user = NitiadminLogin::updateOrCreate(
            ['mobile_no' => $normalizedMobile],
            [
                'otp'        => $otp,
                'otp_length' => $otpLength,
                'channel'    => 'whatsapp',
                'expires_at' => Carbon::now()->addMinutes(5),
            ]
        );

        // ---- MSG91 WhatsApp call (simplified) ----
        $authKey      = env('MSG91_AUTHKEY');
        $integratedNo = env('MSG91_WA_NUMBER', '+919124420330');
        $templateName = env('MSG91_WA_TEMPLATE', '33_crores_flowerdelivery');
        $namespace    = env('MSG91_WA_NAMESPACE', '73669fdc_d75e_4db4_a7b8_1cf1ed246b43');
        $langCode     = env('MSG91_WA_LANG_CODE', 'en_US');
        $bulkEndpoint = env('MSG91_WA_BULK_ENDPOINT', 'https://api.msg91.com/api/v5/whatsapp/whatsapp-outbound-message/bulk/');

        $payload = [
            'integrated_number' => ltrim($integratedNo, '+'),
            'content_type'      => 'template',
            'payload'           => [
                'messaging_product' => 'whatsapp',
                'type'              => 'template',
                'template'          => [
                    'name'      => $templateName,
                    'language'  => [
                        'code'   => $langCode,
                        'policy' => 'deterministic',
                    ],
                    'namespace'         => $namespace,
                    'to_and_components' => [
                        [
                            'to' => [
                                $normalizedMobile,
                            ],
                            'components' => [
                                'body_1' => [
                                    'type'  => 'text',
                                    'value' => $otp,
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ];

        try {
            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
                'authkey'      => $authKey,
            ])->post($bulkEndpoint, $payload);

            if (!$response->successful()) {
                return response()->json([
                    'status'  => false,
                    'message' => 'Failed to send OTP via MSG91',
                    'details' => $response->json(),
                ], 500);
            }
        } catch (\Throwable $e) {
            return response()->json([
                'status'  => false,
                'message' => 'Error calling MSG91 API',
                'error'   => $e->getMessage(),
            ], 500);
        }

        return response()->json([
            'status'  => true,
            'message' => 'OTP sent successfully via WhatsApp',
            'data'    => [
                'mobile_no'  => $normalizedMobile,
                'expires_at' => $user->expires_at,
            ],
        ]);
    }

    /**
     * Verify OTP
     * POST /api/admin/niti-verify-otp
     */
    public function verifyOtp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone' => ['required', 'string', 'min:10', 'max:15'],
            'otp'       => ['required', 'digits_between:4,8'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'  => false,
                'message' => 'Validation error',
                'errors'  => $validator->errors(),
            ], 422);
        }

        $mobile = $request->input('phone');
        $otp    = $request->input('otp');

        $normalizedMobile = preg_replace('/\D/', '', $mobile);
        if (strlen($normalizedMobile) === 10) {
            $normalizedMobile = '91' . $normalizedMobile;
        }

        $user = NitiadminLogin::where('mobile_no', $normalizedMobile)->first();

        if (!$user) {
            return response()->json([
                'status'  => false,
                'message' => 'Account not found',
            ], 404);
        }

        if (!$user->otp || $user->otp !== $otp) {
            return response()->json([
                'status'  => false,
                'message' => 'Invalid OTP',
            ], 401);
        }

        if ($user->expires_at && $user->expires_at->isPast()) {
            return response()->json([
                'status'  => false,
                'message' => 'OTP expired',
            ], 401);
        }

        $user->otp        = null;
        $user->expires_at = null;
        $user->save();

        $token = $user->createToken('niti-admin-token', ['niti-admin'])->plainTextToken;

        return response()->json([
            'status'  => true,
            'message' => 'OTP verified successfully',
            'token'   => $token,
            'user'    => [
                'id'        => $user->id,
                'name'      => $user->name,
                'mobile_no' => $user->mobile_no,
                'email'     => $user->email,
            ],
        ]);
    }
}
