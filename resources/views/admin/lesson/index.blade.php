@extends('layouts.adminLayout')
@section('title', 'Admin - Darslar ro‘yxati')

@section('content')
    <style>
        .main-content {
            margin-left: 250px;
            padding: 30px;
            background-color: #f8fafc;
            min-height: 100vh;
        }

        .table th, .table td {
            text-align: center;
            vertical-align: middle;
        }

        .table thead {
            background-color: #007bff;
            color: white;
        }

        .btn-group .btn {
            margin-right: 5px;
        }

        .table-hover tbody tr:hover {
            background-color: #f1f5fb;
        }

        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
        }

        .alert-success {
            border-radius: 8px;
        }
    </style>

    <div class="main-content">
        <section class="section">
            <div class="container-fluid">

                {{-- Flash message --}}
                @if (session('success'))
                    <div id="flash-message" class="alert alert-success text-center fw-semibold">
                        {{ session('success') }}
                    </div>
                @endif

                <script>
                    setTimeout(() => {
                        let flash = document.getElementById('flash-message');
                        if (flash) flash.style.display = 'none';
                    }, 3000);
                </script>

                {{-- Header --}}
                <div class="d-flex justify-content-between align-items-center gap-9 mb-4">
                    <h2 class="fw-bold mb-0 text-primary">📚 Darslar ro‘yxati</h2>
                    <a href="{{ route('admin.lesson.create') }}" class="btn btn-success shadow-sm">
                        <i class="fas fa-plus"></i> Yangi dars qo‘shish
                    </a>
                </div>

                {{-- Jadval --}}
                <div class="card">
                    <div class="card-body table-responsive">
                        <table class="table table-bordered table-hover align-middle">
                            <thead>
                            <tr>
                                <th style="width: 5%">#</th>
                                <th style="width: 35%">Nomi (UZ)</th>
                                <th style="width: 35%">Nomi (RU)</th>
                                <th style="width: 25%">Amallar</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($lessons as $lesson)
                                <tr>
                                    <td>{{ $lesson->id }}</td>
                                    <td>{{ Str::limit($lesson->name_uz, 50) }}</td>
                                    <td>{{ Str::limit($lesson->name_ru, 50) }}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('admin.lesson.show', $lesson->id) }}"
                                               class="btn btn-sm btn-info text-white">
                                                <i class="fas fa-eye"></i> Ko‘rish
                                            </a>
                                            <a href="{{ route('admin.lesson.edit', $lesson->id) }}"
                                               class="btn btn-sm btn-warning text-white">
                                                <i class="fas fa-edit"></i> Tahrirlash
                                            </a>
                                            <form action="{{ route('admin.lesson.destroy', $lesson->id) }}"
                                                  method="POST" class="d-inline"
                                                  onsubmit="return confirm('Rostdan ham o‘chirmoqchimisiz?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    <i class="fas fa-trash"></i> O‘chirish
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center text-muted py-4">
                                        Hozircha hech qanday dars mavjud emas.
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
