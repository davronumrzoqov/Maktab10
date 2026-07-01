@extends('admin.site')



@section('content')

    <style>
        .bigBannerContent {
            width: 100%;
            height: 80vh; /* ekran balandligi bo‘yicha to‘liq */
            background-size: cover; /* rasm to‘liq qoplansin */
            background-position: center; /* markazlash */
            background-repeat: no-repeat;
            position: relative;
        }

        .quote, .quote h2, .quote p, .quote span {
            color: white;
        }

    </style>

    <div class="bigBannerContent" style="background-image: url('image/10-maktab.jpg');">
        <div class="bannerContent">
            <div class="container-fluid">
                <div class="row">
                    <div class="logoTextBox">
                        <div class="col-12">
                            @if(isset($HomePageImageTag))
                                @foreach($HomePageImageTag as $homePage)
                                    <div class="quote text-center">
                                        <h2>{!! __("message.school1") !!}</h2>
                                        <p>{{ $homePage['title_' . app()->getLocale()] }}</p>
                                        <span><a style="color: white" href="https://kun.uz/ru/news/2022/10/04/katalin-novak-ya-s-neterpeniyem-jdu-svoyego-ofitsialnogo-vizita-v-tashkent">{!! __("message.Shavkat_Mirziyoyev") !!}</a></span>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<main>
    <section>
        <div class="container">
            <!-- Service List Start -->
            <div class="mainServicesList">
                <a href="{{ route('leaderShep') }}">
                    <div class="icon">
                        <img alt="icon" src="image/Direktor.png" width="45%" style="margin-left: 75px;">
                    </div>
                    <h1>{{ __('message.Direktor') }}</h1>
                    <div class="description"></div>
                    <button type="button">{{ __('message.Batafsil') }}</button>
                </a>
                <a href="{{ route('teachers') }}">
                    <div class="icon">
                        <img alt="icon" src="image/oqtuvchi.png" width="45%" style="margin-left: 80px;">
                    </div>
                    <h1>{{ __('message.Oqituvchilar') }}</h1>
                    <div class="description"></div>
                    <button type="button">{{ __('message.Batafsil') }}</button>
                </a>
                <a href="{{ route('education') }}">
                    <div class="icon">
                        <img alt="icon" src="image/oquvchi.png" width="45%" style="margin-left: 60px;">
                    </div>
                    <h1>{{ __('message.Oquvchilar') }}</h1>
                    <div class="description">
                        @foreach($schedule as $schudel)
                            <p>{{ $schudel->week_day}}</p>
                        @endforeach
                    </div>
                    <button type="button">{{ __('message.Batafsil') }}</button>
                </a>

            </div>
            <!-- Service List End -->

            <!-- School Info Start -->
            @if(isset($statictik) && count($statictik))
    <div class="row">
        <h1 class="text-center text-uppercase mt-5 title">{{ __('message.Maktab Haqida Qisqacha') }}</h1>
        @foreach($statictik as $stat)
            <div class="col-lg-3 col-md-6">
                <div class="school_info" data-tilt data-tilt-scale="1.1">
                    <h2>{{ $stat->classesCount }}</h2>
                    <p>{{ __('message.Sinflar Soni') }}</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="school_info" data-tilt data-tilt-scale="1.1">
                    <h2>{{ $stat->studentsCount }}</h2>
                    <p>{{ __('message.O`quvchilar Soni') }}</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="school_info" data-tilt data-tilt-scale="1.1">
                    <h2>{{ $stat->teachersCount }}</h2>
                    <p>{{ __('message.O`qituvchilar Soni') }}</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="school_info" data-tilt data-tilt-scale="1.1">
                    <h2>{{ $stat->graduatesCount }}</h2>
                    <p>{{ __('message.Bituruvchilar Soni') }}</p>
                </div>
            </div>
        @endforeach
    </div>
@else
    <p>Statistika ma'lumotlari mavjud emas.</p>
