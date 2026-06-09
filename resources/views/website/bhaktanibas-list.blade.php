<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>{{ ($language ?? 'English') === 'Odia' ? 'ଭକ୍ତ ନିବାସ' : 'Bhakta Niwas' }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: linear-gradient(180deg, #fff8f3 0%, #ffffff 48%, #fff7f1 100%);
            font-family: Arial, sans-serif;
            color: #222;
        }

        .bhakta-page {
            min-height: 100vh;
            overflow-x: hidden;
        }

        .bhakta-hero {
            position: relative;
            width: 100%;
            min-height: 330px;
            overflow: hidden;
            display: flex;
            align-items: center;
        }

        .bhakta-hero-bg {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            transform: scale(1.04);
        }

        .bhakta-hero-overlay {
            position: absolute;
            inset: 0;
            background:
                radial-gradient(circle at 85% 15%, rgba(255, 196, 87, 0.34), transparent 32%),
                linear-gradient(90deg, rgba(52, 21, 81, 0.86), rgba(219, 77, 48, 0.70));
        }

        .bhakta-hero-content {
            position: relative;
            z-index: 2;
            width: 100%;
            max-width: 1180px;
            margin: 0 auto;
            padding: 50px 22px;
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

        .bhakta-hero h1 {
            margin: 0;
            font-size: 44px;
            line-height: 1.12;
            font-weight: 900;
            max-width: 720px;
        }

        .bhakta-hero p {
            margin: 14px 0 0;
            font-size: 17px;
            line-height: 1.6;
            max-width: 680px;
            color: rgba(255, 255, 255, 0.90);
        }

        .page-container {
            width: 100%;
            max-width: 1180px;
            margin: 32px auto 0;
            padding: 0 18px 55px;
            position: relative;
            z-index: 3;
        }

        .bhakta-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 26px;
        }

        .bhakta-card {
            background: #ffffff;
            border-radius: 24px;
            overflow: hidden;
            border: 1px solid rgba(219, 77, 48, 0.08);
            box-shadow: 0 18px 40px rgba(52, 21, 81, 0.10);
            transition: all 0.35s ease;
        }

        .bhakta-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 24px 52px rgba(52, 21, 81, 0.16);
        }

        .image-section {
            position: relative;
            width: 100%;
            height: 300px;
            overflow: hidden;
            background: #fff3e8;
        }

        .main-display-image {
            width: 100%;
            height: 300px;
            object-fit: cover;
            display: block;
            transition: transform 0.4s ease;
        }

        .bhakta-card:hover .main-display-image {
            transform: scale(1.04);
        }

        .image-tag {
            position: absolute;
            top: 14px;
            left: 14px;
            padding: 8px 12px;
            border-radius: 999px;
            background: rgba(255, 255, 255, 0.92);
            color: #db4d30;
            font-size: 12px;
            font-weight: 800;
            box-shadow: 0 8px 18px rgba(0, 0, 0, 0.12);
        }

        .thumbnail-section {
            display: flex;
            gap: 9px;
            overflow-x: auto;
            padding: 13px 16px 2px;
            scrollbar-width: none;
        }

        .thumbnail-section::-webkit-scrollbar {
            display: none;
        }

        .thumbnail {
            width: 76px;
            height: 62px;
            min-width: 76px;
            object-fit: cover;
            border-radius: 12px;
            cursor: pointer;
            border: 2px solid transparent;
            box-shadow: 0 5px 14px rgba(0, 0, 0, 0.12);
            background: #fff3e8;
            transition: all 0.25s ease;
        }

        .thumbnail:hover,
        .thumbnail.active {
            transform: scale(1.05);
            border-color: #db4d30;
        }

        .card-body-custom {
            padding: 16px 18px 18px;
        }

        .card-title-row {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 12px;
            margin-bottom: 14px;
        }

        .card-title-row h5 {
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
            font-weight: 800;
            white-space: nowrap;
        }

        .offer-box {
            background: linear-gradient(135deg, #fff7f1, #fff0f6);
            border: 1px solid rgba(219, 77, 48, 0.08);
            border-radius: 16px;
            padding: 13px;
            margin-bottom: 14px;
        }

        .offer-title {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #db4d30;
            font-size: 14px;
            font-weight: 900;
            margin-bottom: 9px;
        }

        .offer-list {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
        }

        .offer-item {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 7px 10px;
            border-radius: 999px;
            background: #ffffff;
            color: #555;
            font-size: 12px;
            font-weight: 700;
            box-shadow: 0 6px 14px rgba(52, 21, 81, 0.06);
        }

        .info-list {
            display: grid;
            gap: 10px;
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
            color: #222;
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
            min-height: 44px;
            border-radius: 13px;
            padding: 11px 12px;
            text-decoration: none;
            color: #ffffff;
            font-size: 14px;
            font-weight: 800;
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
            color: #777;
            margin: 0;
        }

        @media (max-width: 991px) {
            .bhakta-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 575px) {
            .bhakta-hero {
                min-height: 270px;
            }

            .bhakta-hero-content {
                padding: 34px 16px;
            }

            .hero-badge {
                font-size: 11px;
                padding: 8px 12px;
            }

            .bhakta-hero h1 {
                font-size: 30px;
            }

            .bhakta-hero p {
                font-size: 14px;
            }

            .page-container {
                margin-top: 22px;
                padding: 0 12px 42px;
            }

            .bhakta-card {
                border-radius: 20px;
            }

            .image-section,
            .main-display-image {
                height: 230px;
            }

            .card-title-row {
                flex-direction: column;
                gap: 8px;
            }

            .card-title-row h5 {
                font-size: 19px;
            }

            .action-row {
                grid-template-columns: 1fr;
            }

            .thumbnail {
                width: 66px;
                height: 54px;
                min-width: 66px;
            }
        }
    </style>
</head>

<body>

@php
    $language = $language ?? session('app_language', 'English');
    $language = $language === 'Odia' ? 'Odia' : 'English';

    /*
        Image folder:
        public/assets/uploads/accomodation_photos

        DB can contain:
        - ["assets\/uploads\/accomodation_photos\/file.jpg"]
        - assets/uploads/accomodation_photos/file.jpg
        - accomodation_photos/file.jpg
        - file.jpg
        - old full URL
    */

    $fallbackImage = asset('website/bhkt.jpg');

    $getAccommodationPhotos = function ($photoValue) {
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

        preg_match_all('/[^,"\[\]]+\.(jpg|jpeg|png|webp|gif)/i', $photoValue, $matches);

        if (!empty($matches[0])) {
            return array_values(array_filter(array_map('trim', $matches[0])));
        }

        return [$photoValue];
    };

    $accommodationImageUrl = function ($photo) use ($fallbackImage) {
        $photo = trim((string) $photo);

        if ($photo === '') {
            return $fallbackImage;
        }

        $photo = trim($photo, " \t\n\r\0\x0B\"'");
        $photo = str_replace(['\\/', '\\'], '/', $photo);

        if (preg_match('/^https?:\/\//i', $photo)) {
            $path = parse_url($photo, PHP_URL_PATH);
            $filename = basename($path);
        } else {
            $filename = basename($photo);
        }

        $filename = trim(rawurldecode($filename), " \t\n\r\0\x0B\"'");

        if ($filename === '' || $filename === '.' || $filename === '/') {
            return $fallbackImage;
        }

        return asset('assets/uploads/accomodation_photos/' . $filename);
    };
@endphp

<div class="bhakta-page">

    <section class="bhakta-hero">
        <img class="bhakta-hero-bg" src="{{ asset('website/bhkt.jpg') }}" alt="Bhakta Niwas Background">
        <div class="bhakta-hero-overlay"></div>

        <div class="bhakta-hero-content">
            <div class="hero-badge">
                <i class="fa-solid fa-house-chimney"></i>
                {{ $language === 'Odia' ? 'ଶ୍ରୀ ଜଗନ୍ନାଥ ଧାମ' : 'Shree Jagannatha Dham' }}
            </div>

            <h1>
                {{ $language === 'Odia' ? 'ଭକ୍ତ ନିବାସ' : 'Temple Owned Stay For Pilgrims' }}
            </h1>

            <p>
                {{ $language === 'Odia'
                    ? 'ତୀର୍ଥଯାତ୍ରୀମାନଙ୍କ ପାଇଁ ମନ୍ଦିର ପାଖରେ ଶାନ୍ତିପୂର୍ଣ୍ଣ ଓ ସୁବିଧାଜନକ ରହିବା ସ୍ଥାନ।'
                    : 'Experience peaceful and convenient stay options near Shree Jagannatha Dham.' }}
            </p>
        </div>
    </section>

    <main class="page-container">

        <div class="bhakta-grid">
            @forelse ($bhaktaNibas as $item)
                @php
                    $cardIndex = $loop->index;
                    $photoArray = $getAccommodationPhotos($item->photo ?? null);

                    $firstPhoto = $photoArray[0] ?? null;
                    $firstPhotoUrl = $firstPhoto ? $accommodationImageUrl($firstPhoto) : $fallbackImage;

                    $addressParts = array_filter([
                        $item->landmark ?? null,
                        $item->city_village ?? null,
                        $item->district ?? null,
                        $item->state ?? null,
                    ]);

                    $address = count($addressParts) ? implode(', ', $addressParts) : 'N/A';

                    $typeText = !empty($item->accomodation_type)
                        ? ucwords(str_replace('_', ' ', $item->accomodation_type))
                        : 'Bhakta Niwas';

                    $foodText = !empty($item->food_type)
                        ? $item->food_type
                        : ($language === 'Odia'
                            ? 'ଜଳଖିଆ / ମଧ୍ୟାହ୍ନ ଭୋଜନ / ରାତ୍ରି ଭୋଜନ'
                            : 'Breakfast / Lunch / Dinner');
                @endphp

                <article class="bhakta-card">
                    <div class="image-section">
                        <img
                            id="mainImage-{{ $cardIndex }}"
                            class="main-display-image"
                            src="{{ $firstPhotoUrl }}"
                            alt="{{ $item->name ?? 'Bhakta Niwas' }}"
                            onerror="this.onerror=null; this.src='{{ $fallbackImage }}'; this.classList.add('fallback-img');"
                        >

                        <div class="image-tag">
                            <i class="fa-solid fa-house-user"></i>
                            {{ $language === 'Odia' ? 'ଭକ୍ତ ନିବାସ' : 'Stay' }}
                        </div>
                    </div>

                    @if(count($photoArray) > 0)
                        <div class="thumbnail-section">
                            @foreach ($photoArray as $photoIndex => $photo)
                                @php
                                    $thumbUrl = $accommodationImageUrl($photo);
                                @endphp

                                <img
                                    src="{{ $thumbUrl }}"
                                    class="thumbnail {{ $photoIndex === 0 ? 'active' : '' }}"
                                    data-target="mainImage-{{ $cardIndex }}"
                                    data-src="{{ $thumbUrl }}"
                                    alt="Thumbnail {{ $photoIndex + 1 }}"
                                    onerror="this.onerror=null; this.style.display='none';"
                                >
                            @endforeach
                        </div>
                    @endif

                    <div class="card-body-custom">
                        <div class="card-title-row">
                            <h5>{{ $item->name ?? 'Bhakta Niwas' }}</h5>
                            <span class="type-pill">{{ $typeText }}</span>
                        </div>

                        <div class="offer-box">
                            <div class="offer-title">
                                <i class="fa-solid fa-gift"></i>
                                {{ $language === 'Odia' ? 'ଉପଲବ୍ଧ ସୁବିଧା' : 'Property Offer' }}
                            </div>

                            <div class="offer-list">
                                <span class="offer-item">
                                    <i class="fa-solid fa-utensils"></i>
                                    {{ $foodText }}
                                </span>

                                <span class="offer-item">
                                    <i class="fa-solid fa-snowflake"></i>
                                    {{ $language === 'Odia' ? 'ଏସି ରୁମ' : 'AC Room Available' }}
                                </span>
                            </div>
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
                                    <strong>{{ $language === 'Odia' ? 'ଚେକ୍ ଇନ୍ / ଆଉଟ୍' : 'Check In / Out' }}</strong>
                                    {{ $item->check_in_time ?? 'N/A' }} - {{ $item->check_out_time ?? 'N/A' }}
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
                            @if(!empty($item->google_map_link))
                                <a href="{{ $item->google_map_link }}" target="_blank" rel="noopener noreferrer" class="action-btn btn-map">
                                    <i class="fa-solid fa-location-arrow"></i>
                                    {{ $language === 'Odia' ? 'ଦିଗ ନିର୍ଦ୍ଦେଶ' : 'Directions' }}
                                </a>
                            @else
                                <a href="javascript:void(0)" class="action-btn btn-map">
                                    <i class="fa-solid fa-location-arrow"></i>
                                    {{ $language === 'Odia' ? 'ମ୍ୟାପ ନାହିଁ' : 'No Map' }}
                                </a>
                            @endif

                            @if(!empty($item->contact_no))
                                <a href="tel:{{ preg_replace('/\s+/', '', $item->contact_no) }}" class="action-btn btn-call">
                                    <i class="fa-solid fa-phone"></i>
                                    {{ $language === 'Odia' ? 'କଲ କରନ୍ତୁ' : 'Call to Book' }}
                                </a>
                            @else
                                <a href="javascript:void(0)" class="action-btn btn-call">
                                    <i class="fa-solid fa-phone"></i>
                                    {{ $language === 'Odia' ? 'ନମ୍ବର ନାହିଁ' : 'No Number' }}
                                </a>
                            @endif
                        </div>
                    </div>
                </article>
            @empty
                <div class="empty-box">
                    <i class="fa-solid fa-house-chimney"></i>
                    <h3>{{ $language === 'Odia' ? 'କୌଣସି ଭକ୍ତ ନିବାସ ମିଳିଲା ନାହିଁ' : 'No Bhakta Niwas Found' }}</h3>
                    <p>{{ $language === 'Odia' ? 'ଦୟାକରି ପରେ ପୁଣି ଯାଞ୍ଚ କରନ୍ତୁ।' : 'Please check again later.' }}</p>
                </div>
            @endforelse
        </div>
    </main>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.thumbnail').forEach(function (thumbnail) {
            thumbnail.addEventListener('click', function () {
                const targetId = this.getAttribute('data-target');
                const imageSrc = this.getAttribute('data-src');
                const mainImage = document.getElementById(targetId);

                if (!mainImage || !imageSrc) {
                    return;
                }

                mainImage.classList.remove('fallback-img');
                mainImage.src = imageSrc;

                const thumbnailSection = this.closest('.thumbnail-section');

                if (thumbnailSection) {
                    thumbnailSection.querySelectorAll('.thumbnail').forEach(function (item) {
                        item.classList.remove('active');
                    });
                }

                this.classList.add('active');

                mainImage.scrollIntoView({
                    behavior: 'smooth',
                    block: 'nearest'
                });
            });
        });
    });
</script>

</body>
</html>