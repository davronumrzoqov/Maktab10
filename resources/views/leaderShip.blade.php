@extends('layouts.frontLayout')

@section('content')
    <main>
        <section class="leaderShip">
            <div class="container">
                @foreach($leaders as $position => $teachersGroup)
                    @if(str_contains(strtolower($position), 'direktor'))
                        @foreach($teachersGroup as $teacher)
                            <a href="{{ route('leaderShepDetail', $teacher->id) }}" class="mainLeader mb-4 d-flex align-items-center gap-3">
                                <img src="{{ asset('admin/images/'.$teacher->image) }}" alt="{{ $teacher->name_uz }}" width="150">
                                <div class="details">
                                    <h1><b>{{ $teacher['name_'.App::getLocale()] }}</b></h1>
                                    <span>{{ $position }}</span>
                                </div>
                            </a>
                        @endforeach
                        <hr class="sections__line">
                    @else
                        <div class="row">
                            @foreach($teachersGroup as $teacher)
                                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                                    <a href="{{ route('leaderShepDetail', $teacher->id) }}" class="deputy_director-main d-block text-center">
                                        <img src="{{ asset('admin/images/'.$teacher->image) }}" width="60%" alt="{{ $teacher->name_uz }}">
                                        <div class="deputy_director-details mt-2">
                                            <h1><b>{{ $teacher['name_'.App::getLocale()] }}</b></h1>
                                            <span>{{ $position }}</span>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                        <hr class="sections__line">
                    @endif
                @endforeach
            </div>
        </section>
    </main>
@endsection
