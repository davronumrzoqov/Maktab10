@extends('layouts.adminLayout')
@section('content')

    <style>
        /* Umumiy joylashuv */
        .page-center {
            display: flex;
            justify-content: flex-start;
            align-items: center;
            min-height: 100vh;
            background-color: #f3f4f6;
            padding-left: 350px; /* sidebar joy */
            padding-right: 50px;
        }

        /* Card */
        .card {
            width: 100%;
            max-width: 750px;
            background: #fff;
            border-radius: 18px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 32px rgba(99, 102, 241, 0.2);
        }

        .card-header {
            background: linear-gradient(90deg, #4e73df, #6366f1);
            color: #fff;
            text-align: center;
            font-weight: 600;
            font-size: 1.3rem;
            padding: 1rem;
            border-top-left-radius: 18px;
            border-top-right-radius: 18px;
        }

        /* Inputlar */
        .form-label {
            font-weight: 500;
            color: #374151;
        }

        .form-control {
            border-radius: 10px;
            padding: 10px 12px;
            border: 1px solid #d1d5db;
            background-color: #f9fafb;
            transition: all 0.2s ease-in-out;
        }

        .form-control:focus {
            border-color: #6366f1;
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.2);
        }

        /* Tugmalar */
        .btn-success {
            border-radius: 12px;
            padding: 8px 20px;
            font-weight: 500;
            background-color: #22c55e;
            border: none;
            color: #fff;
            transition: all 0.3s ease;
        }

        .btn-success:hover {
            background-color: #16a34a;
            transform: translateY(-2px);
        }

        .btn-primary {
            background: linear-gradient(90deg, #4e73df, #6366f1);
            border: none;
            color: #fff;
            padding: 10px 20px;
            border-radius: 12px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 14px rgba(99, 102, 241, 0.25);
        }
    </style>

    <div class="page-center">
        <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="card">
                <h5 class="card-header">📰 Create Post</h5>
                <div class="card-body">
                    <a href="{{ route('admin.posts.index') }}" class="btn btn-success mb-3">⬅ Back</a>

                    {{-- Title (UZ) --}}
                    <div class="mb-4">
                        <label for="title_uz" class="form-label">Title (UZ)</label>
                        <input type="text" class="form-control @error('title_uz') is-invalid @enderror" id="title_uz" placeholder="Sarlavha (UZ)..." name="title_uz" value="{{ old('title_uz') }}">
                        @error('title_uz')
                        <div class="invalid-feedback" style="color: red;">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Title (RU) --}}
                    <div class="mb-4">
                        <label for="title_ru" class="form-label">Title (RU)</label>
                        <input type="text" class="form-control @error('title_ru') is-invalid @enderror" id="title_ru" placeholder="Заголовок (RU)..." name="title_ru" value="{{ old('title_ru') }}">
                        @error('title_ru')
                        <div class="invalid-feedback" style="color: red;">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Body (UZ) --}}
                    <div class="mb-4">
                        <label for="body_uz" class="form-label">Body (UZ)</label>
                        <textarea class="form-control @error('body_uz') is-invalid @enderror" id="body_uz" rows="4" placeholder="Matn (UZ)..." name="body_uz">{{ old('body_uz') }}</textarea>
                        @error('body_uz')
                        <div class="invalid-feedback" style="color: red;">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Body (RU) --}}
                    <div class="mb-4">
                        <label for="body_ru" class="form-label">Body (RU)</label>
                        <textarea class="form-control @error('body_ru') is-invalid @enderror" id="body_ru" rows="4" placeholder="Текст (RU)..." name="body_ru">{{ old('body_ru') }}</textarea>
                        @error('body_ru')
                        <div class="invalid-feedback" style="color: red;">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="type">Post turi</label>
                        <select name="type" id="type" class="form-control" required>
                            <option value="news">📰 Yangilik</option>
                            <option value="announcement">📢 E’lon</option>
                        </select>
                    </div>


                    {{-- Image --}}
                    <div class="mb-4">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" class="form-control" id="image" name="image">
                    </div>

                    <div class="d-flex justify-content-end">
                        <button class="btn btn-primary" type="submit">💾 Save</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection
