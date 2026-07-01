@extends('layouts.adminLayout')
@section('content')

    <style>
        body {
            background: linear-gradient(135deg, #f0f2f5, #e9ecef);
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 50vh;
        }

        .card {
            border-radius: 16px;
            box-shadow: 0 6px 18px rgba(0,0,0,0.08);
            transition: all 0.3s ease;
            width: 100%;
            max-width: 600px;
        }

        .card:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 28px rgba(102,16,242,0.15);
        }

        .card-header {
            background: linear-gradient(90deg, #4e73df, #6610f2);
            color: #fff;
            font-weight: 600;
            font-size: 1.2rem;
            border-top-left-radius: 16px;
            border-top-right-radius: 16px;
            text-align: center;
        }

        .form-label {
            font-weight: 500;
            color: #374151;
        }

        .form-control {
            border-radius: 10px;
            padding: 10px 12px;
            border: 1px solid #d1d5db;
            transition: all 0.3s ease;
            width: 100%;
        }

        .form-control:focus {
            border-color: #4e73df;
            box-shadow: 0 0 0 3px rgba(78, 115, 223, 0.2);
            outline: none;
        }

        .btn-primary {
            background: linear-gradient(90deg, #4e73df, #6610f2);
            border: none;
            color: #fff;
            padding: 10px 18px;
            border-radius: 12px;
            font-weight: 500;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(102,16,242,0.25);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 14px rgba(102,16,242,0.3);
        }

        .btn-success {
            border-radius: 12px;
            padding: 10px 18px;
            font-weight: 500;
            transition: all 0.3s ease;
            box-shadow: 0 3px 10px rgba(34, 197, 94, 0.25);
        }

        .btn-success:hover {
            background-color: #16a34a;
            transform: translateY(-2px);
            box-shadow: 0 5px 14px rgba(34, 197, 94, 0.3);
        }

        .d-flex.justify-content-between {
            margin-top: 20px;
        }

        @media (max-width: 768px) {
            body {
                padding: 10px;
            }
            .card {
                margin-top: 20px;
            }
        }
    </style>

    <div>
        <form action="{{ route('admin.category.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="card">
                <h5 class="card-header">✏️ Edit Category</h5>
                <div class="card-body">

                    <div class="mb-4">
                        <label for="name_uz" class="form-label">Name (UZ)</label>
                        <input type="text" class="form-control" id="name_uz" name="name_uz" placeholder="Kategoriyaning nomi..." value="{{ $category->name_uz }}">
                    </div>

                    <div class="mb-4">
                        <label for="name_ru" class="form-label">Name (RU)</label>
                        <input type="text" class="form-control" id="name_ru" name="name_ru" placeholder="Название категории..." value="{{ $category->name_ru }}">
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('admin.category.index') }}" class="btn btn-success">⬅ Back</a>
                        <button class="btn btn-primary" type="submit">Update ✅</button>
                    </div>

                </div>
            </div>
        </form>
    </div>

@endsection
