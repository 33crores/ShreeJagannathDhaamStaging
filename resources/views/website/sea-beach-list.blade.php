<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Beach</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- FontAwesome + Tailwind -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        :root {
            --primary: #341551;
            --orange: #db4d30;
            --yellow: #ff8a00;
            --light: #fff7ed;
        }

        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(180deg, #fff7ed 0%, #f8f3ff 45%, #ffffff 100%);
            color: #1f2937;
            overflow-x: hidden;
        }

        /* Header */
        .custom-header {
            position: sticky;
            top: 0;
            z-index: 100;
            background: rgba(255, 255, 255, 0.94);
            backdrop-filter: blur(16px);
            box-shadow: 0 10px 30px rgba(52, 21, 81, 0.12);
        }

        .logo-box {
            width: 46px;
            height: 46px;
            border-radius: 16px;
            background: linear-gradient(145deg, var(--primary), var(--orange));
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 10px 25px rgba(52, 21, 81, 0.28);
        }

        .nav-link {
            font-weight: 700;
            color: #4b5563;
            transition: 0.25s;
        }

        .nav-link:hover,
        .nav-link.active {
            color: var(--orange);
        }

        .mobile-menu {
            display: none;
        }

        .mobile-menu.show {
            display: block;
        }

        /* Hero */
        .hero-section {
            position: relative;
            min-height: 430px;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            border-radius: 0 0 38px 38px;
        }

        .hero-section::before {
            content: "";
            position: absolute;
            inset: 0;
            background:
                radial-gradient(circle at top left, rgba(255, 138, 0, 0.42), transparent 35%),
                linear-gradient(135deg, rgba(52, 21, 81, 0.92), rgba(219, 77, 48, 0.72)),
                var(--hero-image);
            background-size: cover;
            background-position: center;
            transform: scale(1.04);
        }

        .hero-content {
            position: relative;
            z-index: 2;
            text-align: center;
            color: white;
            padding: 30px 16px;
        }

        .glass-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 9px 18px;
            border-radius: 999px;
            background: rgba(255, 255, 255, 0.16);
            border: 1px solid rgba(255, 255, 255, 0.25);
            backdrop-filter: blur(10px);
            font-size: 14px;
            margin-bottom: 18px;
        }

        .main-wrapper {
            margin-top: -58px;
            position: relative;
            z-index: 5;
        }

        .intro-card {
            background: rgba(255, 255, 255, 0.97);
            border-radius: 28px;
            box-shadow:
                0 22px 55px rgba(52, 21, 81, 0.16),
                inset 0 1px 0 rgba(255, 255, 255, 0.9);
            border: 1px solid rgba(255, 255, 255, 0.85);
        }

        /* Beach Cards */
        .beach-card {
            background: #ffffff;
            border-radius: 28px;
            overflow: hidden;
            box-shadow:
                0 18px 45px rgba(52, 21, 81, 0.13),
                inset 0 1px 0 rgba(255, 255, 255, 0.9);
            border: 1px solid rgba(219, 77, 48, 0.08);
            transition: 0.3s ease;
        }

        .beach-card:hover {
            transform: translateY(-7px);
            box-shadow: 0 28px 65px rgba(52, 21, 81, 0.18);
        }

        .image-section {
            position: relative;
            height: 250px;
            overflow: hidden;
            background: #f3f4f6;
        }

        .main-display-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            transition: 0.35s ease;
        }

        .beach-card:hover .main-display-image {
            transform: scale(1.06);
        }

        .beach-label {
            position: absolute;
            left: 16px;
            top: 16px;
            background: rgba(52, 21, 81, 0.88);
            color: white;
            padding: 8px 14px;
            border-radius: 999px;
            font-size: 13px;
            font-weight: 800;
            backdrop-filter: blur(8px);
        }

        .thumbnail-section {
            display: flex;
            gap: 10px;
            overflow-x: auto;
            padding: 14px 16px 4px;
            scrollbar-width: none;
        }

        .thumbnail-section::-webkit-scrollbar {
            display: none;
        }

        .thumbnail {
            width: 68px;
            height: 58px;
            min-width: 68px;
            border-radius: 16px;
            object-fit: cover;
            cursor: pointer;
            border: 3px solid transparent;
            box-shadow: 0 8px 18px rgba(52, 21, 81, 0.12);
            transition: 0.25s ease;
        }

        .thumbnail:hover,
        .thumbnail.active {
            border-color: var(--orange);
            transform: translateY(-3px);
        }

        .info-icon {
            width: 42px;
            height: 42px;
            min-width: 42px;
            border-radius: 15px;
            background: linear-gradient(145deg, #fff7ed, #ffffff);
            color: var(--orange);
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow:
                7px 7px 15px rgba(52, 21, 81, 0.10),
                -5px -5px 14px rgba(255, 255, 255, 0.95);
        }

        .direction-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            background: linear-gradient(135deg, var(--primary), var(--orange));
            color: #ffffff;
            padding: 12px 18px;
            border-radius: 999px;
            font-weight: 800;
            text-decoration: none;
            box-shadow: 0 14px 28px rgba(219, 77, 48, 0.28);
            transition: 0.25s;
        }

        .direction-btn:hover {
            color: white;
            transform: translateY(-3px);
            box-shadow: 0 18px 36px rgba(219, 77, 48, 0.38);
        }

        .empty-card {
            background: white;
            border-radius: 28px;
            box-shadow: 0 18px 45px rgba(52, 21, 81, 0.12);
        }

        @media (max-width: 768px) {
            .hero-section {
                min-height: 370px;
                border-radius: 0 0 26px 26px;
            }

            .main-wrapper {
                margin-top: -38px;
            }

            .image-section {
                height: 220px;
            }

            .beach-card,
            .intro-card,
            .empty-card {
                border-radius: 22px;
            }
        }

        @media (max-width: 420px) {
            .hero-section {
                min-height: 340px;
            }

            .image-section {
                height: 205px;
            }

            .thumbnail {
                width: 62px;
                height: 52px;
                min-width: 62px;
                border-radius: 14px;
            }
        }
    </style>
