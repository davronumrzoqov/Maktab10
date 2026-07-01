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
        transition: transform 0.4s ease;
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
        transition: all 0.3s ease;
    }

    .form-control:focus {
        border-color: #007bff;
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.3);
    }

    label {
        font-weight: 600;
        color: #333;
        margin-bottom: 5px;
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

    .btn-success:hover {
        opacity: 0.9;
    }
</style>

<div class="center-form">
    <form action="{{ route('admin.lesson.update', $lesson->id) }}" method="POST" class="card">
        @csrf
        @method('PUT')

        <div class="card-header">✏️ Darsni Tahrirlash</div>

        <div class="card-body p-4">
            <a href="{{ route('admin.lesson.index') }}" class="btn btn-success mb-3">⬅ Orqaga</a>

            <div class="mb-3">
                <label for="name_uz">Dars nomi (UZ)</label>
                <input type="text" class="form-control" id="name_uz" name="name_uz"
                       value="{{ old('name_uz', $lesson->name_uz) }}">
            </div>

            <div class="mb-3">
                <label for="name_ru">Dars nomi (RU)</label>
                <input type="text" class="form-control" id="name_ru" name="name_ru"
                       value="{{ old('name_ru', $lesson->name_ru) }}">
            </div>

            <div class="d-flex justify-content-end">
                <button class="btn btn-primary" type="submit">💾 Saqlash</button>
            </div>
        </div>
    </form>
</div>

@endsection
