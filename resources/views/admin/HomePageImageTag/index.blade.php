@extends('layouts.adminLayout')
@section('title', 'Admin - HomePage Image Tag')

@section('content')
    <style>
        .main-content {
            margin-left: 250px;
            padding: 20px;
            background-color: #f8fafc;
            min-height: 100vh;
        }
        .table th, .table td {
            text-align: center;
            vertical-align: middle;
        }
    </style>

    <div class="main-content">
        <section class="section">
            <div class="container-fluid">

                {{-- Success xabar --}}
                @if (session('success'))
                    <div id="flash-message" class="alert alert-success text-center">
                        {{ session('success') }}
                    </div>
                @endif

                <script>
                    setTimeout(function() {
                        var flash = document.getElementById('flash-message');
                        if (flash) flash.style.display = 'none';
                    }, 3000);
                </script>

                {{-- Header --}}
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h3 class="fw-bold">🏷️ HomePage Image Taglar</h3>
                    <a href="{{ route('admin.HomePageImageTag.create') }}" class="btn btn-primary">
                        ➕ Yangi qo‘shish
                    </a>
                </div>

                {{-- Jadval --}}
                <div class="card shadow-sm border-0">
                    <div class="card-body table-responsive">
                        <table class="table table-bordered table-hover align-middle">
                            <thead class="table-primary">
                            <tr>
                                <th>#</th>
                                <th>Title (UZ)</th>
                                <th>Title (RU)</th>

                                <th>Amallar</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($HomePageImageTag as $homepage)
                                <tr>
                                    <td>{{ $homepage->id }}</td>
                                    <td>{{ Str::limit($homepage->title_uz, 30) }}</td>
                                    <td>{{ Str::limit($homepage->title_ru, 30) }}</td>

                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('admin.HomePageImageTag.show', $homepage->id) }}" class="btn btn-sm btn-info">
                                                👁️ Ko‘rish
                                            </a>
                                            <a href="{{ route('admin.HomePageImageTag.edit', $homepage->id) }}" class="btn btn-sm btn-warning text-white">
                                                ✏️ Tahrirlash
                                            </a>
                                            <form action="{{ route('admin.HomePageImageTag.destroy', $homepage->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Rostdan ham o‘chirmoqchimisiz?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    🗑️ O‘chirish
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center text-muted">
                                        Hozircha hech qanday ma’lumot yo‘q.
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
