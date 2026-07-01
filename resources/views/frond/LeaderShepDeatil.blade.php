@extends('admin.site')
@section('content')

            <!-- Image Header Start-->
            <div class="mainContent withImage">
                <div class="imageHeader" style="padding-bottom: 0px;">
                    <div class="container">
                        <h1 class="pageTitle text-dark">{{ __('message.Rahbariyat batafsil') }}</h1>
                        <nav aria-label="breadcrumb">
                            <ol id="w5" class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('index')}}">{{ __('message.home') }}</a></li>
                                <li class="breadcrumb-item " aria-current="page">{{ __('message.Rahbariyat batafsil') }}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>


    <!-- Header End -->

    <!-- Main section Start -->
    <main>
        <section>
            <div class="container leaderShep">
                <div class="leaderInfo d-flex gap-4">
                    <div class="photo">
                        <img src="{{ asset('admin/images/'.$teacher->image) }}" alt="{{ $teacher->name_uz }}">
                    </div>
                    <div class="description">
                        <h1>{{ $teacher['name_'.App::getLocale()] }}</h1>
                        <h2>{{ $teacher->position['name_'.App::getLocale()] ?? 'Lavozim belgilanmagan' }}</h2>
                        <div class="contactInfo">
                            @if($teacher->work_time)
                                <div><i class="far fa-clock"></i> {{ $teacher->work_time }}</div>
                            @endif
                            @if($teacher->phone)
                                <div><i class="fas fa-phone-alt"></i> <a href="tel:{{ $teacher->phone }}">{{ $teacher->phone }}</a></div>
                            @endif
                            @if($teacher->email)
                                <div><i class="far fa-envelope-open"></i> <a href="mailto:{{ $teacher->email }}">{{ $teacher->email }}</a></div>
                            @endif
                        </div>
                        <div class="collapseBox mt-2">
                            <a data-toggle="collapse" href="#collapseExample" role="button">Biografiya</a>
                            <div class="collapse" id="collapseExample">
                                <p>{{ $teacher->biography ?? 'Biografiya mavjud emas.' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    @endsection

