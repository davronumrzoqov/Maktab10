@extends('layouts.adminLayout')
@section('content')

<style>
    body {
        background: #f8faff;
        font-family: 'Poppins', sans-serif;
    }

    /* Formani ekranning markaziga olib kelish va 500px o‘ngga surish */
    .center-form {
        display: flex;
        justify-content: center; /* markazda */
        align-items: center;     /* vertikal markaz */
        min-height: 100vh;
        padding: 20px;
        animation: fadeIn 0.8s ease;
        margin-left: 500px; /* 🔥 500px o‘ngga surish */
    }

    @keyframes fadeIn {
        from {opacity: 0; transform: translateY(30px);}
        to {opacity: 1; transform: translateY(0);}
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

    .card:hover {
        transform: scale(1.02);
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
        box-shadow: none;
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
    <form action="{{ route('admin.schudeli.store') }}" method="POST" enctype="multipart/form-data" class="card">
        @csrf

        <div class="card-header">🗓️ Yangi Dars Jadvali Qo‘shish</div>

        <div class="card-body p-4">
            <a href="{{ route('admin.schudeli.index') }}" class="btn btn-success mb-3">⬅ Orqaga</a>

            <div class="mb-3">
                <label for="smena_id">Smena tanlang</label>
                <select class="form-control" name="smena_id" id="smena_id">
                    <option value="">-- Smena tanlang --</option>
                    @foreach($smenatype as $smena)
                        <option value="{{ $smena->id }}">{{ $smena->name_uz }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="lesson_id">Fan (Lesson)</label>
                <select class="form-control" name="lesson_id" id="lesson_id">
                    <option value="">-- Fan tanlang --</option>
                    @foreach($lessons as $lesson)
                        <option value="{{ $lesson->id }}">{{ $lesson->name_uz }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="week_day">Sinflar nomi</label>
                <input type="text" class="form-control" id="week_day" placeholder="Masalan: 1-sinf" name="week_day" value="{{ old('week_day') }}">
            </div>

            <div class="mb-3">
                <label for="time">Dars vaqti</label>
                <input type="time" class="form-control" id="time" name="time" value="{{ old('time') }}">
            </div>

            <div class="mb-3">
                <label for="room">Xona (Room)</label>
                <input type="text" class="form-control" id="room" placeholder="Masalan: 12-xona" name="room" value="{{ old('room') }}">
            </div>

            <div class="mb-3">
                <label for="file">PDF yuklang</label>
                <input type="file" class="form-control" id="file" name="file" accept="application/pdf">
            </div>


            <div class="d-flex justify-content-end">
                <button class="btn btn-primary" type="submit">💾 Saqlash</button>
            </div>
        </div>
    </form>
</div>

@endsection
