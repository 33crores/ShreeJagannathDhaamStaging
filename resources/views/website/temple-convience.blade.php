<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>{{ ucfirst(str_replace('_', ' ', $service_type)) }} Services</title>
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

        .service-page {
            min-height: 100vh;
            overflow-x: hidden;
        }

        .service-hero {
            position: relative;
            width: 100%;
            min-height: 330px;
            overflow: hidden;
            display: flex;
            align-items: center;
        }

        .service-hero-bg {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            transform: scale(1.04);
        }

        .service-hero-overlay {
            position: absolute;
            inset: 0;
            background:
                radial-gradient(circle at 85% 15%, rgba(255, 196, 87, 0.34), transparent 32%),
                linear-gradient(90deg, rgba(52, 21, 81, 0.88), rgba(219, 77, 48, 0.72));
        }

        .service-hero-content {
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

        .service-hero h1 {
            margin: 0;
            font-size: 46px;
            line-height: 1.12;
            font-weight: 900;
            max-width: 760px;
            letter-spacing: -0.8px;
        }

        .service-hero p {
            margin: 14px 0 0;
            font-size: 17px;
            line-height: 1.6;
            max-width: 720px;
            color: rgba(255, 255, 255, 0.90);
        }

        .service-wrapper {
            width: 100%;
            max-width: 1180px;
            margin: -48px auto 0;
            padding: 0 18px 60px;
            position: relative;
            z-index: 3;
        }

        .summary-strip {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 14px;
            margin-bottom: 26px;
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

        .service-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 26px;
        }

        .service-card-new {
            background: #ffffff;
            border-radius: 24px;
            overflow: hidden;
            border: 1px solid rgba(219, 77, 48, 0.08);
            box-shadow: 0 18px 40px rgba(52, 21, 81, 0.10);
            transition: all 0.35s ease;
        }

        .service-card-new:hover {
            transform: translateY(-6px);
            box-shadow: 0 24px 52px rgba(52, 21, 81, 0.16);
        }

        .service-image-wrap {
            position: relative;
            width: 100%;
            height: 270px;
            overflow: hidden;
            background: #fff3e8;
        }

        .service-image {
            width: 100%;
            height: 270px;
            object-fit: cover;
            display: block;
            transition: transform 0.4s ease;
        }

        .service-card-new:hover .service-image {
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

        .service-content {
            padding: 17px 18px 18px;
        }

        .service-title-row {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 12px;
            margin-bottom: 14px;
        }

        .service-title-row h5 {
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
            background: linear-gradient(135deg, #341551, #db4d30, #ff7a1a);
            box-shadow: 0 12px 22px rgba(219, 77, 48, 0.24);
            transition: all 0.25s ease;
        }

        .action-btn:hover {
            color: #ffffff;
            text-decoration: none;
            transform: translateY(-2px);
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

        .empty-box {
            grid-column: 1 / -1;
            background: #ffffff;
            border-radius: 22px;
            padding: 45px 20px;
            text-align: center;
            box-shadow: 0 18px 40px rgba(52, 21, 81, 0.10);
        }

        .empty-box i {
            font-size: 44px;
            color: #db4d30;
            margin-bottom: 12px;
        }

        .empty-box h3 {
            color: #341551;
            font-size: 22px;
            font-weight: 900;
            margin: 0 0 8px;
        }

        .empty-box p {
            color: #777777;
            margin: 0;
        }

        @media (max-width: 991px) {
            .service-grid {
                grid-template-columns: 1fr;
            }

            .summary-strip {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 575px) {
            .service-hero {
                min-height: 285px;
            }

            .service-hero-content {
                padding: 36px 16px;
            }

            .hero-badge {
                font-size: 11px;
                padding: 8px 12px;
            }

            .service-hero h1 {
                font-size: 31px;
            }

            .service-hero p {
                font-size: 14px;
                line-height: 1.5;
            }

            .service-wrapper {
                margin-top: -34px;
                padding: 0 12px 45px;
            }

            .summary-card {
                border-radius: 16px;
                padding: 13px;
            }

            .service-card-new {
                border-radius: 20px;
            }

            .service-image-wrap,
            .service-image {
                height: 220px;
            }

            .service-title-row {
                flex-direction: column;
                gap: 8px;
            }

            .service-title-row h5 {
                font-size: 19px;
            }
        }

        @media (max-width: 360px) {
            .service-hero h1 {
                font-size: 28px;
            }

            .service-image-wrap,
            .service-image {
                height: 200px;
            }

            .service-content {
                padding: 15px;
            }
        }
    </style>
</head>

<body>

@include('partials.header-puri-dham')

@php
    $language = $language ?? request('language', session('app_language', 'English'));
    $language = $language === 'Odia' ? 'Odia' : 'English';

    $rawTitle = ucfirst(str_replace('_', ' ', $service_type));
    $normalizedTitle = strtolower(str_replace('_', ' ', $service_type));

    $odiaTitles = [
        'drinking water' => 'ବିଶୁଦ୍ଧ ପାନୀୟ ଜଳ',
        'emergency' => 'ଜରୁରୀ ସେବା',
        'specially abled person' => 'ବିଶେଷ କ୍ଷମତା ବ୍ୟକ୍ତି',
        'abled person' => 'ଦିବ୍ୟାଙ୍ଗ ସହାୟତା',
        'ratha yatra mela' => 'ରଥ ଯାତ୍ରା ରୁଟ ମାନଚିତ୍ର',
        'route map' => 'ମାର୍ଗ ମାନଚିତ୍ର',
        'lost and found booth' => 'ହଜିବା ଓ ଖୋଜିବା କେନ୍ଦ୍ର',
        'toilet' => 'ଶୌଚାଳୟ',
        'beach' => 'ବେଳାଭୂମି',
        'life guard booth' => 'ଲାଇଫ ଗାର୍ଡ ସେବା',
        'charging station' => 'ଚାର୍ଜିଂ ଷ୍ଟେସନ୍',
        'petrol pump' => 'ପେଟ୍ରୋଲ ପମ୍ପ',
        'atm' => 'ଏଟିଏମ୍',
        'free food' => 'ମାଗଣା ଖାଦ୍ୟ',
    ];

    $localizedTitle = $language === 'Odia'
        ? ($odiaTitles[$normalizedTitle] ?? $rawTitle)
        : $rawTitle;

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

    $fallbackImage = asset('website/parking.jpeg');

    $heroPhoto = null;

    if(isset($services) && $services->count() > 0) {
        $firstServicePhotos = $getServicePhotos($services->first()->photo ?? null);
        $heroPhoto = $firstServicePhotos[0] ?? null;
    }

    $heroImage = $heroPhoto ? $serviceImageUrl($heroPhoto) : $fallbackImage;
@endphp

<div class="service-page">

    <section class="service-hero">
        <img class="service-hero-bg" src="{{ $heroImage }}" alt="{{ $localizedTitle }} Background">
        <div class="service-hero-overlay"></div>

        <div class="service-hero-content">
            <div class="hero-badge">
                <i class="fa-solid fa-location-dot"></i>
                {{ $language === 'Odia' ? 'ଶ୍ରୀ ଜଗନ୍ନାଥ ଧାମ' : 'Shree Jagannatha Dham' }}
            </div>

            <h1>{{ $localizedTitle }}</h1>

            <p>
                {{ $language === 'Odia'
                    ? 'ଏଠାରେ ଉପଲବ୍ଧ ସମସ୍ତ ସେବା, ସ୍ଥାନ ଓ ଦିଗ ନିର୍ଦ୍ଦେଶ ଦେଖନ୍ତୁ।'
                    : 'Explore available facilities, locations and directions near Shree Jagannatha Dham.' }}
            </p>
        </div>
    </section>

    <main class="service-wrapper">

        <div class="summary-strip">
            <div class="summary-card">
                <div class="summary-icon">
                    <i class="fa-solid fa-map-location-dot"></i>
                </div>
                <div>
                    <strong>{{ $language === 'Odia' ? 'ନିକଟସ୍ଥ ସେବା' : 'Nearby Services' }}</strong>
                    <span>{{ $language === 'Odia' ? 'ସହଜରେ ଖୋଜନ୍ତୁ' : 'Find facilities easily' }}</span>
                </div>
            </div>

            <div class="summary-card">
                <div class="summary-icon">
                    <i class="fa-solid fa-circle-info"></i>
                </div>
                <div>
                    <strong>{{ $language === 'Odia' ? 'ସେବା ବିବରଣୀ' : 'Service Details' }}</strong>
                    <span>{{ $language === 'Odia' ? 'ନାମ ଓ ଠିକଣା' : 'Name and address' }}</span>
                </div>
            </div>

            <div class="summary-card">
                <div class="summary-icon">
                    <i class="fa-solid fa-location-arrow"></i>
                </div>
                <div>
                    <strong>{{ $language === 'Odia' ? 'ଦିଗ ନିର୍ଦ୍ଦେଶ' : 'Directions' }}</strong>
                    <span>{{ $language === 'Odia' ? 'ମ୍ୟାପ ଦ୍ୱାରା ପହଞ୍ଚନ୍ତୁ' : 'Reach through map' }}</span>
                </div>
            </div>
        </div>

        <div class="service-grid">
            @forelse ($services as $service)
                @php
                    $photos = $getServicePhotos($service->photo ?? null);
                    $firstPhoto = $photos[0] ?? null;
                    $servicePhoto = $firstPhoto ? $serviceImageUrl($firstPhoto) : $fallbackImage;

                    $addressParts = array_filter([
                        $service->landmark ?? null,
                        $service->city_village ?? null,
                        $service->district ?? null,
                        $service->state ?? null,
                    ]);

                    $address = count($addressParts) ? implode(', ', $addressParts) : 'N/A';

                    $serviceTypeText = ucwords(str_replace('_', ' ', $service->service_type ?? $service_type));

                    $mapUrl = $service->google_map_link
                        ?? $service->map_url
                        ?? $service->google_map_url
                        ?? null;
                @endphp

                <article class="service-card-new">
                    <div class="service-image-wrap">
                        <img
                            src="{{ $servicePhoto }}"
                            alt="{{ $service->service_name ?? $localizedTitle }}"
                            class="service-image"
                            onerror="this.onerror=null; this.src='{{ $fallbackImage }}'; this.classList.add('fallback-img');"
                        >

                        <div class="service-tag">
                            <i class="fa-solid fa-building-circle-check"></i>
                            {{ $serviceTypeText }}
                        </div>

                        <div class="available-tag">
                            <i class="fa-solid fa-circle-check"></i>
                            {{ $language === 'Odia' ? 'ଉପଲବ୍ଧ' : 'Available' }}
                        </div>
                    </div>

                    <div class="service-content">
                        <div class="service-title-row">
                            <h5>{{ $service->service_name ?? $localizedTitle }}</h5>
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
                                <a href="{{ $mapUrl }}" class="action-btn" target="_blank" rel="noopener noreferrer">
                                    <i class="fa-solid fa-location-arrow"></i>
                                    {{ $language === 'Odia' ? 'ଦିଗ ନିର୍ଦ୍ଦେଶ' : 'Directions' }}
                                </a>
                            @else
                                <a href="javascript:void(0)" class="action-btn disabled">
                                    <i class="fa-solid fa-location-arrow"></i>
                                    {{ $language === 'Odia' ? 'ଲିଙ୍କ ନାହିଁ' : 'No Direction Link' }}
                                </a>
                            @endif
                        </div>
                    </div>
                </article>
            @empty
                <div class="empty-box">
                    <i class="fa-solid fa-circle-exclamation"></i>
                    <h3>{{ $language === 'Odia' ? 'କୌଣସି ସେବା ମିଳିଲା ନାହିଁ' : 'No Services Found' }}</h3>
                    <p>{{ $language === 'Odia' ? 'ଦୟାକରି ପରେ ପୁଣି ଯାଞ୍ଚ କରନ୍ତୁ।' : 'Please check again later.' }}</p>
                </div>
            @endforelse
        </div>
    </main>
</div>

@include('partials.website-footer')

</body>

</html>