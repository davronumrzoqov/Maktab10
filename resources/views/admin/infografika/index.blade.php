@extends('layouts.adminLayout')
@section('title', 'Admin - Infografika')

@section('content')
    <style>
        /* Main content offset sidebar bilan */
        .main-content {
            margin-left: 250px; /* sidebar eni */
            padding: 20px;
            background-color: #f8fafc;
            min-height: 100vh;
        }

        /* Jadval dizayni */
        .table th, .table td {
            text-align: center;
            vertical-align: middle;
        }

        .table img {
            width: 70px;
            height: 70px;
            object-fit: cover;
            border-radius: 8px;
        }

        /* Card va shadow */
        .card {
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
        }

        .btn-group .btn {
            min-width: 80px;
        }

        /* Flash message */
        #flash-message {
            margin-bottom: 20px;
            padding: 10px;
            border-radius: 8px;
            font-weight: 500;
        }

        /* Responsive tweaks */
        @media (max-width: 992px) {
            .main-content {
                margin-left: 0;
                padding: 10px;
            }

            .table img {
                width: 50px;
                height: 50px;
            }

            .btn-group .btn {
                padding: 4px 6px;
                font-size: 12px;
            }
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
                    <h3 class="fw-bold">📊 Infografika ro‘yxati</h3>
                    <a href="{{ route('admin.infografika.create') }}" class="btn btn-primary">
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
                                <th>Rasm</th>
                                <th>Title (UZ)</th>
                                <th>Title (RU)</th>
                                <th>Amallar</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($infoGrafika as $infoGrafik)
                                <tr>
                                    <td>{{ $infoGrafik->id }}</td>
                                    <td>
                                        <img src="{{ asset('admin/images/' . $infoGrafik->image) }}" alt="Infografika">
                                    </td>
                                    <td>{{ Str::limit($infoGrafik->title_uz, 30) }}</td>
                                    <td>{{ Str::limit($infoGrafik->title_ru, 30) }}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('admin.infografika.show', $infoGrafik->id) }}" class="btn btn-sm btn-info">
                                                👁️ Ko‘rish
                                            </a>
                                            <a href="{{ route('admin.infografika.edit', $infoGrafik->id) }}" class="btn btn-sm btn-warning text-white">
                                                ✏️ Tahrirlash
                                            </a>
                                            <form action="{{ route('admin.infografika.destroy', $infoGrafik->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Rostdan ham o‘chirmoqchimisiz?')">
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
                                        Hozircha hech qanday infografika mavjud emas.
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
