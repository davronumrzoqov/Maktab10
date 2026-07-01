@extends('layouts.adminLayout')
@section('content')

    <style>
        .center-form {
            display: flex;
            justify-content: center;
            align-items: flex-start;
            min-height: 100vh;
            padding: 40px 20px;
            margin-left: 250px; /* sidebar eni */
            width: calc(100% - 250px);
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
            max-width: 700px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
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

        img {
            border-radius: 10px;
            margin-bottom: 10px;
        }

        input[disabled], select[disabled] {
            background-color: #e9ecef;
            cursor: not-allowed;
        }
    </style>

    <div class="center-form">
        <form class="card p-4">
            <h5 class="card-header">Show Gallery</h5>

            <a href="{{ route('admin.gallery.index') }}" class="btn btn-success mb-3">⬅ Back</a>

            <div class="mb-4">
                <label class="form-label">Title (UZ)</label>
                <input type="text" class="form-control" value="{{ $gallery->title_uz }}" disabled>
            </div>

            <div class="mb-4">
                <label class="form-label">Title (RU)</label>
                <input type="text" class="form-control" value="{{ $gallery->title_ru }}" disabled>
            </div>

            <div class="mb-4">
                <label class="form-label">Image</label><br>
                <img src="{{ asset('admin/images/' . $gallery->image) }}" alt="Gallery Image" style="width:150px; height:auto; border-radius:8px;">
            </div>
        </form>
    </div>

@endsection
