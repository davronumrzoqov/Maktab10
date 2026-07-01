@extends('layouts.adminLayout')
@section('content')

    <style>
        .center-card {
            margin-left: 250px; /* sidebar eni */
            padding: 20px;
            background-color: #f8fafc;
            min-height: 100vh;
        }

        .card {
            width: 100%;
            max-width: 700px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            padding: 20px;
            text-align: center;
        }

        .card-header {
            background: linear-gradient(90deg, #007bff, #00c9a7);
            color: white;
            font-size: 20px;
            font-weight: 600;
            padding: 15px;
            border-radius: 15px 15px 0 0;
            margin-bottom: 20px;
        }

        img {
            border-radius: 10px;
            max-width: 100%;
            margin-bottom: 15px;
        }
    </style>

    <div class="center-card">
        <div class="card">
            <h5 class="card-header">InfoGrafika Details</h5>

            <h4>{{ $infoGrafika->title_uz }}</h4>
            <h5>{{ $infoGrafika->title_ru }}</h5>

            <div>
                <img src="{{ asset('admin/images/' . $infoGrafika->image) }}" alt="InfoGrafika Image">
            </div>

            <a href="{{ route('admin.infografika.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>

@endsection