@endif
            <!-- School Info End -->

            <hr class="sections__line">

            <!-- Online School Come Start -->
            <div class="onlineSchool">
                <div class="row">
                    <div class="col-lg-6 col-md-12 text-md-center d-md-inline-block d-flex align-items-center">
                        <div class="onlineSchool__info">
                            <h1>{{ __('message.Agar siz maktabgabora olmasangiz,maktab sizning uyingizga borishi mumkin.') }}</h1>
                            <p>{{ __("message.Maktab.uz - bu xalqaro standartlarga javob beradigan va maktab o'quvchilari uchun yuqori sifatli uzluksiz masofaviy ta'limni ta'minlaydigan ilg'or raqamli ta'lim texnologiyasi.") }}</p>
                            <a href="https://login.emaktab.uz/" target="_blank" class="btns">
                                {{ __('message.Batafsil') }}
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="onlineSchool__img">
                            <img src="image/onlineSchool2.png" width="75%" alt="OnlineSchool">
                        </div>
                    </div>
                </div>
            </div>
            <!-- Online School Come End -->

            <hr class="sections__line">

            <!-- Section News Start -->
            <div class="news">
                <div class="row mb-4">
                   @if(isset($posts) && count($posts))
    <div class="row mb-4">
        @foreach($posts as $post)
    <div class="col-lg-4 col-md-6">
        <a href="{{ route('newsDetail', $post->id)}}">
            <div class="imageBox">
                <img alt="image" src="{{ asset('storage/' . $post->image) }}" width="170px">
            </div>
            <h1>{{ \Illuminate\Support\Str::limit($post['body_' . app()->getLocale()], 100) }}</h1>
            <span class="news__date">{{ $post->created_at->format('H:i') }} / {{ $post->created_at->format('d.m.Y') }}</span>
        </a>
    </div>
@endforeach

    </div>
@else
    <p>Yangiliklar mavjud emas.</p>
