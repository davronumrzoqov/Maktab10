<!DOCTYPE html>
<html lang="uz">
<head>
    <!-- Meta -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Maktab qonun-qoidalari</title>

    <!-- ✅ To'g'ri CSS yo'llar -->
    <link rel="stylesheet" href="{{ asset('front/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('front/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/responsive.css') }}">

    <style>
        @media (max-width: 412px) {
            .topMain-logo {
                position: absolute;
                top: 17%;
                right: 35%;
                color: black;
            }
            .additionalFuntions {
                position: absolute;
                top: 24%;
                right: 3%;
            }
        }
    </style>
</head>

<body>
<!-- Header -->
<header>
    <div class="bannerBox">
        <div class="headerBar">
            <div class="topMainMenu">
                <a href="{{ url('/') }}" class="topMain-logo">
                    <img src="{{ asset('front/image/Gerb.png') }}" alt="Gerb" width="8%">
                    <p>10-sonli umumta'lim maktabi</p>
                </a>
                <ul>
                    <li><a href="https://vacancy.argos.uz/">Bo‘sh ish o‘rinlari</a></li>
                    <li><a href="{{ url('school-rules') }}">Maktab qonun-qoidalari</a></li>
                    <li><a href="{{ url('faq') }}">Tez-tez beriladigan savollar</a></li>
                    <li><a href="{{ url('state-symbols') }}">Davlat ramzlari</a></li>
                </ul>

                <div class="additionalFuntions">
                    <a href="#" class="eye"><i class="fa-regular fa-eye text-white me-2"></i></a>
                    <a href="#" class="searchBtn text-white">| <i class="fa-solid fa-magnifying-glass text-white mb-3 ms-2"></i></a>
                </div>
            </div>
        </div>

        <!-- Page Header -->
        <div class="mainContent withImage">
            <div class="imageHeader" style="padding-bottom: 0px;">
                <div class="container">
                    <h1 class="pageTitle text-dark">Maktab qonun-qoidalari</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Asosiy</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Maktab qonun-qoidalari</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Main Content -->
<main>
    <section>
        <div class="school-rules">
            <div class="container">
                <h4 class="text-center">1-bob. Umumiy qoidalar</h4>
                <p style="text-align: justify;">
                    1. Mazkur Ustav 329-sonli umumiy o‘rta ta’lim muassasasining (keyingi o‘rinlarda – umumta’lim muassasasi) faoliyatini tashkil etish va amalga oshirish tartibini belgilaydi.
                    <br><br>
                    2. Umumta’lim muassasasi o‘z faoliyatida O‘zbekiston Respublikasi Konstitusiyasi, “Ta’lim to‘g‘risida”gi Qonuni va boshqa qonunlarga amal qiladi.
                    <br><br>
                    3. Umumta’lim muassasasi uzluksiz ta’lim tizimining asosiy bo‘g‘ini bo‘lib, o‘quvchi yoshlarga I–XI sinflar hajmida fan asoslaridan umumiy o‘rta ma’lumot beradi.
                    <br><br>
                    4. Umumta’lim muassasasi yuridik shaxs hisoblanadi va o‘z Ustaviga, muhriga, blankasiga ega.
                    <br><br>
                    5. Umumta’lim muassasasi Ustavi pedagogik kengashda qabul qilinadi, tuman xalq ta’limi bo‘limida tasdiqlanadi.
                    <br><br>
                    6. Davlat umumta’lim muassasalarida ta’lim olish bepul amalga oshiriladi.
                </p>

                <h4 class="text-center mt-5">2-bob. O‘quvchilar sog‘lig‘ini muhofaza qilish</h4>
                <p style="text-align: justify;">
                    46. O‘quvchilarga tibbiy xizmat ko‘rsatish biriktirilgan tibbiyot xodimlari tomonidan amalga oshiriladi.
                    <br><br>
                    47. Maktab rahbariyati tibbiyot xodimlariga zarur sharoitlar yaratib beradi.
                    <br><br>
                    48. O‘quvchilarni har yilgi tibbiy ko‘rikdan o‘tkazish Sog‘liqni saqlash vazirligi tartibida amalga oshiriladi.
                    <br><br>
                    49. Psixologik xizmat maktab psixologlari tomonidan amalga oshiriladi.
                </p>
            </div>
        </div>
    </section>
</main>

<!-- Footer -->
<footer class="mt-5">
    <div class="footer">
        <div class="container">
            <div class="row">
                <ul class="footer_menu">
                    <li><a href="#">Bo‘sh ish o‘rinlari</a></li>
                    <li><a href="#">Maktab qonun-qoidalari</a></li>
                    <li><a href="#">Tez-tez beriladigan savollar</a></li>
                    <li><a href="#">Davlat ramzlari</a></li>
                </ul>
            </div>

            <div class="footer_contact-left">
                <a href="#"><i class="fab fa-instagram"></i> <span>@10-sonli_maktab</span></a>
                <a href="#"><i class="fas fa-envelope"></i> <span>info@maktab.uz</span></a>
            </div>

            <div class="footer_contact-right">
                <a href="#"><i class="fab fa-facebook-f"></i> <span>@10-sonli_maktab</span></a>
                <a href="#"><i class="fab fa-telegram-plane"></i> <span>@10-sonli_maktab</span></a>
            </div>

            <div class="footer_logo">
                <img src="{{ asset('front/image/Gerb.png') }}" alt="Logo" width="20%">
                <a href="#">10-sonli Umumta’lim maktabi <i>Toshkent shahri, Yangihayot tumani</i></a>
            </div>

            <a href="#" class="it_live-logo">
                <img src="{{ asset('front/image/It live logo for red-04-04.png') }}" alt="IT_Live" class="it_live-img">
            </a>

            <span class="year_text">© 2020-2025 Barcha huquqlar himoyalangan</span>
        </div>
    </div>
</footer>

<!-- ✅ To‘g‘ri JS yo‘llar -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('front/js/bootstrap.js') }}"></script>
<script src="{{ asset('front/js/tilt.jquery.js') }}"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="{{ asset('front/js/wow.min.js') }}"></script>

<script>
    $(document).ready(function () {
        $(".searchBtn").click(function (e) {
            e.preventDefault();
            $(".mainSearchForm").toggleClass("active");
        });

        $(".closeBtn").click(function (e) {
            e.preventDefault();
            $(".mainSearchForm").removeClass("active");
        });

        const bigMenuBtn = document.querySelector('.bigMenuBtn');
        const overlay = document.querySelector('.overlay');

        if (bigMenuBtn && overlay) {
            bigMenuBtn.addEventListener('click', function () {
                this.classList.toggle('active');
                overlay.classList.toggle('active');
                document.body.classList.toggle('no-scroll');
            });
        }

        $('.js-tilt').tilt({ scale: 1.2 });
    });
</script>
</body>
</html>
