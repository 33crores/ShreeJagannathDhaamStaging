<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use App\Models\NitiadminLogin;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class TempleNitiLoginController extends Controller
{

    public function sendOtp(Request $request)
    {

        $request->validate([
                'phone' => 'required|string',
            ]);

        $phone = $request->phone;
        $otp = rand(100000, 999999);
        $shortToken = Str::random(6); // WhatsApp button token (max 15 characters)

        // Check for existing user
        $user = NitiadminLogin::where('mobile_no', $phone)->first();

        if ($user) {
            // Update OTP
            $user->otp = $otp;
            $user->save();
            $status = 'existing';
        } else {
            // Create new user with OTP
            $user = NitiadminLogin::create([
                'mobile_no' => $phone,
                'otp' => $otp,
            ]);
            $status = 'new';
        }

        // ✅ Correct MSG91 WhatsApp API Payload
        $payload = [
            "integrated_number" => env('MSG91_WA_NUMBER'),
            "content_type" => "template",
            "payload" => [
                "messaging_product" => "whatsapp",
                "to" => $phone,
                "type" => "template",
                "template" => [
                    "name" => env('MSG91_WA_TEMPLATE'),
                    "language" => [
                        "code" => "en",
                        "policy" => "deterministic"
                    ],
                    "namespace" => env('MSG91_WA_NAMESPACE'),
                    "components" => [
                        [
                            "type" => "body",
                            "parameters" => [
                                [
                                    "type" => "text",
                                    "text" => (string) $otp
                                ]
                            ]
                        ],
                        [
                            "type" => "button",
                            "sub_type" => "url",
                            "index" => 0,
                            "parameters" => [
                                [
                                    "type" => "text",
                                    "text" => $shortToken
                                ]
                            ]
                        ]
                    ]
                ]
            ]
        ];

        // ✅ Send OTP via MSG91
        try {
            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
                'authkey' => env('MSG91_AUTHKEY'),
            ])->post('https://api.msg91.com/api/v5/whatsapp/whatsapp-outbound-message/', $payload);

            $result = $response->json();

            if ($response->status() === 401 || ($result['status'] ?? '') === 'fail') {
                return response()->json([
                    'success' => false,
                    'message' => 'Unauthorized or template error: check MSG91 credentials or payload.',
                    'error' => $result
                ], 401);
            }

            return response()->json([
                'success' => true,
                'message' => 'OTP sent successfully via WhatsApp.',
                'user_status' => $status,
                'phone' => $phone,
                'token' => $shortToken,
                'api_response' => $result
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to send OTP due to server error.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'phoneNumber' => 'required|string',
            'otp' => 'required|string'
        ]);

        // Find user by phone number
        $user = NitiadminLogin::where('mobile_no', $request->phoneNumber)->first();

        if (!$user) {
            return response()->json([
                'message' => 'Mobile number not found. Please request OTP first.'
            ], 404);
        }

        // Check OTP match
        if ($user->otp !== $request->otp) {
            return response()->json([
                'message' => 'Invalid OTP.'
            ], 401);
        }

        // OTP is valid — clear it
        $user->otp = null;
        $user->save();

        // ✅ Generate Sanctum token
        $token = $user->createToken('Temple User Token')->plainTextToken;

        return response()->json([
            'message' => 'User authenticated successfully.',
            'token' => $token,
            'token_type' => 'Bearer',
            'user' => $user
        ], 200);
    }
}

