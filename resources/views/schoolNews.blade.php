<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <!-- Basic -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Maktab yangiliklari')</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('front/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('front/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/responsive.css') }}">
    <style>
        @media (max-width:412px) {
            .topMain-logo { position: absolute; top: 18%; right: 35%; color: black; }
            .additionalFuntions { position: absolute; top: 24%; right: 3%; }
            .navigationTabs { grid-template-columns: unset; margin: 0; }
            .navigationTabs a { margin: 20px 0; }
        }
        .imageBox img { width:100%; height:200px; object-fit:cover; border-radius:6px; }
        .card-news { border: none; border-radius:8px; box-shadow:0 4px 14px rgba(2,6,23,0.06); overflow:hidden; }
        .card-news .card-body h5 { font-size:1.05rem; }
        .breadcrumb a { text-decoration:none; }
    </style>
</head>
<body>
<header>
    <!-- (Sizning original header kodi shu yerda qoladi; agar siz layouts.site ishlatayotgan bo'lsangiz @include qilishingiz mumkin) -->
    <div class="bannerBox">
        <div class="headerBar">
            <div class="topMainMenu">
                <a href="{{ url('/') }}" class="topMain-logo">
                    <img src="{{ asset('image/Gerb.png') }}" alt="" width="8%">
                    <p>{{ config('app.name', 'Maktab') }}</p>
                </a>
                <ul>
                    <li><a href="https://vacancy.argos.uz/">Bosh ish orinlari</a></li>
                    <li><a href="{{ url('/schoolRules') }}">Maktab qonun-qoidalar</a></li>
                    <li><a href="{{ url('/faq') }}">Tez-tez beriladigan savollar</a></li>
                    <li><a href="{{ url('/stateSymbols') }}">Davlat ramzlari</a></li>
                </ul>
                <div class="additionalFuntions">
                    <a href="#" class="eye"><i class="fa-regular fa-eye text-white me-2"></i></a>
                    <a href="#" class="searchBtn text-white">|
                        <i class="fa-solid fa-magnifying-glass text-white mb-3 ms-2"></i>
                    </a>
                </div>
            </div>
            <!-- (Sizning nav va menu kodi bu yerda bo'ladi) -->
        </div>

        <!-- Image Header -->
        <div class="mainContent withImage">
            <div class="imageHeader" style="padding-bottom: 0px;">
                <div class="container">
                    <h1 class="pageTitle text-dark">Yangiliklar</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Asosiy</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Yangiliklar</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>

<main>
    <section>
        <div class="schoolNews py-5">
            <div class="container">
                <div class="navigationTabs mb-4 d-flex gap-2">
                    <a href="#tab1" class="active btn btn-outline-primary" data-tab="tab1">
                        <i class="fas fa-newspaper"></i> Yangiliklar
                    </a>
                    <a href="#tab2" class="btn btn-outline-secondary" data-tab="tab2">
                        <i class="fas fa-bullhorn"></i> E'lonlar
                    </a>
                </div>

                <div class="tab-content">
                    <!-- Yangiliklar tab -->
                    <div class="tab-pane fade show active" id="tab1">
                        @if($posts->count() > 0)
                            <div class="row g-4">
                                @foreach($posts as $post)
                                    <div class="col-xl-4 col-lg-4 col-md-6">
                                        <div class="card card-news h-100">
                                            @if(!empty($post->image))
                                                {{-- Agar rasm storage/app/public da bo'lsa: --}}
                                                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title ?? '' }}" class="card-img-top imageBox">
                                            @else
                                                <img src="{{ asset('image/no-image.png') }}" alt="no image" class="card-img-top imageBox">
                                            @endif
                                            <div class="card-body">
                                                <h5 class="card-title">
                                                    <a href="{{ route('newsDetail', $post->id) }}" class="text-dark text-decoration-none">
                                                        {{ Str::limit($post->title ?? ($post->title_uz ?? '—'), 100) }}
                                                    </a>
                                                </h5>
                                                <p class="text-muted small mb-2">
                                                    {{ $post->created_at ? $post->created_at->format('d F Y') : '' }}
                                                </p>
                                                <p class="card-text text-muted">
                                                    {{ Str::limit(strip_tags($post->body ?? $post->description ?? ''), 120) }}
                                                </p>
                                                <a href="{{ route('newsDetail', $post->id) }}" class="btn btn-sm btn-primary">Batafsil →</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="d-flex justify-content-center mt-4">
                                {{ $posts->links() }}
                            </div>
                        @else
                            <div class="alert alert-info text-center">
                                Hozircha yangiliklar mavjud emas.
                            </div>
                        @endif
                    </div>

                    <!-- E'lonlar tab (agar ishlasa, alohida list) -->
                    <div class="tab-pane fade" id="tab2">
                        <div class="row">
                            @if(isset($announces) && $announces->count())
                                @foreach($announces as $ann)
                                    <div class="col-md-4 mb-3">
                                        <div class="card p-3">
                                            <h5>{{ Str::limit($ann->title, 90) }}</h5>
                                            <p class="small text-muted">{{ $ann->created_at->format('d.m.Y') }}</p>
                                            <a href="#" class="btn btn-sm btn-outline-primary">Batafsil</a>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="col-12">
                                    <p class="text-muted">E'lonlar mavjud emas.</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<footer class="mt-5">
    <div class="footer">
        <div class="container py-4">
            <div class="row">
                <div class="col-12 mb-3">
                    <ul class="footer_menu list-inline">
                        <li class="list-inline-item"><a href="https://vacancy.argos.uz/">Bo'sh ish o'rinlari</a></li>
                        <li class="list-inline-item"><a href="#">Maktab qonun qoidalari</a></li>
                        <li class="list-inline-item"><a href="#">Tez-tez beriladigan savollar</a></li>
                        <li class="list-inline-item"><a href="#">Davlat ramzlari</a></li>
                    </ul>
                </div>
            </div>
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <a href="#"><i class="fab fa-instagram"></i> @10_maktab</a>
                    <span class="mx-3">|</span>
                    <a href="#"><i class="fas fa-envelope"></i> info@maktab.uz</a>
                </div>
                <div>
                    <img src="{{ asset('image/Gerb.png') }}" alt="logo" width="80">
                </div>
            </div>
            <div class="text-center mt-3 small text-muted">
                © {{ date('Y') }} Barcha huquqlar himoyalangan
            </div>
        </div>
    </div>
</footer>

<!-- Js -->
<script src="{{ asset('front/js/bootstrap.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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

    // Simple tab switching (keeps original behavior)
    document.addEventListener("DOMContentLoaded", function () {
        const tabLinks = document.querySelectorAll(".navigationTabs a");
        const tabPanes = document.querySelectorAll(".tab-content .tab-pane");
        tabLinks.forEach(function (tabLink) {
            tabLink.addEventListener("click", function (event) {
                event.preventDefault();
                tabLinks.forEach(l => l.classList.remove("active"));
                tabPanes.forEach(p => p.classList.remove("active","show"));
                const targetTabId = this.getAttribute("data-tab");
                const targetTabPane = document.getElementById(targetTabId);
                if (targetTabPane) {
                    this.classList.add("active");
                    targetTabPane.classList.add("active","show");
                }
            });
        });
    });
</script>
</body>
</html>
