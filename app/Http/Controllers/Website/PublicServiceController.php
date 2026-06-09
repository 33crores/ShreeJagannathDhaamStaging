<?php

namespace App\Http\Controllers;

use App\Models\PublicServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class PublicServiceController extends Controller
{
    public function showByServiceType(Request $request, $service_type)
    {
        $language = $this->getLanguage($request);

        $allowedServiceTypes = [
            'toilet',
            'drinking_water',
            'free_food',
            'lost_and_found_booth',
            'beach',
            'life_guard_booth',
            'charging_station',
            'atm',
            'petrol_pump',
            'bus_stand',
            'railway_station',
            'police_station',
        ];

        if (! in_array($service_type, $allowedServiceTypes, true)) {
            abort(404);
        }

        $services = PublicServices::query()
            ->where('service_type', $service_type)
            ->where('status', 'active')
            ->when(Schema::hasColumn('temple__public_services', 'language'), function ($query) use ($language) {
                $query->where(function ($languageQuery) use ($language) {
                    $languageQuery->where('language', $language)
                        ->orWhereNull('language')
                        ->orWhere('language', '');
                });
            })
            ->orderBy('service_name', 'asc')
            ->get();

        return view('website.public-service-list', compact('services', 'service_type', 'language'));
    }

    private function getLanguage(Request $request): string
    {
        $requestLanguage = $request->query('language');

        if ($requestLanguage === 'Odia') {
            session(['app_language' => 'Odia']);
            return 'Odia';
        }

        if ($requestLanguage === 'English') {
            session(['app_language' => 'English']);
            return 'English';
        }

        return session('app_language', 'English') === 'Odia' ? 'Odia' : 'English';
    }
}
