@extends('layouts.adminLayout')
@section('content')

<div class="container mt-5" style="margin-left: 500px;">
    <div class="card shadow-lg p-4" style="border-radius: 15px;">
        <h3 class="mb-4 text-center">Tagni tahrirlash</h3>

        <form action="{{ route('admin.HomePageImageTag.update', $tag->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label fw-bold">Sarlavha (UZ):</label>
                <input type="text" name="title_uz" class="form-control" value="{{ old('title_uz', $tag->title_uz) }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Sarlavha (RU):</label>
                <input type="text" name="title_ru" class="form-control" value="{{ old('title_ru', $tag->title_ru) }}" required>
            </div>

            <div class="d-flex justify-content-between mt-4">
                <a href="{{ route('admin.HomePageImageTag.index') }}" class="btn btn-secondary">Orqaga</a>
                <button type="submit" class="btn btn-success">Yangilash</button>
            </div>
        </form>
    </div>
</div>

@endsection
