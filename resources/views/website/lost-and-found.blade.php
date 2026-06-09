<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Lost and Found</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- FontAwesome + Tailwind -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(180deg, #fff7ed 0%, #f8f3ff 100%);
            overflow-x: hidden;
        }

        .hero-section {
            position: relative;
            min-height: 420px;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            border-radius: 0 0 36px 36px;
        }

        .hero-section::before {
            content: "";
            position: absolute;
            inset: 0;
            background:
                linear-gradient(135deg, rgba(52, 21, 81, 0.92), rgba(219, 77, 48, 0.78)),
                url("{{ asset('website/fest.jpg') }}");
            background-size: cover;
            background-position: center;
            transform: scale(1.04);
        }

        .hero-content {
            position: relative;
            z-index: 2;
            padding: 25px;
            text-align: center;
            color: white;
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

        .main-card {
            background: rgba(255, 255, 255, 0.96);
            border-radius: 28px;
            box-shadow:
                0 22px 55px rgba(52, 21, 81, 0.16),
                inset 0 1px 0 rgba(255, 255, 255, 0.8);
            border: 1px solid rgba(255, 255, 255, 0.8);
            transform-style: preserve-3d;
        }

        .icon-3d {
            width: 76px;
            height: 76px;
            border-radius: 26px;
            background: linear-gradient(145deg, #ffffff, #fff2e8);
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow:
                10px 10px 24px rgba(52, 21, 81, 0.14),
                -8px -8px 20px rgba(255, 255, 255, 0.95);
            margin: 0 auto;
        }

        .icon-3d i {
            font-size: 34px;
            background: linear-gradient(135deg, #ff8a00, #db4d30, #341551);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .contact-card {
            background: linear-gradient(135deg, #341551, #db4d30);
            color: white;
            border-radius: 24px;
            box-shadow: 0 18px 38px rgba(219, 77, 48, 0.26);
        }

        .call-btn {
            background: linear-gradient(135deg, #ff8a00, #db4d30);
            color: white;
            border-radius: 999px;
            font-weight: 800;
            box-shadow: 0 14px 28px rgba(219, 77, 48, 0.35);
            transition: 0.25s;
        }

        .call-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 18px 36px rgba(219, 77, 48, 0.42);
        }

        .step-card {
            border-radius: 22px;
            background: #ffffff;
            box-shadow: 0 14px 30px rgba(52, 21, 81, 0.1);
            transition: 0.25s;
        }

        .step-card:hover {
            transform: translateY(-5px);
        }

        @media (max-width: 640px) {
            .hero-section {
                min-height: 360px;
                border-radius: 0 0 26px 26px;
            }

            .hero-content h1 {
                font-size: 34px;
                line-height: 1.1;
            }

            .hero-content p {
                font-size: 15px;
            }

            .main-card {
                border-radius: 22px;
            }
        }
    </style>
</head>

<body>

    @php
        $language = session('app_language', 'English');
    @endphp

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="hero-content max-w-4xl mx-auto">
            <div class="glass-badge">
                <i class="fa-solid fa-box-open"></i>
                {{ $language === 'Odia' ? 'ଭକ୍ତଙ୍କ ପାଇଁ ସହାୟତା କେନ୍ଦ୍ର' : 'Devotee Assistance Center' }}
            </div>

            <h1 class="text-4xl sm:text-5xl md:text-6xl font-black drop-shadow-lg">
                {{ $language === 'Odia' ? 'ହଜିବା ଓ ଖୋଜିବା କେନ୍ଦ୍ର' : 'Lost and Found' }}
            </h1>

            <p class="mt-5 text-base sm:text-lg md:text-xl text-orange-50 max-w-2xl mx-auto leading-relaxed">
                {{ $language === 'Odia'
                    ? 'ଦୟାକରି ପୁରୀର ଶ୍ରୀ ମନ୍ଦିରରେ ଥିବା ସିଂହଦ୍ଵାର ସୂଚନା କେନ୍ଦ୍ର ସହିତ ଯୋଗାଯୋଗ କରନ୍ତୁ ।'
                    : 'For lost or found items inside the temple premises, please contact the Singhadwara Information Center.' }}
            </p>

            <div class="mt-8">
                <a href="tel:+916752222025" class="call-btn inline-flex items-center gap-3 px-7 py-4">
                    <i class="fa-solid fa-phone-volume"></i>
                    {{ $language === 'Odia' ? 'ଏବେ କଲ୍ କରନ୍ତୁ' : 'Call Now' }}
                </a>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <main class="px-4 sm:px-6 lg:px-8 pb-14 -mt-12 relative z-10">
        <div class="max-w-5xl mx-auto">

            <!-- Main Assistance Card -->
            <section class="main-card p-6 sm:p-8 md:p-10 text-center">
                <div class="icon-3d">
                    <i class="fa-solid fa-hand-holding-heart"></i>
                </div>

                <h2 class="text-2xl sm:text-3xl md:text-4xl font-black text-[#341551] mt-6">
                    {{ $language === 'Odia' ? 'ହଜିବା ଓ ଖୋଜିବା ସହାୟତା' : 'Lost & Found Assistance' }}
                </h2>

                <p class="text-gray-600 text-base sm:text-lg leading-relaxed mt-5 max-w-3xl mx-auto">
                    {{ $language === 'Odia'
                        ? 'ଯଦି ଆପଣ ମନ୍ଦିର ପରିସରରେ କୌଣସି ବସ୍ତୁ ହାରାଇଦେଇଛନ୍ତି କିମ୍ବା କୌଣସି ବସ୍ତୁ ପାଇଛନ୍ତି, ତେବେ ଦୟାକରି ନିମ୍ନଲିଖିତ ଯୋଗାଯୋଗ ନମ୍ବରରେ ସମ୍ପର୍କ କରନ୍ତୁ।'
                        : 'If you have lost or found any item within the temple premises, please contact the temple authorities immediately using the number below.' }}
                </p>

                <!-- Contact Box -->
                <div class="contact-card mt-8 p-6 sm:p-8">
                    <div class="flex flex-col sm:flex-row items-center justify-center gap-5">
                        <div class="w-16 h-16 rounded-full bg-white bg-opacity-20 flex items-center justify-center">
                            <i class="fa-solid fa-phone text-3xl text-orange-100"></i>
                        </div>

                        <div class="text-center sm:text-left">
                            <p class="text-orange-100 text-sm font-semibold uppercase tracking-wide">
                                {{ $language === 'Odia' ? 'ଯୋଗାଯୋଗ ନମ୍ବର' : 'Contact Number' }}
                            </p>
                            <a href="tel:+916752222025" class="text-3xl sm:text-4xl font-black tracking-wide">
                                +91 6752 222 025
                            </a>
                        </div>
                    </div>
                </div>

                <p class="mt-6 text-sm sm:text-base text-gray-500">
                    {{ $language === 'Odia'
                        ? 'ମନ୍ଦିର ଖୋଜା ଓ ହଜା ବିଭାଗ ଦ୍ୱାରା ସହଯୋଗ ପ୍ରଦାନ କରାଯିବ।'
                        : 'Support will be provided by the Temple Lost & Found Department.' }}
                </p>
            </section>

            <!-- Steps Section -->
            <section class="grid grid-cols-1 sm:grid-cols-3 gap-5 mt-8">
                <div class="step-card p-6 text-center">
                    <div class="w-14 h-14 mx-auto rounded-2xl bg-orange-100 text-[#db4d30] flex items-center justify-center text-2xl">
                        <i class="fa-solid fa-location-dot"></i>
                    </div>
                    <h3 class="font-black text-[#341551] text-lg mt-4">
                        {{ $language === 'Odia' ? 'ସ୍ଥାନ କୁହନ୍ତୁ' : 'Share Location' }}
                    </h3>
                    <p class="text-sm text-gray-500 mt-2">
                        {{ $language === 'Odia' ? 'ବସ୍ତୁ କେଉଁଠି ହଜିଲା କିମ୍ବା ମିଳିଲା କୁହନ୍ତୁ।' : 'Tell where the item was lost or found.' }}
                    </p>
                </div>

                <div class="step-card p-6 text-center">
                    <div class="w-14 h-14 mx-auto rounded-2xl bg-orange-100 text-[#db4d30] flex items-center justify-center text-2xl">
                        <i class="fa-solid fa-circle-info"></i>
                    </div>
                    <h3 class="font-black text-[#341551] text-lg mt-4">
                        {{ $language === 'Odia' ? 'ବସ୍ତୁ ବିବରଣୀ' : 'Item Details' }}
                    </h3>
                    <p class="text-sm text-gray-500 mt-2">
                        {{ $language === 'Odia' ? 'ବସ୍ତୁର ନାମ, ରଙ୍ଗ ଓ ପରିଚୟ ଚିହ୍ନ କୁହନ୍ତୁ।' : 'Share item name, color and identification details.' }}
                    </p>
                </div>

                <div class="step-card p-6 text-center">
                    <div class="w-14 h-14 mx-auto rounded-2xl bg-orange-100 text-[#db4d30] flex items-center justify-center text-2xl">
                        <i class="fa-solid fa-user-check"></i>
                    </div>
                    <h3 class="font-black text-[#341551] text-lg mt-4">
                        {{ $language === 'Odia' ? 'ଯାଞ୍ଚ ପରେ ସହାୟତା' : 'Verified Support' }}
                    </h3>
                    <p class="text-sm text-gray-500 mt-2">
                        {{ $language === 'Odia' ? 'ଯାଞ୍ଚ ପରେ ମନ୍ଦିର ବିଭାଗ ସହାୟତା କରିବ।' : 'After verification, temple staff will assist you.' }}
                    </p>
                </div>
            </section>

        </div>
    </main>

    <!-- Floating Mobile Call Button -->
    <a href="tel:+916752222025"
        class="fixed right-5 bottom-5 z-50 w-16 h-16 rounded-full bg-gradient-to-br from-[#ff8a00] to-[#db4d30] text-white flex items-center justify-center shadow-2xl sm:hidden">
        <i class="fa-solid fa-phone-volume text-2xl"></i>
    </a>

</body>

</html>