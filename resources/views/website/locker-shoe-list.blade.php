<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>{{ ($language ?? 'English') === 'Odia' ? 'ଲକର ଓ ଜୋତା ଷ୍ଟାଣ୍ଡ' : 'Locker & Shoe Stands' }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{ asset('front-assets/frontend/css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('front-assets/frontend/css/dham-header.css') }}">
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

        .locker-page {
            min-height: 100vh;
            overflow-x: hidden;
        }

        .locker-hero {
            position: relative;
            width: 100%;
            min-height: 330px;
            overflow: hidden;
            display: flex;
            align-items: center;
        }

        .locker-hero-bg {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            transform: scale(1.04);
        }

        .locker-hero-overlay {
            position: absolute;
            inset: 0;
            background:
                radial-gradient(circle at 85% 15%, rgba(255, 196, 87, 0.34), transparent 32%),
                linear-gradient(90deg, rgba(52, 21, 81, 0.88), rgba(219, 77, 48, 0.72));
        }

        .locker-hero-content {
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

        .locker-hero h1 {
            margin: 0;
            font-size: 46px;
            line-height: 1.12;
            font-weight: 900;
            max-width: 760px;
            letter-spacing: -0.8px;
        }

        .locker-hero p {
            margin: 14px 0 0;
            font-size: 17px;
            line-height: 1.6;
            max-width: 720px;
            color: rgba(255, 255, 255, 0.90);
        }

        .locker-wrapper {
            width: 100%;
            max-width: 1180px;
            margin: -48px auto 0;
            padding: 0 18px 60px;
            position: relative;
            z-index: 3;
        }

        .locker-summary {
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

        .filter-section {
            margin: 0 0 24px;
            padding: 12px;
            border-radius: 22px;
            background: rgba(255, 255, 255, 0.88);
            border: 1px solid rgba(219, 77, 48, 0.08);
            box-shadow: 0 14px 34px rgba(52, 21, 81, 0.10);
            overflow-x: auto;
            scrollbar-width: none;
        }

        .filter-section::-webkit-scrollbar {
            display: none;
        }

        .locker-filters {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 10px;
            min-width: 520px;
        }

        .locker-filter-btn {
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

        .locker-filter-btn i {
            color: #db4d30;
        }

        .locker-filter-btn.active {
            color: #ffffff;
            background: linear-gradient(135deg, #341551, #db4d30, #ff7a1a);
            box-shadow: 0 12px 24px rgba(219, 77, 48, 0.24);
            transform: translateY(-2px);
        }

        .locker-filter-btn.active i {
            color: #ffffff;
        }

        .locker-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 26px;
        }

        .locker-card {
            background: #ffffff;
            border-radius: 24px;
            overflow: hidden;
            border: 1px solid rgba(219, 77, 48, 0.08);
            box-shadow: 0 18px 40px rgba(52, 21, 81, 0.10);
            transition: all 0.35s ease;
            display: block;
        }

        .locker-card.hide {
            display: none;
        }

        .locker-card.show {
            animation: cardFade 0.35s ease both;
        }

        .locker-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 24px 52px rgba(52, 21, 81, 0.16);
        }

        .locker-image-wrap {
            position: relative;
            width: 100%;
            height: 270px;
            overflow: hidden;
            background: #fff3e8;
        }

        .locker-image {
            width: 100%;
            height: 270px;
            object-fit: cover;
            display: block;
            transition: transform 0.4s ease;
        }

        .locker-card:hover .locker-image {
            transform: scale(1.04);
        }

        .service-tag {
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

        .free-tag {
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

        .locker-content {
            padding: 17px 18px 18px;
        }

        .locker-title-row {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 12px;
            margin-bottom: 14px;
        }

        .locker-title-row h5 {
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
            grid-template-columns: 1fr 1fr;
            gap: 10px;
        }

        .action-btn {
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
            transition: all 0.25s ease;
        }

        .action-btn:hover {
            color: #ffffff;
            text-decoration: none;
            transform: translateY(-2px);
        }

        .btn-map {
            background: linear-gradient(135deg, #341551, #7a2354);
            box-shadow: 0 10px 18px rgba(52, 21, 81, 0.20);
        }

        .btn-call {
            background: linear-gradient(135deg, #ff7a1a, #db4d30);
            box-shadow: 0 10px 18px rgba(219, 77, 48, 0.20);
        }

        .action-btn.disabled {
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
            .locker-grid {
                grid-template-columns: 1fr;
            }

            .locker-summary {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 575px) {
            .locker-hero {
                min-height: 285px;
            }

            .locker-hero-content {
                padding: 36px 16px;
            }

            .hero-badge {
                font-size: 11px;
                padding: 8px 12px;
            }

            .locker-hero h1 {
                font-size: 31px;
            }

            .locker-hero p {
                font-size: 14px;
                line-height: 1.5;
            }

            .locker-wrapper {
                margin-top: -34px;
                padding: 0 12px 45px;
            }

            .summary-card {
                border-radius: 16px;
                padding: 13px;
            }

            .filter-section {
                border-radius: 18px;
                padding: 10px;
                margin-bottom: 20px;
            }

            .locker-filters {
                display: flex;
                min-width: max-content;
                gap: 8px;
            }

            .locker-filter-btn {
                min-height: 44px;
                padding: 10px 13px;
                font-size: 13px;
            }

            .locker-card {
                border-radius: 20px;
            }

            .locker-image-wrap,
            .locker-image {
                height: 220px;
            }

            .locker-title-row {
                flex-direction: column;
                gap: 8px;
            }

            .locker-title-row h5 {
                font-size: 19px;
            }

            .action-row {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 360px) {
            .locker-hero h1 {
                font-size: 28px;
            }

            .locker-image-wrap,
            .locker-image {
                height: 200px;
            }

            .locker-content {
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

    $getServicePhotos = function ($photoValue) {
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

    $serviceImageUrl = function ($photo) use ($uploadBaseUrl) {
        $fallback = asset('website/locker.png');

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
            strpos($photo, 'public_services/') === 0 ||
            strpos($photo, 'public_service/') === 0
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
            return $uploadBaseUrl . '/assets/uploads/public_services/' . $photo;
        }

        return $fallback;
    };

    $fallbackImage = asset('website/locker.png');
@endphp

<div class="locker-page">

    <section class="locker-hero">
        <img class="locker-hero-bg" src="{{ asset('website/parking.jpeg') }}" alt="Locker and Shoe Stand Background">
        <div class="locker-hero-overlay"></div>

        <div class="locker-hero-content">
            <div class="hero-badge">
                <i class="fa-solid fa-box-archive"></i>
                {{ $language === 'Odia' ? 'ଶ୍ରୀ ଜଗନ୍ନାଥ ଧାମ' : 'Shree Jagannatha Dham' }}
            </div>

            <h1>
                {{ $language === 'Odia' ? 'ଲକର ଓ ଜୋତା ଷ୍ଟାଣ୍ଡ' : 'Cloakroom & Lockers' }}
            </h1>

            <p>
                {{ $language === 'Odia'
                    ? 'ମନ୍ଦିର ନିକଟରେ ଉପଲବ୍ଧ ଲକର ଏବଂ ଜୋତା ଷ୍ଟାଣ୍ଡ ସୁବିଧା ଦେଖନ୍ତୁ।'
                    : 'Find available locker, cloakroom and shoe stand facilities near Shree Jagannatha Temple.' }}
            </p>
        </div>
    </section>

    <main class="locker-wrapper">

        <div class="locker-summary">
            <div class="summary-card">
                <div class="summary-icon">
                    <i class="fa-solid fa-lock"></i>
                </div>
                <div>
                    <strong>{{ $language === 'Odia' ? 'ଲକର ସୁବିଧା' : 'Locker Facility' }}</strong>
                    <span>{{ $language === 'Odia' ? 'ସାମଗ୍ରୀ ସୁରକ୍ଷିତ ରଖନ୍ତୁ' : 'Keep belongings safe' }}</span>
                </div>
            </div>

            <div class="summary-card">
                <div class="summary-icon">
                    <i class="fa-solid fa-shoe-prints"></i>
                </div>
                <div>
                    <strong>{{ $language === 'Odia' ? 'ଜୋତା ଷ୍ଟାଣ୍ଡ' : 'Shoe Stand' }}</strong>
                    <span>{{ $language === 'Odia' ? 'ନିକଟସ୍ଥ ଷ୍ଟାଣ୍ଡ ଖୋଜନ୍ତୁ' : 'Find nearby stands' }}</span>
                </div>
            </div>

            <div class="summary-card">
                <div class="summary-icon">
                    <i class="fa-solid fa-map-location-dot"></i>
                </div>
                <div>
                    <strong>{{ $language === 'Odia' ? 'ମ୍ୟାପ ଦିଗ' : 'Map Direction' }}</strong>
                    <span>{{ $language === 'Odia' ? 'ସହଜରେ ସ୍ଥାନ ଖୋଜନ୍ତୁ' : 'Locate facility easily' }}</span>
                </div>
            </div>
        </div>

        <div class="filter-section">
            <div class="locker-filters">
                <button type="button" class="locker-filter-btn active" data-filter="all">
                    <i class="fa-solid fa-layer-group"></i>
                    {{ $language === 'Odia' ? 'ସମସ୍ତ' : 'All Services' }}
                </button>

                <button type="button" class="locker-filter-btn" data-filter="locker">
                    <i class="fa-solid fa-lock"></i>
                    {{ $language === 'Odia' ? 'ଲକର' : 'Locker' }}
                </button>

                <button type="button" class="locker-filter-btn" data-filter="shoe_stand">
                    <i class="fa-solid fa-shoe-prints"></i>
                    {{ $language === 'Odia' ? 'ଜୋତା ଷ୍ଟାଣ୍ଡ' : 'Shoe Stand' }}
                </button>
            </div>
        </div>

        <div class="locker-grid" id="lockerGrid">
            @forelse ($services as $item)
                @php
                    $photos = $getServicePhotos($item->photo ?? null);
                    $firstPhoto = $photos[0] ?? null;
                    $servicePhoto = $firstPhoto ? $serviceImageUrl($firstPhoto) : $fallbackImage;

                    $serviceType = $item->service_type ?? '';
                    $serviceTypeText = $serviceType
                        ? ucwords(str_replace('_', ' ', $serviceType))
                        : 'Service';

                    $addressParts = array_filter([
                        $item->landmark ?? null,
                        $item->city_village ?? null,
                        $item->district ?? null,
                        $item->state ?? null,
                    ]);

                    $address = count($addressParts) ? implode(', ', $addressParts) : 'N/A';

                    $mapUrl = $item->google_map_link
                        ?? $item->map_url
                        ?? $item->google_map_url
                        ?? null;
                @endphp

                <article class="locker-card show" data-service-type="{{ e(strtolower($serviceType)) }}">
                    <div class="locker-image-wrap">
                        <img
                            src="{{ $servicePhoto }}"
                            alt="{{ $item->service_name ?? 'Locker and Shoe Stand' }}"
                            class="locker-image"
                            onerror="this.onerror=null; this.src='{{ $fallbackImage }}'; this.classList.add('fallback-img');"
                        >

                        <div class="service-tag">
                            @if($serviceType === 'shoe_stand')
                                <i class="fa-solid fa-shoe-prints"></i>
                            @else
                                <i class="fa-solid fa-lock"></i>
                            @endif
                            {{ $serviceTypeText }}
                        </div>

                        <div class="free-tag">
                            <i class="fa-solid fa-circle-check"></i>
                            {{ $language === 'Odia' ? 'ସେବା' : 'Facility' }}
                        </div>
                    </div>

                    <div class="locker-content">
                        <div class="locker-title-row">
                            <h5>{{ $item->service_name ?? 'Locker & Shoe Stand' }}</h5>
                            <span class="type-pill">{{ $serviceTypeText }}</span>
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
                                    {{ $item->opening_time ?? 'N/A' }} - {{ $item->closing_time ?? 'N/A' }}
                                </div>
                            </div>

                            <div class="info-row">
                                <i class="fa-solid fa-phone"></i>
                                <div>
                                    <strong>{{ $language === 'Odia' ? 'ଯୋଗାଯୋଗ' : 'Contact' }}</strong>
                                    {{ $item->contact_no ?? 'Not Available' }}
                                </div>
                            </div>
                        </div>

                        <div class="action-row">
                            @if(!empty($mapUrl))
                                <a href="{{ $mapUrl }}" target="_blank" rel="noopener noreferrer" class="action-btn btn-map">
                                    <i class="fa-solid fa-location-arrow"></i>
                                    {{ $language === 'Odia' ? 'ଦିଗ ନିର୍ଦ୍ଦେଶ' : 'Directions' }}
                                </a>
                            @else
                                <a href="javascript:void(0)" class="action-btn btn-map disabled">
                                    <i class="fa-solid fa-location-arrow"></i>
                                    {{ $language === 'Odia' ? 'ମ୍ୟାପ ନାହିଁ' : 'No Map' }}
                                </a>
                            @endif

                            @if(!empty($item->contact_no))
                                <a href="tel:{{ $item->contact_no }}" class="action-btn btn-call">
                                    <i class="fa-solid fa-phone"></i>
                                    {{ $language === 'Odia' ? 'କଲ କରନ୍ତୁ' : 'Call' }}
                                </a>
                            @else
                                <a href="javascript:void(0)" class="action-btn btn-call disabled">
                                    <i class="fa-solid fa-phone"></i>
                                    {{ $language === 'Odia' ? 'ନମ୍ବର ନାହିଁ' : 'No Number' }}
                                </a>
                            @endif
                        </div>
                    </div>
                </article>
            @empty
                <div class="empty-box">
                    <i class="fa-solid fa-box-archive"></i>
                    <h3>{{ $language === 'Odia' ? 'କୌଣସି ଲକର ଓ ଜୋତା ଷ୍ଟାଣ୍ଡ ମିଳିଲା ନାହିଁ' : 'No Locker & Shoe Stand Found' }}</h3>
                    <p>{{ $language === 'Odia' ? 'ଦୟାକରି ପରେ ପୁଣି ଯାଞ୍ଚ କରନ୍ତୁ।' : 'Please check again later.' }}</p>
                </div>
            @endforelse

            <div class="no-result-box" id="noResultBox" style="display:none;">
                <i class="fa-solid fa-box-open"></i>
                <h3>{{ $language === 'Odia' ? 'ଏହି ସେବା ମିଳିଲା ନାହିଁ' : 'No Service Found' }}</h3>
                <p>{{ $language === 'Odia' ? 'ଦୟାକରି ଅନ୍ୟ ସେବା ବାଛନ୍ତୁ।' : 'Please select another service type.' }}</p>
            </div>
        </div>
    </main>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const filterButtons = document.querySelectorAll('.locker-filter-btn');
        const cards = document.querySelectorAll('.locker-card');
        const noResultBox = document.getElementById('noResultBox');

        function normalizeText(value) {
            return String(value || '')
                .toLowerCase()
                .replace(/-/g, '_')
                .replace(/\s+/g, '_')
                .trim();
        }

        function filterCards(type) {
            const selectedType = normalizeText(type);
            let visibleCount = 0;

            filterButtons.forEach(function (button) {
                button.classList.toggle('active', normalizeText(button.dataset.filter) === selectedType);
            });

            cards.forEach(function (card) {
                const cardType = normalizeText(card.dataset.serviceType);
                const shouldShow = selectedType === 'all' || cardType === selectedType;

                card.classList.toggle('hide', !shouldShow);
                card.classList.toggle('show', shouldShow);

                if (shouldShow) {
                    visibleCount++;
                }
            });

            if (noResultBox) {
                noResultBox.style.display = visibleCount === 0 ? 'block' : 'none';
            }
        }

        filterButtons.forEach(function (button) {
            button.addEventListener('click', function () {
                filterCards(this.dataset.filter);
            });
        });

        filterCards('all');
    });
</script>

</body>

</html>