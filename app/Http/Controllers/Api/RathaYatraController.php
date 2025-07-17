<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RathaYatraActive;
use App\Models\RathaYatraEvent;

class RathaYatraController extends Controller
{
      public function getStatus()
    {
        try {
            $status = RathaYatraActive::first();

            if (!$status) {
                // Create a default record if none exists
                $status = RathaYatraActive::create([
                    'live_video' => 'deactive',
                    'section' => 'deactive',
                    'livechat' => 'deactive' // Default to 'inactive' if livechat is not set
                ]);
            }

            return response()->json([
                'message' => 'Collection data retrieved successfully',
                'status' => true,
                'data' => [
                    'live_video' => $status->live_video,
                    'section' => $status->section,
                    'livechat' => $status->livechat, // Default to 'inactive' if livechat is not set
                ]
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Server error occurred',
                'status' => false
            ], 500);
        }
    }

     public function getEvents()
    {
        try {
            $events = RathaYatraEvent::all();

            return response()->json([
                'message' => 'Events retrieved successfully',
                'status' => true,
                'data' => $events
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Server error occurred',
                'status' => false
            ], 500);
        }
    }
    
}
