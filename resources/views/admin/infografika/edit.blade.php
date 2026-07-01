@extends('layouts.adminLayout')
@section('content')

    <style>
        .center-form {
            margin-left: 250px; /* sidebar eni */
            padding: 20px;
            background-color: #f8fafc;
            min-height: 100vh;
        }

        .card {
            width: 100%;
            max-width: 700px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            padding: 20px;
        }

        .card-header {
            background: linear-gradient(90deg, #007bff, #00c9a7);
            color: white;
            font-size: 20px;
            text-align: center;
            font-weight: 600;
            padding: 15px;
            border-radius: 15px 15px 0 0;
            margin-bottom: 20px;
        }

        img {
            border-radius: 10px;
            margin-bottom: 15px;
        }
    </style>

    <div class="center-form">
        <div class="card">
            <h5 class="card-header">Edit InfoGrafika</h5>

            <form action="{{ route('admin.infografika.update', $infoGrafika->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="title_uz" class="form-label">Title (UZ)</label>
                    <input type="text" class="form-control" name="title_uz" id="title_uz" value="{{ $infoGrafika->title_uz }}">
                </div>

                <div class="mb-3">
                    <label for="title_ru" class="form-label">Title (RU)</label>
                    <input type="text" class="form-control" name="title_ru" id="title_ru" value="{{ $infoGrafika->title_ru }}">
                </div>

                <div class="mb-3">
                    <label>Current Image</label><br>
                    <img src="{{ asset('admin/images/' . $infoGrafika->image) }}" alt="current image" width="150">
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Upload New Image</label>
                    <input type="file" class="form-control" name="image" id="image">
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('admin.infografika.index') }}" class="btn btn-secondary">Back</a>
            </form>
        </div>
    </div>

@endsection
