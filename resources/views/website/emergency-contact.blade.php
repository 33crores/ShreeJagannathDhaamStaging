<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>{{ session('app_language', 'English') === 'Odia' ? 'ଜରୁରୀକାଳୀନ ଯୋଗାଯୋଗ' : 'Emergency Contact' }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- FontAwesome + Tailwind -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        :root {
            --primary: #341551;
            --secondary: #db4d30;
            --orange: #ff8a00;
            --light-bg: #fff7f1;
            --dark-text: #1f2937;
        }

        * {
            box-sizing: border-box;
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(180deg, #fff7f1 0%, #f8f4ff 100%);
            color: var(--dark-text);
            overflow-x: hidden;
        }

        /* Clean Header - No Hamburger */
        .clean-header {
            position: sticky;
            top: 0;
            z-index: 50;
            background: #ffffff;
            box-shadow: 0 8px 24px rgba(52, 21, 81, 0.10);
            border-bottom: 1px solid rgba(219, 77, 48, 0.08);
        }

        .clean-header-inner {
            max-width: 1280px;
            margin: 0 auto;
            padding: 14px 18px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
        }

        .clean-brand {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
            min-width: 0;
        }

        .clean-logo-box {
            width: 46px;
            height: 46px;
            min-width: 46px;
            border-radius: 15px;
            background: linear-gradient(135deg, var(--primary), var(--secondary), var(--orange));
            color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 10px 22px rgba(52, 21, 81, 0.25);
        }

        .clean-brand-title {
            margin: 0;
            color: var(--primary);
            font-size: 20px;
            line-height: 1.15;
            font-weight: 900;
        }

        .clean-brand-subtitle {
            margin: 3px 0 0;
            color: #6b7280;
            font-size: 12px;
            line-height: 1.2;
            font-weight: 600;
        }

        .clean-header-actions {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .clean-home-btn,
        .clean-call-btn {
            min-height: 40px;
            padding: 10px 15px;
            border-radius: 999px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            font-size: 14px;
            font-weight: 800;
            transition: 0.25s ease;
            white-space: nowrap;
        }

        .clean-home-btn {
            background: #fff7f1;
            color: var(--primary);
        }

        .clean-call-btn {
            background: linear-gradient(135deg, var(--primary), var(--secondary), var(--orange));
            color: #ffffff;
            box-shadow: 0 10px 20px rgba(219, 77, 48, 0.24);
        }

        .clean-home-btn:hover,
        .clean-call-btn:hover {
            transform: translateY(-2px);
            text-decoration: none;
        }

        /* Hero */
        .hero {
            position: relative;
            min-height: 360px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            overflow: hidden;
            border-radius: 0 0 38px 38px;
        }

        .hero-bg {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            transform: scale(1.04);
        }

        .hero-overlay {
            position: absolute;
            inset: 0;
            background:
                radial-gradient(circle at top left, rgba(255, 138, 0, 0.42), transparent 35%),
                linear-gradient(135deg, rgba(52, 21, 81, 0.94), rgba(219, 77, 48, 0.82));
        }

        .hero-content {
            position: relative;
            z-index: 2;
            padding: 40px 18px;
            max-width: 850px;
            color: white;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 9px 18px;
            border-radius: 999px;
            background: rgba(255, 255, 255, 0.16);
            border: 1px solid rgba(255, 255, 255, 0.24);
            backdrop-filter: blur(8px);
            font-size: 14px;
            margin-bottom: 18px;
        }

        .hero-content h1 {
            font-size: clamp(2rem, 5vw, 4.5rem);
            font-weight: 900;
            line-height: 1.05;
            text-shadow: 0 8px 28px rgba(0, 0, 0, 0.35);
            margin: 0;
        }

        .hero-content p {
            margin-top: 18px;
            font-size: clamp(1rem, 2vw, 1.3rem);
            color: #fff7ed;
        }

        /* Cards */
        .emergency-section {
            margin-top: -54px;
            position: relative;
            z-index: 5;
        }

        .helpline-card {
            position: relative;
            border-radius: 24px;
            background: rgba(255, 255, 255, 0.96);
            box-shadow:
                0 18px 40px rgba(52, 21, 81, 0.13),
                inset 0 1px 0 rgba(255, 255, 255, 0.8);
            padding: 22px;
            overflow: hidden;
            transform-style: preserve-3d;
            transition: 0.3s ease;
            border: 1px solid rgba(255, 255, 255, 0.7);
        }

        .helpline-card::before {
            content: "";
            position: absolute;
            top: -45px;
            right: -45px;
            width: 120px;
            height: 120px;
            background: linear-gradient(145deg, rgba(255, 138, 0, 0.18), rgba(219, 77, 48, 0.12));
            border-radius: 50%;
        }

        .helpline-card:hover {
            transform: translateY(-8px) rotateX(3deg);
            box-shadow: 0 28px 60px rgba(52, 21, 81, 0.2);
        }

        .icon-box {
            width: 62px;
            height: 62px;
            min-width: 62px;
            border-radius: 22px;
            background: linear-gradient(145deg, #fff4e8, #ffffff);
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow:
                9px 9px 18px rgba(52, 21, 81, 0.12),
                -8px -8px 18px rgba(255, 255, 255, 0.9);
        }

        .icon-box i {
            font-size: 28px;
            background: linear-gradient(135deg, #ff8a00, #db4d30, #341551);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .call-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 10px 16px;
            border-radius: 999px;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            font-weight: 700;
            font-size: 14px;
            box-shadow: 0 12px 22px rgba(219, 77, 48, 0.28);
            transition: 0.25s;
            text-decoration: none;
        }

        .call-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 16px 28px rgba(219, 77, 48, 0.36);
            color: white;
            text-decoration: none;
        }

        .info-card {
            border-radius: 26px;
            background: linear-gradient(135deg, #341551, #db4d30);
            color: white;
            box-shadow: 0 22px 50px rgba(52, 21, 81, 0.22);
        }

        .quick-chip {
            background: rgba(255, 255, 255, 0.16);
            border: 1px solid rgba(255, 255, 255, 0.22);
            border-radius: 18px;
            padding: 14px;
        }

        @media (max-width: 768px) {
            .hero {
                min-height: 310px;
                border-radius: 0 0 26px 26px;
            }

            .emergency-section {
                margin-top: -38px;
            }

            .helpline-card {
                padding: 18px;
                border-radius: 20px;
            }

            .icon-box {
                width: 54px;
                height: 54px;
                min-width: 54px;
                border-radius: 18px;
            }

            .icon-box i {
                font-size: 24px;
            }

            .call-btn {
                width: 100%;
                margin-top: 14px;
            }
        }

        @media (max-width: 575px) {
            .clean-header-inner {
                padding: 12px 14px;
            }

            .clean-logo-box {
                width: 42px;
                height: 42px;
                min-width: 42px;
                border-radius: 14px;
            }

            .clean-brand-title {
                font-size: 16px;
            }

            .clean-brand-subtitle {
                font-size: 11px;
            }

            .clean-home-btn {
                display: none;
            }

            .clean-call-btn {
                padding: 9px 12px;
                font-size: 12px;
            }
        }
    </style>
</head>

<body>

@php
    $language = session('app_language', 'English');

    $contacts = [
        [
            'title_en' => 'Police',
            'title_od' => 'ପୋଲିସ',
            'number' => '100',
            'icon' => 'fa-shield-halved',
            'desc_en' => 'For law and order emergency support',
            'desc_od' => 'ଆଇନ ଶୃଙ୍ଖଳା ଜରୁରୀ ସହାୟତା ପାଇଁ',
        ],
        [
            'title_en' => 'Ambulance',
            'title_od' => 'ଅମ୍ବୁଲାନ୍ସ',
            'number' => '108',
            'icon' => 'fa-truck-medical',
            'desc_en' => 'For urgent medical emergency support',
            'desc_od' => 'ଜରୁରୀ ଚିକିତ୍ସା ସହାୟତା ପାଇଁ',
        ],
        [
            'title_en' => 'Fire Service',
            'title_od' => 'ଅଗ୍ନିଶମ ସେବା',
            'number' => '101',
            'icon' => 'fa-fire-extinguisher',
            'desc_en' => 'For fire and rescue emergencies',
            'desc_od' => 'ଅଗ୍ନିକାଣ୍ଡ ଏବଂ ଉଦ୍ଧାର ସହାୟତା ପାଇଁ',
        ],
        [
            'title_en' => 'Elder Person Helpline',
            'title_od' => 'ବୟସ୍କ ବ୍ୟକ୍ତିଙ୍କ ପାଇଁ ହେଲ୍ପଲାଇନ୍',
            'number' => '1090',
            'icon' => 'fa-user-shield',
            'desc_en' => 'Support for senior citizens',
            'desc_od' => 'ବୟସ୍କ ବ୍ୟକ୍ତିଙ୍କ ସହାୟତା ପାଇଁ',
        ],
        [
            'title_en' => 'Child Helpline',
            'title_od' => 'ଶିଶୁଙ୍କ ପାଇଁ ହେଲ୍ପଲାଇନ୍',
            'number' => '1098',
            'icon' => 'fa-child-reaching',
            'desc_en' => 'Emergency support for children',
            'desc_od' => 'ଶିଶୁଙ୍କ ଜରୁରୀ ସହାୟତା ପାଇଁ',
        ],
        [
            'title_en' => 'Women Helpline',
            'title_od' => 'ମହିଳାଙ୍କ ହେଲ୍ପଲାଇନ୍',
            'number' => '1091',
            'icon' => 'fa-person-dress',
            'desc_en' => 'Emergency support for women',
            'desc_od' => 'ମହିଳାଙ୍କ ଜରୁରୀ ସହାୟତା ପାଇଁ',
        ],
        [
            'title_en' => 'Life Guard',
            'title_od' => 'ଲାଇଫ ଗାର୍ଡ',
            'number' => '8260777771',
            'icon' => 'fa-life-ring',
            'desc_en' => 'For beach and water safety help',
            'desc_od' => 'ସମୁଦ୍ର କୂଳ ଏବଂ ଜଳ ସୁରକ୍ଷା ପାଇଁ',
        ],
        [
            'title_en' => 'National Highway Helpline',
            'title_od' => 'ଜାତୀୟ ରାଜପଥ ହେଲ୍ପଲାଇନ୍',
            'number' => '1033',
            'icon' => 'fa-road',
            'desc_en' => 'For highway accident and travel emergency',
            'desc_od' => 'ରାଜପଥ ଦୁର୍ଘଟଣା ଏବଂ ଯାତ୍ରା ଜରୁରୀ ସହାୟତା ପାଇଁ',
        ],
    ];
@endphp

<!-- Clean Header - No Hamburger -->
<header class="clean-header">
    <div class="clean-header-inner">

        <a href="{{ url('/') }}" class="clean-brand">
            <div class="clean-logo-box">
                <i class="fa-solid fa-om text-xl"></i>
            </div>

            <div>
                <h2 class="clean-brand-title">
                    {{ $language === 'Odia' ? 'ଶ୍ରୀ ଜଗନ୍ନାଥ ଧାମ' : 'Shree Jagannath Dham' }}
                </h2>
                <p class="clean-brand-subtitle">
                    {{ $language === 'Odia' ? 'ଜରୁରୀ ସହାୟତା' : 'Emergency Assistance' }}
                </p>
            </div>
        </a>

        <div class="clean-header-actions">
            <a href="{{ url('/') }}" class="clean-home-btn">
                <i class="fa-solid fa-house"></i>
                {{ $language === 'Odia' ? 'ହୋମ୍' : 'Home' }}
            </a>

            <a href="tel:108" class="clean-call-btn">
                <i class="fa-solid fa-phone-volume"></i>
                {{ $language === 'Odia' ? 'କଲ୍ କରନ୍ତୁ' : 'Call Now' }}
            </a>
        </div>

    </div>
</header>

<!-- Hero -->
<section class="hero">
    <img class="hero-bg" src="{{ asset('website/fest.jpg') }}" alt="Mandir Background">
    <div class="hero-overlay"></div>

    <div class="hero-content">
        <div class="hero-badge">
            <i class="fa-solid fa-circle-info"></i>
            {{ $language === 'Odia' ? 'ଭକ୍ତଙ୍କ ପାଇଁ ଜରୁରୀ ସହାୟତା' : 'Emergency support for devotees' }}
        </div>

        <h1>
            {{ $language === 'Odia' ? 'ଜରୁରୀକାଳୀନ ଯୋଗାଯୋଗ' : 'Emergency Contact' }}
        </h1>

        <p>
            {{ $language === 'Odia'
                ? 'ପୁରୀ ଧାମରେ ଜରୁରୀ ସହାୟତା ପାଇଁ ଆବଶ୍ୟକୀୟ ହେଲ୍ପଲାଇନ୍ ନମ୍ବର'
                : 'Important helpline numbers for emergency support at Shree Jagannath Dham.' }}
        </p>

        <div class="mt-7 flex flex-col sm:flex-row justify-center gap-3">
            <a href="#helplineNumbers" class="px-7 py-3 rounded-full bg-white text-[#341551] font-bold shadow-lg">
                <i class="fa-solid fa-list mr-2"></i>
                {{ $language === 'Odia' ? 'ନମ୍ବର ଦେଖନ୍ତୁ' : 'View Numbers' }}
            </a>

            <a href="tel:108" class="px-7 py-3 rounded-full bg-[#ff8a00] text-white font-bold shadow-lg">
                <i class="fa-solid fa-phone mr-2"></i>
                {{ $language === 'Odia' ? 'ତୁରନ୍ତ କଲ୍' : 'Emergency Call' }}
            </a>
        </div>
    </div>
</section>

<!-- Emergency Numbers -->
<section id="helplineNumbers" class="emergency-section px-4 md:px-8 pb-16">
    <div class="max-w-7xl mx-auto">

        <div class="bg-white rounded-[28px] shadow-2xl p-5 md:p-8 mb-8">
            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-5">
                <div>
                    <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-orange-50 text-[#db4d30] font-bold text-sm mb-3">
                        <i class="fa-solid fa-shield-heart"></i>
                        {{ $language === 'Odia' ? 'ସୁରକ୍ଷା ସୂଚନା' : 'Safety Information' }}
                    </span>

                    <h2 class="text-2xl md:text-4xl font-extrabold text-[#341551]">
                        {{ $language === 'Odia' ? 'ଜରୁରୀକାଳୀନ ସହଯୋଗ ସଂଖ୍ୟା' : 'Emergency Helpline Numbers' }}
                    </h2>

                    <p class="text-gray-500 mt-2 max-w-2xl">
                        {{ $language === 'Odia'
                            ? 'ଆବଶ୍ୟକ ସମୟରେ ଏହି ନମ୍ବରଗୁଡିକୁ କଲ୍ କରନ୍ତୁ।'
                            : 'Use these helpline numbers during medical, police, fire, safety or travel emergencies.' }}
                    </p>
                </div>

                <div class="flex items-center gap-3 bg-[#fff7f1] rounded-2xl px-5 py-4">
                    <div class="w-12 h-12 rounded-full bg-[#db4d30] text-white flex items-center justify-center">
                        <i class="fa-solid fa-headset"></i>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">
                            {{ $language === 'Odia' ? 'ଦ୍ରୁତ ସହାୟତା' : 'Quick Help' }}
                        </p>
                        <p class="text-xl font-extrabold text-[#341551]">108</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-5">
            @foreach ($contacts as $contact)
                <div class="helpline-card">
                    <div class="relative z-10">
                        <div class="flex items-start gap-4">
                            <div class="icon-box">
                                <i class="fa-solid {{ $contact['icon'] }}"></i>
                            </div>

                            <div class="flex-1">
                                <h3 class="text-lg font-extrabold text-[#341551] leading-snug">
                                    {{ $language === 'Odia' ? $contact['title_od'] : $contact['title_en'] }}
                                </h3>

                                <p class="text-sm text-gray-500 mt-1">
                                    {{ $language === 'Odia' ? $contact['desc_od'] : $contact['desc_en'] }}
                                </p>
                            </div>
                        </div>

                        <div class="mt-5 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
                            <div>
                                <p class="text-xs uppercase tracking-wider text-gray-400 font-bold">
                                    {{ $language === 'Odia' ? 'ହେଲ୍ପଲାଇନ୍' : 'Helpline' }}
                                </p>
                                <p class="text-3xl font-black text-[#db4d30]">
                                    {{ $contact['number'] }}
                                </p>
                            </div>

                            <a href="tel:{{ $contact['number'] }}" class="call-btn">
                                <i class="fa-solid fa-phone"></i>
                                {{ $language === 'Odia' ? 'କଲ୍' : 'Call' }}
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Bottom Info -->
        <div class="info-card mt-10 p-6 md:p-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 items-center">
                <div class="lg:col-span-1">
                    <h3 class="text-2xl md:text-3xl font-extrabold">
                        {{ $language === 'Odia' ? 'ଜରୁରୀ ସମୟରେ କଣ କରିବେ?' : 'What to do in an emergency?' }}
                    </h3>
                    <p class="text-orange-100 mt-3">
                        {{ $language === 'Odia'
                            ? 'ଶାନ୍ତ ରୁହନ୍ତୁ ଏବଂ ଠିକ୍ ହେଲ୍ପଲାଇନ୍ ନମ୍ବରକୁ କଲ୍ କରନ୍ତୁ।'
                            : 'Stay calm, identify the issue and call the correct emergency helpline.' }}
                    </p>
                </div>

                <div class="lg:col-span-2 grid grid-cols-1 sm:grid-cols-3 gap-4">
                    <div class="quick-chip">
                        <i class="fa-solid fa-location-dot text-2xl text-orange-200"></i>
                        <p class="font-bold mt-3">
                            {{ $language === 'Odia' ? 'ସ୍ଥାନ କୁହନ୍ତୁ' : 'Share Location' }}
                        </p>
                        <p class="text-sm text-orange-100 mt-1">
                            {{ $language === 'Odia' ? 'ଆପଣ କେଉଁଠି ଅଛନ୍ତି କୁହନ୍ତୁ' : 'Tell your exact place' }}
                        </p>
                    </div>

                    <div class="quick-chip">
                        <i class="fa-solid fa-circle-info text-2xl text-orange-200"></i>
                        <p class="font-bold mt-3">
                            {{ $language === 'Odia' ? 'ସମସ୍ୟା କୁହନ୍ତୁ' : 'Explain Issue' }}
                        </p>
                        <p class="text-sm text-orange-100 mt-1">
                            {{ $language === 'Odia' ? 'ସଠିକ୍ ସୂଚନା ଦିଅନ୍ତୁ' : 'Give clear information' }}
                        </p>
                    </div>

                    <div class="quick-chip">
                        <i class="fa-solid fa-hand-holding-heart text-2xl text-orange-200"></i>
                        <p class="font-bold mt-3">
                            {{ $language === 'Odia' ? 'ସହାୟତା ଅପେକ୍ଷା କରନ୍ତୁ' : 'Wait Safely' }}
                        </p>
                        <p class="text-sm text-orange-100 mt-1">
                            {{ $language === 'Odia' ? 'ସୁରକ୍ଷିତ ସ୍ଥାନରେ ରୁହନ୍ତୁ' : 'Stay in a safe place' }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<!-- Floating Mobile Call Button -->
<a href="tel:108"
    class="fixed md:hidden right-5 bottom-5 z-50 w-16 h-16 rounded-full bg-gradient-to-br from-[#ff8a00] to-[#db4d30] text-white flex items-center justify-center shadow-2xl">
    <i class="fa-solid fa-phone-volume text-2xl"></i>
</a>

</body>
</html>