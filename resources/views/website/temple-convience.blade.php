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

        .service-card-new.charging-station .service-tag {
            background: rgba(14, 165, 233, 0.12);
            color: #0ea5e9;
        }

        .service-card-new.charging-station .service-image-wrap {
            background: linear-gradient(135deg, #eff8ff, #dbeefe);
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

        /* Common Small Card Layout */
        .small-card-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 16px;
        }

        .small-service-card {
            position: relative;
            min-height: 230px;
            background: linear-gradient(180deg, #ffffff 0%, #fff8f3 100%);
            border-radius: 18px;
            padding: 16px;
            border: 1px solid rgba(255, 122, 26, 0.18);
            box-shadow: 0 12px 28px rgba(52, 21, 81, 0.10);
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .small-service-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 18px 36px rgba(52, 21, 81, 0.16);
        }

        .small-service-card::before {
            content: "";
            position: absolute;
            width: 95px;
            height: 95px;
            right: -36px;
            top: -38px;
            border-radius: 50%;
            background: rgba(255, 122, 26, 0.12);
        }

        .small-service-icon {
            width: 54px;
            height: 54px;
            border-radius: 18px;
            color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 23px;
            margin-bottom: 12px;
            position: relative;
            z-index: 2;
        }

        .small-service-top {
            display: flex;
            justify-content: space-between;
            gap: 10px;
            align-items: flex-start;
            margin-bottom: 10px;
        }

        .small-service-title {
            margin: 0;
            color: #341551;
            font-size: 16px;
            line-height: 1.35;
            font-weight: 900;
            position: relative;
            z-index: 2;
        }

        .small-service-badge {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 6px 8px;
            border-radius: 999px;
            background: rgba(21, 128, 61, 0.10);
            color: #15803d;
            font-size: 10px;
            font-weight: 900;
            white-space: nowrap;
            position: relative;
            z-index: 2;
        }

        .small-service-info {
            display: grid;
            gap: 8px;
            margin-top: 12px;
            position: relative;
            z-index: 2;
        }

        .small-service-info-row {
            display: flex;
            align-items: flex-start;
            gap: 8px;
            color: #4b4b4b;
            font-size: 12px;
            line-height: 1.4;
        }

        .small-service-info-row i {
            width: 24px;
            height: 24px;
            min-width: 24px;
            border-radius: 50%;
            background: #fff0e5;
            color: #db4d30;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 11px;
        }

        .small-service-info-row strong {
            display: block;
            color: #222222;
            font-size: 11px;
            margin-bottom: 1px;
        }

        .small-service-btn {
            width: 100%;
            margin-top: 14px;
            min-height: 38px;
            border-radius: 12px;
            padding: 9px 12px;
            text-decoration: none;
            color: #ffffff;
            font-size: 12px;
            font-weight: 900;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            transition: all 0.25s ease;
            position: relative;
            z-index: 2;
        }

        .small-service-btn:hover {
            color: #ffffff;
            text-decoration: none;
            transform: translateY(-2px);
        }

        .small-service-btn.disabled {
            opacity: 0.55;
            pointer-events: none;
        }

        /* Free Food Theme */
        .free-food-card .small-service-icon {
            background: linear-gradient(135deg, #ff7a1a, #db4d30);
            box-shadow: 0 10px 18px rgba(219, 77, 48, 0.24);
        }

        .free-food-card .small-service-btn {
            background: linear-gradient(135deg, #341551, #db4d30);
            box-shadow: 0 10px 18px rgba(219, 77, 48, 0.22);
        }

        /* Drinking Water Theme */
        .water-card {
            background:
                radial-gradient(circle at top right, rgba(219, 77, 48, 0.10), transparent 36%),
                radial-gradient(circle at bottom left, rgba(52, 21, 81, 0.08), transparent 34%),
                linear-gradient(180deg, #ffffff 0%, #fff8f3 100%);
            border: 1px solid rgba(52, 21, 81, 0.12);
            box-shadow: 0 12px 30px rgba(52, 21, 81, 0.11);
        }

        .water-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 18px 38px rgba(52, 21, 81, 0.18);
        }

        .water-card::before {
            background: rgba(219, 77, 48, 0.10);
        }

        .water-card::after {
            content: "";
            position: absolute;
            width: 90px;
            height: 90px;
            left: -38px;
            bottom: -42px;
            border-radius: 50%;
            background: rgba(52, 21, 81, 0.08);
        }

        .water-card .small-service-icon {
            background: linear-gradient(135deg, #341551, #64205c, #db4d30);
            box-shadow: 0 12px 22px rgba(52, 21, 81, 0.24);
        }

        .water-card .small-service-icon i {
            color: #ffffff;
        }

        .water-card .small-service-title {
            color: #341551;
        }

        .water-card .small-service-badge {
            background: rgba(21, 128, 61, 0.10);
            color: #15803d;
        }

        .water-card .small-service-info-row i {
            background: #fff0e8;
            color: #db4d30;
        }

        .water-card .small-service-btn {
            background: linear-gradient(135deg, #341551, #db4d30, #ff7a1a);
            box-shadow: 0 10px 18px rgba(52, 21, 81, 0.20);
        }

        /* Police Small Card Design */
        .police-grid,
        .hospital-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 16px;
        }

        .police-logo-card,
        .hospital-logo-card {
            position: relative;
            min-height: 235px;
            background:
                radial-gradient(circle at top right, rgba(52, 21, 81, 0.12), transparent 34%),
                linear-gradient(180deg, #ffffff 0%, #fff8f3 100%);
            border-radius: 18px;
            padding: 16px;
            border: 1px solid rgba(52, 21, 81, 0.12);
            box-shadow: 0 12px 30px rgba(52, 21, 81, 0.11);
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .police-logo-card:hover,
        .hospital-logo-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 18px 38px rgba(52, 21, 81, 0.18);
        }

        .police-logo-card::before,
        .hospital-logo-card::before {
            content: "";
            position: absolute;
            width: 110px;
            height: 110px;
            right: -42px;
            top: -44px;
            border-radius: 50%;
            background: rgba(219, 77, 48, 0.10);
        }

        .police-logo-card::after,
        .hospital-logo-card::after {
            content: "";
            position: absolute;
            width: 90px;
            height: 90px;
            left: -38px;
            bottom: -42px;
            border-radius: 50%;
            background: rgba(52, 21, 81, 0.08);
        }

        .police-icon-wrap,
        .hospital-icon-wrap {
            position: relative;
            z-index: 2;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
            margin-bottom: 13px;
        }

        .police-icon,
        .hospital-icon {
            width: 56px;
            height: 56px;
            min-width: 56px;
            border-radius: 18px;
            background: linear-gradient(135deg, #341551, #64205c, #db4d30);
            color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            box-shadow: 0 12px 22px rgba(52, 21, 81, 0.24);
        }

        .hospital-icon {
            background: linear-gradient(135deg, #341551, #db4d30, #ff7a1a);
        }

        .police-status,
        .hospital-status {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 6px 9px;
            border-radius: 999px;
            background: rgba(21, 128, 61, 0.10);
            color: #15803d;
            font-size: 10px;
            font-weight: 900;
            white-space: nowrap;
        }

        .hospital-status {
            background: rgba(219, 77, 48, 0.10);
            color: #db4d30;
        }

        .police-title,
        .hospital-title {
            position: relative;
            z-index: 2;
            margin: 0 0 11px;
            color: #341551;
            font-size: 16px;
            line-height: 1.35;
            font-weight: 900;
        }

        .police-info,
        .hospital-info {
            position: relative;
            z-index: 2;
            display: grid;
            gap: 9px;
        }

        .police-info-row,
        .hospital-info-row {
            display: flex;
            gap: 8px;
            color: #4b4b4b;
            font-size: 12px;
            line-height: 1.42;
        }

        .police-info-row i,
        .hospital-info-row i {
            width: 25px;
            height: 25px;
            min-width: 25px;
            border-radius: 50%;
            background: #fff0e8;
            color: #db4d30;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 11px;
        }

        .police-info-row strong,
        .hospital-info-row strong {
            display: block;
            color: #222222;
            font-size: 11px;
            margin-bottom: 1px;
        }

        .police-btn,
        .hospital-btn {
            position: relative;
            z-index: 2;
            width: 100%;
            min-height: 38px;
            margin-top: 14px;
            border-radius: 12px;
            padding: 9px 12px;
            text-decoration: none;
            color: #ffffff;
            font-size: 12px;
            font-weight: 900;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            background: linear-gradient(135deg, #341551, #db4d30);
            box-shadow: 0 10px 18px rgba(52, 21, 81, 0.20);
            transition: all 0.25s ease;
        }

        .hospital-btn {
            background: linear-gradient(135deg, #341551, #db4d30, #ff7a1a);
        }

        .police-btn:hover,
        .hospital-btn:hover {
            color: #ffffff;
            text-decoration: none;
            transform: translateY(-2px);
        }

        .police-btn.disabled,
        .hospital-btn.disabled {
            opacity: 0.55;
            pointer-events: none;
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

        @media (max-width: 1199px) {

            .small-card-grid,
            .police-grid,
            .hospital-grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        @media (max-width: 991px) {
            .service-grid {
                grid-template-columns: 1fr;
            }

            .small-card-grid,
            .police-grid,
            .hospital-grid {
                grid-template-columns: repeat(2, 1fr);
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

            .small-card-grid,
            .police-grid,
            .hospital-grid {
                grid-template-columns: 1fr;
                gap: 14px;
            }

            .small-service-card,
            .police-logo-card,
            .hospital-logo-card {
                display: flex;
                gap: 13px;
                align-items: flex-start;
                padding: 14px;
                min-height: auto;
            }

            .small-service-icon,
            .police-icon,
            .hospital-icon {
                width: 50px;
                height: 50px;
                min-width: 50px;
                margin-bottom: 0;
            }

            .small-service-mobile-content,
            .police-mobile-content,
            .hospital-mobile-content {
                width: 100%;
            }

            .police-icon-wrap,
            .hospital-icon-wrap {
                margin-bottom: 0;
                display: block;
            }

            .police-status,
            .hospital-status {
                margin-top: 8px;
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

            .small-service-card,
            .police-logo-card,
            .hospital-logo-card {
                padding: 13px;
            }

            .small-service-title,
            .police-title,
            .hospital-title {
                font-size: 15px;
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

        $isFreeFoodPage = $normalizedTitle === 'free food';
        $isDrinkingWaterPage = $normalizedTitle === 'drinking water';
        $isChargingStationPage = $normalizedTitle === 'charging station';
        $isHospitalPage = $normalizedTitle === 'hospital';
        $isPoliceStationPage = $normalizedTitle === 'police station';
        $isPoliceOutpostPage = $normalizedTitle === 'police outpost';
        $isPolicePage = $isPoliceStationPage || $isPoliceOutpostPage;
        $isSmallIconCardPage = $isFreeFoodPage || $isDrinkingWaterPage;

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
            'police outpost' => 'ପୋଲିସ୍ ଆଉଟପୋଷ୍ଟ',
        ];

        $localizedTitle = $language === 'Odia' ? $odiaTitles[$normalizedTitle] ?? $rawTitle : $rawTitle;

        $publicServicePhotoFolders = ['assets/uploads/public_services', 'uploads/public_services'];

        $serviceTypeIconMap = [
            'charging station' => 'fa-solid fa-car-bolt',
            'police station' => 'fa-solid fa-building-shield',
            'police outpost' => 'fa-solid fa-shield-halved',
            'free food' => 'fa-solid fa-bowl-rice',
            'drinking water' => 'fa-solid fa-droplet',
            'hospital' => 'fa-solid fa-hospital',
        ];

        $fallbackImage =
            'data:image/svg+xml;charset=UTF-8,' .
            rawurlencode('
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

            if ($photoValue === '' || $photoValue === '[]' || strtolower($photoValue) === 'null') {
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

        $serviceImageData = function ($photo) use ($publicServicePhotoFolders, $fallbackImage, $encodeAssetUrl) {
            $photo = trim((string) $photo);

            if ($photo === '') {
                return [
                    'url' => $fallbackImage,
                    'found' => false,
                ];
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

            if ($relativePathFromDb !== '' && preg_match('/\.(jpg|jpeg|png|webp|gif|svg)$/i', $relativePathFromDb)) {
                $candidatePaths[] = $relativePathFromDb;
            }

            if ($filename !== '' && $filename !== '.' && $filename !== '/') {
                foreach ($publicServicePhotoFolders as $folder) {
                    $candidatePaths[] = $folder . '/' . $filename;
                }
            }

            $candidatePaths = array_values(array_unique(array_filter($candidatePaths)));

            foreach ($candidatePaths as $candidatePath) {
                $candidatePath = ltrim(str_replace('\\', '/', $candidatePath), '/');

                if (file_exists(public_path($candidatePath))) {
                    return [
                        'url' => $encodeAssetUrl($candidatePath),
                        'found' => true,
                    ];
                }
            }

            if ($isRemoteUrl) {
                return [
                    'url' => $photo,
                    'found' => true,
                ];
            }

            return [
                'url' => $fallbackImage,
                'found' => false,
            ];
        };
    @endphp

    <div class="service-page">

        <section class="page-heading-section">
            <div class="heading-inner">
                <div class="page-heading-badge">
                    <i
                        class="{{ $isFreeFoodPage ? 'fa-solid fa-bowl-food' : ($isDrinkingWaterPage ? 'fa-solid fa-droplet' : ($isChargingStationPage ? 'fa-solid fa-car-bolt' : ($isHospitalPage ? 'fa-solid fa-hospital' : ($isPoliceStationPage ? 'fa-solid fa-building-shield' : ($isPoliceOutpostPage ? 'fa-solid fa-shield-halved' : 'fa-solid fa-location-dot'))))) }}"></i>
                    {{ $language === 'Odia' ? 'ଶ୍ରୀ ଜଗନ୍ନାଥ ଧାମ' : 'Shree Jagannatha Dham' }}
                </div>

                <h1>{{ $localizedTitle }}</h1>

                <p>
                    @if ($isFreeFoodPage)
                        {{ $language === 'Odia'
                            ? 'ମାଗଣା ଖାଦ୍ୟ ସେବା, ସ୍ଥାନ, ସମୟ ଓ ଦିଗ ନିର୍ଦ୍ଦେଶ ଦେଖନ୍ତୁ।'
                            : 'Find free food service points, timings, locations and directions near Shree Jagannatha Dham.' }}
                    @elseif($isDrinkingWaterPage)
                        {{ $language === 'Odia'
                            ? 'ବିଶୁଦ୍ଧ ପାନୀୟ ଜଳ ସ୍ଥାନ, ସମୟ ଓ ଦିଗ ନିର୍ଦ୍ଦେଶ ଦେଖନ୍ତୁ।'
                            : 'Find drinking water points, timings, locations and directions near Shree Jagannatha Dham.' }}
                    @elseif($isChargingStationPage)
                        {{ $language === 'Odia'
                            ? 'ଚାର୍ଜିଂ ସ୍ଟେସନ୍ ଅବସ୍ଥାନ ଓ ଦିଗ ନିର୍ଦ୍ଦେଶ ଦେଖନ୍ତୁ।'
                            : 'Find charging station locations and directions near Shree Jagannatha Dham.' }}
                    @elseif($isHospitalPage)
                        {{ $language === 'Odia'
                            ? 'ହସ୍ପିଟାଲ୍, ଆମ୍ବୁଲାନ୍ସ, ପ୍ରଥମିକ ଚିକିତ୍ସା ଓ ସ୍ୱାସ୍ଥ୍ୟ ସହାୟତା ସ୍ଥାନ ଦେଖନ୍ତୁ।'
                            : 'Find hospital, ambulance, first aid and medical support points near Shree Jagannatha Dham.' }}
                    @elseif($isPoliceStationPage)
                        {{ $language === 'Odia'
                            ? 'ପୋଲିସ୍ ଷ୍ଟେସନ୍ ଅବସ୍ଥାନ, ଯୋଗାଯୋଗ ଓ ଦିଗ ନିର୍ଦ୍ଦେଶ ଦେଖନ୍ତୁ।'
                            : 'Find police station locations, contact details and directions near Shree Jagannatha Dham.' }}
                    @elseif($isPoliceOutpostPage)
                        {{ $language === 'Odia'
                            ? 'ପୋଲିସ୍ ଆଉଟପୋଷ୍ଟ ଅବସ୍ଥାନ ଓ ଦିଗ ନିର୍ଦ୍ଦେଶ ଦେଖନ୍ତୁ।'
                            : 'Find police outpost locations and directions near Shree Jagannatha Dham.' }}
                    @else
                        {{ $language === 'Odia'
                            ? 'ଏଠାରେ ଉପଲବ୍ଧ ସମସ୍ତ ସେବା, ସ୍ଥାନ ଓ ଦିଗ ନିର୍ଦ୍ଦେଶ ଦେଖନ୍ତୁ।'
                            : 'Explore available facilities, locations and directions near Shree Jagannatha Dham.' }}
                    @endif
                </p>
            </div>
        </section>

        <main class="service-wrapper">

            @if ($isSmallIconCardPage)
                <div class="small-card-grid">
                    @forelse ($services as $service)
                        @php
                            $addressParts = array_filter([
                                $service->landmark ?? null,
                                $service->city_village ?? null,
                                $service->district ?? null,
                                $service->state ?? null,
                            ]);

                            $address = count($addressParts) ? implode(', ', $addressParts) : 'N/A';

                            $mapUrl =
                                $service->google_map_link ?? ($service->map_url ?? ($service->google_map_url ?? null));

                            $cardClass = $isDrinkingWaterPage ? 'water-card' : 'free-food-card';
                            $cardIcon = $isDrinkingWaterPage ? 'fa-solid fa-glass-water' : 'fa-solid fa-bowl-rice';
                            $badgeText = $isDrinkingWaterPage
                                ? ($language === 'Odia'
                                    ? 'ପାନୀୟ ଜଳ'
                                    : 'Water')
                                : ($language === 'Odia'
                                    ? 'ମାଗଣା'
                                    : 'Free');
                        @endphp

                        <article class="small-service-card {{ $cardClass }}">
                            <div class="small-service-icon">
                                <i class="{{ $cardIcon }}"></i>
                            </div>

                            <div class="small-service-mobile-content">
                                <div class="small-service-top">
                                    <h5 class="small-service-title">{{ $service->service_name ?? $localizedTitle }}</h5>

                                    <span class="small-service-badge">
                                        <i class="fa-solid fa-circle-check"></i>
                                        {{ $badgeText }}
                                    </span>
                                </div>

                                <div class="small-service-info">
                                    <div class="small-service-info-row">
                                        <i class="fa-solid fa-location-dot"></i>
                                        <div>
                                            <strong>{{ $language === 'Odia' ? 'ଠିକଣା' : 'Address' }}</strong>
                                            {{ $address }}
                                        </div>
                                    </div>

                                    @if (!empty($service->opening_time) || !empty($service->closing_time))
                                        <div class="small-service-info-row">
                                            <i class="fa-solid fa-clock"></i>
                                            <div>
                                                <strong>{{ $language === 'Odia' ? 'ସମୟ' : 'Timing' }}</strong>
                                                {{ $service->opening_time ?? 'N/A' }} -
                                                {{ $service->closing_time ?? 'N/A' }}
                                            </div>
                                        </div>
                                    @endif

                                    @if (!empty($service->contact_no))
                                        <div class="small-service-info-row">
                                            <i class="fa-solid fa-phone"></i>
                                            <div>
                                                <strong>{{ $language === 'Odia' ? 'ଯୋଗାଯୋଗ' : 'Contact' }}</strong>
                                                {{ $service->contact_no }}
                                            </div>
                                        </div>
                                    @endif
                                </div>

                                @if (!empty($mapUrl))
                                    <a href="{{ $mapUrl }}" class="small-service-btn" target="_blank"
                                        rel="noopener noreferrer">
                                        <i class="fa-solid fa-location-arrow"></i>
                                        {{ $language === 'Odia' ? 'ଦିଗ ନିର୍ଦ୍ଦେଶ' : 'Directions' }}
                                    </a>
                                @else
                                    <a href="javascript:void(0)" class="small-service-btn disabled">
                                        <i class="fa-solid fa-location-arrow"></i>
                                        {{ $language === 'Odia' ? 'ଲିଙ୍କ ନାହିଁ' : 'No Direction Link' }}
                                    </a>
                                @endif
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
            @else
                <div class="{{ $isPolicePage ? 'police-grid' : ($isHospitalPage ? 'hospital-grid' : 'service-grid') }}">
                    @forelse ($services as $service)
                        @php
                            $photos = $getServicePhotos($service->photo ?? null);
                            $firstPhoto = $photos[0] ?? null;
                            $imageData = $firstPhoto
                                ? $serviceImageData($firstPhoto)
                                : ['url' => $fallbackImage, 'found' => false];

                            $servicePhoto = $imageData['url'];
                            $hasValidImage = $imageData['found'];

                            $addressParts = array_filter([
                                $service->landmark ?? null,
                                $service->city_village ?? null,
                                $service->district ?? null,
                                $service->state ?? null,
                            ]);

                            $address = count($addressParts) ? implode(', ', $addressParts) : 'N/A';

                            $serviceTypeKey = strtolower(
                                str_replace('_', ' ', $service->service_type ?? $service_type),
                            );

                            $serviceTypeText = ucwords($serviceTypeKey);
                            $serviceTypeIcon =
                                $serviceTypeIconMap[$serviceTypeKey] ?? 'fa-solid fa-building-circle-check';

                            $isChargingStation = $serviceTypeKey === 'charging station';
                            $isPoliceService = in_array($serviceTypeKey, ['police station', 'police outpost']);
                            $isHospitalService = $serviceTypeKey === 'hospital';

                            $showPoliceLogoCard = $isPoliceService && !$hasValidImage;
                            $showHospitalLogoCard = $isHospitalService && !$hasValidImage;

                            $mapUrl =
                                $service->google_map_link ?? ($service->map_url ?? ($service->google_map_url ?? null));
                        @endphp

                        @if ($showPoliceLogoCard)
                            <article class="police-logo-card">
                                <div class="police-icon-wrap">
                                    <div class="police-icon">
                                        <i class="{{ $serviceTypeIcon }}"></i>
                                    </div>

                                    <span class="police-status">
                                        <i class="fa-solid fa-circle-check"></i>
                                        {{ $language === 'Odia' ? 'ଉପଲବ୍ଧ' : 'Available' }}
                                    </span>
                                </div>

                                <div class="police-mobile-content">
                                    <h5 class="police-title">{{ $service->service_name ?? $localizedTitle }}</h5>

                                    <div class="police-info">
                                        <div class="police-info-row">
                                            <i class="fa-solid fa-location-dot"></i>
                                            <div>
                                                <strong>{{ $language === 'Odia' ? 'ଠିକଣା' : 'Address' }}</strong>
                                                {{ $address }}
                                            </div>
                                        </div>

                                        @if (!empty($service->contact_no))
                                            <div class="police-info-row">
                                                <i class="fa-solid fa-phone"></i>
                                                <div>
                                                    <strong>{{ $language === 'Odia' ? 'ଯୋଗାଯୋଗ' : 'Contact' }}</strong>
                                                    {{ $service->contact_no }}
                                                </div>
                                            </div>
                                        @endif
                                    </div>

                                    @if (!empty($mapUrl))
                                        <a href="{{ $mapUrl }}" class="police-btn" target="_blank"
                                            rel="noopener noreferrer">
                                            <i class="fa-solid fa-location-arrow"></i>
                                            {{ $language === 'Odia' ? 'ଦିଗ ନିର୍ଦ୍ଦେଶ' : 'Directions' }}
                                        </a>
                                    @else
                                        <a href="javascript:void(0)" class="police-btn disabled">
                                            <i class="fa-solid fa-location-arrow"></i>
                                            {{ $language === 'Odia' ? 'ଲିଙ୍କ ନାହିଁ' : 'No Direction Link' }}
                                        </a>
                                    @endif
                                </div>
                            </article>
                        @elseif ($showHospitalLogoCard)
                            <article class="hospital-logo-card">
                                <div class="hospital-icon-wrap">
                                    <div class="hospital-icon">
                                        <i class="fa-solid fa-hospital"></i>
                                    </div>

                                    <span class="hospital-status">
                                        <i class="fa-solid fa-briefcase-medical"></i>
                                        {{ $language === 'Odia' ? 'ସ୍ୱାସ୍ଥ୍ୟ ସେବା' : 'Medical' }}
                                    </span>
                                </div>

                                <div class="hospital-mobile-content">
                                    <h5 class="hospital-title">{{ $service->service_name ?? $localizedTitle }}</h5>

                                    <div class="hospital-info">
                                        <div class="hospital-info-row">
                                            <i class="fa-solid fa-location-dot"></i>
                                            <div>
                                                <strong>{{ $language === 'Odia' ? 'ଠିକଣା' : 'Address' }}</strong>
                                                {{ $address }}
                                            </div>
                                        </div>

                                        @if (!empty($service->description))
                                            <div class="hospital-info-row">
                                                <i class="fa-solid fa-notes-medical"></i>
                                                <div>
                                                    <strong>{{ $language === 'Odia' ? 'ସେବା' : 'Service' }}</strong>
                                                    {{ $service->description }}
                                                </div>
                                            </div>
                                        @endif

                                        @if (!empty($service->contact_no))
                                            <div class="hospital-info-row">
                                                <i class="fa-solid fa-phone"></i>
                                                <div>
                                                    <strong>{{ $language === 'Odia' ? 'ଯୋଗାଯୋଗ' : 'Contact' }}</strong>
                                                    {{ $service->contact_no }}
                                                </div>
                                            </div>
                                        @endif
                                    </div>

                                    @if (!empty($mapUrl))
                                        <a href="{{ $mapUrl }}" class="hospital-btn" target="_blank"
                                            rel="noopener noreferrer">
                                            <i class="fa-solid fa-location-arrow"></i>
                                            {{ $language === 'Odia' ? 'ଦିଗ ନିର୍ଦ୍ଦେଶ' : 'Directions' }}
                                        </a>
                                    @else
                                        <a href="javascript:void(0)" class="hospital-btn disabled">
                                            <i class="fa-solid fa-location-arrow"></i>
                                            {{ $language === 'Odia' ? 'ଲିଙ୍କ ନାହିଁ' : 'No Direction Link' }}
                                        </a>
                                    @endif
                                </div>
                            </article>
                        @else
                            <article class="service-card-new{{ $isChargingStation ? ' charging-station' : '' }}">
                                <div class="service-image-wrap">
                                    <img src="{{ $servicePhoto }}"
                                        alt="{{ $service->service_name ?? $localizedTitle }}" class="service-image"
                                        onerror="this.onerror=null; this.src='{{ $fallbackImage }}'; this.classList.add('fallback-img');">

                                    <div class="service-tag">
                                        <i class="{{ $serviceTypeIcon }}"></i>
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

                                        @if (!empty($service->description))
                                            <div class="info-row">
                                                <i class="fa-solid fa-circle-info"></i>
                                                <div>
                                                    <strong>{{ $language === 'Odia' ? 'ବିବରଣୀ' : 'Details' }}</strong>
                                                    {{ $service->description }}
                                                </div>
                                            </div>
                                        @endif

                                        @if (!empty($service->opening_time) || !empty($service->closing_time))
                                            <div class="info-row">
                                                <i class="fa-solid fa-clock"></i>
                                                <div>
                                                    <strong>{{ $language === 'Odia' ? 'ସମୟ' : 'Timing' }}</strong>
                                                    {{ $service->opening_time ?? 'N/A' }} -
                                                    {{ $service->closing_time ?? 'N/A' }}
                                                </div>
                                            </div>
                                        @endif

                                        @if (!empty($service->contact_no))
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
                                        @if (!empty($mapUrl))
                                            <a href="{{ $mapUrl }}" class="action-btn" target="_blank"
                                                rel="noopener noreferrer">
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
                        @endif
                    @empty
                        <div class="empty-box">
                            <i class="fa-solid fa-circle-exclamation"></i>
                            <h3>{{ $language === 'Odia' ? 'କୌଣସି ସେବା ମିଳିଲା ନାହିଁ' : 'No Services Found' }}</h3>
                            <p>{{ $language === 'Odia' ? 'ଦୟାକରି ପରେ ପୁଣି ଯାଞ୍ଚ କରନ୍ତୁ।' : 'Please check again later.' }}</p>
                        </div>
                    @endforelse
                </div>
            @endif
        </main>
    </div>

</body>

</html>

