@extends('website.web-layouts')

@section('content')
    <style>
        .temple-convenience {
            width: 100%;
            min-height: 100vh;
            padding: 14px 12px 38px;
            background:
                radial-gradient(circle at top left, rgba(255, 154, 64, 0.13), transparent 30%),
                radial-gradient(circle at top right, rgba(52, 21, 81, 0.09), transparent 28%),
                linear-gradient(180deg, #fff8f3 0%, #ffffff 48%, #fffaf7 100%);
            overflow: hidden;
        }

        .ratha-header {
            width: 100%;
            max-width: 520px;
            margin: 8px auto 24px;
            position: relative;
            animation: headerDrop 0.65s ease both;
        }

        .ratha-header-card {
            position: relative;
            overflow: hidden;
            border-radius: 28px;
            padding: 18px 15px 16px;
            background:
                radial-gradient(circle at 92% 8%, rgba(255, 218, 121, 0.32), transparent 28%),
                radial-gradient(circle at 8% 95%, rgba(255, 122, 26, 0.22), transparent 32%),
                linear-gradient(135deg, #341551 0%, #8b2348 44%, #db4d30 74%, #ff7a1a 100%);
            box-shadow:
                0 20px 38px rgba(52, 21, 81, 0.24),
                inset 0 1px 0 rgba(255, 255, 255, 0.20);
        }

        .ratha-header-card::before {
            content: "";
            position: absolute;
            width: 150px;
            height: 150px;
            right: -55px;
            top: -58px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.11);
        }

        .ratha-header-card::after {
            content: "";
            position: absolute;
            width: 115px;
            height: 115px;
            left: -48px;
            bottom: -48px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.10);
        }

        .ratha-shine {
            position: absolute;
            top: -70%;
            left: -65%;
            width: 48%;
            height: 240%;
            background: linear-gradient(120deg, transparent, rgba(255, 255, 255, 0.28), transparent);
            transform: rotate(18deg);
            animation: titleShine 4s ease-in-out infinite;
            z-index: 1;
        }

        .ratha-top-row {
            position: relative;
            z-index: 2;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
            margin-bottom: 14px;
        }

        .ratha-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 7px 12px;
            border-radius: 999px;
            background: rgba(255, 255, 255, 0.16);
            color: #fff4df;
            font-size: 10.5px;
            line-height: 1;
            font-weight: 900;
            letter-spacing: 0.7px;
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
            border: 1px solid rgba(255, 255, 255, 0.18);
            white-space: nowrap;
        }

        .ratha-badge i {
            color: #ffd66b;
            font-size: 12px;
        }

        .language-selector-box {
            display: flex;
            align-items: center;
            gap: 6px;
            padding: 5px;
            border-radius: 999px;
            background: rgba(255, 255, 255, 0.16);
            border: 1px solid rgba(255, 255, 255, 0.16);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
        }

        .language-check-label {
            margin: 0;
            cursor: pointer;
        }

        .language-check-label input {
            display: none;
        }

        .language-check-label span {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 6px 9px;
            border-radius: 999px;
            font-size: 10.5px;
            line-height: 1;
            font-weight: 900;
            color: #ffffff;
            background: rgba(255, 255, 255, 0.10);
            border: 1px solid rgba(255, 255, 255, 0.16);
            transition: all 0.25s ease;
            white-space: nowrap;
        }

        .language-check-label span::before {
            content: "";
            width: 12px;
            height: 12px;
            border-radius: 4px;
            border: 2px solid rgba(255, 255, 255, 0.85);
            background: rgba(255, 255, 255, 0.10);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 8px;
            line-height: 1;
        }

        .language-check-label input:checked+span {
            color: #db4d30;
            background: #ffffff;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.16);
        }

        .language-check-label input:checked+span::before {
            content: "✓";
            color: #ffffff;
            background: linear-gradient(135deg, #ff7a1a, #db4d30);
            border-color: #db4d30;
        }

        .ratha-main {
            position: relative;
            z-index: 2;
            display: flex;
            align-items: center;
            gap: 14px;
        }

        /* Updated Transparent Glass Morphism Logo Box */
        .ratha-logo-box {
            width: 104px;
            height: 104px;
            min-width: 104px;
            border-radius: 30px;

            display: flex;
            align-items: center;
            justify-content: center;

            background: rgba(255, 255, 255, 0.14);
            border: 1px solid rgba(255, 255, 255, 0.32);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);

            box-shadow:
                0 18px 36px rgba(0, 0, 0, 0.24),
                inset 0 1px 0 rgba(255, 255, 255, 0.42),
                inset 0 -1px 0 rgba(255, 255, 255, 0.12);

            animation: logoFloat 3s ease-in-out infinite;
            overflow: hidden;
            position: relative;
        }

        .ratha-logo-box::before {
            content: "";
            position: absolute;
            inset: 0;
            border-radius: inherit;
            background:
                radial-gradient(circle at 28% 20%, rgba(255, 255, 255, 0.35), transparent 32%),
                linear-gradient(145deg, rgba(255, 255, 255, 0.18), rgba(255, 255, 255, 0.04));
            pointer-events: none;
        }

        .ratha-logo-box img {
            width: 98px;
            height: 98px;
            object-fit: contain;
            display: block;
            position: relative;
            z-index: 2;

            background: transparent;
            mix-blend-mode: multiply;

            filter:
                drop-shadow(0 8px 12px rgba(0, 0, 0, 0.26)) saturate(1.35) contrast(1.12) brightness(1.08);
        }

        .ratha-title-area {
            flex: 1;
            min-width: 0;
        }

        .ratha-small-text {
            display: block;
            margin-bottom: 7px;
            color: #ffe9bd;
            font-size: 11px;
            line-height: 1;
            font-weight: 900;
            letter-spacing: 0.8px;
        }

        .ratha-title {
            margin: 0;
            display: inline-flex;
            align-items: center;
            padding: 9px 13px;
            border-radius: 16px;
            color: #341551;
            background: linear-gradient(135deg, #ffffff, #ffe8d8);
            font-size: 22px;
            line-height: 1.12;
            font-weight: 1000;
            letter-spacing: -0.4px;
            box-shadow:
                0 12px 22px rgba(0, 0, 0, 0.14),
                inset 0 1px 0 rgba(255, 255, 255, 0.9);
        }

        .ratha-subtitle {
            margin: 9px 0 0;
            color: rgba(255, 255, 255, 0.86);
            font-size: 12px;
            line-height: 1.45;
            font-weight: 600;
        }

        .ratha-chip-row {
            position: relative;
            z-index: 2;
            display: flex;
            gap: 7px;
            margin-top: 15px;
            overflow-x: auto;
            scrollbar-width: none;
        }

        .ratha-chip-row::-webkit-scrollbar {
            display: none;
        }

        .ratha-chip {
            padding: 7px 11px;
            border-radius: 999px;
            background: rgba(255, 255, 255, 0.15);
            color: #ffffff;
            font-size: 11px;
            font-weight: 900;
            white-space: nowrap;
            border: 1px solid rgba(255, 255, 255, 0.16);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
        }

        .convenience-container {
            width: 100%;
            max-width: 520px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
            padding: 5px 2px;
        }

        .conv {
            animation: cardPop 0.6s ease both;
        }

        .conv:nth-child(1) {
            animation-delay: 0.05s;
        }

        .conv:nth-child(2) {
            animation-delay: 0.10s;
        }

        .conv:nth-child(3) {
            animation-delay: 0.15s;
        }

        .conv:nth-child(4) {
            animation-delay: 0.20s;
        }

        .conv:nth-child(5) {
            animation-delay: 0.25s;
        }

        .conv:nth-child(6) {
            animation-delay: 0.30s;
        }

        .conv:nth-child(7) {
            animation-delay: 0.35s;
        }

        .conv:nth-child(8) {
            animation-delay: 0.40s;
        }

        .conv:nth-child(9) {
            animation-delay: 0.45s;
        }

        .conv:nth-child(10) {
            animation-delay: 0.50s;
        }

        .conv:nth-child(11) {
            animation-delay: 0.55s;
        }

        .conv:nth-child(12) {
            animation-delay: 0.60s;
        }

        .conv a {
            min-height: 128px;
            padding: 16px 12px;
            border-radius: 22px;
            background: linear-gradient(145deg, #ffffff, #fff4ee);
            box-shadow:
                0 12px 22px rgba(52, 21, 81, 0.12),
                inset 0 1px 0 rgba(255, 255, 255, 0.9);
            border: 1px solid rgba(219, 77, 48, 0.08);
            text-decoration: none;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            position: relative;
            overflow: hidden;
            transform-style: preserve-3d;
            transition: all 0.35s ease;
        }

        .conv a::before {
            content: "";
            position: absolute;
            top: -55%;
            left: -75%;
            width: 70%;
            height: 190%;
            background: linear-gradient(120deg, transparent, rgba(255, 255, 255, 0.85), transparent);
            transform: rotate(18deg);
            transition: all 0.65s ease;
        }

        .conv a::after {
            content: "";
            position: absolute;
            right: -28px;
            bottom: -28px;
            width: 82px;
            height: 82px;
            border-radius: 50%;
            background: rgba(244, 123, 32, 0.10);
            z-index: 0;
        }

        .conv a:hover,
        .conv a:active {
            transform: translateY(-6px) rotateX(4deg) rotateY(-4deg) scale(1.02);
            box-shadow:
                0 18px 30px rgba(52, 21, 81, 0.18),
                inset 0 1px 0 rgba(255, 255, 255, 0.95);
        }

        .conv a:hover::before,
        .conv a:active::before {
            left: 130%;
        }

        .convenience-card-top {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 8px;
            position: relative;
            z-index: 2;
        }

        .convenience-text {
            flex: 1;
            min-width: 0;
        }

        .convenience-text h3 {
            font-size: 16px;
            line-height: 1.18;
            font-weight: 900;
            color: #282828;
            margin: 0 0 5px;
        }

        .convenience-text span {
            display: block;
            font-size: 12px;
            line-height: 1.25;
            font-weight: 500;
            color: #777777;
        }

        .convenience-item {
            width: 48px;
            height: 48px;
            min-width: 48px;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(145deg, #ffefe6, #ffffff);
            box-shadow:
                0 8px 14px rgba(219, 77, 48, 0.14),
                inset 0 -2px 6px rgba(244, 123, 32, 0.10);
            position: relative;
            z-index: 2;
            animation: iconFloat 2.8s ease-in-out infinite;
        }

        .convenience-item img,
        .convenience-item svg {
            max-width: 34px;
            max-height: 34px;
            object-fit: contain;
            filter: drop-shadow(0 4px 5px rgba(0, 0, 0, 0.12));
        }

        .free-food-icon svg {
            width: 34px;
            height: 34px;
        }

        .card-arrow {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background: linear-gradient(135deg, #f47b20, #db4d30);
            color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 17px;
            font-weight: 900;
            position: relative;
            z-index: 2;
            box-shadow: 0 8px 15px rgba(219, 77, 48, 0.22);
            align-self: flex-end;
            transition: all 0.3s ease;
        }

        .conv a:hover .card-arrow,
        .conv a:active .card-arrow {
            transform: translateX(4px);
        }

        @keyframes headerDrop {
            0% {
                opacity: 0;
                transform: translateY(-16px) scale(0.96);
            }

            100% {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        @keyframes logoFloat {

            0%,
            100% {
                transform: translateY(0) scale(1);
            }

            50% {
                transform: translateY(-5px) scale(1.04);
            }
        }

        @keyframes cardPop {
            0% {
                opacity: 0;
                transform: translateY(24px) scale(0.96);
            }

            100% {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        @keyframes iconFloat {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-5px);
            }
        }

        @keyframes titleShine {
            0% {
                left: -55%;
            }

            45%,
            100% {
                left: 130%;
            }
        }

        @media (max-width: 420px) {
            .temple-convenience {
                padding: 13px 10px 35px;
            }

            .ratha-header-card {
                border-radius: 24px;
                padding: 15px 13px 14px;
            }

            .ratha-top-row {
                align-items: flex-start;
                gap: 8px;
            }

            .ratha-badge {
                padding: 7px 9px;
                font-size: 9.5px;
            }

            .language-selector-box {
                gap: 4px;
                padding: 4px;
            }

            .language-check-label span {
                padding: 6px 8px;
                font-size: 10px;
            }

            .ratha-main {
                gap: 11px;
            }

            .ratha-logo-box {
                width: 86px;
                height: 86px;
                min-width: 86px;
                border-radius: 26px;
                background: rgba(255, 255, 255, 0.14);
                backdrop-filter: blur(16px);
                -webkit-backdrop-filter: blur(16px);
            }

            .ratha-logo-box img {
                width: 80px;
                height: 80px;
            }

            .ratha-title {
                font-size: 19px;
                padding: 8px 11px;
                border-radius: 14px;
            }

            .ratha-subtitle {
                font-size: 11px;
                line-height: 1.4;
            }

            .convenience-container {
                gap: 13px;
            }

            .conv a {
                min-height: 122px;
                padding: 14px 10px;
                border-radius: 20px;
            }

            .convenience-text h3 {
                font-size: 15px;
            }

            .convenience-text span {
                font-size: 11px;
            }

            .convenience-item {
                width: 44px;
                height: 44px;
                min-width: 44px;
                border-radius: 15px;
            }

            .convenience-item img,
            .convenience-item svg {
                max-width: 31px;
                max-height: 31px;
            }

            .card-arrow {
                width: 28px;
                height: 28px;
                font-size: 15px;
            }
        }

        @media (max-width: 340px) {
            .ratha-main {
                align-items: flex-start;
            }

            .ratha-logo-box {
                width: 74px;
                height: 74px;
                min-width: 74px;
                border-radius: 22px;
            }

            .ratha-logo-box img {
                width: 68px;
                height: 68px;
            }

            .ratha-title {
                font-size: 17px;
            }

            .ratha-badge {
                font-size: 9px;
            }

            .language-check-label span {
                padding: 5px 7px;
                font-size: 9.5px;
            }

            .convenience-container {
                gap: 10px;
            }

            .conv a {
                padding: 12px 9px;
            }

            .convenience-text h3 {
                font-size: 14px;
            }

            .ratha-chip {
                font-size: 10px;
                padding: 6px 9px;
            }
        }

        .convenience-item .fa-card-icon {
    color: #db4d30;
    font-size: 27px;
    filter: drop-shadow(0 4px 5px rgba(0, 0, 0, 0.12));
}

@media (max-width: 420px) {
    .convenience-item .fa-card-icon {
        font-size: 24px;
    }
}
    </style>

    @php
        $language = request('language', $language ?? session('language', 'English'));
        $language = $language === 'Odia' ? 'Odia' : 'English';
        $langQuery = 'language=' . urlencode($language);

        $cards = [
            [
                'url' => route('parking.list'),
                'title1' => $language === 'Odia' ? 'ପାର୍କିଂ' : 'Parking',
                'title2' => $language === 'Odia' ? 'ସ୍ଥଳ' : 'Areas',
                'desc' => $language === 'Odia' ? '୨, ୩, ୪ ଚକା ବାହନ' : '2, 3, 4 Wheelers',
                'icon' => asset('website/park.png'),
                'alt' => 'Parking',
                'type' => 'image',
            ],
            [
                'url' => route('lockershoe.list'),
                'title1' => $language === 'Odia' ? 'ଲକର ଓ' : 'Locker &',
                'title2' => $language === 'Odia' ? 'ଜୋତା ଷ୍ଟାଣ୍ଡ' : 'Shoe Stand',
                'desc' => $language === 'Odia' ? 'ନିଃଶୁଳ୍କ ସେବା' : 'Free Services',
                'icon' => asset('website/lck.png'),
                'alt' => 'Locker and Shoe Stand',
                'type' => 'image',
            ],
            [
                'url' => route('services.byType', 'toilet'),
                'title1' => $language === 'Odia' ? 'ସାଧାରଣ' : 'Public',
                'title2' => $language === 'Odia' ? 'ଶୌଚାଳୟ' : 'Toilet',
                'desc' => $language === 'Odia' ? 'ନିକଟସ୍ଥ ଶୌଚାଳୟ ସୁବିଧା' : 'Nearby toilet facility',
                'icon' => asset('website/latin.png'),
                'alt' => 'Toilet',
                'type' => 'image',
            ],
            [
                'url' => route('services.byType', 'drinking_water'),
                'title1' => $language === 'Odia' ? 'ପାନୀୟ' : 'Drinking',
                'title2' => $language === 'Odia' ? 'ଜଳ' : 'Water',
                'desc' => $language === 'Odia' ? 'ନିକଟସ୍ଥ ପାଣି ସୁବିଧା' : 'Find nearby water points',
                'icon' => asset('website/drinkingWater32.png'),
                'alt' => 'Drinking Water',
                'type' => 'image',
            ],
            [
                'url' => route('services.byType', 'free_food'),
                'title1' => $language === 'Odia' ? 'ମାଗଣା' : 'Free',
                'title2' => $language === 'Odia' ? 'ଖାଦ୍ୟ' : 'Food',
                'desc' => $language === 'Odia' ? 'ଭକ୍ତମାନଙ୍କ ପାଇଁ ସେବା' : 'Food facility for devotees',
                'icon' => '',
                'alt' => 'Free Food',
                'type' => 'food',
            ],
            [
                'url' => route('bhaktanibas.list'),
                'title1' => $language === 'Odia' ? 'ଭକ୍ତ' : 'Bhakta',
                'title2' => $language === 'Odia' ? 'ନିବାସ' : 'Nivas',
                'desc' => $language === 'Odia' ? 'ତୀର୍ଥଯାତ୍ରୀଙ୍କ ରହିବା ସ୍ଥାନ' : 'Properties for pilgrims',
                'icon' => asset('website/niwas.png'),
                'alt' => 'Bhakta Nivas',
                'type' => 'image',
            ],
            [
                'url' => route('services.emergency'),
                'title1' => $language === 'Odia' ? 'ଜରୁରୀ' : 'Emergency',
                'title2' => $language === 'Odia' ? 'ସହାୟତା' : 'Help',
                'desc' => $language === 'Odia' ? 'ତୁରନ୍ତ ସହାୟତା ସମ୍ପର୍କ' : 'Quick support contacts',
                'icon' => asset('website/ph.png'),
                'alt' => 'Emergency',
                'type' => 'image',
            ],
            [
                'url' => route('services.abled_person'),
                'title1' => $language === 'Odia' ? 'ଦିବ୍ୟାଙ୍ଗ' : 'Special',
                'title2' => $language === 'Odia' ? 'ସହାୟତା' : 'Abled',
                'desc' => $language === 'Odia' ? 'ସହାୟତା ସୁବିଧା' : 'Assistance facilities',
                'icon' => asset('website/physical21.png'),
                'alt' => 'Special Abled',
                'type' => 'image',
            ],
            [
                'url' =>
                    'https://www.google.com/maps/dir/?api=1&destination=Shree%20Jagannath%20Temple%2C%20Puri%2C%20Odisha%2C%20India&travelmode=driving',
                'title1' => $language === 'Odia' ? 'ରୁଟ' : 'Route',
                'title2' => $language === 'Odia' ? 'ମାନଚିତ୍ର' : 'Map',
                'desc' => $language === 'Odia' ? 'ଶ୍ରୀମନ୍ଦିରକୁ ରୁଟ ଦେଖନ୍ତୁ' : 'Route to Shree Jagannath Temple',
                'icon' => asset('website/map.png'),
                'alt' => 'Route Map',
                'type' => 'image',
                'external' => true,
            ],
            [
                'url' => route('services.byType', 'lost_and_found_booth'),
                'title1' => $language === 'Odia' ? 'ହଜିଥିବା' : 'Lost &',
                'title2' => $language === 'Odia' ? 'ସାମଗ୍ରୀ' : 'Found',
                'desc' => $language === 'Odia' ? 'ସାମଗ୍ରୀ ଖୋଜନ୍ତୁ କିମ୍ବା ଜଣାନ୍ତୁ' : 'Report or find items',
                'icon' => asset('website/lost.png'),
                'alt' => 'Lost and Found',
                'type' => 'image',
            ],
            [
                'url' => route('services.byType', 'beach'),
                'title1' => $language === 'Odia' ? 'ପୁରୀ' : 'Puri',
                'title2' => $language === 'Odia' ? 'ବେଳାଭୂମି' : 'Beaches',
                'desc' => $language === 'Odia' ? 'ବେଳାଭୂମି ଅଞ୍ଚଳ ଦେଖନ୍ତୁ' : 'Explore beach areas',
                'icon' => asset('website/sea.png'),
                'alt' => 'Beaches',
                'type' => 'image',
            ],
            [
                'url' => route('services.byType', 'life_guard_booth'),
                'title1' => $language === 'Odia' ? 'ଲାଇଫ' : 'Life',
                'title2' => $language === 'Odia' ? 'ଗାର୍ଡ' : 'Guards',
                'desc' => $language === 'Odia' ? 'ସୁରକ୍ଷା ବୁଥ ବିବରଣୀ' : 'Safety booth details',
                'icon' => asset('website/guard.png'),
                'alt' => 'Life Guards',
                'type' => 'image',
            ],
            [
                'url' => $serviceUrl('atm'),
                'title1' => $language === 'Odia' ? 'ଏଟିଏମ୍' : 'ATM',
                'title2' => $language === 'Odia' ? 'ସୁବିଧା' : 'Facility',
                'desc' => $language === 'Odia' ? 'ନିକଟସ୍ଥ ଏଟିଏମ୍ ଖୋଜନ୍ତୁ' : 'Find nearby ATM points',
                'icon' => 'fa-solid fa-building-columns',
                'alt' => 'ATM',
                'type' => 'fa',
            ],
            [
                'url' => $serviceUrl('petrol_pump'),
                'title1' => $language === 'Odia' ? 'ପେଟ୍ରୋଲ' : 'Petrol',
                'title2' => $language === 'Odia' ? 'ପମ୍ପ' : 'Pump',
                'desc' => $language === 'Odia' ? 'ନିକଟସ୍ଥ ଇନ୍ଧନ ସୁବିଧା' : 'Nearby fuel stations',
                'icon' => 'fa-solid fa-gas-pump',
                'alt' => 'Petrol Pump',
                'type' => 'fa',
            ],
            [
                'url' => $serviceUrl('bus_stand'),
                'title1' => $language === 'Odia' ? 'ବସ୍' : 'Bus',
                'title2' => $language === 'Odia' ? 'ଷ୍ଟାଣ୍ଡ' : 'Stand',
                'desc' => $language === 'Odia' ? 'ବସ୍ ଷ୍ଟାଣ୍ଡ ଓ ରୁଟ ସୂଚନା' : 'Bus stand and route info',
                'icon' => 'fa-solid fa-bus',
                'alt' => 'Bus Stand',
                'type' => 'fa',
            ],
            [
                'url' => $serviceUrl('railway_station'),
                'title1' => $language === 'Odia' ? 'ରେଳୱେ' : 'Railway',
                'title2' => $language === 'Odia' ? 'ଷ୍ଟେସନ୍' : 'Station',
                'desc' => $language === 'Odia' ? 'ରେଳ ଷ୍ଟେସନ୍ ଦିଗ ନିର୍ଦ୍ଦେଶ' : 'Railway station directions',
                'icon' => 'fa-solid fa-train-subway',
                'alt' => 'Railway Station',
                'type' => 'fa',
            ],
            [
                'url' => $serviceUrl('police_station'),
                'title1' => $language === 'Odia' ? 'ପୋଲିସ୍' : 'Police',
                'title2' => $language === 'Odia' ? 'ଷ୍ଟେସନ୍' : 'Station',
                'desc' => $language === 'Odia' ? 'ସୁରକ୍ଷା ସହାୟତା ସୂଚନା' : 'Security help information',
                'icon' => 'fa-solid fa-shield-halved',
                'alt' => 'Police Station',
                'type' => 'fa',
            ],

              [
            'url' => $serviceUrl('atm'),
            'title1' => $language === 'Odia' ? 'ଏଟିଏମ୍' : 'ATM',
            'title2' => $language === 'Odia' ? 'ସୁବିଧା' : 'Facility',
            'desc' => $language === 'Odia' ? 'ନିକଟସ୍ଥ ଏଟିଏମ୍ ଖୋଜନ୍ତୁ' : 'Find nearby ATM points',
            'icon' => 'fa-solid fa-building-columns',
            'alt' => 'ATM',
            'type' => 'fa',
        ],
        [
            'url' => $serviceUrl('petrol_pump'),
            'title1' => $language === 'Odia' ? 'ପେଟ୍ରୋଲ' : 'Petrol',
            'title2' => $language === 'Odia' ? 'ପମ୍ପ' : 'Pump',
            'desc' => $language === 'Odia' ? 'ନିକଟସ୍ଥ ଇନ୍ଧନ ସୁବିଧା' : 'Nearby fuel stations',
            'icon' => 'fa-solid fa-gas-pump',
            'alt' => 'Petrol Pump',
            'type' => 'fa',
        ],
        [
            'url' => $serviceUrl('bus_stand'),
            'title1' => $language === 'Odia' ? 'ବସ୍' : 'Bus',
            'title2' => $language === 'Odia' ? 'ଷ୍ଟାଣ୍ଡ' : 'Stand',
            'desc' => $language === 'Odia' ? 'ବସ୍ ଷ୍ଟାଣ୍ଡ ଓ ରୁଟ ସୂଚନା' : 'Bus stand and route info',
            'icon' => 'fa-solid fa-bus',
            'alt' => 'Bus Stand',
            'type' => 'fa',
        ],
        [
            'url' => $serviceUrl('railway_station'),
            'title1' => $language === 'Odia' ? 'ରେଳୱେ' : 'Railway',
            'title2' => $language === 'Odia' ? 'ଷ୍ଟେସନ୍' : 'Station',
            'desc' => $language === 'Odia' ? 'ରେଳ ଷ୍ଟେସନ୍ ଦିଗ ନିର୍ଦ୍ଦେଶ' : 'Railway station directions',
            'icon' => 'fa-solid fa-train-subway',
            'alt' => 'Railway Station',
            'type' => 'fa',
        ],
        [
            'url' => $serviceUrl('police_station'),
            'title1' => $language === 'Odia' ? 'ପୋଲିସ୍' : 'Police',
            'title2' => $language === 'Odia' ? 'ଷ୍ଟେସନ୍' : 'Station',
            'desc' => $language === 'Odia' ? 'ସୁରକ୍ଷା ସହାୟତା ସୂଚନା' : 'Security help information',
            'icon' => 'fa-solid fa-shield-halved',
            'alt' => 'Police Station',
            'type' => 'fa',
        ],
        ];
    @endphp

    <section class="temple-convenience">

        <div class="ratha-header">
            <div class="ratha-header-card">
                <div class="ratha-shine"></div>

                <div class="ratha-top-row">
                    <div class="ratha-badge">
                        <i class="fa-solid fa-flag"></i>
                        {{ $language === 'Odia' ? 'ଜୟ ଶ୍ରୀ ଜଗନ୍ନାଥ' : 'JAY SHREE JAGANNATHA' }}
                    </div>

                    <div class="language-selector-box">
                        <label class="language-check-label">
                            <input type="checkbox" class="language-check" value="English"
                                {{ $language === 'English' ? 'checked' : '' }}>
                            <span>English</span>
                        </label>

                        <label class="language-check-label">
                            <input type="checkbox" class="language-check" value="Odia"
                                {{ $language === 'Odia' ? 'checked' : '' }}>
                            <span>ଓଡ଼ିଆ</span>
                        </label>
                    </div>
                </div>

                <div class="ratha-main">
                    <div class="ratha-logo-box">
                        <img src="{{ asset('website/logoo.png') }}" alt="Shree Jagannath Logo">
                    </div>

                    <div class="ratha-title-area">
                        <span class="ratha-small-text">
                            {{ $language === 'Odia' ? 'ଭକ୍ତ ସୁବିଧା ଗାଇଡ୍' : 'DEVOTEE FACILITY GUIDE' }}
                        </span>

                        <h2 class="ratha-title">
                            {{ $language === 'Odia' ? 'ରଥ ଯାତ୍ରା - ୨୦୨୬' : 'Ratha Yatra - 2026' }}
                        </h2>

                        <p class="ratha-subtitle">
                            {{ $language === 'Odia' ? 'ଶ୍ରୀ ଜଗନ୍ନାଥ ଧାମ ପାଖରେ ଆବଶ୍ୟକ ସୁବିଧା ସହଜରେ ଖୋଜନ୍ତୁ।' : 'Find important facilities around Shree Jagannatha Dham easily.' }}
                        </p>
                    </div>
                </div>

            </div>
        </div>

        <div class="convenience-container">

            @foreach ($cards as $card)
                <div class="conv">
                    <a href="{{ !empty($card['external']) ? $card['url'] : $card['url'] . '?' . $langQuery }}"
                        @if (!empty($card['external'])) target="_blank" rel="noopener noreferrer" @endif>
                        <div class="convenience-card-top">
                            <div class="convenience-text">
                                <h3>
                                    {{ $card['title1'] }}<br>
                                    {{ $card['title2'] }}
                                </h3>
                                <span>{{ $card['desc'] }}</span>
                            </div>

                            <div class="convenience-item {{ $card['type'] === 'food' ? 'free-food-icon' : '' }}">
                                @if ($card['type'] === 'food')
                                    <svg viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg" aria-label="Free Food Icon">
                                        <circle cx="32" cy="32" r="29" fill="#fff3e8" />
                                        <path d="M18 33c0-8.2 6.3-14.8 14-14.8S46 24.8 46 33H18Z" fill="#ff7a1a" />
                                        <path d="M15 34h34c0 8.6-7.6 15.8-17 15.8S15 42.6 15 34Z" fill="#db4d30" />
                                        <path d="M19 34h26" stroke="#ffffff" stroke-width="3.5" stroke-linecap="round" />
                                        <path d="M24 15c0-3.2 2.6-5.8 5.8-5.8h4.4c3.2 0 5.8 2.6 5.8 5.8" fill="none"
                                            stroke="#db4d30" stroke-width="4" stroke-linecap="round" />
                                        <path d="M48 20v18" stroke="#ff7a1a" stroke-width="4" stroke-linecap="round" />
                                        <path d="M54 20v18" stroke="#db4d30" stroke-width="4" stroke-linecap="round" />
                                        <path d="M10 20v10c0 3 2.4 5.4 5.4 5.4H17V20" fill="none" stroke="#ff7a1a"
                                            stroke-width="4" stroke-linecap="round" />
                                    </svg>
                                @else
                                    <img src="{{ $card['icon'] }}" alt="{{ $card['alt'] }}">
                                @endif
                            </div>
                        </div>

                        <div class="card-arrow">›</div>
                    </a>
                </div>
            @endforeach

        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const languageChecks = document.querySelectorAll('.language-check');

            languageChecks.forEach(function(checkbox) {
                checkbox.addEventListener('change', function() {
                    if (!this.checked) {
                        this.checked = true;
                        return;
                    }

                    languageChecks.forEach(function(other) {
                        if (other !== checkbox) {
                            other.checked = false;
                        }
                    });

                    const url = new URL(window.location.href);
                    url.searchParams.set('language', this.value);
                    window.location.href = url.toString();
                });
            });
        });
    </script>
@endsection
