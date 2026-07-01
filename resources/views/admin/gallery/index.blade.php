@extends('layouts.adminLayout')
@section('title', 'Admin - Gallery')

@section('content')
    <style>
        .main-content {
            margin-left: 250px;
            padding: 20px;
            background-color: #f8fafc;
            min-height: 100vh;
        }
        .table th, .table td {
            vertical-align: middle;
            text-align: center;
        }
        .table img {
            width: 70px;
            height: 70px;
            object-fit: cover;
            border-radius: 8px;
        }
    </style>

    <div class="main-content">
        <section class="section">
            <div class="container-fluid">

                {{-- Flash message --}}
                @if (session('success'))
                    <div id="flash-message" class="alert alert-success text-center">
                        {{ session('success') }}
                    </div>
                @endif

                <script>
                    setTimeout(function() {
                        let flash = document.getElementById('flash-message');
                        if (flash) flash.style.display = 'none';
                    }, 3000);
                </script>

                {{-- Header --}}
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h3 class="fw-bold">📸 Gallery ro‘yxati</h3>
                    <a href="{{ route('admin.gallery.create') }}" class="btn btn-primary">
                        ➕ Yangi rasm qo‘shish
                    </a>
                </div>

                {{-- Jadval --}}
                <div class="card shadow-sm border-0">
                    <div class="card-body table-responsive">
                        <table class="table table-bordered table-hover align-middle">
                            <thead class="table-primary">
                            <tr>
                                <th>#</th>
                                <th>Rasm</th>
                                <th>Title (UZ)</th>
                                <th>Title (RU)</th>
                                <th>Amallar</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($gallerys as $gallery)
                                <tr>
                                    <td>{{ $gallery->id }}</td>
                                    <td>
                                        <img src="/admin/images/{{ $gallery->image }}" alt="gallery image">
                                    </td>
                                    <td>{{ $gallery->title_uz }}</td>
                                    <td>{{ $gallery->title_ru }}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('admin.gallery.show', $gallery->id) }}" class="btn btn-sm btn-info">
                                                👁️ Ko‘rish
                                            </a>
                                            <a href="{{ route('admin.gallery.edit', $gallery->id) }}" class="btn btn-sm btn-warning text-white">
                                                ✏️ Tahrirlash
                                            </a>
                                            <form action="{{ route('admin.gallery.destroy', $gallery->id) }}" method="POST" onsubmit="return confirm('Rostdan ham o‘chirmoqchimisiz?')" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">🗑️ O‘chirish</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted">
                                        Hozircha hech qanday rasm yo‘q.
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </section>
    </div>
@endsection
