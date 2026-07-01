@extends('layouts.adminLayout')
@section('content')

<style>
    body {
        background: #f8faff;
        font-family: 'Poppins', sans-serif;
    }

    .center-form {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        margin-left: 500px;
        animation: fadeIn 0.8s ease;
    }

    @keyframes fadeIn {
        from {opacity: 0; transform: translateY(30px);}
        to {opacity: 1; transform: translateY(0);}
    }

    .card {
        width: 100%;
        max-width: 600px;
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

    .form-control {
        border-radius: 10px;
        border: 1px solid #d1d9e6;
        transition: 0.3s;
    }

    .form-control:focus {
        border-color: #007bff;
        box-shadow: 0 0 5px rgba(0,123,255,0.3);
    }

    .btn-primary {
        background: linear-gradient(90deg, #007bff, #00c9a7);
        border: none;
        padding: 10px 25px;
        font-weight: 600;
        color: #fff;
        border-radius: 10px;
        transition: all 0.3s ease;
    }

    .btn-primary:hover {
        transform: scale(1.05);
    }

    .btn-success {
        background: #00c98d;
        border: none;
        color: white;
        font-weight: 600;
        border-radius: 10px;
    }
</style>

<div class="center-form">
    <form action="{{ route('admin.position.update', $position->id) }}" method="POST" class="card">
        @csrf
        @method('PUT')

        <div class="card-header">✏️ Lavozimni tahrirlash</div>

        <div class="card-body p-4">
            <a href="{{ route('admin.position.index') }}" class="btn btn-success mb-3">⬅ Orqaga</a>

            <div class="mb-3">
                <label>Nomi (UZ)</label>
                <input type="text" name="name_uz" class="form-control" value="{{ $position->name_uz }}">
            </div>

            <div class="mb-3">
                <label>Nomi (RU)</label>
                <input type="text" name="name_ru" class="form-control" value="{{ $position->name_ru }}">
            </div>

            <div class="text-end">
                <button class="btn btn-primary">💾 Yangilash</button>
            </div>
        </div>
    </form>
</div>

@endsection
