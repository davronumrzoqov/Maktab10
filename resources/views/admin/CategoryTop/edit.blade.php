@extends('layouts.adminLayout')
@section('content')

    <style>
        body {
            background: #f8faff;
            font-family: 'Poppins', sans-serif;
        }

        /* Formani ekranning markaziga olib kelish */
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



        @keyframes fadeIn {
            from {opacity: 0; transform: translateY(30px);}
            to {opacity: 1; transform: translateY(0);}
        }

        .card {
            width: 100%;
            max-width: 500px; /* maksimal eni */
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 123, 255, 0.1);
            overflow: hidden;
            animation: fadeIn 0.6s ease;
        }

        .card-header {
            background: linear-gradient(90deg, #007bff, #00c9a7);
            color: white;
            font-size: 22px;
            font-weight: 600;
            text-align: center;
            padding: 20px;
            border-bottom-left-radius: 20px;
            border-bottom-right-radius: 20px;
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
            width: 100%;
        }

        .btn-primary:hover {
            transform: scale(1.03);
        }

        .btn-success {
            background: #00c98d;
            border: none;
            color: white;
            font-weight: 600;
            border-radius: 10px;
            padding: 10px 20px;
            text-decoration: none;
        }

        .mb-4 {
            margin-bottom: 1.5rem;
        }
    </style>

    <div class="center-form">
        <form action="{{ route('admin.CategoryTop.update', $category->id) }}" method="POST" class="card p-4">
            @csrf
            @method('PUT')

            <div class="card-header mb-3">📝 Edit CategoryTop</div>

            <a href="{{ route('admin.category.index') }}" class="btn btn-success mb-4">⬅ Back</a>

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

            <button class="btn btn-primary" type="submit">Update</button>
        </form>
    </div>

@endsection
