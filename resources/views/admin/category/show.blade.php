@extends('layouts.adminLayout')
@section('content')

    <style>
        body {
            background: #f5f6fa;
            font-family: 'Poppins', sans-serif;
        }

        .show-category-wrapper {
            max-width:100%;
            display: flex;
            justify-content: center;
            padding-top: 50px;
            padding-left:50vh;
        }

        .card {
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
            width: 100%;
            max-width: 1000px;
            padding: 20px;
            background: #fff;
            transition: all 0.3s ease;
        }

        .card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.08);
        }

        .card-header {
            background: #4e73df;
            color: #fff;
            font-weight: 600;
            font-size: 1.2rem;
            border-top-left-radius: 12px;
            border-top-right-radius: 12px;
            text-align: center;
            padding: 10px 0;
        }

        .form-label {
            font-weight: 500;
            color: #374151;
        }

        .form-control {
            border-radius: 8px;
            padding: 10px 12px;
            border: 1px solid #d1d5db;
            width: 100%;
            background-color: #f8f9fa;
            margin-bottom: 15px;
        }

        .btn-success {
            border-radius: 8px;
            padding: 8px 16px;
            font-weight: 500;
            transition: all 0.2s ease;
        }

        .btn-success:hover {
            background-color: #16a34a;
            color: #fff;
            transform: translateY(-1px);
        }

        @media (max-width: 768px) {
            .show-category-wrapper {
                padding-top: 30px;
            }
        }
    </style>

    <div class="show-category-wrapper">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">📄 Show Category</div>
                <div class="card-body">

                    <div class="mb-3">
                        <label for="name_uz" class="form-label">Name (UZ)</label>
                        <input type="text" class="form-control" id="name_uz" value="{{ $category->name_uz }}" readonly>
                    </div>

                    <div class="mb-3">
                        <label for="name_ru" class="form-label">Name (RU)</label>
                        <input type="text" class="form-control" id="name_ru" value="{{ $category->name_ru }}" readonly>
                    </div>

                    <a href="{{ route('admin.category.index') }}" class="btn btn-success">⬅ Back</a>

                </div>
            </div>
        </div>
    </div>

@endsection
