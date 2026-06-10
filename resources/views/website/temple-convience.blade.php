<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>{{ ucfirst(str_replace('_', ' ', $service_type)) }} Services</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- Only FontAwesome --}}
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
                radial-gradient(circle at 12% 8%, rgba(255, 122, 26, 0.16), transparent 28%),
                radial-gradient(circle at 88% 10%, rgba(52, 21, 81, 0.12), transparent 30%),
                radial-gradient(circle at 50% 95%, rgba(219, 77, 48, 0.10), transparent 34%),
                linear-gradient(180deg, #fff8f3 0%, #ffffff 46%, #fff4ec 100%);
        }

        .service-page {
            min-height: 100vh;
            overflow-x: hidden;
            padding-bottom: 50px;
        }

        .page-heading-section {
            position: relative;
            width: 100%;
            padding: 44px 16px 42px;
            background:
                radial-gradient(circle at 18% 20%, rgba(255, 213, 109, 0.34), transparent 28%),
                radial-gradient(circle at 85% 18%, rgba(255, 122, 26, 0.30), transparent 26%),
                linear-gradient(135deg, #341551 0%, #64205c 42%, #db4d30 76%, #ff7a1a 100%);
            color: #ffffff;
            text-align: center;
            overflow: hidden;
            box-shadow: 0 16px 36px rgba(52, 21, 81, 0.20);
        }

        .page-heading-section::before {
            content: "";
            position: absolute;
            width: 210px;
            height: 210px;
            left: -70px;
            top: -80px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.10);
        }

        .page-heading-section::after {
            content: "";
            position: absolute;
            width: 170px;
            height: 170px;
            right: -54px;
            bottom: -70px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.12);
        }

        .heading-inner {
            position: relative;
            z-index: 2;
            max-width: 900px;
            margin: 0 auto;
        }

        .page-heading-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 9px 15px;
            border-radius: 999px;
            background: rgba(255, 255, 255, 0.16);
            border: 1px solid rgba(255, 255, 255, 0.24);
            font-size: 13px;
            font-weight: 800;
            margin-bottom: 14px;
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
        }

        .page-heading-section h1 {
            margin: 0;
            font-size: 42px;
            line-height: 1.14;
            font-weight: 900;
            letter-spacing: -0.7px;
            text-shadow: 0 8px 24px rgba(0, 0, 0, 0.22);
        }

        .page-heading-section p {
            margin: 12px auto 0;
            max-width: 720px;
            font-size: 16px;
            line-height: 1.58;
            color: rgba(255, 255, 255, 0.92);
        }

        .service-wrapper {
            width: 100%;
            max-width: 1180px;
            margin: 30px auto 0;
            padding: 0 18px;
            position: relative;
            z-index: 3;
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
        }

        @media (max-width: 575px) {
            .page-heading-section {
                padding: 34px 14px 30px;
            }

            .page-heading-badge {
                font-size: 11px;
                padding: 8px 12px;
            }

            .page-heading-section h1 {
                font-size: 29px;
            }

            .page-heading-section p {
                font-size: 14px;
                line-height: 1.5;
            }

            .service-wrapper {
                margin-top: 22px;
                padding: 0 12px;
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
            .page-heading-section h1 {
                font-size: 27px;
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
        'bus stand' => 'ବସ୍ ଷ୍ଟାଣ୍ଡ',
        'railway station' => 'ରେଲୱେ ଷ୍ଟେସନ୍',
        'hospital' => 'ହସ୍ପିଟାଲ୍',
        'police station' => 'ପୋଲିସ୍ ଷ୍ଟେସନ୍',
    ];

    $localizedTitle = $language === 'Odia'
        ? ($odiaTitles[$normalizedTitle] ?? $rawTitle)
        : $rawTitle;

    /*
        Supported old and new photo folders:

        1. public/assets/uploads/public_services
           Browser URL: /assets/uploads/public_services/image.jpg

        2. public/uploads/public_services
           Browser URL: /uploads/public_services/image.jpg
    */
    $publicServicePhotoFolders = [
        'assets/uploads/public_services',
        'uploads/public_services',
    ];

    $fallbackImage = 'data:image/svg+xml;charset=UTF-8,' . rawurlencode('
        <svg xmlns="http://www.w3.org/2000/svg" width="800" height="450">
            <rect width="100%" height="100%" fill="#fff3e8"/>
            <text x="50%" y="50%" text-anchor="middle" dominant-baseline="middle"
                  font-family="Arial" font-size="28" fill="#db4d30">
                Service Image
            </text>
        </svg>
    ');

    $encodeAssetUrl = function ($path) {
        $path = ltrim(str_replace('\\', '/', $path), '/');
        $parts = explode('/', $path);
        $encodedParts = array_map('rawurlencode', $parts);

        return url(implode('/', $encodedParts));
    };

    $getServicePhotos = function ($photoValue) {
        if (is_array($photoValue)) {
            return array_values(array_filter($photoValue));
        }

        $photoValue = trim((string) $photoValue);

        if ($photoValue === '') {
            return [];
        }

        $decoded = json_decode($photoValue, true);

        if (json_last_error() === JSON_ERROR_NONE) {
            if (is_array($decoded)) {
                return array_values(array_filter($decoded));
            }

            if (is_string($decoded) && trim($decoded) !== '') {
                return [trim($decoded)];
            }
        }

        $photoValue = str_replace(['\\/', '\\'], '/', $photoValue);

        preg_match_all('/[^,"\[\]]+\.(jpg|jpeg|png|webp|gif|svg)/i', $photoValue, $matches);

        if (!empty($matches[0])) {
            return array_values(array_filter(array_map('trim', $matches[0])));
        }

        return [$photoValue];
    };

    $serviceImageUrl = function ($photo) use ($publicServicePhotoFolders, $fallbackImage, $encodeAssetUrl) {
        $photo = trim((string) $photo);

        if ($photo === '') {
            return $fallbackImage;
        }

        $photo = trim($photo, " \t\n\r\0\x0B\"'");
        $photo = str_replace(['\\/', '\\'], '/', $photo);

        $isRemoteUrl = preg_match('/^https?:\/\//i', $photo);

        if ($isRemoteUrl) {
            $photoPath = parse_url($photo, PHP_URL_PATH);
            $relativePathFromDb = ltrim((string) $photoPath, '/');
        } else {
            $relativePathFromDb = ltrim($photo, '/');
        }

        $relativePathFromDb = str_replace('\\', '/', $relativePathFromDb);
        $relativePathFromDb = rawurldecode($relativePathFromDb);
        $relativePathFromDb = trim($relativePathFromDb, " \t\n\r\0\x0B\"'");

        $filename = basename($relativePathFromDb);
        $filename = trim($filename, " \t\n\r\0\x0B\"'");

        $candidatePaths = [];

        /*
            First check the exact path saved in DB.
            Example:
            assets/uploads/public_services/file.jpg
            uploads/public_services/file.jpg
        */
        if ($relativePathFromDb !== '' && preg_match('/\.(jpg|jpeg|png|webp|gif|svg)$/i', $relativePathFromDb)) {
            $candidatePaths[] = $relativePathFromDb;
        }

        /*
            Then check both possible folders by filename.
            This fixes old and new upload path issue.
        */
        if ($filename !== '' && $filename !== '.' && $filename !== '/') {
            foreach ($publicServicePhotoFolders as $folder) {
                $candidatePaths[] = $folder . '/' . $filename;
            }
        }

        $candidatePaths = array_values(array_unique(array_filter($candidatePaths)));

        foreach ($candidatePaths as $candidatePath) {
            $candidatePath = ltrim(str_replace('\\', '/', $candidatePath), '/');

            if (file_exists(public_path($candidatePath))) {
                return $encodeAssetUrl($candidatePath);
            }
        }

        /*
            If image is a full remote URL, return it.
            Otherwise show fallback image.
        */
        if ($isRemoteUrl) {
            return $photo;
        }

        return $fallbackImage;
    };
@endphp

<div class="service-page">

    <section class="page-heading-section">
        <div class="heading-inner">
            <div class="page-heading-badge">
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

</body>
</html>