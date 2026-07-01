@extends('layouts.adminLayout')
@section('title', 'Dars Jadvalini Tahrirlash')

@section('content')
    <style>
        .main-content {
            margin-left: 250px;
            padding: 30px;
            background-color: #f8fafc;
            min-height: 100vh;
        }

        .card {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .card-header {
            background: #28a745;
            color: white;
            border-radius: 12px 12px 0 0;
            padding: 15px 20px;
            text-align: center;
        }

        .card-body {
            padding: 25px;
        }

        label {
            font-weight: 600;
            margin-bottom: 5px;
        }

        .form-control {
            border-radius: 8px;
            padding: 10px;
        }

        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 4px rgba(0,123,255,0.3);
        }

        .btn-save {
            background-color: #007bff;
            color: white;
            border-radius: 8px;
            padding: 10px 25px;
        }

        .btn-cancel {
            background-color: #6c757d;
            color: white;
            border-radius: 8px;
            padding: 10px 25px;
        }

        .img-preview {
            max-width: 150px;
            border-radius: 10px;
            border: 1px solid #e0e0e0;
        }
    </style>

    <div class="main-content">
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h4>📝 Dars Jadvalini Tahrirlash</h4>
                </div>

                <form action="{{ route('admin.schudeli.update', $schudeli->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="card-body">

                        <div class="mb-3">
                            <label for="smena_id">Smena turi</label>
                            <select name="smena_id" id="smena_id" class="form-control">
                                @foreach($smenatype as $smena)
                                    <option value="{{ $smena->id }}" {{ $schudeli->smena_id == $smena->id ? 'selected' : '' }}>
                                        {{ $smena->name_uz }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="lesson_id">Dars</label>
                            <select name="lesson_id" id="lesson_id" class="form-control">
                                @foreach($lessons as $lesson)
                                    <option value="{{ $lesson->id }}" {{ $schudeli->lesson_id == $lesson->id ? 'selected' : '' }}>
                                        {{ $lesson->name_uz }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="week_day">Hafta kuni</label>
                            <input type="text" name="week_day" id="week_day" value="{{ $schudeli->week_day }}" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="room">Xona</label>
                            <input type="text" name="room" id="room" value="{{ $schudeli->room }}" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="time">Vaqt</label>
                            <input type="text" name="time" id="time" value="{{ $schudeli->time }}" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="image">Rasm</label>
                            <input type="file" name="image" id="image" class="form-control">
                            @if($schudeli->image)
                                <div class="mt-2">
                                    <img src="{{ asset('admin/images/' . $schudeli->image) }}" alt="Rasm" class="img-preview">
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="text-center mb-4">
                        <button type="submit" class="btn btn-save">💾 Saqlash</button>
                        <a href="{{ route('admin.schudeli.show', $schudeli->id) }}" class="btn btn-cancel">⬅ Bekor qilish</a>
                    </div>
                </form>
            </div>
        </section>
    </div>
@endsection
