@extends('layouts.adminLayout')
@section('content')

<style>
    body {
        background: #f8faff;
        font-family: 'Poppins', sans-serif;
    }

    .center-card {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 90vh;
        margin-left: 500px; /* 🔥 markazdan o‘ngga */
        animation: fadeIn 0.8s ease;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .card {
        width: 100%;
        max-width: 700px;
        background: white;
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0, 123, 255, 0.1);
        overflow: hidden;
        padding: 25px;
    }

    .card-header {
        background: linear-gradient(90deg, #007bff, #00c9a7);
        color: white;
        font-weight: 600;
        font-size: 22px;
        text-align: center;
        padding: 15px;
        border-radius: 15px;
    }

    .post-image {
        width: 100%;
        height: auto;
        border-radius: 15px;
        margin-bottom: 20px;
    }

    .btn-success {
        background: #00c98d;
        border: none;
        color: white;
        font-weight: 600;
        border-radius: 10px;
    }
</style>

<div class="center-card">
    <div class="card">
        <div class="card-header">📘 {{ $post->title_uz }}</div>

        @if($post->image)
            <img src="{{ asset('storage/' . $post->image) }}" class="post-image" alt="">
        @endif

        <h4><strong>🇺🇿 Sarlavha (UZ):</strong> {{ $post->title_uz }}</h4>
        <h4><strong>🇷🇺 Sarlavha (RU):</strong> {{ $post->title_ru }}</h4>
        <hr>

        <p><strong>Matn (UZ):</strong></p>
        <p>{{ $post->body_uz }}</p>

        <p><strong>Matn (RU):</strong></p>
        <p>{{ $post->body_ru }}</p>

        <div class="text-end mt-3">
            <a href="{{ route('admin.posts.index') }}" class="btn btn-success">⬅ Orqaga</a>
        </div>
    </div>
</div>

@endsection
