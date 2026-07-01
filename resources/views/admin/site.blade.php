    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>@yield('title')</title>

        <!-- Bootstrap core css -->
        <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">

        <!-- Animate css -->
        <link rel="stylesheet" href="{{ asset('css/animate.css') }}">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">


        <!-- Font awesome style -->
        <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">

        <!-- Custom style -->
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">

        <!-- Responsive Style -->
        <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    </head>

    <body>
        <!-- Header Start -->

        <header>
            <div class="bannerBox">
                <div class="headerBar">
                    <div class="topMainMenu">
                        <a href="/" class="topMain-logo">
                            <img src="{{ asset('image/Gerb.png') }}" alt="Logo" width="8%">
                            @if (App::getLocale() == 'uz')
                                <p>10-sonli umumta'lim maktab</p>
                            @elseif(App::getLocale() == 'ru')
                                <p>10-я общеобразовательная школа</p>
                            @endif
                        </a>
                        <div class="gap-2 d-flex">
                            <ul class="flex flex-wrap font-medium">
                                @foreach ($categoryTop as $categorytop)
                                    <li>
                                        <a
                                            href="{{ url($categorytop->url) }}"
                                            class="text-gray-700 hover:text-blue-600 hover:underline transition duration-200"
                                        >
                                            {{ $categorytop['name_' . App::getLocale()] }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>

                            <!-- Search form: kategoriya bo'yicha qidirish uchun -->
                            <div class="additionalFuntions  justify-content-center">

                                <!-- Masalan: searchBtn tugmasidan pastroqqa joylashtiring -->
                                <form action="{{ route('search.posts') }}" method="GET"
                                      class="d-flex align-items-center" role="search">
                                    <div class="d-flex align-items-center ">
                                        <div class="input-group" style="max-width: 400px;">
                                    <span class="input-group-text bg-white">
                                        <i class="fas fa-eye text-primary"></i>
                                    </span>
                                            <input type="text" name="query" value="{{ request('query') }}" class="form-control"
                                                   aria-label="Search">
                                        </div>
                                        <button type="submit" class="btn btn-primary d-flex align-items-center">
                                            <i class="fas fa-search me-1"></i> {{ __('message.Qidirish') }}
                                        </button>
                                    </div>
{{--                                    @if (Route::has('login'))--}}
{{--                                        <nav class="flex items-center justify-end gap-3 md:gap-4">--}}
{{--                                            @auth--}}
{{--                                                <a href="{{ url('admin/dashboard') }}"--}}
{{--                                                   class="inline-block px-5 py-2 text-sm font-medium rounded-md border border-blue-200 text-blue-500 hover:bg-blue-50 dark:border-blue-600 dark:text-blue-400 dark:hover:bg-blue-900 transition-colors">--}}
{{--                                                    Admin--}}
{{--                                                </a>--}}
{{--                                            @else--}}
{{--                                                <a href="{{ route('login') }}"--}}
{{--                                                   class="inline-block px-5 py-2 text-sm font-medium rounded-md border border-blue-300 text-blue-500 hover:bg-blue-50 dark:border-blue-600 dark:text-blue-400 dark:hover:bg-blue-900 transition-colors">--}}
{{--                                                    Log in--}}
{{--                                                </a>--}}

{{--                                                @if (Route::has('register'))--}}
{{--                                                    <a href="{{ route('register') }}"--}}
{{--                                                       class="inline-block px-5 py-2 text-sm font-medium rounded-md border border-blue-300 text-blue-500 hover:bg-blue-50 dark:border-blue-600 dark:text-blue-400 dark:hover:bg-blue-900 transition-colors">--}}
{{--                                                        Register--}}
{{--                                                    </a>--}}
{{--                                                @endif--}}
{{--                                            @endauth--}}
{{--                                        </nav>--}}
{{--                                @endif--}}
                            </div>
                            </form>




                            <!-- Qidiruv formasi (dastlab yashiringan) -->


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
                                            <img src="image/Gerb.png" alt="Logo" width="13%">
                                        </div>
                                        <div class="listMenu">
                                            <ul>
                                                <li><a href="{{ route('schooltack') }}">{{ __('message.about_school') }}</a>
                                                    <ul>
                                                        <li><a href="{{ route('schooltack') }}">{{ __('message.about_school') }}</a></li>
                                                        <li><a href="{{ route('leaderShep') }}">{{ __('message.Mudir') }}</a></li>
                                                        <li><a href="{{ route('teachers') }}">{{ __('message.Oqituvchilar') }}</a></li>
                                                        <li><a href="{{ route('rekvizit') }}">{{ __('message.Rekvizitlar') }}</a></li>
                                                    </ul>
                                                <li><a href="{{ route('education') }}">{{ __("message.Ta'lim") }}</a>
                                                    <ul>
                                                        <li class="d-flex flex-column ">
                                                            @foreach($smenatypes as $smenatype)
                                                                <a href="{{ route('education.detail', $smenatype->id) }}">
                                                                    {{ $smenatype['name_' . App::getLocale()] }}
                                                                </a>
                                                            @endforeach

                                                        </li>

                                                    </ul>
                                                <li class="overlay_li-social"><a href="{{ route('schoolNews') }}">{{ __('message.Axborot markazi') }}</a>
                                                    <ul>
                                                        <li><a href="{{ route('schoolNews') }}">{{ __('message.Axborot markazi') }}</a></li>
                                                        <li><a href="{{ route('Gallery') }}">{{ __('message.Galeriya') }}</a></li>
                                                        <li><a href="{{ route('infoGrafika') }}">{{ __('message.Infografika') }}</a></li>
                                                    </ul>
                                            </ul>
                                            <ul class="simple">
                                                <li><a href="{{ route('usefulresurs') }}">{{ __('message.Bog`lanish') }}</a></li>
                                                <li><a href="{{ route('connect') }}">{{ __('message.Bog`lanish') }}</a></li>
                                            </ul>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="mainMenuBox">
                                <div class="menuList">
                                    <div class="menuLine"></div>
                                    <div class="bottomMainMenu">
                                        <ul class="menu">
                                            <li>
                                                <a href="{{ route('schooltack') }}">{{ __('message.about_school') }}
                                                </a>

                                                <ul class="menu_ul-li">
                                                    <li>
                                                        <a href="{{ route('schooltack') }}">{{ __('message.about_school') }}</a>
                                                    </li>
                                                    <hr>
                                                    <li>
                                                        <a href="{{ route('leaderShep') }}">{{ __('message.Mudir') }}</a>
                                                    </li>
                                                    <hr>
                                                    <li>
                                                        <a href="{{ route('teachers') }}">{{ __('message.Oqituvchilar') }}</a>
                                                    </li>
                                                    <hr>
                                                    <li>
                                                        <a href="{{ route('rekvizit') }}">{{ __('message.Rekvizitlar') }}</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="{{ route('education') }}">{{ __("message.Ta'lim") }} </a>
                                                <ul class="menu_ul-li">
                                                    <li class="d-flex flex-column ">
                                                        @foreach($smenatypes as $smenatype)
                                                            <a href="{{ route('education.detail', $smenatype->id) }}">
                                                                {{ $smenatype['name_' . App::getLocale()] }}
                                                            </a>
                                                        @endforeach

                                                    </li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="{{ route('usefulresurs') }}">{{ __("message.useful_resources") }} </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('schoolNews') }}">{{ __('message.Axborot markazi') }} </a>
                                                <ul class="menu_ul-li">
                                                    <li>
                                                        <a href="{{ route('schoolNews') }}">{{ __('message.Maktab yangiliklari') }}</a>
                                                    </li>
                                                    <hr>
                                                    <li>
                                                        <a href="{{ route('Gallery') }}">{{ __('message.Galeriya') }}</a>
                                                    </li>
                                                    <hr>
                                                    <li>
                                                        <a href="{{ route('infoGrafika') }}">{{ __('message.Infografika') }}</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li>
                                            <li><a href="{{ route('connect') }}">{{ __('message.Bog`lanish') }}</a></li>
                                            </li>
                                        </ul>
                                    </div>
                                    <form class="mainSearchForm" action="search.html" method="get">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Izlash"
                                                   name="ContentSearch">
                                            <div class="input-group-prepend">
                                                <button class="btn __searchBtn closeBtn" type="button">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="dropdown langBar position-relative d-flex align-items-end">
    <span class="current-lang px-2 py-1 bg-primary text-white rounded">
        @if (session('lang') == 'ru')
            Русский
        @else
            O'zbekcha
        @endif
    </span>
                                        <div class="dropdown-menu position-absolute end-0 mt-1 p-0 border-0 shadow-sm" style="display:none;">
                                            @if (session('lang') == 'ru')
                                                <a href="{{ url('/lang/uz') }}" class="dropdown-item text-dark px-3 py-2 bg-light hover-bg-primary">O'zbekcha</a>
                                            @else
                                                <a href="{{ url('/lang/ru') }}" class="dropdown-item text-dark px-3 py-2 bg-light hover-bg-primary">Русский</a>
                                            @endif
                                        </div>
                                    </div>

                                    <style>
                                        .langBar {
                                            cursor: pointer;
                                            font-size: 0.85rem;
                                            font-weight: 500;
                                        }
                                        .langBar .current-lang {
                                            transition: all 0.2s ease;
                                        }
                                        .langBar:hover .current-lang {
                                            background-color: #0d6efd;
                                            color: #fff;
                                        }
                                        .langBar .dropdown-menu {
                                            min-width: 120px;
                                            border-radius: 6px;
                                            overflow: hidden;
                                            transition: all 0.2s ease;
                                            z-index: 1050;
                                        }
                                        .langBar .dropdown-item {
                                            transition: all 0.2s ease;
                                        }
                                        .langBar .dropdown-item:hover {
                                            background-color: #0d6efd;
                                            color: #fff;
                                        }

                                    </style>

                                    <script>
                                        document.addEventListener('DOMContentLoaded', function() {
                                            const langBar = document.querySelector('.langBar');
                                            const dropdown = langBar.querySelector('.dropdown-menu');

                                            langBar.addEventListener('mouseenter', function() {
                                                dropdown.style.display = 'block';
                                            });
                                            langBar.addEventListener('mouseleave', function() {
                                                dropdown.style.display = 'none';
                                            });
                                        });
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <main>
            @yield('content')
        </main>


        <!-- Footer Start -->
        <footer>
            <div class="footer">
                <div class="container">
                    <div class="row">
                        <ul class="footer_menu d-flex">
                            <li>
                                <a href="https://vacancy.argos.uz/" target="_blank" class="hover:text-blue-500 transition-colors">
                                    {{ __('message.BoshIshOrinlari') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('schoolRules') }}" class="hover:text-blue-500 transition-colors">
                                    {{ __('message.Maktab qonun qoidalari') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('faq') }}" class="hover:text-blue-500 transition-colors">
                                    {{ __('message.Tez-tez beriladigan savollar') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('stateSymbols') }}" class="hover:text-blue-500 transition-colors">
                                    {{ __('message.Davlat ramzlari') }}
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="footer_contact-left">
                        <a href="https://instagram.com/_behruz__14_o1"><i class="fab fa-instagram"></i>
                            <span>{{ __('10-maktab') }}</span></a>
                        <a href="https://mail.google.com/davronbekumrzoqov6@gmail.com"><i class="fas fa-envelope"></i>
                            <span>{{ __('10-maktab') }}.com</span></a>
                    </div>
                    <div class="footer_contact-right">
                        <a href="https://facebook.com/Davron"><i class="fab fa-facebook-f"></i>
                            <span>{{ __('10-maktab') }}</span></a>
                        <a href="https://telegram.org/JalolovB"><i class="fab fa-telegram-plane"></i>
                            <span>{{ __('10-maktab') }} </span></a>
                    </div>
                    <div class="footer_logo">
                        <span><img src="{{ asset('image/Gerb.png') }}" alt="Logo" width="20%"></span>
                        @if (App::getLocale() == 'uz')
                            <a href="">10-sonli Umumta'lim maktabi <i>Sirdaryo, Guliston tumani</i></a>
                        @elseif(App::getLocale() == 'ru')
                            <a href="">Средняя школа № 10 <i>Сырдарья, Гулистанский район</i></a>
                        @endif

                    </div>
                    <a href="https://itliveacademy.uz/" class="it_live-logo">
                        <img src="{{ asset('image/It live logo for red-04-04.png') }}" alt="IT_Live" class="it_live-img">
                    </a>
                    <span class="year_text">© {{ __('message.2025-2030 Barcha huquqlar himoyalangan') }}</span>

                    <span class="year_text">© {{ __('message.Saytni yaratdi: Umrzoqov Davron va Boboqulov Amirbek') }}</span>
                </div>
            </div>
        </footer>

        <!-- Js -->
        <script src="{{ asset('js/bootstrap.js') }}"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
        <script src="{{ asset('/js/tilt.jquery.js') }}"></script>
        <script src="{{ asset('/js/wow.min.js') }}"></script>
        <script src="{{ asset('/js/main.js') }}"></script>
    </body>

    </html>
