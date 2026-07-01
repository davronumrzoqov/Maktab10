@extends('layouts.adminLayout')
@section('title', 'Smena Tafsilotlari')

@section('content')
    <style>
        .main-content {
            margin-left: 250px;
            padding: 30px;
            background-color: #f8fafc;
            min-height: 100vh;
        }
        .card {
            max-width: 700px;
            margin: 0 auto;
            background: white;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .card-header {
            background: #007bff;
            color: white;
            border-radius: 12px 12px 0 0;
            padding: 15px 20px;
        }
        .card-body {
            padding: 25px;
        }
        .info p {
            font-size: 16px;
            margin: 8px 0;
        }
        .btn-back {
            margin-top: 20px;
        }
    </style>

    <div class="main-content">
        <section class="section">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>📋 Smena Tafsilotlari</h4>
                    <a href="{{ route('admin.smenatype.index') }}" class="btn btn-light text-dark border">
                        ⬅ Orqaga
                    </a>
                </div>

                <div class="card-body">
                    <div class="info">
                        <p><strong>ID:</strong> {{ $smenatype->id }}</p>
                        <p><strong>Nom (UZ):</strong> {{ $smenatype->name_uz }}</p>
                        <p><strong>Nom (RU):</strong> {{ $smenatype->name_ru }}</p>
                        <p><strong>Yaratilgan sana:</strong> {{ $smenatype->created_at->format('d.m.Y H:i') }}</p>
                        <p><strong>Yangilangan sana:</strong> {{ $smenatype->updated_at->format('d.m.Y H:i') }}</p>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
