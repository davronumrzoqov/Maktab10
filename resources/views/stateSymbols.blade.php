<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Davlat ramzlari</title>

    <!-- Bootstrap core css -->
    <link rel="stylesheet" href="{{ asset('front/css/bootstrap.css') }}">
    <!-- Animate css -->
    <link rel="stylesheet" href="{{ asset('front/css/animate.css') }}">
    <!-- Font awesome style -->
    <link rel="stylesheet" href="{{ asset('front/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- Custom style -->
    <link rel="stylesheet" href="{{ asset('front/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/responsive.css') }}">

    <style>
        @media (max-width:412px) {
            .topMain-logo {
                position: absolute;
                top: 14%;
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
<!-- Header Start -->
<header>
    <div class="bannerBox">
        <div class="headerBar">
            <div class="topMainMenu">
                <a href="{{ route('index') }}" class="topMain-logo">
                    <img src="{{ asset('image/Gerb.png') }}" alt="Logo" width="8%">
                    <p>10-sonli umumta'lim maktabi</p>
                </a>
                <ul>
                    <li><a href="https://vacancy.argos.uz/">Bosh ish orinlari</a></li>
                    <li><a href="{{ route('schoolRules') }}">Maktab qonun-qoidalari</a></li>
                    <li><a href="{{ route('faq') }}">Tez-tez beriladigan savollar</a></li>
                    <li><a href="{{ route('stateSymbols') }}">Davlat ramzlari</a></li>
                </ul>
                <div class="additionalFuntions">
                    <a href="#" class="eye"><i class="fa-regular fa-eye text-white me-2"></i></a>
                    <a href="#" class="searchBtn text-white">
                        | <i class="fa-solid fa-magnifying-glass text-white mb-3 ms-2"></i>
                    </a>
                </div>
            </div>

            <div class="container">
                <div class="headerMenuBox">
                    <div class="bigMenuBtn">
                        <button type="button" class="borderedBtn">
                            <div class="menuBars"></div>
                        </button>
                        <div class="overlay">
                            <div class="container">
                                <div class="topLogoGerb">
                                    <img src="{{ asset('image/Gerb.png') }}" alt="Logo" width="13%">
                                </div>
                                <div class="listMenu">
                                    <ul>
                                        <li><a href="#">Maktab haqida</a>
                                            <ul>
                                                <li><a href="{{ route('schooltack') }}">Maktab vazifalari</a></li>
                                                <li><a href="{{ route('leaderShep') }}">Rahbariyat</a></li>
                                                <li><a href="{{ route('teachers') }}">O'qituvchilar</a></li>
                                                <li><a href="{{ route('rekvizit') }}">Rekvizitlar</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="{{ route('education') }}">Ta'lim</a>
                                            <ul>
                                                @foreach($smenatypes as $smenatype)
                                                    <li><a href="{{ route('education.detail', $smenatype->id) }}">
                                                            {{ $smenatype['name_' . app()->getLocale()] }}
                                                        </a></li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        <li><a href="{{ route('schoolNews') }}">Axborot markazi</a>
                                            <ul>
                                                <li><a href="{{ route('schoolNews') }}">Maktab yangiliklari</a></li>
                                                <li><a href="{{ route('Gallery') }}">Galeriya</a></li>
                                                <li><a href="{{ route('infoGrafika') }}">Infografika</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="{{ route('usefulresurs') }}">Foydali resurslar</a></li>
                                        <li><a href="{{ route('connect') }}">Bogʻlanish</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Image Header Start-->
            <div class="mainContent withImage">
                <div class="imageHeader" style="padding-bottom: 0px;">
                    <div class="container">
                        <h1 class="pageTitle text-dark">Davlat ramzlari</h1>
                        <nav aria-label="breadcrumb">
                            <ol id="w5" class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('index') }}">Asosiy</a></li>
                                <li class="breadcrumb-item " aria-current="page">Davlat ramzlari</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- Image Header End -->
        </div>
    </div>
</header>
<!-- Header End -->

<!-- Main section Start -->
<main>
    <section>
        <div class="state_sybmols">
            <div class="container">
                <div class="sybmols">
                    <div class="row">
                        <h2 class="text-uppercase">O'zbekiston respublikasi davlat gerbi</h2>
                        <div class="col-12 text-center mt-5">
                            <img src="{{ asset('image/Gerb.png') }}" alt="Gerb" width="20%">
                        </div>
                        <p style="font-size: 18px; font-weight: 400;">
                            Davlat gerbi O'zbekiston Respublikasining 1992-yil 2-iyuldagi 616-XII-sonli qonuni bilan tasdiqlangan...
                        </p>
                        <h2 class="text-uppercase mt-5">O'zbekiston respublikasi davlat bayrog'i</h2>
                        <div class="col-12 text-center mt-5">
                            <img src="{{ asset('image/Flag-uz.jpg') }}" alt="Bayroq" width="30%">
                        </div>
                        <p style="font-size: 18px; font-weight: 400;">
                            Davlat bayrog'i tasviri...
                        </p>
                        <h2 class="text-uppercase mt-5">O'zbekiston respublikasi davlat madhiyasi</h2>
                        <p style="font-size: 18px; font-weight: 400;">
                            Davlat madhiyasi matni...
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<!-- Main section End -->

<!-- Footer Start -->
<footer>
    <div class="footer mt-5">
        <div class="container">
            <ul class="footer_menu">
                <li><a href="https://vacancy.argos.uz/">Bo'sh ish o'rinlari</a></li>
                <li><a href="{{ route('schoolRules') }}">Maktab qonun qoidalari</a></li>
                <li><a href="{{ route('faq') }}">Tez-tez beriladigan savollar</a></li>
                <li><a href="{{ route('stateSymbols') }}">Davlat ramzlari</a></li>
            </ul>
            <div class="footer_contact-left">
                <a href="#"><i class="fab fa-instagram"></i><span>@10_maktab</span></a>
                <a href="#"><i class="fas fa-envelope"></i><span>info@maktab.uz</span></a>
            </div>
            <div class="footer_contact-right">
                <a href="#"><i class="fab fa-facebook-f"></i><span>@10_maktab</span></a>
                <a href="#"><i class="fab fa-telegram-plane"></i><span>@10_maktab</span></a>
            </div>
            <div class="footer_logo">
                <span><img src="{{ asset('image/Gerb.png') }}" alt="Logo" width="20%"></span>
                <a href="">10-sonli Umumta'lim maktabi <i>Sirdaryo, Guliston tumani</i></a>
            </div>
            <a href="#" class="it_live-logo">
                <img src="{{ asset('image/It live logo for red-04-04.png') }}" alt="IT_Live" width="10%">
            </a>
            <span class="year_text">© 2020-2023 Barcha huquqlar himoyalangan</span>
        </div>
    </div>
</footer>
<!-- Footer End -->

<!-- Js -->
<script src="{{ asset('front/js/bootstrap.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('front/js/tilt.jquery.js') }}"></script>
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
        bigMenuBtn.addEventListener('click', function () {
            this.classList.toggle('active');
            overlay.classList.toggle('active');
            document.body.classList.toggle('no-scroll');
        });
        $('.js-tilt').tilt({ scale: 1.2 });
    });
</script>
</body>
</html>
