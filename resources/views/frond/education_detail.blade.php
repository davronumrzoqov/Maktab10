@extends('admin.site')
@section('content')

    <style>
        body {
            background: radial-gradient(circle at top left, #e3f2ff, #ffffff 70%);
            font-family: 'Poppins', sans-serif;
        }
        .container {
            max-width: 900px;
            margin: 70px auto;
            padding: 0 20px;
        }
        h1 {
            text-align: center;
            font-size: 38px;
            font-weight: 800;
            color: #007bff;
            text-transform: uppercase;
            background: linear-gradient(90deg, #007bff, #00c9a7);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .card {
            background: #fff;
            border-radius: 22px;
            box-shadow: 0 12px 35px rgba(0,0,0,0.08);
            transition: all 0.4s ease;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 18px 45px rgba(0,123,255,0.25);
        }
        .card-body {
            text-align: center;
            padding: 40px;
        }
        .card-title {
            font-size: 22px;
            font-weight: 700;
            color: #007bff;
        }
        .btn-gradient {
            background: linear-gradient(90deg, #007bff, #00c9a7);
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 12px;
            font-weight: 600;
            text-transform: uppercase;
            text-decoration: none;
            transition: 0.3s;
            display: inline-block;
        }
        .btn-gradient:hover {
            transform: scale(1.08);
        }
    </style>

    <div class="container">
        <h1>{{ $smena['name_' . App::getLocale()] }}</h1>

        @foreach($smena->schudelis as $schedule)
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title"><i class="fa-solid fa-calendar-day"></i> {{ $schedule->week_day }}</h5>
                    <p><strong><i class="fa-solid fa-clock"></i> Vaqti:</strong> {{ $schedule->time }}</p>
                    @if($schedule->file)
                        <a href="{{ asset('admin/files/' . $schedule->file) }}" target="_blank" class="btn-gradient mt-3">
                            <i class="fa-solid fa-file-pdf"></i> PDF ni ochish
                        </a>
                    @endif
                </div>
            </div>
        @endforeach

        <div class="text-center mt-5">
            <a href="{{ route('education') }}" class="btn-gradient">
                <i class="fa-solid fa-arrow-left"></i> Orqaga
            </a>
        </div>
    </div>

    <script src="https://kit.fontawesome.com/a2d5dfc8f7.js" crossorigin="anonymous"></script>
@endsection
