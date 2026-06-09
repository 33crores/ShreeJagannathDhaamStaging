<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Specially Abled Person</title>
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
            color: #1f2937;
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
                linear-gradient(135deg, rgba(52, 21, 81, 0.94), rgba(219, 77, 48, 0.80)),
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
            background: rgba(255, 255, 255, 0.97);
            border-radius: 28px;
            box-shadow:
                0 22px 55px rgba(52, 21, 81, 0.16),
                inset 0 1px 0 rgba(255, 255, 255, 0.8);
            border: 1px solid rgba(255, 255, 255, 0.85);
        }

        .icon-3d {
            width: 82px;
            height: 82px;
            border-radius: 28px;
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
            font-size: 38px;
            background: linear-gradient(135deg, #ff8a00, #db4d30, #341551);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .service-card {
            border-radius: 24px;
            background: #ffffff;
            box-shadow: 0 16px 35px rgba(52, 21, 81, 0.10);
            transition: 0.25s ease;
            border: 1px solid #fff;
        }

        .service-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 22px 48px rgba(52, 21, 81, 0.16);
        }

        .service-icon {
            width: 58px;
            height: 58px;
            border-radius: 20px;
            background: linear-gradient(145deg, #fff7ed, #ffffff);
            color: #db4d30;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 26px;
            box-shadow:
                8px 8px 18px rgba(52, 21, 81, 0.10),
                -6px -6px 16px rgba(255, 255, 255, 0.9);
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

        .note-card {
            border-radius: 22px;
            background: #fff1f2;
            border: 1px solid #fecdd3;
            color: #be123c;
        }

        .info-highlight {
            background: linear-gradient(135deg, #fff7ed, #ffffff);
            border-left: 5px solid #db4d30;
            border-radius: 20px;
            box-shadow: 0 12px 28px rgba(52, 21, 81, 0.08);
        }

        @media (max-width: 640px) {
            .hero-section {
                min-height: 360px;
                border-radius: 0 0 26px 26px;
            }

            .hero-content h1 {
                font-size: 32px;
                line-height: 1.12;
            }

            .hero-content p {
                font-size: 15px;
            }

            .main-card {
                border-radius: 22px;
            }

            .icon-3d {
                width: 72px;
                height: 72px;
                border-radius: 24px;
            }

            .icon-3d i {
                font-size: 32px;
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
                <i class="fa-solid fa-wheelchair-move"></i>
                {{ $language === 'Odia' ? 'ଭକ୍ତଙ୍କ ପାଇଁ ସହାୟତା ସେବା' : 'Assistance Service for Devotees' }}
            </div>

            <h1 class="text-4xl sm:text-5xl md:text-6xl font-black drop-shadow-lg">
                {{ $language === 'Odia' ? 'ବିଶେଷ କ୍ଷମତା ବିଶିଷ୍ଟ ବ୍ୟକ୍ତି' : 'Specially Abled Person' }}
            </h1>

            <p class="mt-5 text-base sm:text-lg md:text-xl text-orange-50 max-w-2xl mx-auto leading-relaxed">
                {{ $language === 'Odia'
                    ? 'ବିଶେଷ କ୍ଷମତା ବିଶିଷ୍ଟ ଏବଂ ବୟସ୍କ ଭକ୍ତଙ୍କ ପାଇଁ ମନ୍ଦିର ସହାୟତା ସୂଚନା ।'
                    : 'Important assistance information for specially abled and senior citizen devotees visiting the temple.' }}
            </p>

            <div class="mt-8">
                <a href="tel:06752252527" class="call-btn inline-flex items-center gap-3 px-7 py-4">
                    <i class="fa-solid fa-phone-volume"></i>
                    {{ $language === 'Odia' ? 'ସହାୟତା ପାଇଁ କଲ୍ କରନ୍ତୁ' : 'Call for Assistance' }}
                </a>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <main class="px-4 sm:px-6 lg:px-8 pb-16 -mt-12 relative z-10">
        <div class="max-w-6xl mx-auto">

            <!-- Main Card -->
            <section class="main-card p-6 sm:p-8 md:p-10 text-center">
                <div class="icon-3d">
                    <i class="fa-solid fa-wheelchair"></i>
                </div>

                <h2 class="text-2xl sm:text-3xl md:text-4xl font-black text-[#341551] mt-6">
                    {{ $language === 'Odia' ? 'ବିଶେଷ କ୍ଷମତା ବିଶିଷ୍ଟ ଭକ୍ତ ସେବା' : 'Specially Abled Devotee Services' }}
                </h2>

                <p class="text-gray-600 text-base sm:text-lg leading-relaxed mt-5 max-w-4xl mx-auto">
                    {!! $language === 'Odia'
                        ? 'ହ୍ୱିଲ୍‌ଚେୟାର କେବଳ ମନ୍ଦିରର ମୁଖ୍ୟ ଦ୍ୱାର ପର୍ଯ୍ୟନ୍ତ ଅନୁମତିପ୍ରାପ୍ତ ଅଟେ। <strong>ଜଗନ୍ନାଥ ବଲ୍ଲଭ ପାର୍କିଂ / ମାର୍କେଟ୍ ସ୍କୱାର</strong> ରୁ <strong>ମନ୍ଦିରର ମୁଖ୍ୟ ଦ୍ୱାର / ଉତ୍ତର ଦ୍ୱାର</strong> ପର୍ଯ୍ୟନ୍ତ ବୟସ୍କ ଏବଂ ଶାରୀରିକ ଭାବେ ଅସମର୍ଥ ଭକ୍ତଙ୍କ ପାଇଁ <strong>ବ୍ୟାଟେରୀ ଚାଳିତ ଯାନ</strong> ସେବା ମାଗଣା ଉପଲବ୍ଧ।'
                        : 'Wheelchairs are allowed only up to the main gate of the temple. Free <strong>battery-operated vehicle</strong> service is available from <strong>Jagannatha Ballav Parking / Market Square</strong> to the <strong>Temple Main Gate / North Gate</strong> for senior citizens and physically challenged devotees.' !!}
                </p>

                <!-- Contact Box -->
                <div class="contact-card mt-8 p-6 sm:p-8">
                    <div class="flex flex-col md:flex-row items-center justify-between gap-6">
                        <div class="flex flex-col sm:flex-row items-center gap-5 text-center sm:text-left">
                            <div class="w-16 h-16 rounded-full bg-white bg-opacity-20 flex items-center justify-center">
                                <i class="fa-solid fa-headset text-3xl text-orange-100"></i>
                            </div>

                            <div>
                                <p class="text-orange-100 text-sm font-semibold uppercase tracking-wide">
                                    {{ $language === 'Odia' ? 'ସହାୟତା ନମ୍ବର' : 'Assistance Contact' }}
                                </p>
                                <a href="tel:06752252527" class="text-3xl sm:text-4xl font-black tracking-wide">
                                    06752 - 252527
                                </a>
                                <p class="text-orange-100 text-sm mt-1">
                                    {{ $language === 'Odia'
                                        ? 'ମନ୍ଦିର ସୁପରିଭାଇଜର୍ / ଅସିଷ୍ଟେଣ୍ଟ ସୁପରିଭାଇଜର୍'
                                        : 'Temple Supervisor / Assistant Supervisor' }}
                                </p>
                            </div>
                        </div>

                        <a href="tel:06752252527" class="call-btn inline-flex items-center justify-center gap-2 px-7 py-4 w-full md:w-auto">
                            <i class="fa-solid fa-phone"></i>
                            {{ $language === 'Odia' ? 'କଲ୍ କରନ୍ତୁ' : 'Call Now' }}
                        </a>
                    </div>
                </div>

                <!-- Highlight -->
                <div class="info-highlight text-left mt-8 p-5 sm:p-6">
                    <div class="flex items-start gap-4">
                        <div class="service-icon shrink-0">
                            <i class="fa-solid fa-circle-info"></i>
                        </div>

                        <div>
                            <h3 class="text-xl font-black text-[#341551]">
                                {{ $language === 'Odia' ? 'ସେବା ସୂଚନା' : 'Service Information' }}
                            </h3>
                            <p class="text-gray-600 mt-2 leading-relaxed">
                                {!! $language === 'Odia'
                                    ? '<strong>ହ୍ୱିଲଚେୟାର୍</strong> ବ୍ୟବହାର କରିବା ପାଇଁ ଭକ୍ତମାନେ <strong>ମନ୍ଦିର ସୁପରିଭାଇଜର୍ / ଅସିଷ୍ଟେଣ୍ଟ ସୁପରିଭାଇଜର୍</strong>ଙ୍କୁ <strong>06752 - 252527</strong> ରେ ସମ୍ପର୍କ କରିପାରିବେ।'
                                    : 'For availing wheelchair assistance, devotees can contact the <strong>Temple Supervisor / Assistant Supervisor</strong> at <strong>06752 - 252527</strong>.' !!}
                            </p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Services Grid -->
            <section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 mt-8">

                <div class="service-card p-6">
                    <div class="service-icon">
                        <i class="fa-solid fa-car-side"></i>
                    </div>

                    <h3 class="font-black text-[#341551] text-xl mt-5">
                        {{ $language === 'Odia' ? 'ବ୍ୟାଟେରୀ ଯାନ ସେବା' : 'Battery Vehicle Service' }}
                    </h3>

                    <p class="text-gray-500 mt-3 leading-relaxed">
                        {{ $language === 'Odia'
                            ? 'ଜଗନ୍ନାଥ ବଲ୍ଲଭ ପାର୍କିଂରୁ ମନ୍ଦିର ଦ୍ୱାର ପର୍ଯ୍ୟନ୍ତ ସେବା ଉପଲବ୍ଧ।'
                            : 'Available from Jagannatha Ballav Parking to Temple Main Gate / North Gate.' }}
                    </p>
                </div>

                <div class="service-card p-6">
                    <div class="service-icon">
                        <i class="fa-solid fa-wheelchair-move"></i>
                    </div>

                    <h3 class="font-black text-[#341551] text-xl mt-5">
                        {{ $language === 'Odia' ? 'ହ୍ୱିଲଚେୟାର୍ ସହାୟତା' : 'Wheelchair Assistance' }}
                    </h3>

                    <p class="text-gray-500 mt-3 leading-relaxed">
                        {{ $language === 'Odia'
                            ? 'ହ୍ୱିଲଚେୟାର୍ କେବଳ ମନ୍ଦିରର ମୁଖ୍ୟ ଦ୍ୱାର ପର୍ଯ୍ୟନ୍ତ ଅନୁମତିପ୍ରାପ୍ତ।'
                            : 'Wheelchair movement is allowed only up to the main gate of the temple.' }}
                    </p>
                </div>

                <div class="service-card p-6">
                    <div class="service-icon">
                        <i class="fa-solid fa-user-shield"></i>
                    </div>

                    <h3 class="font-black text-[#341551] text-xl mt-5">
                        {{ $language === 'Odia' ? 'ବୟସ୍କ ଭକ୍ତ ସହାୟତା' : 'Senior Citizen Support' }}
                    </h3>

                    <p class="text-gray-500 mt-3 leading-relaxed">
                        {{ $language === 'Odia'
                            ? 'ବୟସ୍କ ଭକ୍ତଙ୍କ ପାଇଁ ମନ୍ଦିର ଯାତ୍ରାରେ ସହାୟତା ଉପଲବ୍ଧ।'
                            : 'Support is available for senior citizens during temple visit movement.' }}
                    </p>
                </div>

            </section>

            <!-- Important Notes -->
            <section class="grid grid-cols-1 md:grid-cols-2 gap-5 mt-8">

                <div class="note-card p-5 sm:p-6">
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 rounded-2xl bg-red-100 flex items-center justify-center shrink-0">
                            <i class="fa-solid fa-triangle-exclamation text-red-600 text-xl"></i>
                        </div>
                        <div>
                            <h4 class="font-black text-lg">
                                {{ $language === 'Odia' ? 'ଗୁରୁତ୍ୱପୂର୍ଣ୍ଣ ନୋଟ୍' : 'Important Note' }}
                            </h4>
                            <p class="mt-2 text-sm sm:text-base leading-relaxed">
                                {{ $language === 'Odia'
                                    ? 'ହ୍ୱିଲଚେୟାର୍ କେବଳ ଶାରୀରିକ ଭାବରେ ଅସମର୍ଥ ଭକ୍ତଙ୍କ ପାଇଁ ଉପଲବ୍ଧ।'
                                    : 'Wheelchairs are available only for differently abled devotees.' }}
                            </p>
                        </div>
                    </div>
                </div>

                <div class="note-card p-5 sm:p-6">
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 rounded-2xl bg-red-100 flex items-center justify-center shrink-0">
                            <i class="fa-solid fa-ban text-red-600 text-xl"></i>
                        </div>
                        <div>
                            <h4 class="font-black text-lg">
                                {{ $language === 'Odia' ? 'ମନ୍ଦିର ନିୟମ' : 'Temple Rule' }}
                            </h4>
                            <p class="mt-2 text-sm sm:text-base leading-relaxed">
                                {{ $language === 'Odia'
                                    ? 'ଶ୍ରୀମନ୍ଦିର ପ୍ରାଙ୍ଗଣ ଭିତରେ ହ୍ୱିଲଚେୟାର୍ ନେଇଯିବା କଠୋର ଭାବରେ ନିଷେଧ।'
                                    : 'Wheelchairs are strictly prohibited inside the temple premises.' }}
                            </p>
                        </div>
                    </div>
                </div>

            </section>

        </div>
    </main>

    <!-- Floating Mobile Call Button -->
    <a href="tel:06752252527"
        class="fixed right-5 bottom-5 z-50 w-16 h-16 rounded-full bg-gradient-to-br from-[#ff8a00] to-[#db4d30] text-white flex items-center justify-center shadow-2xl sm:hidden">
        <i class="fa-solid fa-phone-volume text-2xl"></i>
    </a>

</body>

</html>