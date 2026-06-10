<?php

namespace App\Http\Controllers\TempleUser;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PublicServices;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class TemplePublicServiceController extends Controller
{
    private function serviceTypes(): array
    {
        return [
            'locker' => 'Locker',
            'shoe_stand' => 'Shoe Stand',
            'drinking_water' => 'Drinking Water',
            'toilet' => 'Toilet',
            'free_food' => 'Free Food',
            'ratha_yatra_mela' => 'Ratha Yatra Mela',
            'beach' => 'Beach',
            'life_guard_booth' => 'Life Guard Booth',
            'charging_station' => 'Charging Station',
            'petrol_pump' => 'Petrol Pump',
            'atm' => 'ATM',
            'lost_and_found_booth' => 'Lost and Found Booth',

            // New service types
            'police_station' => 'Police Station',
            'hospital' => 'Hospital',
            'bus_stand' => 'Bus Stand',
            'railway_station' => 'Railway Station',
        ];
    }

    private function templeId()
    {
        return Auth::guard('temples')->user()->temple_id ?? null;
    }

    private function uploadPhotos(Request $request): array
    {
        $photoPaths = [];

        if ($request->hasFile('photo')) {
            $uploadPath = public_path('assets/uploads/public_services');

            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0775, true);
            }

            foreach ($request->file('photo') as $photo) {
                $originalName = pathinfo($photo->getClientOriginalName(), PATHINFO_FILENAME);
                $extension = $photo->getClientOriginalExtension();

                $fileName = time() . '_' . Str::random(8) . '_' . Str::slug($originalName) . '.' . $extension;

                $photo->move($uploadPath, $fileName);

                $photoPaths[] = 'assets/uploads/public_services/' . $fileName;
            }
        }

        return $photoPaths;
    }

    public function addService()
    {
        $serviceTypes = $this->serviceTypes();

        return view('templeuser.templefeature.add-public-service', compact('serviceTypes'));
    }

    public function saveService(Request $request)
    {
        try {
            $validated = $request->validate([
                'language' => 'required|string|in:Odia,English',
                'service_type' => 'required|string|in:' . implode(',', array_keys($this->serviceTypes())),
                'service_name' => 'required|string|max:255',
                'photo' => 'nullable|array',
                'photo.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'google_map_link' => 'required|url',
                'contact_no' => 'nullable|string|max:20',
                'whatsapp_no' => 'nullable|string|max:20',
                'email' => 'nullable|email|max:255',
                'opening_time' => 'nullable',
                'closing_time' => 'nullable',
                'landmark' => 'nullable|string|max:255',
                'pincode' => 'nullable|string|max:20',
                'city_village' => 'nullable|string|max:255',
                'district' => 'nullable|string|max:255',
                'state' => 'nullable|string|max:255',
                'country' => 'nullable|string|max:255',
                'description' => 'required|string',
            ]);

            $validated['temple_id'] = $this->templeId();
            $validated['photo'] = json_encode($this->uploadPhotos($request));
            $validated['status'] = 'active';

            PublicServices::create($validated);

            return redirect()->back()->with('success', 'Service saved successfully.');
        } catch (\Exception $e) {
            Log::error('Service Save Error: ' . $e->getMessage());

            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    public function manageService()
    {
        $templeId = $this->templeId();

        $services = PublicServices::where('status', 'active')
            ->when($templeId, function ($query) use ($templeId) {
                return $query->where('temple_id', $templeId);
            })
            ->latest()
            ->get();

        $serviceTypes = $this->serviceTypes();

        return view('templeuser.templefeature.manage-public-service', compact('services', 'serviceTypes'));
    }

    public function deleteService($id)
    {
        $templeId = $this->templeId();

        $service = PublicServices::where('id', $id)
            ->when($templeId, function ($query) use ($templeId) {
                return $query->where('temple_id', $templeId);
            })
            ->firstOrFail();

        $service->status = 'deleted';
        $service->save();

        return redirect()->route('manageService')->with('success', 'Service status deleted successfully!');
    }

    public function updateService(Request $request, $id)
    {
        try {
            $templeId = $this->templeId();

            $service = PublicServices::where('id', $id)
                ->when($templeId, function ($query) use ($templeId) {
                    return $query->where('temple_id', $templeId);
                })
                ->firstOrFail();

            $validated = $request->validate([
                'language' => 'required|string|in:Odia,English',
                'service_type' => 'required|string|in:' . implode(',', array_keys($this->serviceTypes())),
                'service_name' => 'required|string|max:255',
                'photo' => 'nullable|array',
                'photo.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'google_map_link' => 'nullable|url',
                'contact_no' => 'nullable|string|max:20',
                'whatsapp_no' => 'nullable|string|max:20',
                'email' => 'nullable|email|max:255',
                'opening_time' => 'nullable',
                'closing_time' => 'nullable',
                'landmark' => 'nullable|string|max:255',
                'pincode' => 'nullable|string|max:20',
                'city_village' => 'nullable|string|max:255',
                'district' => 'nullable|string|max:255',
                'state' => 'nullable|string|max:255',
                'country' => 'nullable|string|max:255',
                'description' => 'nullable|string',
            ]);

            if ($request->hasFile('photo')) {
                $validated['photo'] = json_encode($this->uploadPhotos($request));
            }

            $service->update($validated);

            return redirect()->back()->with('success', 'Service updated successfully');
        } catch (\Exception $e) {
            Log::error('Service Update Error: ' . $e->getMessage());

            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
}