@endif
                </div>
            </div>
            <!-- Section News End -->

            <hr class="sections__line mt-0">

            <!--Map Section Start-->
            <div class="mapArea">
                <div class="row">
                    <div class="col-lg-12 col-md-12 mt-4">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d3065.574597133919!2d68.58235424882928!3d40.49803017347152!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1smirzaobod%20tuman%2010-%20umumiy%20o%CA%BBrta%20ta%CA%BClim%20maktabi!5e1!3m2!1sru!2s!4v1760779785894!5m2!1sru!2s"
                            width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>

            <!--Map Section End-->

            <hr class="sections__line mt-5">

            <!-- Contact Section Start -->
            <div class="contact">
                <h1 class="text-center text-uppercase mb-5">{{ __('message.Biz bilan Boglaning') }}</h1>
                 <div class="row">
                        <div class="col-md-7">
                            <form action="{{ route('SendEmail') }}" method="POST">
                                @csrf
                                <div class="row contact_row1">
                                    <div class="col-lg-6">
                                    <input type="text" placeholder="{{ __('message.I.F.SH') }}" name="name">
                                </div>
                                    <div class="col-lg-6">
                                    <input type="email" placeholder="{{ __('message.Email') }}" name="email">
                                </div>
                                </div>
                                <div class="row contact_row2">
                                     <div class="col-lg-6">
                                    <input type="text"  placeholder="{{ __('message.+998') }}" name="phone">
                                </div>
                                    <div class="col-lg-6">
                                    <input type="text" placeholder="{{ __('message.Mavzu') }}" name="mavzu">
                                </div>
                                </div>
                                <div class="row contact_row3">
                                    <div class="col-12">
                                    <input type="text" placeholder="{{ __('message.Xabarlar') }}" name="message">
                                    <button type="submit" class="contact_btn">{{ __('message.Yuborish') }}</button>
                                </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-5">
                            <h2 class="mb-3">{{ __('message.10-sonli maktab') }}</h2>

                            <table id="w9" class="table table-striped table-bordered detail-view">
                                <tbody>
                                <tr>
                                    <th>{{ __('message.Mudir') }}:</th>
                                    <td>Umrzoqov Davron</td>
                                </tr>
                                <tr>
                                    <th>{{ __('message.Telefon') }}:</th>
                                    <td>+99891-191-84-48</td>
                                </tr>
                                <tr>
                                    <th>{{ __('message.Faks') }}:</th>
                                    <td>+99891-191-84-48</td>
                                </tr>
                                <tr>
                                    <th>{{ __('message.instagram') }}:</th>
                                    <td>@10-maktab</td>
                                </tr>
                                <tr>
                                    <th>{{ __('message.telegram') }}:</th>
                                    <td>@10-maktab</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
            </div>
            <!-- Contact Section End -->

            <hr class="sections__line mt-5">

            <!-- Useful Links Start -->
            <div class="usefulLinks container my-5">
                <h1 class="title text-center mb-5">{{ __('message.Foydali resurslar') }}</h1>

                <div class="slider-wrapper">
                    <div class="slider-track">
                        <a href="https://president.uz" target="_blank" class="link-item">
                            <img src="{{ asset('image/Gerb.png') }}" alt="Grerb">
                            <span>{{ __('message.Prezident sayt') }}</span>
                        </a>

                        <a href="https://pm.gov.uz" target="_blank" class="link-item">
                            <img src="{{ asset('image/prenzident.png') }}" alt="Prenzident">
                            <span>{{ __('message.Prezident virtual qabulxonasi') }}</span>
                        </a>

                        <a href="http://gov.uz" target="_blank" class="link-item">
                            <img src="{{ asset('image/Oliy majlis.jpg') }}" alt="majlis">
                            <span>{{ __('message.Hukumat portali') }}</span>
                        </a>

                        <a href="https://my.gov.uz/uz/spheres/9" target="_blank" class="link-item">
                            <img src="{{ asset('image/img.png') }}" alt="davlat">
                            <span>{{ __('message.Yagona davlat xizmatlari portali') }}</span>
                        </a>

                        <a href="http://kitob.uz" target="_blank" class="link-item">
                            <img src="{{ asset('image/kutubxona.jpg') }}" alt="kitob">
                            <span>{{ __('message.Bolalar kutubxonasi') }}</span>
                        </a>

                        <a href="https://data.egov.uz/" target="_blank" class="link-item">
                            <img src="{{ asset('image/ochiq.png') }}" alt="data">
                            <span>{{ __('message.Ochiq maʼlumotlar portali') }}</span>
                        </a>


                        <a href="https://constitution.uz" target="_blank" class="link-item">
                            <img src="{{ asset('image/mygovUz.jpg') }}" alt="data">
                            <span>{{ __('message.Konstitutsiya portali') }}</span>
                        </a>
                    </div>
                </div>
            </div>
            <!-- Useful Links End -->

            <style>
                .usefulLinks {
                    text-align: center;
                }

                .usefulLinks .title {
                    font-weight: 700;
                    font-size: 2rem;
                    color: #1e3a8a;
                }

                .slider-wrapper {
                    overflow: hidden;
                    width: 100%;
                    position: relative;
                }

                .slider-track {
                    display: flex;
                    gap: 30px;
                    animation: slide 40s linear infinite;
                }

                .link-item {
                    background: #ffffff;
                    border-radius: 20px;
                    width: 210px;
                    text-align: center;
                    text-decoration: none;
                    color: #333;
                    box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
                    transition: 0.3s ease;
                    padding: 20px;
                    flex-shrink: 0;
                }

                .link-item:hover {
                    transform: translateY(-8px);
                    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
                }

                .link-item img {
                    width: 100px;
                    height: 100px;
                    border-radius: 50%;
                    object-fit: cover;
                    margin-bottom: 10px;
                    border: 3px solid #1e3a8a;
                }

                .link-item span {
                    display: block;
                    font-size: 15px;
                    font-weight: 600;
                    color: #1e293b;
                    line-height: 1.3;
                }

                @keyframes slide {
                    0% { transform: translateX(0); }
                    100% { transform: translateX(-50%); }
                }

                /* Responsive */
                @media (max-width: 768px) {
                    .link-item {
                        width: 160px;
                        padding: 15px;
                    }

                    .link-item img {
                        width: 80px;
                        height: 80px;
                    }

                    .slider-track {
                        gap: 20px;
                        animation: slide 15s linear infinite;
                    }
                }
            </style>

            <script>
                document.addEventListener("DOMContentLoaded", () => {
                    const track = document.querySelector('.slider-track');
                    // cheksiz harakat uchun kontentni ikki marta joylashtirish
                    track.innerHTML += track.innerHTML;
                });
            </script>


        </div>
    </section>
</main>

@endsection
