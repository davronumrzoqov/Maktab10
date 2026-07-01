@extends('layouts.frontLayout')

@section('content')
    <main>
        <section>
            <div class="container leaderShip">
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
