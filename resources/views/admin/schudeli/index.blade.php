@extends('layouts.adminLayout')

@section('title', 'Admin - Schedule')

@section('content')
    <style>
        body {
            background: #f6f8fc;
            font-family: 'Poppins', sans-serif;
        }

        .main-content {
            margin-left: 260px;
            padding: 40px;
        }

        h4 {
            font-weight: 700;
            color: #004aad;
        }

        .btn-primary {
            background: linear-gradient(90deg, #007bff, #00c9a7);
            border: none;
            padding: 10px 20px;
            font-weight: 600;
            border-radius: 10px;
            transition: all 0.4s ease;
        }

        .btn-primary:hover {
            transform: scale(1.05);
            background: linear-gradient(90deg, #00c9a7, #007bff);
        }

        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            animation: fadeIn 0.8s ease;
        }

        @keyframes fadeIn {
            from {opacity: 0; transform: translateY(20px);}
            to {opacity: 1; transform: translateY(0);}
        }

        .table {
            border-collapse: separate;
            border-spacing: 0 12px;
        }

        .table thead {
            background: #007bff;
            color: white;
            border-radius: 10px;
        }

        .table th {
            border: none;
            text-transform: uppercase;
            font-size: 14px;
            letter-spacing: 1px;
        }

        .table td {
            background: white;
            border: none;
            vertical-align: middle;
            font-size: 15px;
            border-radius: 10px;
            transition: all 0.3s ease;
        }

        .table tr:hover td {
            background: #e9f3ff;
            transform: scale(1.01);
        }

        .table img {
            width: 60px;
            height: 60px;
            border-radius: 10px;
            object-fit: cover;
            box-shadow: 0 3px 8px rgba(0, 0, 0, 0.15);
        }

        .btn-sm {
            border-radius: 8px;
            font-weight: 600;
        }

        .btn-success {
            background: #00c98d;
            border: none;
        }

        .btn-danger {
            background: #ff4d4f;
            border: none;
        }

        .btn-success:hover,
        .btn-danger:hover {
            opacity: 0.9;
        }

        #flash-message {
            animation: slideDown 0.6s ease;
        }

        @keyframes slideDown {
            from {opacity: 0; transform: translateY(-20px);}
            to {opacity: 1; transform: translateY(0);}
        }
    </style>

    <div class="main-content">
        <section class="section">
            <div class="row">
                <div class="col-md-12">

                    {{-- Flash message --}}
                    @if (session('success'))
                        <div id="flash-message" class="alert alert-success text-center">
                            {{ session('success') }}
                        </div>
                    @endif

                    <script>
                        setTimeout(() => {
                            const flash = document.getElementById('flash-message');
                            if (flash) flash.style.display = 'none';
                        }, 3000);
                    </script>

                    {{-- Header --}}
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h4>📘 Dars Jadvali</h4>
                        <a href="{{ route('admin.schudeli.create') }}" class="btn btn-primary">+ Yangi Jadval</a>
                    </div>

                    {{-- Table --}}
                    <div class="card p-3">
                        <div class="card-body table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Smena</th>
                                    <th>Dars</th>
                                    <th>Rasm</th>
                                    <th>Sinf</th>
                                    <th>Xona</th>
                                    <th>Vaqt</th>
                                    <th>Amallar</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($schudeli as $schude)
                                    <tr>
                                        <td>{{ $schude->id }}</td>
                                        <td>{{ $schude->smena->name_uz ?? '—' }}</td>
                                        <td>{{ $schude->lesson->name_uz ?? '—' }}</td>
                                        <td>
                                            @if ($schude->file)
                                                <a href="{{ asset('admin/files/' . $schude->file) }}" target="_blank" class="btn btn-outline-primary btn-sm">
                                                    📄 Ko‘rish
                                                </a>
                                            @else
                                                <span class="text-muted">No File</span>
                                            @endif
                                        </td>

                                        <td>{{ $schude->week_day }}</td>
                                        <td>{{ $schude->room }}</td>
                                        <td>{{ $schude->time ?? '—' }}</td>
                                        <td class="d-flex justify-content-center gap-2">
                                            <a href="{{ route('admin.schudeli.show', $schude->id) }}" class="btn btn-success btn-sm">Ko‘rish</a>
                                            <a href="{{ route('admin.schudeli.edit', $schude->id) }}" class="btn btn-primary btn-sm">Tahrirlash</a>
                                            <form action="{{ route('admin.schudeli.destroy', $schude->id) }}" method="POST" onsubmit="return confirm('Haqiqatan ham o‘chirmoqchimisiz?');">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm">O‘chirish</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="text-center text-muted">Hech qanday jadval topilmadi</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>
@endsection
