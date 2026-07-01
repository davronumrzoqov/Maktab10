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
        min-height: 90vh;
        margin-left: 500px;
        animation: fadeIn 0.8s ease;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .card {
        width: 100%;
        max-width: 600px;
        background: white;
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0, 123, 255, 0.1);
        overflow: hidden;
        padding: 25px;
    }

    .card-header {
        background: linear-gradient(90deg, #007bff, #00c9a7);
        color: white;
        font-weight: 600;
        font-size: 22px;
        text-align: center;
        padding: 15px;
        border-radius: 15px;
    }

    .btn-success {
        background: #00c98d;
        border: none;
        color: white;
        font-weight: 600;
        border-radius: 10px;
    }
</style>

<div class="center-card">
    <div class="card">
        <div class="card-header">📋 Lavozim ma’lumotlari</div>

        <h4><strong>🇺🇿 Nomi (UZ):</strong> {{ $position->name_uz }}</h4>
        <h4><strong>🇷🇺 Nomi (RU):</strong> {{ $position->name_ru }}</h4>

        <div class="text-end mt-4">
            <a href="{{ route('admin.position.index') }}" class="btn btn-success">⬅ Orqaga</a>
        </div>
    </div>
</div>

@endsection
