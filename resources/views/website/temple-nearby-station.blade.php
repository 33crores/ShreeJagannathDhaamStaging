<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>{{ ($language ?? 'English') === 'Odia' ? 'ବସ୍ ଷ୍ଟାଣ୍ଡ / ରେଲୱେ ଷ୍ଟେସନ୍' : 'Bus Stand / Railway Station' }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{ asset('front-assets/frontend/css/dham-header.css') }}">
    <link rel="stylesheet" href="{{ asset('front-assets/frontend/css/footer.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            color: #222;
            background:
                radial-gradient(circle at top left, rgba(255, 122, 26, 0.12), transparent 30%),
                radial-gradient(circle at top right, rgba(52, 21, 81, 0.08), transparent 32%),
                linear-gradient(180deg, #fff8f3 0%, #ffffff 48%, #fff7f1 100%);
        }

        .station-page {
            min-height: 100vh;
            overflow-x: hidden;
        }

        .station-hero {
            position: relative;
            width: 100%;
            min-height: 330px;
            overflow: hidden;
            display: flex;
            align-items: center;
        }

        .station-hero-bg {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            transform: scale(1.04);
        }

        .station-hero-overlay {
            position: absolute;
            inset: 0;
            background:
                radial-gradient(circle at 85% 15%, rgba(255, 196, 87, 0.34), transparent 32%),
                linear-gradient(90deg, rgba(52, 21, 81, 0.88), rgba(219, 77, 48, 0.72));
        }

        .station-hero-content {
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

        .station-hero h1 {
            margin: 0;
            font-size: 46px;
            line-height: 1.12;
            font-weight: 900;
            max-width: 760px;
            letter-spacing: -0.8px;
        }

        .station-hero p {
            margin: 14px 0 0;
            font-size: 17px;
            line-height: 1.6;
            max-width: 720px;
            color: rgba(255, 255, 255, 0.90);
        }

        .station-wrapper {
            width: 100%;
            max-width: 1180px;
            margin: -48px auto 0;
            padding: 0 18px 60px;
            position: relative;
            z-index: 3;
        }

        .station-summary {
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

        .station-tabs {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 10px;
            min-width: 420px;
        }

        .station-tab {
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

        .station-tab i {
            color: #db4d30;
        }

        .station-tab.active {
            color: #ffffff;
            background: linear-gradient(135deg, #341551, #db4d30, #ff7a1a);
            box-shadow: 0 12px 24px rgba(219, 77, 48, 0.24);
            transform: translateY(-2px);
        }

        .station-tab.active i {
            color: #ffffff;
        }

        .station-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 26px;
        }

        .station-card {
            background: #ffffff;
            border-radius: 24px;
            overflow: hidden;
            border: 1px solid rgba(219, 77, 48, 0.08);
            box-shadow: 0 18px 40px rgba(52, 21, 81, 0.10);
            transition: all 0.35s ease;
            display: none;
        }

        .station-card.show {
            display: block;
            animation: cardFade 0.35s ease both;
        }

        .station-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 24px 52px rgba(52, 21, 81, 0.16);
        }

        .station-image-wrap {
            position: relative;
            width: 100%;
            height: 270px;
            overflow: hidden;
            background: #fff3e8;
        }

        .station-image {
            width: 100%;
            height: 270px;
            object-fit: cover;
            display: block;
            transition: transform 0.4s ease;
        }

        .station-card:hover .station-image {
            transform: scale(1.04);
        }

        .station-tag {
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

        .available-tag {
            position: absolute;
            right: 14px;
            bottom: 14px;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 9px 13px;
            border-radius: 999px;
            background: rgba(255, 255, 255, 0.95);
            color: #15803d;
            font-size: 12px;
            font-weight: 900;
            box-shadow: 0 8px 18px rgba(0, 0, 0, 0.12);
        }

        .station-content {
            padding: 17px 18px 18px;
        }

        .station-title-row {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 12px;
            margin-bottom: 14px;
        }

        .station-title-row h5 {
            margin: 0;
            color: #341551;
            font-size: 21px;
            line-height: 1.28;
            font-weight: 900;
        }

        .type-pill {
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

        .direction-btn {
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

        .direction-btn:hover {
            color: #ffffff;
            text-decoration: none;
            transform: translateY(-2px);
        }

        .direction-btn.disabled {
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
            .station-grid {
                grid-template-columns: 1fr;
            }

            .station-summary {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 575px) {
            .station-hero {
                min-height: 285px;
            }

            .station-hero-content {
                padding: 36px 16px;
            }

            .hero-badge {
                font-size: 11px;
                padding: 8px 12px;
            }

            .station-hero h1 {
                font-size: 31px;
            }

            .station-hero p {
                font-size: 14px;
                line-height: 1.5;
            }

            .station-wrapper {
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

            .station-tabs {
                display: flex;
                min-width: max-content;
                gap: 8px;
            }

            .station-tab {
                min-height: 44px;
                padding: 10px 13px;
                font-size: 13px;
            }

            .station-card {
                border-radius: 20px;
            }

            .station-image-wrap,
            .station-image {
                height: 220px;
            }

            .station-title-row {
                flex-direction: column;
                gap: 8px;
            }

            .station-title-row h5 {
                font-size: 19px;
            }
        }

        @media (max-width: 360px) {
            .station-hero h1 {
                font-size: 28px;
            }

            .station-image-wrap,
            .station-image {
                height: 200px;
            }

            .station-content {
                padding: 15px;
            }
        }
    </style>
</head>

<body>

@php
    $language = $language ?? request('language', session('app_language', 'English'));
    $language = $language === 'Odia' ? 'Odia' : 'English';

    $uploadBaseUrl = 'https://shreejagannathdham.com';

    $getPhotos = function ($photoValue) {
        if (is_array($photoValue)) {
            return array_values(array_filter($photoValue));
        }

        $photoValue = trim((string) $photoValue);

        if ($photoValue === '') {
            return [];
        }

        $decoded = json_decode($photoValue, true);

        if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
            return array_values(array_filter($decoded));
        }

        return [$photoValue];
    };

    $stationImageUrl = function ($photo) use ($uploadBaseUrl) {
        $fallback = asset('website/parking.jpeg');

        $photo = trim((string) $photo);

        if ($photo === '') {
            return $fallback;
        }

        $photo = str_replace(['\\/', '\\'], '/', $photo);
        $photo = ltrim($photo, '/');

        if (preg_match('/^https?:\/\//i', $photo)) {
            $urlPath = parse_url($photo, PHP_URL_PATH);

            if ($urlPath && strpos($urlPath, '/assets/uploads/') === 0) {
                return $uploadBaseUrl . $urlPath;
            }

            if ($urlPath && strpos($urlPath, '/uploads/') === 0) {
                return $uploadBaseUrl . '/assets' . $urlPath;
            }

            return $photo;
        }

        if (strpos($photo, 'assets/uploads/') === 0) {
            return $uploadBaseUrl . '/' . $photo;
        }

        if (strpos($photo, 'uploads/') === 0) {
            return $uploadBaseUrl . '/assets/' . $photo;
        }

        if (
            strpos($photo, 'commute/') === 0 ||
            strpos($photo, 'commute_mode/') === 0 ||
            strpos($photo, 'commute_modes/') === 0 ||
            strpos($photo, 'bus_station/') === 0 ||
            strpos($photo, 'railway_station/') === 0
        ) {
            return $uploadBaseUrl . '/assets/uploads/' . $photo;
        }

        if (
            strpos($photo, 'website/') === 0 ||
            strpos($photo, 'front-assets/') === 0 ||
            strpos($photo, 'storage/') === 0
        ) {
            return asset($photo);
        }

        if (strpos($photo, '/') === false) {
            return $uploadBaseUrl . '/assets/uploads/commute/' . $photo;
        }

        return $fallback;
    };

    $fallbackImage = asset('website/parking.jpeg');

    $heroPhoto = null;

    if(isset($services) && $services->count() > 0) {
        $firstPhotos = $getPhotos($services->first()->photo ?? null);
        $heroPhoto = $firstPhotos[0] ?? null;
    }

    $heroImage = $heroPhoto ? $stationImageUrl($heroPhoto) : $fallbackImage;
@endphp

<div class="station-page">

    <section class="station-hero">
        <img class="station-hero-bg" src="{{ $heroImage }}" alt="Bus Stand Railway Station Background">
        <div class="station-hero-overlay"></div>

        <div class="station-hero-content">
            <div class="hero-badge">
                <i class="fa-solid fa-route"></i>
                {{ $language === 'Odia' ? 'ଶ୍ରୀ ଜଗନ୍ନାଥ ଧାମ' : 'Shree Jagannatha Dham' }}
            </div>

            <h1>
                {{ $language === 'Odia' ? 'ବସ୍ ଷ୍ଟାଣ୍ଡ / ରେଲୱେ ଷ୍ଟେସନ୍' : 'Bus Stand / Railway Station' }}
            </h1>

            <p>
                {{ $language === 'Odia'
                    ? 'ମନ୍ଦିର ନିକଟରେ ଉପଲବ୍ଧ ବସ୍ ଷ୍ଟାଣ୍ଡ ଓ ରେଲୱେ ଷ୍ଟେସନ୍ ସୂଚନା ଦେଖନ୍ତୁ।'
                    : 'Find nearby bus stand and railway station details with directions for easy travel.' }}
            </p>
        </div>
    </section>

    <main class="station-wrapper">

        <div class="station-summary">
            <div class="summary-card">
                <div class="summary-icon">
                    <i class="fa-solid fa-train"></i>
                </div>
                <div>
                    <strong>{{ $language === 'Odia' ? 'ରେଲୱେ ଷ୍ଟେସନ୍' : 'Railway Station' }}</strong>
                    <span>{{ $language === 'Odia' ? 'ନିକଟସ୍ଥ ଷ୍ଟେସନ୍ ଖୋଜନ୍ତୁ' : 'Find nearby stations' }}</span>
                </div>
            </div>

            <div class="summary-card">
                <div class="summary-icon">
                    <i class="fa-solid fa-bus"></i>
                </div>
                <div>
                    <strong>{{ $language === 'Odia' ? 'ବସ୍ ଷ୍ଟାଣ୍ଡ' : 'Bus Stand' }}</strong>
                    <span>{{ $language === 'Odia' ? 'ସହଜ ଯାତାୟାତ' : 'Easy public transport' }}</span>
                </div>
            </div>

            <div class="summary-card">
                <div class="summary-icon">
                    <i class="fa-solid fa-map-location-dot"></i>
                </div>
                <div>
                    <strong>{{ $language === 'Odia' ? 'ମ୍ୟାପ ଦିଗ' : 'Map Direction' }}</strong>
                    <span>{{ $language === 'Odia' ? 'ସହଜରେ ପହଞ୍ଚନ୍ତୁ' : 'Reach location easily' }}</span>
                </div>
            </div>
        </div>

        <div class="tab-section">
            <div class="station-tabs">
                <button type="button" class="station-tab active" data-type="railway">
                    <i class="fa-solid fa-train"></i>
                    {{ $language === 'Odia' ? 'ରେଲୱେ ଷ୍ଟେସନ୍' : 'Railway Station' }}
                </button>

                <button type="button" class="station-tab" data-type="bus">
                    <i class="fa-solid fa-bus"></i>
                    {{ $language === 'Odia' ? 'ବସ୍ ଷ୍ଟାଣ୍ଡ' : 'Bus Stand' }}
                </button>
            </div>
        </div>

        <div class="station-grid" id="stationGrid">
            @forelse ($services as $service)
                @php
                    $photos = $getPhotos($service->photo ?? null);
                    $firstPhoto = $photos[0] ?? null;
                    $servicePhoto = $firstPhoto ? $stationImageUrl($firstPhoto) : $fallbackImage;

                    $commuteType = strtolower((string) ($service->commute_type ?? ''));
                    $commuteTypeText = $commuteType
                        ? ucwords(str_replace(['_', '-'], ' ', $commuteType))
                        : 'Station';

                    $addressParts = array_filter([
                        $service->landmark ?? null,
                        $service->city_village ?? null,
                        $service->district ?? null,
                        $service->state ?? null,
                    ]);

                    $address = count($addressParts) ? implode(', ', $addressParts) : 'N/A';

                    $mapUrl = $service->google_map_link
                        ?? $service->map_url
                        ?? $service->google_map_url
                        ?? null;
                @endphp

                <article
                    class="station-card"
                    data-commute="{{ e($commuteType) }}"
                >
                    <div class="station-image-wrap">
                        <img
                            src="{{ $servicePhoto }}"
                            alt="{{ $service->name ?? 'Station' }}"
                            class="station-image"
                            onerror="this.onerror=null; this.src='{{ $fallbackImage }}'; this.classList.add('fallback-img');"
                        >

                        <div class="station-tag">
                            @if(str_contains($commuteType, 'bus'))
                                <i class="fa-solid fa-bus"></i>
                            @else
                                <i class="fa-solid fa-train"></i>
                            @endif

                            {{ $commuteTypeText }}
                        </div>

                        <div class="available-tag">
                            <i class="fa-solid fa-circle-check"></i>
                            {{ $language === 'Odia' ? 'ଉପଲବ୍ଧ' : 'Available' }}
                        </div>
                    </div>

                    <div class="station-content">
                        <div class="station-title-row">
                            <h5>{{ $service->name ?? 'Station' }}</h5>
                            <span class="type-pill">{{ $commuteTypeText }}</span>
                        </div>

                        <div class="info-list">
                            <div class="info-row">
                                <i class="fa-solid fa-location-dot"></i>
                                <div>
                                    <strong>{{ $language === 'Odia' ? 'ଠିକଣା' : 'Address' }}</strong>
                                    {{ $address }}
                                </div>
                            </div>

                            @if(!empty($service->opening_time) || !empty($service->closing_time))
                                <div class="info-row">
                                    <i class="fa-solid fa-clock"></i>
                                    <div>
                                        <strong>{{ $language === 'Odia' ? 'ସମୟ' : 'Timing' }}</strong>
                                        {{ $service->opening_time ?? 'N/A' }} - {{ $service->closing_time ?? 'N/A' }}
                                    </div>
                                </div>
                            @endif

                            @if(!empty($service->contact_no))
                                <div class="info-row">
                                    <i class="fa-solid fa-phone"></i>
                                    <div>
                                        <strong>{{ $language === 'Odia' ? 'ଯୋଗାଯୋଗ' : 'Contact' }}</strong>
                                        {{ $service->contact_no }}
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="action-row">
                            @if(!empty($mapUrl))
                                <a href="{{ $mapUrl }}" class="direction-btn" target="_blank" rel="noopener noreferrer">
                                    <i class="fa-solid fa-location-arrow"></i>
                                    {{ $language === 'Odia' ? 'ଦିଗ ନିର୍ଦ୍ଦେଶ' : 'Directions' }}
                                </a>
                            @else
                                <a href="javascript:void(0)" class="direction-btn disabled">
                                    <i class="fa-solid fa-location-arrow"></i>
                                    {{ $language === 'Odia' ? 'ଲିଙ୍କ ନାହିଁ' : 'No Direction Link' }}
                                </a>
                            @endif
                        </div>
                    </div>
                </article>
            @empty
                <div class="empty-box">
                    <i class="fa-solid fa-route"></i>
                    <h3>{{ $language === 'Odia' ? 'କୌଣସି ସୂଚନା ମିଳିଲା ନାହିଁ' : 'No Station Data Found' }}</h3>
                    <p>{{ $language === 'Odia' ? 'ଦୟାକରି ପରେ ପୁଣି ଯାଞ୍ଚ କରନ୍ତୁ।' : 'Please check again later.' }}</p>
                </div>
            @endforelse

            <div class="no-result-box" id="noResultBox" style="display:none;">
                <i class="fa-solid fa-circle-exclamation"></i>
                <h3>{{ $language === 'Odia' ? 'ଏହି ପ୍ରକାରର ସେବା ନାହିଁ' : 'No Data Found' }}</h3>
                <p>{{ $language === 'Odia' ? 'ଦୟାକରି ଅନ୍ୟ ଟାବ ବାଛନ୍ତୁ।' : 'Please choose another tab.' }}</p>
            </div>
        </div>
    </main>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const tabs = document.querySelectorAll('.station-tab');
        const cards = document.querySelectorAll('.station-card');
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
                const commuteType = normalizeText(card.dataset.commute);

                let shouldShow = false;

                if (selectedType === 'railway') {
                    shouldShow = commuteType.includes('railway') || commuteType.includes('train');
                }

                if (selectedType === 'bus') {
                    shouldShow = commuteType.includes('bus');
                }

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

        showTab('railway');
    });
</script>

</body>

</html>