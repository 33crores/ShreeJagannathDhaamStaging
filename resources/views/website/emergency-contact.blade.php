<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>{{ session('app_language', 'English') === 'Odia' ? 'ଜରୁରୀକାଳୀନ ଯୋଗାଯୋଗ' : 'Emergency Contact' }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- FontAwesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <style>
        :root {
            --primary: #341551;
            --primary-light: #5a2476;
            --secondary: #db4d30;
            --orange: #ff8a00;
            --light-bg: #fff7f1;
            --soft-purple: #f7f1ff;
            --dark-text: #1f2937;
            --muted-text: #6b7280;
            --white: #ffffff;
            --success: #15803d;
        }

        * {
            box-sizing: border-box;
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            color: var(--dark-text);
            overflow-x: hidden;
            background:
                radial-gradient(circle at 8% 8%, rgba(255, 138, 0, 0.14), transparent 30%),
                radial-gradient(circle at 92% 10%, rgba(52, 21, 81, 0.12), transparent 32%),
                radial-gradient(circle at 50% 100%, rgba(219, 77, 48, 0.10), transparent 35%),
                linear-gradient(180deg, #fff8f3 0%, #ffffff 48%, #fff4ec 100%);
        }

        a {
            text-decoration: none;
        }

        .page-wrapper {
            min-height: 100vh;
            padding-bottom: 60px;
        }

        /* Clean Hero - No Background Image */
        .hero {
            position: relative;
            padding: 64px 18px 92px;
            overflow: hidden;
            text-align: center;
            color: #ffffff;
            background:
                radial-gradient(circle at 12% 18%, rgba(255, 213, 109, 0.34), transparent 28%),
                radial-gradient(circle at 86% 16%, rgba(255, 138, 0, 0.30), transparent 26%),
                radial-gradient(circle at 50% 100%, rgba(255, 255, 255, 0.16), transparent 34%),
                linear-gradient(135deg, #341551 0%, #64205c 42%, #db4d30 78%, #ff8a00 100%);
            border-radius: 0 0 42px 42px;
            box-shadow: 0 20px 48px rgba(52, 21, 81, 0.24);
        }

        .hero::before {
            content: "";
            position: absolute;
            width: 260px;
            height: 260px;
            left: -90px;
            top: -120px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.10);
        }

        .hero::after {
            content: "";
            position: absolute;
            width: 220px;
            height: 220px;
            right: -80px;
            bottom: -100px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.12);
        }

        .hero-inner {
            position: relative;
            z-index: 2;
            max-width: 900px;
            margin: 0 auto;
        }

        .hero-icon {
            width: 78px;
            height: 78px;
            margin: 0 auto 20px;
            border-radius: 28px;
            background: rgba(255, 255, 255, 0.16);
            border: 1px solid rgba(255, 255, 255, 0.24);
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 16px 34px rgba(0, 0, 0, 0.18);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
        }

        .hero-icon i {
            font-size: 34px;
            color: #ffffff;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 9px 16px;
            border-radius: 999px;
            background: rgba(255, 255, 255, 0.16);
            border: 1px solid rgba(255, 255, 255, 0.24);
            font-size: 13px;
            font-weight: 800;
            margin-bottom: 16px;
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
        }

        .hero h1 {
            margin: 0;
            font-size: clamp(32px, 5vw, 62px);
            line-height: 1.08;
            font-weight: 900;
            letter-spacing: -1px;
            text-shadow: 0 10px 26px rgba(0, 0, 0, 0.24);
        }

        .hero p {
            margin: 16px auto 0;
            max-width: 760px;
            font-size: clamp(15px, 2vw, 19px);
            line-height: 1.65;
            color: rgba(255, 255, 255, 0.92);
        }

        .hero-stats {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 14px;
            margin-top: 28px;
        }

        .hero-stat {
            min-width: 150px;
            padding: 13px 16px;
            border-radius: 18px;
            background: rgba(255, 255, 255, 0.14);
            border: 1px solid rgba(255, 255, 255, 0.20);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
        }

        .hero-stat strong {
            display: block;
            font-size: 21px;
            font-weight: 900;
            line-height: 1;
        }

        .hero-stat span {
            display: block;
            margin-top: 5px;
            font-size: 12px;
            font-weight: 700;
            color: rgba(255, 255, 255, 0.84);
        }

        /* Main Section */
        .emergency-section {
            position: relative;
            z-index: 5;
            margin-top: -48px;
            padding: 0 18px;
        }

        .container {
            max-width: 1240px;
            margin: 0 auto;
        }

        .section-intro {
            background: rgba(255, 255, 255, 0.96);
            border: 1px solid rgba(255, 255, 255, 0.70);
            border-radius: 28px;
            padding: 26px;
            box-shadow: 0 20px 46px rgba(52, 21, 81, 0.12);
            margin-bottom: 24px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 22px;
        }

        .intro-left {
            min-width: 0;
        }

        .intro-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 14px;
            border-radius: 999px;
            background: #fff1e8;
            color: var(--secondary);
            font-size: 13px;
            font-weight: 900;
            margin-bottom: 12px;
        }

        .section-intro h2 {
            margin: 0;
            color: var(--primary);
            font-size: clamp(24px, 4vw, 38px);
            line-height: 1.16;
            font-weight: 900;
        }

        .section-intro p {
            margin: 10px 0 0;
            color: var(--muted-text);
            font-size: 15px;
            line-height: 1.6;
            max-width: 720px;
        }

        .intro-icon-card {
            width: 86px;
            height: 86px;
            min-width: 86px;
            border-radius: 28px;
            background: linear-gradient(135deg, var(--primary), var(--secondary), var(--orange));
            color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 18px 34px rgba(219, 77, 48, 0.26);
        }

        .intro-icon-card i {
            font-size: 34px;
        }

        /* Cards */
        .helpline-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 18px;
        }

        .helpline-card {
            position: relative;
            min-height: 245px;
            border-radius: 24px;
            background:
                radial-gradient(circle at top right, rgba(219, 77, 48, 0.10), transparent 36%),
                linear-gradient(180deg, #ffffff 0%, #fff8f3 100%);
            box-shadow: 0 16px 36px rgba(52, 21, 81, 0.11);
            padding: 20px;
            overflow: hidden;
            border: 1px solid rgba(52, 21, 81, 0.08);
            transition: all 0.28s ease;
        }

        .helpline-card::before {
            content: "";
            position: absolute;
            top: -46px;
            right: -48px;
            width: 128px;
            height: 128px;
            border-radius: 50%;
            background: rgba(255, 138, 0, 0.13);
        }

        .helpline-card::after {
            content: "";
            position: absolute;
            left: -44px;
            bottom: -50px;
            width: 110px;
            height: 110px;
            border-radius: 50%;
            background: rgba(52, 21, 81, 0.08);
        }

        .helpline-card:hover {
            transform: translateY(-7px);
            box-shadow: 0 24px 54px rgba(52, 21, 81, 0.18);
        }

        .card-content {
            position: relative;
            z-index: 2;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .card-top {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 12px;
            margin-bottom: 16px;
        }

        .icon-box {
            width: 62px;
            height: 62px;
            min-width: 62px;
            border-radius: 22px;
            background: linear-gradient(135deg, var(--primary), var(--secondary), var(--orange));
            display: flex;
            align-items: center;
            justify-content: center;
            color: #ffffff;
            box-shadow: 0 14px 26px rgba(52, 21, 81, 0.22);
        }

        .icon-box i {
            font-size: 27px;
        }

        .status-chip {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 7px 10px;
            border-radius: 999px;
            background: rgba(21, 128, 61, 0.10);
            color: var(--success);
            font-size: 11px;
            font-weight: 900;
            white-space: nowrap;
        }

        .helpline-card h3 {
            margin: 0;
            color: var(--primary);
            font-size: 18px;
            line-height: 1.35;
            font-weight: 900;
        }

        .helpline-card .desc {
            margin: 8px 0 0;
            color: var(--muted-text);
            font-size: 13px;
            line-height: 1.5;
        }

        .number-row {
            margin-top: auto;
            padding-top: 18px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
        }

        .number-label {
            margin: 0 0 3px;
            color: #9ca3af;
            font-size: 11px;
            font-weight: 900;
            letter-spacing: 0.8px;
            text-transform: uppercase;
        }

        .number {
            margin: 0;
            color: var(--secondary);
            font-size: 29px;
            line-height: 1;
            font-weight: 900;
        }

        .call-btn {
            width: 44px;
            height: 44px;
            min-width: 44px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: #ffffff;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 12px 22px rgba(219, 77, 48, 0.28);
            transition: all 0.25s ease;
        }

        .call-btn:hover {
            color: #ffffff;
            transform: translateY(-2px) scale(1.04);
            box-shadow: 0 16px 28px rgba(219, 77, 48, 0.36);
        }

        /* Bottom Info */
        .info-card {
            margin-top: 34px;
            border-radius: 30px;
            background:
                radial-gradient(circle at top left, rgba(255, 138, 0, 0.24), transparent 34%),
                linear-gradient(135deg, #341551 0%, #64205c 45%, #db4d30 100%);
            color: #ffffff;
            padding: 30px;
            box-shadow: 0 22px 50px rgba(52, 21, 81, 0.22);
            overflow: hidden;
            position: relative;
        }

        .info-card::after {
            content: "";
            position: absolute;
            width: 210px;
            height: 210px;
            right: -80px;
            bottom: -90px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.10);
        }

        .info-content {
            position: relative;
            z-index: 2;
            display: grid;
            grid-template-columns: 1fr 2fr;
            gap: 26px;
            align-items: center;
        }

        .info-card h3 {
            margin: 0;
            font-size: clamp(24px, 4vw, 34px);
            line-height: 1.2;
            font-weight: 900;
        }

        .info-card p {
            margin: 12px 0 0;
            color: rgba(255, 255, 255, 0.84);
            line-height: 1.6;
        }

        .quick-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 14px;
        }

        .quick-chip {
            background: rgba(255, 255, 255, 0.14);
            border: 1px solid rgba(255, 255, 255, 0.22);
            border-radius: 20px;
            padding: 16px;
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
        }

        .quick-chip i {
            font-size: 26px;
            color: #ffd9a8;
        }

        .quick-chip strong {
            display: block;
            margin-top: 12px;
            font-size: 15px;
            font-weight: 900;
        }

        .quick-chip span {
            display: block;
            margin-top: 5px;
            color: rgba(255, 255, 255, 0.78);
            font-size: 13px;
            line-height: 1.45;
        }

        @media (max-width: 1199px) {
            .helpline-grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        @media (max-width: 991px) {
            .helpline-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .info-content {
                grid-template-columns: 1fr;
            }

            .section-intro {
                align-items: flex-start;
            }
        }

        @media (max-width: 768px) {
            .hero {
                padding: 46px 16px 78px;
                border-radius: 0 0 30px 30px;
            }

            .hero-icon {
                width: 66px;
                height: 66px;
                border-radius: 22px;
            }

            .hero-icon i {
                font-size: 29px;
            }

            .emergency-section {
                margin-top: -36px;
                padding: 0 14px;
            }

            .section-intro {
                border-radius: 24px;
                padding: 22px;
            }

            .intro-icon-card {
                display: none;
            }

            .hero-stats {
                gap: 10px;
            }

            .hero-stat {
                min-width: 135px;
                padding: 12px;
            }
        }

        @media (max-width: 575px) {
            .hero {
                padding: 38px 14px 70px;
            }

            .hero-badge {
                font-size: 12px;
                padding: 8px 13px;
            }

            .hero p {
                font-size: 14px;
            }

            .hero-stats {
                margin-top: 22px;
            }

            .hero-stat {
                flex: 1;
                min-width: 120px;
            }

            .hero-stat strong {
                font-size: 18px;
            }

            .hero-stat span {
                font-size: 11px;
            }

            .section-intro {
                padding: 18px;
                border-radius: 22px;
            }

            .intro-badge {
                font-size: 12px;
            }

            .helpline-grid {
                grid-template-columns: 1fr;
                gap: 14px;
            }

            .helpline-card {
                min-height: auto;
                padding: 18px;
                border-radius: 22px;
            }

            .card-top {
                margin-bottom: 14px;
            }

            .icon-box {
                width: 56px;
                height: 56px;
                min-width: 56px;
                border-radius: 20px;
            }

            .icon-box i {
                font-size: 24px;
            }

            .number {
                font-size: 27px;
            }

            .info-card {
                padding: 22px;
                border-radius: 24px;
            }

            .quick-grid {
                grid-template-columns: 1fr;
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

<div class="page-wrapper">

    <!-- Clean Attractive Hero - No Top Header, No Background Image, No Hero Buttons -->
    <section class="hero">
        <div class="hero-inner">
            <div class="hero-icon">
                <i class="fa-solid fa-shield-heart"></i>
            </div>

            <div class="hero-badge">
                <i class="fa-solid fa-circle-info"></i>
                {{ $language === 'Odia' ? 'ଭକ୍ତଙ୍କ ପାଇଁ ଜରୁରୀ ସହାୟତା' : 'Emergency Support For Devotees' }}
            </div>

            <h1>
                {{ $language === 'Odia' ? 'ଜରୁରୀକାଳୀନ ଯୋଗାଯୋଗ' : 'Emergency Contact' }}
            </h1>

            <p>
                {{ $language === 'Odia'
                    ? 'ପୁରୀରେ ଜରୁରୀ ସମୟରେ ଆବଶ୍ୟକ ହେଲ୍ପଲାଇନ୍ ନମ୍ବରଗୁଡିକୁ ଏଠାରୁ ସହଜରେ ଦେଖନ୍ତୁ।'
                    : 'Quickly access important helpline numbers for medical, police, fire, safety and travel emergencies in Puri.' }}
            </p>

            <div class="hero-stats">
                <div class="hero-stat">
                    <strong>{{ count($contacts) }}+</strong>
                    <span>{{ $language === 'Odia' ? 'ହେଲ୍ପଲାଇନ୍' : 'Helplines' }}</span>
                </div>

                <div class="hero-stat">
                    <strong>24x7</strong>
                    <span>{{ $language === 'Odia' ? 'ସହାୟତା' : 'Support' }}</span>
                </div>

                <div class="hero-stat">
                    <strong>Quick</strong>
                    <span>{{ $language === 'Odia' ? 'ଯୋଗାଯୋଗ' : 'Access' }}</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Emergency Numbers -->
    <section class="emergency-section">
        <div class="container">

            <div class="section-intro">
                <div class="intro-left">
                    <span class="intro-badge">
                        <i class="fa-solid fa-kit-medical"></i>
                        {{ $language === 'Odia' ? 'ସୁରକ୍ଷା ସୂଚନା' : 'Safety Information' }}
                    </span>

                    <h2>
                        {{ $language === 'Odia' ? 'ଜରୁରୀକାଳୀନ ସହଯୋଗ ସଂଖ୍ୟା' : 'Emergency Helpline Numbers' }}
                    </h2>

                    <p>
                        {{ $language === 'Odia'
                            ? 'ଜରୁରୀ ପରିସ୍ଥିତିରେ ଠିକ୍ ସେବାକୁ ଶୀଘ୍ର ଯୋଗାଯୋଗ କରନ୍ତୁ। ନମ୍ବର ଟ୍ୟାପ୍ କରି କଲ୍ କରିପାରିବେ।'
                            : 'During an emergency, contact the correct service quickly. Tap the call icon on any card to dial directly.' }}
                    </p>
                </div>

                <div class="intro-icon-card">
                    <i class="fa-solid fa-headset"></i>
                </div>
            </div>

            <div class="helpline-grid">
                @foreach ($contacts as $contact)
                    <article class="helpline-card">
                        <div class="card-content">
                            <div class="card-top">
                                <div class="icon-box">
                                    <i class="fa-solid {{ $contact['icon'] }}"></i>
                                </div>

                                <span class="status-chip">
                                    <i class="fa-solid fa-circle-check"></i>
                                    {{ $language === 'Odia' ? 'ଉପଲବ୍ଧ' : 'Active' }}
                                </span>
                            </div>

                            <h3>
                                {{ $language === 'Odia' ? $contact['title_od'] : $contact['title_en'] }}
                            </h3>

                            <p class="desc">
                                {{ $language === 'Odia' ? $contact['desc_od'] : $contact['desc_en'] }}
                            </p>

                            <div class="number-row">
                                <div>
                                    <p class="number-label">
                                        {{ $language === 'Odia' ? 'ହେଲ୍ପଲାଇନ୍' : 'Helpline' }}
                                    </p>

                                    <p class="number">
                                        {{ $contact['number'] }}
                                    </p>
                                </div>

                                <a href="tel:{{ $contact['number'] }}" class="call-btn"
                                    aria-label="Call {{ $contact['number'] }}">
                                    <i class="fa-solid fa-phone"></i>
                                </a>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>

            <!-- Bottom Info -->
            <div class="info-card">
                <div class="info-content">
                    <div>
                        <h3>
                            {{ $language === 'Odia' ? 'ଜରୁରୀ ସମୟରେ କଣ କରିବେ?' : 'What to do in an emergency?' }}
                        </h3>

                        <p>
                            {{ $language === 'Odia'
                                ? 'ଶାନ୍ତ ରୁହନ୍ତୁ, ସଠିକ୍ ତଥ୍ୟ ଦିଅନ୍ତୁ ଏବଂ ସୁରକ୍ଷିତ ସ୍ଥାନରେ ସହାୟତା ପାଇଁ ଅପେକ୍ଷା କରନ୍ତୁ।'
                                : 'Stay calm, share correct information and wait for assistance from a safe location.' }}
                        </p>
                    </div>

                    <div class="quick-grid">
                        <div class="quick-chip">
                            <i class="fa-solid fa-location-dot"></i>
                            <strong>{{ $language === 'Odia' ? 'ସ୍ଥାନ କୁହନ୍ତୁ' : 'Share Location' }}</strong>
                            <span>
                                {{ $language === 'Odia' ? 'ଆପଣ କେଉଁଠି ଅଛନ୍ତି ସଠିକ୍ କୁହନ୍ତୁ।' : 'Tell the exact place where help is needed.' }}
                            </span>
                        </div>

                        <div class="quick-chip">
                            <i class="fa-solid fa-circle-info"></i>
                            <strong>{{ $language === 'Odia' ? 'ସମସ୍ୟା କୁହନ୍ତୁ' : 'Explain Issue' }}</strong>
                            <span>
                                {{ $language === 'Odia' ? 'ଘଟଣା ବିଷୟରେ ସ୍ପଷ୍ଟ ସୂଚନା ଦିଅନ୍ତୁ।' : 'Give clear information about the incident.' }}
                            </span>
                        </div>

                        <div class="quick-chip">
                            <i class="fa-solid fa-hand-holding-heart"></i>
                            <strong>{{ $language === 'Odia' ? 'ସୁରକ୍ଷିତ ରୁହନ୍ତୁ' : 'Stay Safe' }}</strong>
                            <span>
                                {{ $language === 'Odia' ? 'ସହାୟତା ଆସିବା ପର୍ଯ୍ୟନ୍ତ ସୁରକ୍ଷିତ ରୁହନ୍ତୁ।' : 'Stay in a safe place until help arrives.' }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

</div>

</body>
</html>