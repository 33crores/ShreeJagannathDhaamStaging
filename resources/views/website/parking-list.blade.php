<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>{{ ($language ?? 'English') === 'Odia' ? 'ଯାନବାହାନ ପାର୍କିଂ' : 'Vehicle Parking' }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{ asset('front-assets/frontend/css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('front-assets/frontend/css/dham-header.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background:
                radial-gradient(circle at top left, rgba(255, 122, 26, 0.12), transparent 30%),
                radial-gradient(circle at top right, rgba(52, 21, 81, 0.08), transparent 32%),
                linear-gradient(180deg, #fff8f3 0%, #ffffff 48%, #fff7f1 100%);
            font-family: Arial, sans-serif;
            color: #222;
        }

        .parking-page {
            min-height: 100vh;
            overflow-x: hidden;
        }

        .parking-hero {
            position: relative;
            width: 100%;
            min-height: 330px;
            display: flex;
            align-items: center;
            overflow: hidden;
        }

        .parking-hero-bg {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            transform: scale(1.04);
        }

        .parking-hero-overlay {
            position: absolute;
            inset: 0;
            background:
                radial-gradient(circle at 85% 15%, rgba(255, 196, 87, 0.34), transparent 32%),
                linear-gradient(90deg, rgba(52, 21, 81, 0.88), rgba(219, 77, 48, 0.72));
        }

        .parking-hero-content {
            position: relative;
            z-index: 2;
            width: 100%;
            max-width: 1180px;
            margin: 0 auto;
            padding: 52px 22px;
            color: #ffffff;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 9px 14px;
            border-radius: 999px;
            background: rgba(255, 255, 255, 0.16);
            border: 1px solid rgba(255, 255, 255, 0.22);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            font-size: 13px;
            font-weight: 800;
            margin-bottom: 16px;
        }

        .parking-hero h1 {
            margin: 0;
            font-size: 46px;
            line-height: 1.12;
            font-weight: 900;
            max-width: 720px;
            letter-spacing: -0.8px;
        }

        .parking-hero p {
            margin: 14px 0 0;
            font-size: 17px;
            line-height: 1.6;
            max-width: 720px;
            color: rgba(255, 255, 255, 0.90);
        }

        .parking-wrapper {
            width: 100%;
            max-width: 1180px;
            margin: -48px auto 0;
            padding: 0 18px 60px;
            position: relative;
            z-index: 3;
        }

        .parking-summary {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 14px;
            margin-bottom: 22px;
        }

        .summary-card {
            background: rgba(255, 255, 255, 0.92);
            border: 1px solid rgba(255, 255, 255, 0.70);
            border-radius: 18px;
            padding: 16px;
            box-shadow: 0 14px 32px rgba(52, 21, 81, 0.12);
            backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .summary-icon {
            width: 44px;
            height: 44px;
            min-width: 44px;
            border-radius: 14px;
            background: linear-gradient(135deg, #ff7a1a, #db4d30);
            color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 10px 18px rgba(219, 77, 48, 0.24);
        }

        .summary-card strong {
            display: block;
            color: #341551;
            font-size: 15px;
            line-height: 1.2;
        }

        .summary-card span {
            display: block;
            color: #777777;
            font-size: 12px;
            margin-top: 3px;
        }

        .tab-section {
            margin: 0 0 24px;
            padding: 12px;
            border-radius: 22px;
            background: rgba(255, 255, 255, 0.88);
            border: 1px solid rgba(219, 77, 48, 0.08);
            box-shadow: 0 14px 34px rgba(52, 21, 81, 0.10);
            overflow-x: auto;
            scrollbar-width: none;
        }

        .tab-section::-webkit-scrollbar {
            display: none;
        }

        .parking-tabs {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 10px;
            min-width: 720px;
        }

        .parking-tab {
            border: 0;
            outline: 0;
            cursor: pointer;
            min-height: 48px;
            padding: 10px 12px;
            border-radius: 15px;
            background: #fff7f1;
            color: #341551;
            font-size: 14px;
            font-weight: 900;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            transition: all 0.28s ease;
            white-space: nowrap;
        }

        .parking-tab i {
            color: #db4d30;
        }

        .parking-tab.active {
            color: #ffffff;
            background: linear-gradient(135deg, #341551, #db4d30, #ff7a1a);
            box-shadow: 0 12px 24px rgba(219, 77, 48, 0.24);
            transform: translateY(-2px);
        }

        .parking-tab.active i {
            color: #ffffff;
        }

        .parking-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 26px;
        }

        .parking-card {
            background: #ffffff;
            border-radius: 24px;
            overflow: hidden;
            border: 1px solid rgba(219, 77, 48, 0.08);
            box-shadow: 0 18px 40px rgba(52, 21, 81, 0.10);
            transition: all 0.35s ease;
            display: none;
        }

        .parking-card.show {
            display: block;
            animation: cardFade 0.35s ease both;
        }

        .parking-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 24px 52px rgba(52, 21, 81, 0.16);
        }

        .parking-image-wrap {
            position: relative;
            width: 100%;
            height: 270px;
            overflow: hidden;
            background: #fff3e8;
        }

        .parking-image {
            width: 100%;
            height: 270px;
            object-fit: cover;
            display: block;
            transition: transform 0.4s ease;
        }

        .parking-card:hover .parking-image {
            transform: scale(1.04);
        }

        .parking-tag {
            position: absolute;
            top: 14px;
            left: 14px;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 8px 12px;
            border-radius: 999px;
            background: rgba(255, 255, 255, 0.94);
            color: #db4d30;
            font-size: 12px;
            font-weight: 900;
            box-shadow: 0 8px 18px rgba(0, 0, 0, 0.12);
        }

        .availability-badge {
            position: absolute;
            right: 14px;
            bottom: 14px;
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 9px 13px;
            border-radius: 999px;
            background: rgba(255, 255, 255, 0.95);
            color: #15803d;
            font-size: 12px;
            font-weight: 900;
            box-shadow: 0 8px 18px rgba(0, 0, 0, 0.12);
        }

        .availability-badge.low {
            color: #dc2626;
        }

        .parking-content {
            padding: 17px 18px 18px;
        }

        .parking-title-row {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 12px;
            margin-bottom: 14px;
        }

        .parking-title-row h5 {
            margin: 0;
            color: #341551;
            font-size: 21px;
            line-height: 1.28;
            font-weight: 900;
        }

        .vehicle-pill {
            padding: 7px 10px;
            border-radius: 999px;
            background: rgba(255, 122, 26, 0.10);
            color: #db4d30;
            font-size: 11px;
            font-weight: 900;
            white-space: nowrap;
        }

        .info-list {
            display: grid;
            gap: 11px;
            margin-bottom: 16px;
        }

        .info-row {
            display: flex;
            gap: 10px;
            color: #404040;
            font-size: 14px;
            line-height: 1.45;
        }

        .info-row i {
            width: 32px;
            height: 32px;
            min-width: 32px;
            border-radius: 50%;
            background: #fff2e9;
            color: #db4d30;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .info-row strong {
            display: block;
            color: #222222;
            font-size: 13px;
            margin-bottom: 1px;
        }

        .action-row {
            display: grid;
            grid-template-columns: 1fr;
            gap: 10px;
        }

        .map-btn {
            border: 0;
            outline: 0;
            min-height: 46px;
            border-radius: 14px;
            padding: 12px 14px;
            text-decoration: none;
            color: #ffffff;
            font-size: 14px;
            font-weight: 900;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            background: linear-gradient(135deg, #341551, #db4d30, #ff7a1a);
            box-shadow: 0 12px 22px rgba(219, 77, 48, 0.24);
            transition: all 0.25s ease;
        }

        .map-btn:hover {
            color: #ffffff;
            text-decoration: none;
            transform: translateY(-2px);
        }

        .map-btn.disabled {
            opacity: 0.55;
            pointer-events: none;
        }

        .fallback-img {
            object-fit: contain !important;
            padding: 35px;
            background: #fff7f2;
        }

        .empty-box,
        .no-result-box {
            grid-column: 1 / -1;
            background: #ffffff;
            border-radius: 22px;
            padding: 45px 20px;
            text-align: center;
            box-shadow: 0 18px 40px rgba(52, 21, 81, 0.10);
        }

        .empty-box i,
        .no-result-box i {
            font-size: 44px;
            color: #db4d30;
            margin-bottom: 12px;
        }

        .empty-box h3,
        .no-result-box h3 {
            color: #341551;
            font-size: 22px;
            font-weight: 900;
            margin: 0 0 8px;
        }

        .empty-box p,
        .no-result-box p {
            color: #777777;
            margin: 0;
        }

        @keyframes cardFade {
            from {
                opacity: 0;
                transform: translateY(18px) scale(0.98);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        @media (max-width: 991px) {
            .parking-grid {
                grid-template-columns: 1fr;
            }

            .parking-summary {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 575px) {
            .parking-hero {
                min-height: 285px;
            }

            .parking-hero-content {
                padding: 36px 16px;
            }

            .hero-badge {
                font-size: 11px;
                padding: 8px 12px;
            }

            .parking-hero h1 {
                font-size: 31px;
            }

            .parking-hero p {
                font-size: 14px;
                line-height: 1.5;
            }

            .parking-wrapper {
                margin-top: -34px;
                padding: 0 12px 45px;
            }

            .summary-card {
                border-radius: 16px;
                padding: 13px;
            }

            .tab-section {
                border-radius: 18px;
                padding: 10px;
                margin-bottom: 20px;
            }

            .parking-tabs {
                display: flex;
                min-width: max-content;
                gap: 8px;
            }

            .parking-tab {
                min-height: 44px;
                padding: 10px 13px;
                font-size: 13px;
            }

            .parking-card {
                border-radius: 20px;
            }

            .parking-image-wrap,
            .parking-image {
                height: 220px;
            }

            .parking-title-row {
                flex-direction: column;
                gap: 8px;
            }

            .parking-title-row h5 {
                font-size: 19px;
            }
        }

        @media (max-width: 360px) {
            .parking-hero h1 {
                font-size: 28px;
            }

            .parking-image-wrap,
            .parking-image {
                height: 200px;
            }

            .parking-content {
                padding: 15px;
            }
        }
    </style>
</head>

<body>
@php
    $language = $language ?? request('language', session('app_language', 'English'));
    $language = $language === 'Odia' ? 'Odia' : 'English';

    /*
        Correct parking image folder:
        public/assets/uploads/parking_photo

        Browser URL:
        /assets/uploads/parking_photo/image-name.jpg
    */

    $newPhotoFolder = 'assets/uploads/parking_photo';
    $fallbackImage = asset('website/parking.jpeg');

    $parkingImageUrl = function ($photo) use ($newPhotoFolder, $fallbackImage) {
        $photo = trim((string) $photo);

        if ($photo === '') {
            return $fallbackImage;
        }

        $photo = trim($photo, " \t\n\r\0\x0B\"'");
        $photo = str_replace(['\\/', '\\'], '/', $photo);

        /*
            DB may contain:
            assets/uploads/parking_photo/abc.jpg
            uploads/parking_photo/abc.jpg
            parking_photo/abc.jpg
            abc.jpg
            full URL

            Final output:
            /assets/uploads/parking_photo/abc.jpg
        */

        if (preg_match('/^https?:\/\//i', $photo)) {
            $path = parse_url($photo, PHP_URL_PATH);
            $filename = basename($path);
        } else {
            $filename = basename($photo);
        }

        if (!$filename || $filename === '.' || $filename === '/') {
            return $fallbackImage;
        }

        return asset($newPhotoFolder . '/' . $filename);
    };

    $getVehicleTypes = function ($vehicleTypeValue) {
        if (is_array($vehicleTypeValue)) {
            return array_values(array_filter($vehicleTypeValue));
        }

        $vehicleTypeValue = trim((string) $vehicleTypeValue);

        if ($vehicleTypeValue === '') {
            return [];
        }

        $decoded = json_decode($vehicleTypeValue, true);

        if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
            return array_values(array_filter($decoded));
        }

        return array_map('trim', explode(',', $vehicleTypeValue));
    };
@endphp

<div class="parking-page">

    <section class="parking-hero">
        <img class="parking-hero-bg" src="{{ asset('website/parkings.jpg') }}" alt="Visitor Parking Background">
        <div class="parking-hero-overlay"></div>

        <div class="parking-hero-content">
            <div class="hero-badge">
                <i class="fa-solid fa-square-parking"></i>
                {{ $language === 'Odia' ? 'ଶ୍ରୀ ଜଗନ୍ନାଥ ଧାମ' : 'Shree Jagannatha Dham' }}
            </div>

            <h1>
                {{ $language === 'Odia' ? 'ଯାନବାହାନ ପାର୍କିଂ ସ୍ଥଳ' : 'Vehicle Parking' }}
            </h1>

            <p>
                {{ $language === 'Odia'
                    ? 'ଆପଣ ଆପଣଙ୍କର ଦୁଇ, ତିନି ଏବଂ ଚାରି ଚକିଆ ଯାନ ନିମ୍ନଲିଖିତ ପାର୍କିଂ ସ୍ଥାନଗୁଡିକରେ ପାର୍କ କରିପାରିବେ।'
                    : 'Park your two, three, four wheelers and electric vehicles at available parking locations near the temple.' }}
            </p>
        </div>
    </section>

    <main class="parking-wrapper">

        <div class="parking-summary">
            <div class="summary-card">
                <div class="summary-icon">
                    <i class="fa-solid fa-location-dot"></i>
                </div>
                <div>
                    <strong>{{ $language === 'Odia' ? 'ମନ୍ଦିର ପାଖରେ' : 'Near Temple' }}</strong>
                    <span>{{ $language === 'Odia' ? 'ସହଜ ଯାତାୟାତ' : 'Easy access for devotees' }}</span>
                </div>
            </div>

            <div class="summary-card">
                <div class="summary-icon">
                    <i class="fa-solid fa-clock"></i>
                </div>
                <div>
                    <strong>{{ $language === 'Odia' ? '୨୪/୭ ସୁବିଧା' : '24/7 Facility' }}</strong>
                    <span>{{ $language === 'Odia' ? 'ସମୟ ସୁବିଧା' : 'Available anytime' }}</span>
                </div>
            </div>

            <div class="summary-card">
                <div class="summary-icon">
                    <i class="fa-solid fa-map-location-dot"></i>
                </div>
                <div>
                    <strong>{{ $language === 'Odia' ? 'ମ୍ୟାପ ଦିଗ' : 'Map Direction' }}</strong>
                    <span>{{ $language === 'Odia' ? 'ସହଜରେ ସ୍ଥାନ ଖୋଜନ୍ତୁ' : 'Find location easily' }}</span>
                </div>
            </div>
        </div>

        <div class="tab-section">
            <div class="parking-tabs">
                <button type="button" class="parking-tab active" data-type="two wheeler">
                    <i class="fa-solid fa-motorcycle"></i>
                    {{ $language === 'Odia' ? 'ଦୁଇ ଚକିଆ' : 'Two Wheeler' }}
                </button>

                <button type="button" class="parking-tab" data-type="three wheeler">
                    <i class="fa-solid fa-car-side"></i>
                    {{ $language === 'Odia' ? 'ତିନି ଚକିଆ' : 'Three Wheeler' }}
                </button>

                <button type="button" class="parking-tab" data-type="four wheeler">
                    <i class="fa-solid fa-car"></i>
                    {{ $language === 'Odia' ? 'ଚାରି ଚକିଆ' : 'Four Wheeler' }}
                </button>

                <button type="button" class="parking-tab" data-type="electric vehicle">
                    <i class="fa-solid fa-charging-station"></i>
                    {{ $language === 'Odia' ? 'ଇଲେକ୍ଟ୍ରିକ ଯାନ' : 'Electric Vehicle' }}
                </button>
            </div>
        </div>

        <div class="parking-grid" id="parkingGrid">
            @forelse ($parking as $item)
                @php
                    $vehicleTypes = $getVehicleTypes($item->vehicle_type ?? null);
                    $vehicleTypesText = implode(', ', $vehicleTypes);

                    $parkingPhoto = $parkingImageUrl($item->parking_photo ?? null);

                    $addressParts = array_filter([
                        $item->landmark ?? null,
                        $item->city_village ?? null,
                        $item->district ?? null,
                        $item->state ?? null,
                    ]);

                    $address = count($addressParts) ? implode(', ', $addressParts) : 'N/A';

                    $availability = (int) ($item->parking_availability ?? 0);
                    $totalSlots = (int) ($item->total_capacity ?? 250);
                    $isLow = $availability <= 50;

                    $mapUrl = $item->map_url
                        ?? $item->google_map_url
                        ?? $item->google_map_link
                        ?? $item->parking_map_url
                        ?? null;
                @endphp

                <article
                    class="parking-card"
                    data-vehicle-types="{{ e(strtolower($vehicleTypesText)) }}"
                >
                    <div class="parking-image-wrap">
                        <img
                            src="{{ $parkingPhoto }}"
                            alt="{{ $item->parking_name ?? 'Vehicle Parking' }}"
                            class="parking-image"
                            onerror="this.onerror=null; this.src='{{ $fallbackImage }}'; this.classList.add('fallback-img');"
                        >

                        <div class="parking-tag">
                            <i class="fa-solid fa-square-parking"></i>
                            {{ $language === 'Odia' ? 'ପାର୍କିଂ' : 'Parking' }}
                        </div>

                        <div class="availability-badge {{ $isLow ? 'low' : '' }}">
                            <i class="fa-solid fa-circle-check"></i>
                            {{ $availability }}/{{ $totalSlots }}
                        </div>
                    </div>

                    <div class="parking-content">
                        <div class="parking-title-row">
                            <h5>{{ $item->parking_name ?? 'Vehicle Parking' }}</h5>

                            <span class="vehicle-pill">
                                {{ $vehicleTypesText ?: ($language === 'Odia' ? 'ସମସ୍ତ ଯାନ' : 'All Vehicles') }}
                            </span>
                        </div>

                        <div class="info-list">
                            <div class="info-row">
                                <i class="fa-solid fa-location-dot"></i>
                                <div>
                                    <strong>{{ $language === 'Odia' ? 'ଠିକଣା' : 'Address' }}</strong>
                                    {{ $address }}
                                </div>
                            </div>

                            <div class="info-row">
                                <i class="fa-solid fa-clock"></i>
                                <div>
                                    <strong>{{ $language === 'Odia' ? 'ସମୟ' : 'Timing' }}</strong>
                                    24/7
                                </div>
                            </div>

                            <div class="info-row">
                                <i class="fa-solid fa-car"></i>
                                <div>
                                    <strong>{{ $language === 'Odia' ? 'ଉପଲବ୍ଧ ସ୍ପଟ୍' : 'Available Spots' }}</strong>
                                    {{ $availability }}/{{ $totalSlots }} {{ $language === 'Odia' ? 'ସ୍ପଟ୍ ଉପଲବ୍ଧ' : 'spots available' }}
                                </div>
                            </div>
                        </div>

                        <div class="action-row">
                            @if(!empty($mapUrl))
                                <a href="{{ $mapUrl }}" target="_blank" rel="noopener noreferrer" class="map-btn">
                                    <i class="fa-solid fa-location-arrow"></i>
                                    {{ $language === 'Odia' ? 'ମ୍ୟାପ ଦେଖନ୍ତୁ' : 'View Map' }}
                                </a>
                            @else
                                <a href="javascript:void(0)" class="map-btn disabled">
                                    <i class="fa-solid fa-location-arrow"></i>
                                    {{ $language === 'Odia' ? 'ମ୍ୟାପ ନାହିଁ' : 'Map Not Added' }}
                                </a>
                            @endif
                        </div>
                    </div>
                </article>
            @empty
                <div class="empty-box">
                    <i class="fa-solid fa-square-parking"></i>
                    <h3>{{ $language === 'Odia' ? 'କୌଣସି ପାର୍କିଂ ମିଳିଲା ନାହିଁ' : 'No Parking Found' }}</h3>
                    <p>{{ $language === 'Odia' ? 'ଦୟାକରି ପରେ ପୁଣି ଯାଞ୍ଚ କରନ୍ତୁ।' : 'Please check again later.' }}</p>
                </div>
            @endforelse

            <div class="no-result-box" id="noResultBox" style="display:none;">
                <i class="fa-solid fa-car-side"></i>
                <h3>{{ $language === 'Odia' ? 'ଏହି ଯାନ ପାଇଁ ପାର୍କିଂ ନାହିଁ' : 'No Parking For This Vehicle' }}</h3>
                <p>{{ $language === 'Odia' ? 'ଦୟାକରି ଅନ୍ୟ ଯାନ ପ୍ରକାର ବାଛନ୍ତୁ।' : 'Please select another vehicle type.' }}</p>
            </div>
        </div>
    </main>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        const tabs = document.querySelectorAll('.parking-tab');
        const cards = document.querySelectorAll('.parking-card');
        const noResultBox = document.getElementById('noResultBox');

        function normalizeText(value) {
            return String(value || '')
                .toLowerCase()
                .replace(/_/g, ' ')
                .replace(/-/g, ' ')
                .replace(/\s+/g, ' ')
                .trim();
        }

        function showTab(type) {
            const selectedType = normalizeText(type);
            let visibleCount = 0;

            tabs.forEach(function (tab) {
                tab.classList.toggle('active', normalizeText(tab.dataset.type) === selectedType);
            });

            cards.forEach(function (card) {
                const rawTypes = normalizeText(card.dataset.vehicleTypes);
                const vehicleTypes = rawTypes.split(',').map(normalizeText).filter(Boolean);

                const shouldShow = vehicleTypes.includes(selectedType) || vehicleTypes.length === 0;

                card.classList.toggle('show', shouldShow);

                if (shouldShow) {
                    visibleCount++;
                }
            });

            if (noResultBox) {
                noResultBox.style.display = visibleCount === 0 ? 'block' : 'none';
            }
        }

        tabs.forEach(function (tab) {
            tab.addEventListener('click', function () {
                showTab(this.dataset.type);
            });
        });

        showTab('two wheeler');
    });
</script>

</body>
</html>