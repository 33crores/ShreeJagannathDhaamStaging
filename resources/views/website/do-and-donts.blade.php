<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Do's and Don'ts</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- FontAwesome + Tailwind -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="{{ asset('front-assets/frontend/css/dham-header.css') }}">
    <link rel="stylesheet" href="{{ asset('front-assets/frontend/css/footer.css') }}">

    <style>
        :root {
            --primary: #341551;
            --orange: #db4d30;
            --light-orange: #fff7ed;
            --green: #16a34a;
            --red: #dc2626;
        }

        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(180deg, #fff7ed 0%, #f8f3ff 100%);
            color: #1f2937;
            overflow-x: hidden;
        }

        /* Header */
        .custom-header {
            position: sticky;
            top: 0;
            z-index: 50;
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
            min-height: 420px;
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
                linear-gradient(135deg, rgba(52, 21, 81, 0.95), rgba(219, 77, 48, 0.82)),
                url("{{ asset('website/fest.jpg') }}");
            background-size: cover;
            background-position: center;
            transform: scale(1.04);
        }

        .hero-content {
            position: relative;
            z-index: 2;
            text-align: center;
            color: white;
            padding: 28px 16px;
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

        .rule-card {
            position: relative;
            background: white;
            border-radius: 28px;
            overflow: hidden;
            box-shadow: 0 18px 45px rgba(52, 21, 81, 0.12);
            transition: 0.28s ease;
            border: 1px solid rgba(255, 255, 255, 0.9);
        }

        .rule-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 28px 65px rgba(52, 21, 81, 0.18);
        }

        .rule-card.do-card {
            border-top: 6px solid var(--green);
        }

        .rule-card.dont-card {
            border-top: 6px solid var(--red);
        }

        .title-icon {
            width: 62px;
            height: 62px;
            border-radius: 22px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow:
                8px 8px 18px rgba(52, 21, 81, 0.10),
                -6px -6px 16px rgba(255, 255, 255, 0.95);
        }

        .do-icon {
            background: linear-gradient(145deg, #dcfce7, #ffffff);
            color: var(--green);
        }

        .dont-icon {
            background: linear-gradient(145deg, #fee2e2, #ffffff);
            color: var(--red);
        }

        .rule-list li {
            list-style: none;
            display: flex;
            gap: 12px;
            align-items: flex-start;
            padding: 13px 0;
            border-bottom: 1px dashed #e5e7eb;
            line-height: 1.6;
            color: #374151;
        }

        .rule-list li:last-child {
            border-bottom: none;
        }

        .rule-list .check {
            color: var(--green);
            margin-top: 5px;
        }

        .rule-list .ban {
            color: var(--red);
            margin-top: 5px;
        }

        .quick-card {
            background: linear-gradient(135deg, #341551, #db4d30);
            border-radius: 28px;
            color: white;
            box-shadow: 0 22px 50px rgba(52, 21, 81, 0.22);
        }

        .quick-chip {
            background: rgba(255, 255, 255, 0.16);
            border: 1px solid rgba(255, 255, 255, 0.22);
            border-radius: 20px;
            padding: 16px;
        }

        @media (max-width: 640px) {
            .hero-section {
                min-height: 360px;
                border-radius: 0 0 26px 26px;
            }

            .main-wrapper {
                margin-top: -38px;
            }

            .rule-card,
            .intro-card,
            .quick-card {
                border-radius: 22px;
            }

            .title-icon {
                width: 54px;
                height: 54px;
                border-radius: 18px;
            }
        }
    </style>
</head>

<body>
    @php
        $language = session('app_language', 'English');

        $dos = $language === 'Odia'
            ? [
                'ଶ୍ରୀମନ୍ଦିରରେ ଶାନ୍ତି ଓ ସୁବ୍ୟବସ୍ଥିତ ଦର୍ଶନ ପାଇଁ ଶୃଙ୍ଖଳାବଦ୍ଧ ଭାବେ ଧାଡ଼ିରେ ଆସନ୍ତୁ।',
                'ଶ୍ରୀଜଗନ୍ନାଥ ମନ୍ଦିରରେ ପ୍ରାଚୀନ ରୀତି ଓ ପ୍ରଥାକୁ ସମ୍ମାନ ଦିଅନ୍ତୁ ଏବଂ ସହ-ତୀର୍ଥଯାତ୍ରୀ ଭକ୍ତ ମଧ୍ୟରେ ଧାର୍ମିକ ଭାବନାକୁ ପ୍ରୋତ୍ସାହିତ କରନ୍ତୁ।',
                'ମନ୍ଦିର ଭିତରେ ପୂର୍ଣ୍ଣ ନିରବତା ପାଳନ କରନ୍ତୁ।',
                'ମନ୍ଦିର ପରିସରରେ ଥିବା ହୁଣ୍ଡି ଓ ଶାଖା କାର୍ଯ୍ୟାଳୟରେ ଆପଣଙ୍କର ଦାନ ଅର୍ପଣ କରନ୍ତୁ।',
                'ଶ୍ରୀଜଗନ୍ନାଥ ମନ୍ଦିର ପରିସରକୁ ପରିଷ୍କାର ରଖନ୍ତୁ।',
                'ସ୍ନାନ ଓ ଶୌଚ କରି ସଫା ପୋଷାକ ପିନ୍ଧି ମନ୍ଦିରରେ ପ୍ରବେଶ କରନ୍ତୁ।',
                'ପକେଟମାର ଓ ମାଙ୍କଡ଼ମାନଙ୍କଠାରୁ ସତର୍କ ରୁହନ୍ତୁ।',
            ]
            : [
                'Follow the queue system for hassle-free darshan of the Deities.',
                'Respect ancient customs and traditions while at Shree Jagannatha Temple and promote religious sentiments among co-pilgrims.',
                'Observe absolute silence inside the temple.',
                'Deposit your offerings in the Hundi and Branch Office inside the temple premises.',
                'Keep the premises of Shree Jagannatha Temple clean.',
                'Bath and wear clean clothes before entering the shrine.',
                'Beware of pickpockets and monkeys.',
            ];

        $donts = $language === 'Odia'
            ? [
                'ଦେବତାଙ୍କ ଦର୍ଶନ ସମୟରେ ମଦ ବା ଅନ୍ୟ କୌଣସି ମାଦକ ଦ୍ରବ୍ୟ ସେବନ କରିବା ନିଷିଦ୍ଧ।',
                'ମନ୍ଦିର ପରିସରକୁ ମାଂସାହାର କରି ଯିବା ନିଷିଦ୍ଧ।',
                'ମନ୍ଦିର ପରିସରକୁ ରନ୍ଧା ଖାଦ୍ୟ ନେଇଯିବା ନିଷିଦ୍ଧ।',
                'ମନ୍ଦିର ପରିସରରେ ଭିକ୍ଷାବୃତ୍ତି କରିବା ଅନୁଚିତ।',
                'ମନ୍ଦିର ପରିସରରେ ଛେପ ପକାଇବା କିମ୍ବା ଅସଭ୍ୟ ଆଚରଣ କରିବା ନିଷିଦ୍ଧ।',
                'ଜଳକୁ ନଷ୍ଟ କରନ୍ତୁ ନାହିଁ।',
                'ମନ୍ଦିର ପରିସରରେ ଛେପ ପକାଇବା, ପରିଶ୍ରା କରିବା ବା ଶୌଚ କରିବା ନିଷିଦ୍ଧ ଅଟେ।',
                'ମନ୍ଦିର ପରିସର ଭିତରେ ଏବଂ ଚାରିପାଖରେ ଜୋତା ଓ ଚମଡା ଜିନିଷ ବ୍ୟବହାର ନିଷିଦ୍ଧ ଅଟେ।',
                'ମନ୍ଦିର ପରିସରକୁ ଛତା, ମୋବାଇଲ୍ ଫୋନ୍, ଇଲେକ୍ଟ୍ରୋନିକ୍ ଉପକରଣ, ଚମଡା ଜିନିଷ ଇତ୍ୟାଦି ସାଙ୍ଗରେ ନେଇଯିବାକୁ ନିଷିଦ୍ଧ ଅଟେ।',
                'ମନ୍ଦିର ପରିସର ମଧ୍ୟରେ ଟୋପି ପିନ୍ଧନ୍ତୁ ନାହିଁ।',
            ]
            : [
                'Do not consume liquor or other intoxicants during Darshan of the Deities.',
                'Do not eat non-vegetarian food.',
                'Do not carry cooked food.',
                'Do not encourage beggary.',
                'Do not spit or commit nuisance.',
                'Do not waste water.',
                'Do not spit, urinate or defecate in the temple premises.',
                'Do not wear footwear and leather items in and around the temple premises.',
                'Do not carry umbrellas, mobile phones, electronic gadgets, leather items, etc.',
                'Do not wear caps inside the temple.',
            ];
    @endphp

    <!-- Header -->
    <header class="custom-header">
        <div class="max-w-7xl mx-auto px-4 md:px-8">
            <div class="flex items-center justify-between py-4">

                <a href="{{ url('/') }}" class="flex items-center gap-3">
                    <div class="logo-box">
                        <i class="fa-solid fa-om text-xl"></i>
                    </div>

                    <div>
                        <h2 class="text-lg md:text-xl font-black text-[#341551] leading-tight">
                            {{ $language === 'Odia' ? 'ଶ୍ରୀ ଜଗନ୍ନାଥ ଧାମ' : 'Shree Jagannath Dham' }}
                        </h2>
                        <p class="text-xs text-gray-500">
                            {{ $language === 'Odia' ? 'ଭକ୍ତ ନିୟମାବଳୀ' : 'Devotee Guidelines' }}
                        </p>
                    </div>
                </a>

                <nav class="hidden md:flex items-center gap-8">
                    <a href="{{ url('/') }}" class="nav-link">
                        {{ $language === 'Odia' ? 'ହୋମ୍' : 'Home' }}
                    </a>

                    <a href="{{ url('/services') }}" class="nav-link">
                        {{ $language === 'Odia' ? 'ସେବା' : 'Services' }}
                    </a>

                    <a href="{{ url('/do-and-donts') }}" class="nav-link active">
                        {{ $language === 'Odia' ? 'ନିୟମାବଳୀ' : 'Guidelines' }}
                    </a>

                    <a href="#rules" class="px-5 py-3 rounded-full bg-[#341551] text-white font-bold shadow-lg">
                        <i class="fa-solid fa-list-check mr-2"></i>
                        {{ $language === 'Odia' ? 'ନିୟମ ଦେଖନ୍ତୁ' : 'View Rules' }}
                    </a>
                </nav>

                <button onclick="toggleMobileMenu()" class="md:hidden w-11 h-11 rounded-xl bg-[#341551] text-white">
                    <i class="fa-solid fa-bars"></i>
                </button>
            </div>

            <div id="mobileMenu" class="mobile-menu md:hidden pb-4">
                <div class="bg-white rounded-2xl p-4 shadow-lg space-y-3">
                    <a href="{{ url('/') }}" class="block font-semibold text-gray-700">
                        <i class="fa-solid fa-house mr-2 text-[#db4d30]"></i>
                        {{ $language === 'Odia' ? 'ହୋମ୍' : 'Home' }}
                    </a>

                    <a href="{{ url('/services') }}" class="block font-semibold text-gray-700">
                        <i class="fa-solid fa-table-cells-large mr-2 text-[#db4d30]"></i>
                        {{ $language === 'Odia' ? 'ସେବା' : 'Services' }}
                    </a>

                    <a href="{{ url('/do-and-donts') }}" class="block font-semibold text-[#db4d30]">
                        <i class="fa-solid fa-list-check mr-2"></i>
                        {{ $language === 'Odia' ? 'ନିୟମାବଳୀ' : 'Guidelines' }}
                    </a>

                    <a href="#rules" class="block text-center px-5 py-3 rounded-xl bg-[#341551] text-white font-bold">
                        {{ $language === 'Odia' ? 'ନିୟମ ଦେଖନ୍ତୁ' : 'View Rules' }}
                    </a>
                </div>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="hero-content max-w-5xl mx-auto">
            <div class="glass-badge">
                <i class="fa-solid fa-shield-heart"></i>
                {{ $language === 'Odia' ? 'ଶ୍ରୀମନ୍ଦିର ଭକ୍ତ ନିୟମାବଳୀ' : 'Temple Devotee Guidelines' }}
            </div>

            <h1 class="text-4xl sm:text-5xl md:text-6xl font-black drop-shadow-lg leading-tight">
                {{ $language === 'Odia' ? 'ଶ୍ରୀଜଗନ୍ନାଥ ଧାମ ପୁରୀରେ କରିବା ଓ ନକରିବା କାମ' : "Do's & Don'ts at Jagannatha Temple Puri" }}
            </h1>

            <p class="mt-5 text-base sm:text-lg md:text-xl text-orange-50 max-w-3xl mx-auto leading-relaxed">
                {{ $language === 'Odia'
                    ? 'ଶ୍ରୀ ଜଗନ୍ନାଥ ଧାମର ପବିତ୍ରତା ଓ ପାରମ୍ପରିକତା ରକ୍ଷା ପାଇଁ ଏହି ନିୟମଗୁଡିକୁ ଅନୁସରଣ କରନ୍ତୁ।'
                    : 'Follow these important guidelines to preserve the sanctity, discipline and traditions of Shree Jagannatha Dham.' }}
            </p>
        </div>
    </section>

    <!-- Content -->
    <main id="rules" class="main-wrapper px-4 sm:px-6 lg:px-8 pb-16">
        <div class="max-w-7xl mx-auto">

            <!-- Intro Card -->
            <section class="intro-card p-5 sm:p-7 md:p-8 mb-8">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-5 items-center">
                    <div class="md:col-span-2">
                        <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-orange-50 text-[#db4d30] font-bold text-sm mb-3">
                            <i class="fa-solid fa-circle-info"></i>
                            {{ $language === 'Odia' ? 'ଗୁରୁତ୍ୱପୂର୍ଣ୍ଣ ସୂଚନା' : 'Important Information' }}
                        </span>

                        <h2 class="text-2xl md:text-4xl font-black text-[#341551]">
                            {{ $language === 'Odia' ? 'ମନ୍ଦିର ପରିସରରେ ଶୃଙ୍ଖଳା ରକ୍ଷା କରନ୍ତୁ' : 'Maintain Discipline Inside Temple Premises' }}
                        </h2>

                        <p class="text-gray-500 mt-3 leading-relaxed">
                            {{ $language === 'Odia'
                                ? 'ସମସ୍ତ ଭକ୍ତଙ୍କ ସୁବିଧା, ସୁରକ୍ଷା ଓ ଶ୍ରୀମନ୍ଦିରର ପବିତ୍ରତା ପାଇଁ ଏହି ନିୟମାବଳୀ ଅନୁସରଣ କରିବା ଆବଶ୍ୟକ।'
                                : 'These rules help ensure smooth darshan, devotee safety and respect for the sacred traditions of the temple.' }}
                        </p>
                    </div>

                    <div class="grid grid-cols-2 gap-3">
                        <div class="rounded-2xl bg-green-50 p-4 text-center">
                            <i class="fa-solid fa-check-circle text-green-600 text-3xl"></i>
                            <p class="text-2xl font-black text-green-700 mt-2">{{ count($dos) }}</p>
                            <p class="text-xs text-green-700 font-bold">
                                {{ $language === 'Odia' ? 'କରନ୍ତୁ' : 'Do’s' }}
                            </p>
                        </div>

                        <div class="rounded-2xl bg-red-50 p-4 text-center">
                            <i class="fa-solid fa-ban text-red-600 text-3xl"></i>
                            <p class="text-2xl font-black text-red-700 mt-2">{{ count($donts) }}</p>
                            <p class="text-xs text-red-700 font-bold">
                                {{ $language === 'Odia' ? 'କରନ୍ତୁ ନାହିଁ' : 'Don’ts' }}
                            </p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Do and Don't Cards -->
            <section class="grid grid-cols-1 lg:grid-cols-2 gap-7">

                <!-- DO's -->
                <div class="rule-card do-card p-5 sm:p-7">
                    <div class="flex items-center gap-4 mb-5">
                        <div class="title-icon do-icon">
                            <i class="fas fa-check-circle text-3xl"></i>
                        </div>

                        <div>
                            <h3 class="text-2xl md:text-3xl font-black text-green-700">
                                {{ $language === 'Odia' ? 'କରନ୍ତୁ' : 'DO’S' }}
                            </h3>
                            <p class="text-sm text-gray-500">
                                {{ $language === 'Odia' ? 'ମନ୍ଦିରରେ ପାଳନ କରିବାକୁ ଥିବା କାମ' : 'Things devotees should follow' }}
                            </p>
                        </div>
                    </div>

                    <ul class="rule-list">
                        @foreach ($dos as $do)
                            <li>
                                <i class="fa-solid fa-circle-check check"></i>
                                <span>{{ $do }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <!-- DON'Ts -->
                <div class="rule-card dont-card p-5 sm:p-7">
                    <div class="flex items-center gap-4 mb-5">
                        <div class="title-icon dont-icon">
                            <i class="fas fa-ban text-3xl"></i>
                        </div>

                        <div>
                            <h3 class="text-2xl md:text-3xl font-black text-red-700">
                                {{ $language === 'Odia' ? 'କରନ୍ତୁ ନାହିଁ' : 'DON’TS' }}
                            </h3>
                            <p class="text-sm text-gray-500">
                                {{ $language === 'Odia' ? 'ମନ୍ଦିରରେ ନକରିବାକୁ ଥିବା କାମ' : 'Things devotees must avoid' }}
                            </p>
                        </div>
                    </div>

                    <ul class="rule-list">
                        @foreach ($donts as $dont)
                            <li>
                                <i class="fa-solid fa-circle-xmark ban"></i>
                                <span>{{ $dont }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>

            </section>

            <!-- Bottom Notice -->
            <section class="quick-card mt-8 p-6 md:p-8">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 items-center">
                    <div>
                        <h3 class="text-2xl md:text-3xl font-black">
                            {{ $language === 'Odia' ? 'ଭକ୍ତଙ୍କ ପାଇଁ ସୂଚନା' : 'Message for Devotees' }}
                        </h3>
                        <p class="text-orange-100 mt-3">
                            {{ $language === 'Odia'
                                ? 'ନିୟମ ମାନନ୍ତୁ, ଶାନ୍ତିପୂର୍ଣ୍ଣ ଦର୍ଶନ କରନ୍ତୁ।'
                                : 'Follow the guidelines and experience peaceful darshan.' }}
                        </p>
                    </div>

                    <div class="lg:col-span-2 grid grid-cols-1 sm:grid-cols-3 gap-4">
                        <div class="quick-chip">
                            <i class="fa-solid fa-people-line text-2xl text-orange-200"></i>
                            <p class="font-bold mt-3">
                                {{ $language === 'Odia' ? 'ଧାଡ଼ି ମାନନ୍ତୁ' : 'Follow Queue' }}
                            </p>
                        </div>

                        <div class="quick-chip">
                            <i class="fa-solid fa-hands-praying text-2xl text-orange-200"></i>
                            <p class="font-bold mt-3">
                                {{ $language === 'Odia' ? 'ନିରବତା ରଖନ୍ତୁ' : 'Keep Silence' }}
                            </p>
                        </div>

                        <div class="quick-chip">
                            <i class="fa-solid fa-broom text-2xl text-orange-200"></i>
                            <p class="font-bold mt-3">
                                {{ $language === 'Odia' ? 'ପରିଷ୍କାର ରଖନ୍ତୁ' : 'Keep Clean' }}
                            </p>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </main>

    <script>
        function toggleMobileMenu() {
            document.getElementById('mobileMenu').classList.toggle('show');
        }
    </script>

</body>

</html>