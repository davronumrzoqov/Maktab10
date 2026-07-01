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
            max-width: 550px; /* Karta kengligini kamaytirdim */
            background-color: #fff;
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
            padding: 1rem;
        }

        .form-label {
            font-weight: 500;
            color: #374151;
        }

        .form-control, select {
            border-radius: 10px;
            padding: 10px 12px;
            border: 1px solid #d1d5db;
            width: 100%;
            background-color: #f8f9fa;
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
                justify-content: center; /* kichik ekranlarda o‘rtaga qaytadi */
                padding: 20px;
            }
        }
    </style>

    <div class="create-category-wrapper">
        <form action="{{ route('admin.categorychildren.store') }}" method="POST" style="width: 100%; max-width: 550px;">
            @csrf
            <div class="card">
                <h5 class="card-header">📁 Create CategoryChildren</h5>
                <div class="card-body">

                    <div class="mb-4">
                        <label for="name_uz" class="form-label">Name (UZ)</label>
                        <input type="text" class="form-control" id="name_uz" name="name_uz" placeholder="Bo‘lim nomi (UZ)">
                    </div>

                    <div class="mb-4">
                        <label for="category_id" class="form-label">Category</label>
                        <select class="form-control" id="category_id" name="category_id">
                            <option value="" disabled selected>— Tanlang —</option>
                            @foreach($category as $categor)
                                <option value="{{ $categor->id }}">{{ $categor->name_uz }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="name_ru" class="form-label">Name (RU)</label>
                        <input type="text" class="form-control" id="name_ru" name="name_ru" placeholder="Название (RU)">
                    </div>

                    <div class="mb-4">
                        <label for="url" class="form-label">URL</label>
                        <input type="text" class="form-control" id="url" name="url" placeholder="/path...">
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('admin.categorychildren.index') }}" class="btn btn-success">⬅ Back</a>
                        <button class="btn btn-primary" type="submit">Save ✅</button>
                    </div>

                </div>
            </div>
        </form>
    </div>

@endsection
