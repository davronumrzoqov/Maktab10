@extends('layouts.adminLayout')
@section('title', 'Admin - Yangi Foydali Resurs Qo‘shish')

@section('content')
    <style>
        .main-content {
            display: flex;
            justify-content: flex-start;
            align-items: center;
            min-height: 100vh;
            background-color: #f3f4f6;
            padding-left: 350px; /* sidebar joy */
            padding-right: 50px;
        }

        .form-wrapper {
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
            padding: 40px;
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
        }

        .form-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .form-header h3 {
            font-weight: 700;
            color: #1e3a8a;
        }

        .form-label {
            font-weight: 500;
            color: #374151;
        }

        .btn-primary {
            background-color: #4f46e5;
            border: none;
            border-radius: 10px;
            padding: 10px 25px;
            font-weight: 600;
            transition: 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #4338ca;
        }

        .btn-success {
            background-color: #22c55e;
            border: none;
            border-radius: 10px;
            padding: 8px 18px;
            font-weight: 500;
            text-decoration: none;
            transition: 0.3s ease;
        }

        .btn-success:hover {
            background-color: #16a34a;
        }

        input.form-control {
            border-radius: 10px;
            padding: 10px 14px;
        }

        .invalid-feedback {
            font-size: 14px;
        }
    </style>

    <div class="main-content">
        <div class="form-wrapper">
            <div class="form-header">
                <h3>📝 Yangi Foydali Resurs Qo‘shish</h3>
                <a href="{{ route('admin.usefulResource.index') }}" class="btn btn-success">⬅ Orqaga</a>
            </div>

            <form action="{{ route('admin.usefulResource.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-4">
                    <label for="title_uz" class="form-label">Sarlavha (uz)</label>
                    <input type="text" class="form-control @error('title_uz') is-invalid @enderror"
                           id="title_uz" name="title_uz" placeholder="Sarlavha (uzbekcha)..."
                           value="{{ old('title_uz') }}">
                    @error('title_uz')
                    <div class="invalid-feedback" style="color:red;">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="title_ru" class="form-label">Sarlavha (ru)</label>
                    <input type="text" class="form-control @error('title_ru') is-invalid @enderror"
                           id="title_ru" name="title_ru" placeholder="Sarlavha (ruscha)..."
                           value="{{ old('title_ru') }}">
                    @error('title_ru')
                    <div class="invalid-feedback" style="color:red;">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="body_uz" class="form-label">Tavsif (uz)</label>
                    <textarea class="form-control @error('body_uz') is-invalid @enderror"
                              id="body_uz" name="body_uz" rows="3"
                              placeholder="Tavsif (uzbekcha)...">{{ old('body_uz') }}</textarea>
                    @error('body_uz')
                    <div class="invalid-feedback" style="color:red;">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="body_ru" class="form-label">Tavsif (ru)</label>
                    <textarea class="form-control @error('body_ru') is-invalid @enderror"
                              id="body_ru" name="body_ru" rows="3"
                              placeholder="Tavsif (ruscha)...">{{ old('body_ru') }}</textarea>
                    @error('body_ru')
                    <div class="invalid-feedback" style="color:red;">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="image" class="form-label">Rasm</label>
                    <input type="file" class="form-control @error('image') is-invalid @enderror"
                           id="image" name="image" accept="image/*">
                    @error('image')
                    <div class="invalid-feedback" style="color:red;">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">💾 Saqlash</button>
                </div>
            </form>
        </div>
    </div>
@endsection
