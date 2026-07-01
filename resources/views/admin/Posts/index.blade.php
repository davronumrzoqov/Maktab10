@extends('layouts.adminLayout')
@section('title', 'Admin - Postlar')

@section('content')
    <style>
        .main-content {
            margin-left: 250px;
            padding: 30px;
            background-color: #f5f6fa;
            min-height: 100vh;
        }

        .card-custom {
            background: white;
            border-radius: 16px;
            box-shadow: 0 4px 16px rgba(0,0,0,0.07);
            padding: 30px;
            max-width: 1150px;
            margin: 0 auto;
        }

        .btn-create {
            background-color: #8b5cf6;
            color: white;
            padding: 10px 18px;
            border-radius: 10px;
            font-weight: 500;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }
        .btn-create:hover {
            background-color: #7c3aed;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .table th, .table td {
            padding: 14px 16px;
            text-align: center;
            border-bottom: 1px solid #e5e7eb;
            vertical-align: middle;
        }
        .table thead {
            background-color: #eef2ff;
            color: #1e1b4b;
            font-weight: 600;
        }

        .btn-custom {
            border: none;
            padding: 6px 14px;
            font-size: 14px;
            border-radius: 8px;
            color: white;
            cursor: pointer;
            transition: 0.2s ease-in-out;
            text-decoration: none;
            display: inline-block;
        }
        .btn-view { background-color: #10b981; }
        .btn-edit { background-color: #3b82f6; }
        .btn-delete { background-color: #ef4444; }

        img.post-image {
            width: 65px;
            height: 65px;
            object-fit: cover;
            border-radius: 8px;
            border: 1px solid #ddd;
        }

        #flash-message {
            animation: fade-in 0.4s ease-in-out;
            margin-bottom: 20px;
            text-align: center;
            font-weight: 500;
            color: #155724;
            background-color: #d4edda;
            border: 1px solid #c3e6cb;
            border-radius: 6px;
            padding: 12px;
            max-width: 1150px;
            margin-left: auto;
            margin-right: auto;
        }

        @keyframes fade-in {
            from { opacity: 0; transform: translateY(-6px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>

    <div class="main-content">
        <div class="card-custom">

            {{-- Flash xabar --}}
            @if (session('success'))
                <div id="flash-message">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Header --}}
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="fw-bold text-dark">📰 Postlar ro‘yxati</h4>
                <a href="{{ route('admin.posts.create') }}" class="btn-create">+ Yangi post</a>
            </div>

            {{-- Jadval --}}
            <div class="table-responsive">
                <table class="table align-middle table-bordered">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Sarlavha (UZ)</th>
                        <th>Sarlavha (RU)</th>
                        <th>Matn (UZ)</th>
                        <th>Matn (RU)</th>
                        <th>Rasm</th>
                        <th>Amallar</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($posts as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td>{{ Str::limit($post->title_uz, 40) }}</td>
                            <td>{{ Str::limit($post->title_ru, 40) }}</td>
                            <td>{{ Str::limit($post->body_uz, 60) }}</td>
                            <td>{{ Str::limit($post->body_ru, 60) }}</td>
                            <td>
                                @if($post->image)
                                    <img src="{{ asset('storage/' . $post->image) }}" alt="Post Image" class="post-image">
                                @else
                                    <span class="text-muted">Rasm yo‘q</span>
                                @endif
                            </td>
                            <td>
                                <div class="d-flex justify-content-center gap-2 flex-wrap">
                                    {{-- show route optional, remove if unused --}}
                                    @if (Route::has('admin.posts.show'))
                                        <a href="{{ route('admin.posts.show', $post->id) }}" class="btn-custom btn-view">Ko‘rish</a>
                                    @endif
                                    <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn-custom btn-edit">Tahrirlash</a>
                                    <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST"
                                          onsubmit="return confirm('«{{ $post->title_uz }}» ni o‘chirishni tasdiqlaysizmi?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-custom btn-delete">O‘chirish</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted py-4">Hozircha postlar mavjud emas.</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Flash yo‘qotish --}}
    <script>
        setTimeout(() => {
            const flash = document.getElementById('flash-message');
            if (flash) flash.remove();
        }, 3000);
    </script>
@endsection
