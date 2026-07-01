@extends('layouts.adminLayout')
@section('content')

    <style>
        .create-category-wrapper {
            display: flex;
            justify-content: flex-start; /* chapdan boshlansin */
            align-items: center;
            min-height: 100vh;
            background-color: #f3f4f6;
            padding-left: 350px; /* bu joy sidebar kengligiga qarab o‘zgartiriladi */
            padding-right: 50px;
        }

        .card {
            border-radius: 16px;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            width: 100%;
            max-width: 550px;
            background-color: #fff;
            animation: slideIn 0.6s ease;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateX(60px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .card:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 28px rgba(102, 16, 242, 0.15);
        }

        .card-header {
            background: linear-gradient(90deg, #4e73df, #6610f2);
            color: #fff;
            font-weight: 600;
            font-size: 1.2rem;
            border-top-left-radius: 16px;
            border-top-right-radius: 16px;
            text-align: center;
            padding: 1rem;
        }

        .form-label {
            font-weight: 500;
            color: #374151;
        }

        .form-control {
            border-radius: 10px;
            padding: 10px 12px;
            border: 1px solid #d1d5db;
            background-color: #f8f9fa;
            width: 100%;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #6610f2;
            box-shadow: 0 0 0 0.2rem rgba(102, 16, 242, 0.2);
        }

        .btn-primary {
            background: linear-gradient(90deg, #4e73df, #6610f2);
            border: none;
            color: #fff;
            padding: 10px 18px;
            border-radius: 12px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background: linear-gradient(90deg, #3b5bdb, #520dc2);
            transform: translateY(-2px);
        }

        .btn-success {
            border-radius: 12px;
            padding: 10px 18px;
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

        @media (max-width: 992px) {
            .create-category-wrapper {
                justify-content: center;
                padding: 20px;
            }
        }
    </style>

    <div class="create-category-wrapper">
        <form action="{{ route('admin.empCategory.store') }}" method="POST" style="width: 100%; max-width: 550px;">
            @csrf

            <div class="card">
                <h5 class="card-header">👔 Create Employee Category</h5>
                <div class="card-body">

                    <a href="{{ route('admin.empCategory.index') }}" class="btn btn-success mb-4">⬅ Back</a>

                    <div class="mb-4">
                        <label for="name_uz" class="form-label">Name (UZ)</label>
                        <input type="text"
                               class="form-control @error('name_uz') is-invalid @enderror"
                               id="name_uz" placeholder="Bo‘lim nomi (UZ)"
                               name="name_uz" value="{{ old('name_uz') }}">
                        @error('name_uz')
                        <div class="invalid-feedback" style="color: red;">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="name_ru" class="form-label">Name (RU)</label>
                        <input type="text"
                               class="form-control @error('name_ru') is-invalid @enderror"
                               id="name_ru" placeholder="Название (RU)"
                               name="name_ru" value="{{ old('name_ru') }}">
                        @error('name_ru')
                        <div class="invalid-feedback" style="color: red;">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-end">
                        <button class="btn btn-primary" type="submit">Save ✅</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection
