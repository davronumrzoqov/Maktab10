@extends('layouts.adminLayout')
@section('content')

<div class="container mt-5" style="margin-left: 500px;">
    <div class="card shadow-lg p-4" style="border-radius: 15px;">
        <h3 class="mb-4 text-center">Tag ma’lumoti</h3>

        <div class="mb-3">
            <label class="form-label fw-bold">Sarlavha (UZ):</label>
            <p class="form-control">{{ $tag->title_uz }}</p>
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">Sarlavha (RU):</label>
            <p class="form-control">{{ $tag->title_ru }}</p>
        </div>

        <div class="d-flex justify-content-between mt-4">
            <a href="{{ route('admin.HomePageImageTag.index') }}" class="btn btn-secondary">Orqaga</a>
            <a href="{{ route('admin.HomePageImageTag.edit', $tag->id) }}" class="btn btn-warning">Tahrirlash</a>
        </div>
    </div>
</div>

@endsection
