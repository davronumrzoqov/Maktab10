@extends('layouts.adminLayout')
@section('title', 'Resursni tahrirlash')

@section('content')
<style>
    .main-content {
        margin-left: 250px;
        padding: 30px;
        background-color: #f8fafc;
        min-height: 100vh;
    }
    .card {
        max-width: 800px;
        margin: 0 auto;
        background: white;
        border-radius: 12px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }
    .card-header {
        background: #ffc107;
        color: black;
        border-radius: 12px 12px 0 0;
        padding: 15px 20px;
    }
    .card-body {
        padding: 25px;
    }
    .form-control {
        border-radius: 8px;
    }
    .btn-submit {
        margin-top: 20px;
    }
</style>

<div class="main-content">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4>✏️ Resursni tahrirlash</h4>
            <a href="{{ route('admin.usefulResource.index') }}" class="btn btn-light text-dark border">⬅ Orqaga</a>
        </div>

        <div class="card-body">
            <form action="{{ route('admin.usefulResource.update', $resource->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label>Title (UZ)</label>
                    <input type="text" name="title_uz" class="form-control" value="{{ $resource->title_uz }}" required>
                </div>

                <div class="mb-3">
                    <label>Title (RU)</label>
                    <input type="text" name="title_ru" class="form-control" value="{{ $resource->title_ru }}" required>
                </div>

                <div class="mb-3">
                    <label>Body (UZ)</label>
                    <textarea name="body_uz" class="form-control" rows="4" required>{{ $resource->body_uz }}</textarea>
                </div>

                <div class="mb-3">
                    <label>Body (RU)</label>
                    <textarea name="body_ru" class="form-control" rows="4" required>{{ $resource->body_ru }}</textarea>
                </div>

                <div class="mb-3">
                    <label>URL</label>
                    <input type="url" name="url" class="form-control" value="{{ $resource->url }}" required>
                </div>

                <div class="mb-3">
                    <label>Image (optional)</label>
                    <input type="file" name="image" class="form-control">
                    @if($resource->image)
                        <img src="{{ asset('admin/images/' . $resource->image) }}" alt="Image" class="mt-2" style="width: 120px; border-radius: 6px;">
                    @endif
                </div>

                <button type="submit" class="btn btn-warning btn-submit">💾 Saqlash</button>
            </form>
        </div>
    </div>
</div>
@endsection