</head>

<body>

    @php
        $language = session('app_language', 'English');

        $firstBeachPhoto = null;

        if (isset($seabeach[0])) {
            $photos = json_decode($seabeach[0]->photo ?? '[]', true);
            $photos = is_array($photos) ? $photos : [];
            $firstBeachPhoto = $photos[0] ?? null;
        }

        $heroImage = $firstBeachPhoto ? asset($firstBeachPhoto) : asset('website/bhkt.jpg');
    @endphp

    <!-- Header -->
    <header class="custom-header">
        <div class="max-w-7xl mx-auto px-4 md:px-8">
            <div class="flex items-center justify-between py-4">

                <a href="{{ url('/') }}" class="flex items-center gap-3 no-underline">
                    <div class="logo-box">
                        <i class="fa-solid fa-om text-xl"></i>
                    </div>

                    <div>
                        <h2 class="text-lg md:text-xl font-black text-[#341551] leading-tight m-0">
                            {{ $language === 'Odia' ? 'ଶ୍ରୀ ଜଗନ୍ନାଥ ଧାମ' : 'Shree Jagannath Dham' }}
                        </h2>
                        <p class="text-xs text-gray-500 m-0">
                            {{ $language === 'Odia' ? 'ପୁରୀ ବେଳାଭୂମି ଗାଇଡ୍' : 'Puri Beach Guide' }}
                        </p>
                    </div>
                </a>

                <nav class="hidden md:flex items-center gap-8">
                    <a href="{{ url('/') }}" class="nav-link no-underline">
                        {{ $language === 'Odia' ? 'ହୋମ୍' : 'Home' }}
                    </a>

                    <a href="{{ url('/services') }}" class="nav-link no-underline">
                        {{ $language === 'Odia' ? 'ସେବା' : 'Services' }}
                    </a>

                    <a href="#" class="nav-link active no-underline">
                        {{ $language === 'Odia' ? 'ବେଳାଭୂମି' : 'Beaches' }}
                    </a>

                    <a href="#beachList" class="px-5 py-3 rounded-full bg-[#341551] text-white font-bold shadow-lg no-underline">
                        <i class="fa-solid fa-water mr-2"></i>
                        {{ $language === 'Odia' ? 'ବେଳାଭୂମି ଦେଖନ୍ତୁ' : 'View Beaches' }}
                    </a>
                </nav>

                <button onclick="toggleMobileMenu()" class="md:hidden w-11 h-11 rounded-xl bg-[#341551] text-white border-0">
                    <i class="fa-solid fa-bars"></i>
                </button>
            </div>

            <div id="mobileMenu" class="mobile-menu md:hidden pb-4">
                <div class="bg-white rounded-2xl p-4 shadow-lg space-y-3">
                    <a href="{{ url('/') }}" class="block font-semibold text-gray-700 no-underline">
                        <i class="fa-solid fa-house mr-2 text-[#db4d30]"></i>
                        {{ $language === 'Odia' ? 'ହୋମ୍' : 'Home' }}
                    </a>

                    <a href="{{ url('/services') }}" class="block font-semibold text-gray-700 no-underline">
                        <i class="fa-solid fa-table-cells-large mr-2 text-[#db4d30]"></i>
                        {{ $language === 'Odia' ? 'ସେବା' : 'Services' }}
                    </a>

                    <a href="#" class="block font-semibold text-[#db4d30] no-underline">
                        <i class="fa-solid fa-water mr-2"></i>
                        {{ $language === 'Odia' ? 'ବେଳାଭୂମି' : 'Beaches' }}
                    </a>

                    <a href="#beachList" class="block text-center px-5 py-3 rounded-xl bg-[#341551] text-white font-bold no-underline">
                        {{ $language === 'Odia' ? 'ବେଳାଭୂମି ଦେଖନ୍ତୁ' : 'View Beaches' }}
                    </a>
                </div>
            </div>
        </div>
    </header>

    <!-- Hero -->
    <section class="hero-section" style="--hero-image: url('{{ $heroImage }}');">
        <div class="hero-content max-w-5xl mx-auto">
            <div class="glass-badge">
                <i class="fa-solid fa-umbrella-beach"></i>
                {{ $language === 'Odia' ? 'ପୁରୀ ସମୁଦ୍ର କୂଳ' : 'Puri Sea Beach' }}
            </div>

            <h1 class="text-4xl sm:text-5xl md:text-6xl font-black drop-shadow-lg leading-tight">
                {{ $language === 'Odia' ? 'ସମୁଦ୍ର କୂଳ' : 'Beach' }}
            </h1>

            <p class="mt-5 text-base sm:text-lg md:text-xl text-orange-50 max-w-3xl mx-auto leading-relaxed">
                {{ $language === 'Odia'
                    ? 'ପୁରୀ ସହରର କିଛି ଆକର୍ଷଣୀୟ ଓ ସୁନ୍ଦର ସମୁଦ୍ର କୂଳ ଦେଖନ୍ତୁ।'
                    : 'Explore attractive and clean beaches in the holy city of Puri with directions and facilities.' }}
            </p>
        </div>
    </section>

    <!-- Content -->
    <main id="beachList" class="main-wrapper px-4 sm:px-6 lg:px-8 pb-16">
        <div class="max-w-7xl mx-auto">

            <!-- Intro -->
            <section class="intro-card p-5 sm:p-7 md:p-8 mb-8">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-5 items-center">
                    <div class="md:col-span-2">
                        <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-orange-50 text-[#db4d30] font-bold text-sm mb-3">
                            <i class="fa-solid fa-circle-info"></i>
                            {{ $language === 'Odia' ? 'ବେଳାଭୂମି ସୂଚନା' : 'Beach Information' }}
                        </span>

                        <h2 class="text-2xl md:text-4xl font-black text-[#341551]">
                            {{ $language === 'Odia' ? 'ପୁରୀର ଆକର୍ଷଣୀୟ ବେଳାଭୂମି' : 'Attractive Beaches in Puri' }}
                        </h2>

                        <p class="text-gray-500 mt-3 leading-relaxed">
                            {{ $language === 'Odia'
                                ? 'ବେଳାଭୂମିର ଫଟୋ, ସୁବିଧା, ଠିକଣା ଏବଂ ଦିଗନିର୍ଦ୍ଦେଶ ଏଠାରେ ଦେଖନ୍ତୁ।'
                                : 'View beach photos, available facilities, address details and Google Map directions.' }}
                        </p>
                    </div>

                    <div class="grid grid-cols-2 gap-3">
                        <div class="rounded-2xl bg-orange-50 p-4 text-center">
                            <i class="fa-solid fa-umbrella-beach text-[#db4d30] text-3xl"></i>
                            <p class="text-2xl font-black text-[#341551] mt-2">{{ count($seabeach ?? []) }}</p>
                            <p class="text-xs text-gray-500 font-bold">
                                {{ $language === 'Odia' ? 'ବେଳାଭୂମି' : 'Beaches' }}
                            </p>
                        </div>

                        <div class="rounded-2xl bg-purple-50 p-4 text-center">
                            <i class="fa-solid fa-map-location-dot text-[#341551] text-3xl"></i>
                            <p class="text-2xl font-black text-[#db4d30] mt-2">Map</p>
                            <p class="text-xs text-gray-500 font-bold">
                                {{ $language === 'Odia' ? 'ଦିଗନିର୍ଦ୍ଦେଶ' : 'Directions' }}
                            </p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Beach Grid -->
            <section class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-7">
                @forelse ($seabeach as $item)
                    @php
                        $photoArray = json_decode($item->photo ?? '[]', true);
                        $photoArray = is_array($photoArray) ? $photoArray : [];
                        $firstPhoto = $photoArray[0] ?? null;
                        $mainPhoto = $firstPhoto ? asset($firstPhoto) : asset('website/bhkt.jpg');
                    @endphp

                    <div class="beach-card">
                        <!-- Main Image -->
                        <div class="image-section">
                            <img id="mainImage-{{ $loop->index }}" class="main-display-image"
                                src="{{ $mainPhoto }}" alt="{{ $item->service_name ?? 'Beach Image' }}">

                            <div class="beach-label">
                                <i class="fa-solid fa-location-dot mr-1"></i>
                                {{ $language === 'Odia' ? 'ପୁରୀ' : 'Puri' }}
                            </div>
                        </div>

                        <!-- Thumbnails -->
                        @if (count($photoArray) > 0)
                            <div class="thumbnail-section">
                                @foreach ($photoArray as $index => $photo)
                                    <img src="{{ asset($photo) }}"
                                        class="thumbnail {{ $index === 0 ? 'active' : '' }}"
                                        onclick="updateMainImage('{{ asset($photo) }}', {{ $loop->parent->index }}, this)"
                                        alt="Thumbnail {{ $index + 1 }}">
                                @endforeach
                            </div>
                        @endif

                        <!-- Card Body -->
                        <div class="p-5 sm:p-6">
                            <h3 class="text-2xl font-black text-[#341551] leading-tight">
                                {{ $item->service_name }}
                            </h3>

                            <div class="mt-5 space-y-4">

                                <!-- Facility -->
                                <div class="flex items-start gap-4">
                                    <div class="info-icon">
                                        <i class="fa-solid fa-circle-check"></i>
                                    </div>

                                    <div>
                                        <p class="text-sm uppercase tracking-wide text-gray-400 font-black mb-1">
                                            {{ $language === 'Odia' ? 'ସୁବିଧା' : 'Facilities' }}
                                        </p>
                                        <p class="text-gray-600 font-semibold leading-relaxed">
                                            {{ $language === 'Odia'
                                                ? 'ପାର୍କିଂ / ଶୌଚାଳୟ / ବସିବା ସୁବିଧା'
                                                : 'Parking / Toilet / Sitting Chair' }}
                                        </p>
                                    </div>
                                </div>

                                <!-- Address -->
                                <div class="flex items-start gap-4">
                                    <div class="info-icon">
                                        <i class="fa-solid fa-map-pin"></i>
                                    </div>

                                    <div>
                                        <p class="text-sm uppercase tracking-wide text-gray-400 font-black mb-1">
                                            {{ $language === 'Odia' ? 'ଠିକଣା' : 'Address' }}
                                        </p>
                                        <p class="text-gray-600 font-semibold leading-relaxed">
                                            {{ $item->landmark }}
                                            {{ $item->district }}
                                        </p>
                                    </div>
                                </div>

                            </div>

                            @if ($item->google_map_link)
                                <div class="mt-6">
                                    <a class="direction-btn w-full sm:w-auto"
                                        href="{{ $item->google_map_link }}" target="_blank" rel="noopener noreferrer">
                                        <i class="fa-solid fa-diamond-turn-right"></i>
                                        {{ $language === 'Odia' ? 'ଦିଗ ନିର୍ଦ୍ଦେଶ' : 'Directions' }}
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>

                @empty
                    <div class="empty-card col-span-full p-8 text-center">
                        <div class="w-20 h-20 rounded-3xl bg-orange-50 text-[#db4d30] flex items-center justify-center mx-auto text-4xl">
                            <i class="fa-solid fa-umbrella-beach"></i>
                        </div>

                        <h3 class="text-2xl font-black text-[#341551] mt-5">
                            {{ $language === 'Odia' ? 'କୌଣସି ବେଳାଭୂମି ମିଳିଲା ନାହିଁ' : 'No beach data found' }}
                        </h3>

                        <p class="text-gray-500 mt-2">
                            {{ $language === 'Odia' ? 'ବର୍ତ୍ତମାନ କୌଣସି ବେଳାଭୂମି ତଥ୍ୟ ଉପଲବ୍ଧ ନାହିଁ।' : 'Currently no beach information is available.' }}
                        </p>
                    </div>
                @endforelse
            </section>

        </div>
    </main>

    <script>
        function toggleMobileMenu() {
            const menu = document.getElementById('mobileMenu');
            menu.classList.toggle('show');
        }

        function updateMainImage(src, index, element) {
            const mainImg = document.getElementById('mainImage-' + index);

            if (mainImg) {
                mainImg.src = src;
            }

            const parent = element.closest('.beach-card');
            const thumbnails = parent.querySelectorAll('.thumbnail');

            thumbnails.forEach(function (thumb) {
                thumb.classList.remove('active');
            });

            element.classList.add('active');
        }
    </script>

</body>

</html>