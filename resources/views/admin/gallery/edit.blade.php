@extends('layouts.adminLayout')
@section('content')

    <style>
        /* Containerni markazlashtirish */
        .center-form {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
            margin-left: 250px;           /* sidebar eni */
            width: calc(100% - 250px);
            position: relative;
            z-index: 10;
        }

        /* Card style */
        .card-form {
            width: 100%;
            max-width: 600px;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
            background-color: #fff;
        }

        .card-form h3 {
            text-align: center;
            margin-bottom: 25px;
            color: #007bff;
        }

        .btn-primary, .btn-secondary {
            margin-right: 10px;
        }

        img {
            border-radius: 10px;
            margin-bottom: 10px;
        }
    </style>

    <div class="center-form">
        <div class="card-form">
            <h3>Edit Gallery</h3>
            <form action="{{ route('admin.gallery.update', $gallery->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="title_uz" class="form-label">Title (UZ)</label>
                    <input type="text" class="form-control" id="title_uz" name="title_uz" value="{{ $gallery->title_uz }}">
                </div>

                <div class="mb-3">
                    <label for="title_ru" class="form-label">Title (RU)</label>
                    <input type="text" class="form-control" id="title_ru" name="title_ru" value="{{ $gallery->title_ru }}">
                </div>

                <div class="mb-3">
                    <label>Current Image</label><br>
                    <img src="{{ asset('admin/images/' . $gallery->image) }}" alt="current image" width="150">
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Upload New Image</label>
                    <input type="file" class="form-control" id="image" name="image">
                </div>

                <div class="d-flex justify-content-center mt-4">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('admin.gallery.index') }}" class="btn btn-secondary">Back</a>
                </div>
            </form>
        </div>
    </div>

@endsection
