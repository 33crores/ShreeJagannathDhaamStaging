<?php

namespace App\Http\Controllers\TempleUser;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TempleUser;
use App\Models\SpecialRitual;
use App\Models\TempleAboutDetail;
use App\Models\TempleRitual;
use App\Models\TempleDarshan;
use App\Models\TempleFestival;
use App\Models\TempleSocialMedia;
use App\Models\TemplePooja;
use Carbon\Carbon;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class TempleUserController extends Controller
{

    public function sendOtp(Request $request)
    {
        $request->validate([
            'phone' => 'required|digits:10',
        ]);

        $phoneNumber = $request->input('phone');

        // Only admin-registered temple users can login.
        $temple = TempleUser::where('mobile_no', $phoneNumber)->first();

        if (!$temple) {
            return redirect()->back()
                ->withInput()
                ->with('message', 'This mobile number is not registered. Please contact admin.');
        }

        // No third-party OTP integration. Static testing OTP only.
        session([
            'otp_phone' => $phoneNumber,
            'otp_static' => '000000',
            'otp_sent' => true,
        ]);

        return redirect()->back()
            ->with('otp_sent', true)
            ->with('message', 'Static OTP is 000000');
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'otp' => 'required|digits:6',
        ]);

        $otp = $request->input('otp');
        $phoneNumber = session('otp_phone');

        if (!$phoneNumber) {
            return redirect()->back()
                ->with('message', 'OTP session expired. Please enter your mobile number again.');
        }

        // Static OTP verification. No OTPless / SMS gateway call.
        if ($otp !== '000000') {
            return redirect()->back()
                ->with('otp_sent', true)
                ->with('message', 'Invalid OTP. Please enter 000000.');
        }

        $temple = TempleUser::where('mobile_no', $phoneNumber)->first();

        if (!$temple) {
            session()->forget(['otp_phone', 'otp_static', 'otp_sent']);

            return redirect()->route('temple-register')
                ->with('message', 'Please complete your registration.');
        }

        // Laravel session login remains active, but third-party auth integration is removed.
        Auth::guard('temples')->login($temple);

        session()->forget(['otp_phone', 'otp_static', 'otp_sent']);
        session()->regenerate();

        return redirect()->route('templedashboard')
            ->with('success', 'User authenticated successfully.');
    }

    public function templelogin(){
        return view("templelogin");
    }

    public function templedashboard()
    {
        // Fetch temple ID from the authenticated user
        $templeId = Auth::guard('temples')->user()->temple_id;

        $rituals = TempleRitual::where('temple_id', $templeId)
        ->orderByRaw("STR_TO_DATE(CONCAT(ritual_start_time, ' ', ritual_start_period), '%h:%i %p') ASC") // Use raw query for ordering
        ->get();

        $today = Carbon::today()->toDateString();

        // Fetch festivals for today
        $festivals = TempleFestival::where('start_date', $today)
            ->where('status', 'active') // Assuming you only want active festivals
            ->get();

        // Fetching data using the corresponding models
        $aboutDetails = TempleAboutDetail::where('temple_id', $templeId)->first();
        $dailyRituals = TempleRitual::where('temple_id', $templeId)->get(); // Use get() for multiple rituals
        $darshanTime = TempleDarshan::where('temple_id', $templeId)->get(); // Use get() for multiple darshans
        $festival = TempleFestival::where('temple_id', $templeId)->get(); // Use get() for multiple festivals
        $media = TempleSocialMedia::where('temple_id', $templeId)->first(); // Assuming one media record per temple
        $pooja = TemplePooja::where('temple_id', $templeId)->get(); // Use get() for multiple pooja records
    
        // Special rituals data
        $specialRituals = SpecialRitual::where('status', 'active')
            ->select('spcl_ritual_name', 'spcl_ritual_date', 'spcl_ritual_time', 'spcl_ritual_period', 'spcl_ritual_tithi', 'spcl_ritual_image')
            ->get();

            $today_rituals = SpecialRitual::where('spcl_ritual_date', $today)
            ->where('status', 'active')
            ->get();
    
        // Initialize totalFields based on actual counts
        $totalFields = 0;
        $filledFields = 0;
    
        // Count fields for about details
        if ($aboutDetails) {
            $totalFields += 7; // Total fields in TempleAboutDetail
            $filledFields += !empty($aboutDetails->temple_about) ? 1 : 0;
            $filledFields += !empty($aboutDetails->temple_history) ? 1 : 0;
            $filledFields += !empty($aboutDetails->endowment) ? 1 : 0;
            $filledFields += !empty($aboutDetails->endowment_register_no) ? 1 : 0;
            $filledFields += !empty($aboutDetails->endowment_document) ? 1 : 0;
            $filledFields += !empty($aboutDetails->trust) ? 1 : 0;
            $filledFields += !empty($aboutDetails->trust_register_no) ? 1 : 0;
            $filledFields += !empty($aboutDetails->trust_document) ? 1 : 0;
        }
    
        // Count fields for daily rituals
        foreach ($dailyRituals as $ritual) {
            $totalFields += 10; // Total fields in TempleRitual
            $filledFields += !empty($ritual->ritual_name) ? 1 : 0;
            $filledFields += !empty($ritual->ritual_day_name) ? 1 : 0;
            $filledFields += !empty($ritual->ritual_start_time) ? 1 : 0;
            $filledFields += !empty($ritual->ritual_start_period) ? 1 : 0;
            $filledFields += !empty($ritual->ritual_end_time) ? 1 : 0;
            $filledFields += !empty($ritual->ritual_end_period) ? 1 : 0;
            $filledFields += !empty($ritual->ritual_duration) ? 1 : 0;
            $filledFields += !empty($ritual->ritual_image) ? 1 : 0;
            $filledFields += !empty($ritual->ritual_video) ? 1 : 0;
            $filledFields += !empty($ritual->description) ? 1 : 0;
        }
    
        // Count fields for darshan
        foreach ($darshanTime as $darshan) {
            $totalFields += 8; // Total fields in TempleDarshan
            $filledFields += !empty($darshan->darshan_day) ? 1 : 0;
            $filledFields += !empty($darshan->darshan_name) ? 1 : 0;
            $filledFields += !empty($darshan->darshan_start_time) ? 1 : 0;
            $filledFields += !empty($darshan->darshan_start_period) ? 1 : 0;
            $filledFields += !empty($darshan->darshan_end_time) ? 1 : 0;
            $filledFields += !empty($darshan->darshan_end_period) ? 1 : 0;
            $filledFields += !empty($darshan->darshan_duration) ? 1 : 0;
            $filledFields += !empty($darshan->darshan_image) ? 1 : 0;
            $filledFields += !empty($darshan->description) ? 1 : 0;
        }
    
        // Count fields for festivals (only if there are records)
        if ($festival->isNotEmpty()) {
            $totalFields += count($festival) * 3; // Assuming 3 fields per festival
            foreach ($festival as $fest) {
                $filledFields += !empty($fest->festival_name) ? 1 : 0;
                $filledFields += !empty($fest->festival_date) ? 1 : 0;
                $filledFields += !empty($fest->festival_descp) ? 1 : 0;
            }
        }
    
        // Count fields for media (assuming one record)
        if ($media) {
            $totalFields += 6; // Total fields in TempleSocialMedia
            $filledFields += !empty($media->temple_images) ? 1 : 0;
            $filledFields += !empty($media->temple_videos) ? 1 : 0;
            $filledFields += !empty($media->temple_yt_url) ? 1 : 0;
            $filledFields += !empty($media->temple_ig_url) ? 1 : 0;
            $filledFields += !empty($media->temple_fb_url) ? 1 : 0;
            $filledFields += !empty($media->temple_x_url) ? 1 : 0;
        }
    
        // Count fields for pooja
        foreach ($pooja as $p) {
            $totalFields += 4; // Total fields in TemplePooja
            $filledFields += !empty($p->pooja_image) ? 1 : 0;
            $filledFields += !empty($p->pooja_name) ? 1 : 0;
            $filledFields += !empty($p->pooja_price) ? 1 : 0;
            $filledFields += !empty($p->pooja_descp) ? 1 : 0;
        }
    
        // Calculate percentage
        $completionPercentage = ($totalFields > 0) ? ($filledFields / $totalFields) * 100 : 0;
    
        // Ensure completion percentage does not exceed 100
        $completionPercentage = min($completionPercentage, 100);
    
        // Round the percentage to 2 decimal places
        $completionPercentage = round($completionPercentage, 2);
    
        // Pass the completion percentage to the view
        return view('templeuser.temple-dashboard', compact('aboutDetails','today_rituals','festivals','rituals', 'dailyRituals', 'darshanTime', 'festival', 'media', 'pooja', 'specialRituals', 'completionPercentage'));
    }
    
    public function templeabout()
    {
        // Get the authenticated temple user's temple ID
        $temple_id = Auth::guard('temples')->user()->temple_id;

        // Fetch the details from the TempleAboutDetail model, or return null if not found
        $temple = TempleAboutDetail::where('temple_id', $temple_id)->first();

        // Pass the data to the view
        return view('templeuser.temple-about', compact('temple'));
    }

    public function updateTempleDetails(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'temple_about' => 'required|string',
            'temple_history' => 'required|string',
            'endowment' => 'nullable|string',
            'endowment_register_no' => 'required_with:endowment|string', // Required if endowment is checked
            'endowment_document' => 'required_with:endowment|file|mimes:pdf,jpeg,png', // Required if endowment is checked
            'trust' => 'nullable|string',
            'trust_register_no' => 'required_with:trust|string', // Required if trust is checked
            'trust_document' => 'required_with:trust|file|mimes:pdf,jpeg,png', // Required if trust is checked
        ]);
        
    
        // Get the authenticated temple user's temple ID
        $temple_id = Auth::guard('temples')->user()->temple_id;
    
        // Find the temple record or create a new one
        $temple = TempleAboutDetail::where('temple_id', $temple_id)->first();
    
        // Check if endowment_document was uploaded, and store the file if it was
        $endowmentDocPath = $request->hasFile('endowment_document')
            ? $request->file('endowment_document')->store('documents/endowment', 'public')
            : $temple->endowment_document;
    
        // Check if trust_document was uploaded, and store the file if it was
        $trustDocPath = $request->hasFile('trust_document')
            ? $request->file('trust_document')->store('documents/trust', 'public')
            : $temple->trust_document;
    
        // Update or create the temple record
        $temple = TempleAboutDetail::updateOrCreate(
            ['temple_id' => $temple_id],
            [
                'temple_about' => $request->temple_about,
                'temple_history' => $request->temple_history,
                'endowment' => $request->endowment,
                'endowment_register_no' => $request->endowment ? $request->endowment_register_no : null,
                'endowment_document' => $endowmentDocPath,
                'trust' => $request->trust,
                'trust_register_no' => $request->trust ? $request->trust_register_no : null,
                'trust_document' => $trustDocPath,
                'status' => 'active' // Set the status or any other fields you want
            ]
        );
        
    
        return redirect()->route('templedashboard')->with('success', 'Temple information updated successfully.');
    }
    

    

}
