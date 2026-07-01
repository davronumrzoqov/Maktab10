@extends('layouts.adminLayout')
@section('title', 'Admin - Create HomePage Tag')

@section('content')

    <style>
        .main-content {
            margin-left: 250px;
            padding: 30px;
            background-color: #f8fafc;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: flex-start;
        }

        .card {
            width: 100%;
            max-width: 700px;
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
            transition: 0.3s ease;
        }

        .card:hover {
            transform: translateY(-3px);
        }

        .card-header {
            background: linear-gradient(90deg, #4e73df, #6366f1);
            color: #fff;
            font-weight: 600;
            font-size: 1.2rem;
            text-align: center;
            padding: 1rem;
            border-top-left-radius: 16px;
            border-top-right-radius: 16px;
        }

        .form-label {
            font-weight: 500;
            color: #374151;
        }

        .form-control {
            border-radius: 10px;
            padding: 10px 12px;
            border: 1px solid #d1d5db;
            background-color: #f9fafb;
            transition: 0.2s ease;
        }

        .form-control:focus {
            border-color: #6366f1;
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.2);
        }

        .btn-success {
            border-radius: 10px;
            padding: 8px 18px;
            font-weight: 500;
            background-color: #22c55e;
            border: none;
            color: #fff;
            transition: 0.3s ease;
        }

        .btn-success:hover {
            background-color: #16a34a;
        }

        .btn-primary {
            background: linear-gradient(90deg, #4e73df, #6366f1);
            border: none;
            color: #fff;
            padding: 10px 20px;
            border-radius: 10px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 14px rgba(99, 102, 241, 0.25);
        }
    </style>

    <div class="main-content">
        <form action="{{ route('admin.HomePageImageTag.store') }}" method="POST" enctype="multipart/form-data" class="w-100">
            @csrf

            <div class="card">
                <div class="card-header">
                    🖼️ Yangi HomePage Tag yaratish
                </div>

                <div class="card-body p-4">

                    <a href="{{ route('admin.HomePageImageTag.index') }}" class="btn btn-success mb-3">
                        ⬅ Orqaga qaytish
                    </a>


                    {{-- Title UZ --}}
                    <div class="mb-4">
                        <label class="form-label">Sarlavha (UZ)</label>
                        <input type="text" class="form-control" name="title_uz" placeholder="Sarlavha (UZ)...">
                    </div>

                    {{-- Title RU --}}
                    <div class="mb-4">
                        <label class="form-label">Заголовок (RU)</label>
                        <input type="text" class="form-control" name="title_ru" placeholder="Заголовок (RU)...">
                    </div>



                    <div class="d-flex justify-content-end">
                        <button class="btn btn-primary" type="submit">
                            💾 Saqlash
                        </button>
                    </div>

                </div>
            </div>
        </form>
    </div>

@endsection
