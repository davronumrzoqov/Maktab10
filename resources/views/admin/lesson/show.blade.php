@extends('layouts.adminLayout')
@section('content')

<style>
    body {
        background: #f8faff;
        font-family: 'Poppins', sans-serif;
    }

    .center-card {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        padding: 20px;
        transform: translateX(500px);
        animation: fadeIn 0.8s ease;
    }

    @keyframes fadeIn {
        from {opacity: 0; transform: translate(500px, 30px);}
        to {opacity: 1; transform: translate(500px, 0);}
    }

    .card {
        width: 100%;
        max-width: 700px;
        background: white;
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0, 123, 255, 0.1);
        overflow: hidden;
    }

    .card-header {
        background: linear-gradient(90deg, #007bff, #00c9a7);
        color: white;
        font-size: 22px;
        font-weight: 600;
        text-align: center;
        padding: 20px;
    }

    .card-body {
        padding: 30px;
    }

    .info-label {
        font-weight: 600;
        color: #333;
        margin-top: 10px;
    }

    .info-text {
        font-size: 18px;
        color: #555;
        margin-bottom: 15px;
    }

    .btn-success {
        background: #00c98d;
        border: none;
        color: white;
        font-weight: 600;
        border-radius: 10px;
        padding: 10px 20px;
        transition: 0.3s;
    }

    .btn-success:hover {
        opacity: 0.9;
    }
</style>

<div class="center-card">
    <div class="card">
        <div class="card-header">📘 Dars Tafsilotlari</div>
        <div class="card-body">
            <a href="{{ route('admin.lesson.index') }}" class="btn btn-success mb-3">⬅ Orqaga</a>

            <div class="info-label">Nomi (UZ):</div>
            <div class="info-text">{{ $lesson->name_uz }}</div>

            <div class="info-label">Nomi (RU):</div>
            <div class="info-text">{{ $lesson->name_ru }}</div>
        </div>
    </div>
</div>

@endsection
