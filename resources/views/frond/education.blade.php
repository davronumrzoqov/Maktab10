@extends('admin.site')
@section('content')

    <style>
        body {
            background: linear-gradient(135deg, #eef5ff, #fefefe);
            font-family: 'Poppins', sans-serif;
            color: #222;
        }
        .pageTitle {
            font-size: 32px;
            font-weight: 700;
            color: #004aad;
            text-transform: uppercase;
            position: relative;
            animation: fadeSlideDown 1s ease-in-out;
        }
        @keyframes fadeSlideDown {
            from {opacity: 0; transform: translateY(-30px);}
            to {opacity: 1; transform: translateY(0);}
        }
        .servicesList {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 25px;
            margin-top: 40px;
        }
        .servicesList a {
            text-decoration: none;
            background: #fff;
            border-radius: 20px;
            padding: 25px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: relative;
            box-shadow: 0 6px 20px rgba(0,0,0,0.05);
            transition: all 0.4s ease-in-out;
        }
        .servicesList a:hover {
            transform: translateY(-6px) scale(1.03);
            box-shadow: 0 10px 30px rgba(0, 123, 255, 0.25);
            background: linear-gradient(90deg, #007bff, #00c9a7);
            color: #fff;
        }
        .servicesList .icon {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: #e8f1ff;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .servicesList img {
            width: 55px;
        }
        .servicesList span {
            font-size: 18px;
            font-weight: 600;
            color: #333;
        }
        .servicesList a:hover span {
            color: #fff;
        }
    </style>

    <div class="container py-4">
        <h1 class="pageTitle text-center">{{ __("message.Ta'lim") }}</h1>

        <div class="servicesList">
            @foreach($smenaType as $smena)
                <a href="{{ route('educationDetail', $smena->id) }}">
                    <div class="icon">
                        <img src="{{ asset('image/Dars.png') }}" alt="icon">
                    </div>
                    <span>{{ $smena['name_' . App::getLocale()] }}</span>
                </a>
            @endforeach
        </div>
    </div>
@endsection
