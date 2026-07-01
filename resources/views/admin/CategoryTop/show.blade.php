@extends('layouts.adminLayout')
@section('content')

    <style>
        .center-form {
            display: flex;
            justify-content: center;      /* Gorizontal markaz */
            align-items: center;          /* Vertikal markaz */
            min-height: 100vh;
            padding: 20px;
            margin-left: 250px;           /* sidebar eni */
            width: calc(100% - 250px);    /* sidebar ortiqcha qilmasligi uchun */
            position: relative;
            z-index: 10;
        }

        @media (max-width: 992px) {
            .center-form {
                margin-left: 0;
                width: 100%;
            }
        }

        .card {
            width: 100%;
            max-width: 600px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background: linear-gradient(90deg, #007bff, #00c9a7);
            color: white;
            font-size: 20px;
            text-align: center;
            font-weight: 600;
            padding: 15px;
            border-radius: 15px 15px 0 0;
        }

        .btn-success {
            margin-bottom: 15px;
        }
    </style>

    <div class="center-form">
        <form action="{{ route('admin.category.store') }}" method="POST" class="card p-4">
            @csrf
            <h5 class="card-header">Show Category</h5>

            <a href="{{ route('admin.category.index') }}" class="btn btn-success">⬅ Back</a>

            <div class="mb-4">
                <label for="name_uz" class="form-label">Name (uz)</label>
                <input type="text" class="form-control" id="name_uz" placeholder="name..." name="name_uz" value="{{ $category->name_uz }}">
            </div>

            <div class="mb-4">
                <label for="name_ru" class="form-label">Name (ru)</label>
                <input type="text" class="form-control" id="name_ru" placeholder="name..." name="name_ru" value="{{ $category->name_ru }}">
            </div>

            <div class="mb-4">
                <label for="url" class="form-label">URL</label>
                <input type="text" class="form-control" id="url" placeholder="url..." name="url" value="{{ $category->url }}">
            </div>

            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>

@endsection
