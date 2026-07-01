@extends('layouts.adminLayout')
@section('title', 'Dars Jadvali Tafsilotlari')

@section('content')
    <style>
        .main-content {
            margin-left: 250px;
            padding: 30px;
            background-color: #f8fafc;
            min-height: 100vh;
        }

        .card {
            max-width: 750px;
            margin: 0 auto;
            background: white;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .card-header {
            background: #007bff;
            color: white;
            border-radius: 12px 12px 0 0;
            padding: 15px 20px;
        }

        .card-body {
            padding: 25px;
        }

        .schedule-info p {
            font-size: 16px;
            margin: 10px 0;
        }

        .badge {
            font-size: 14px;
            background-color: #0d6efd;
            color: white;
            padding: 6px 10px;
            border-radius: 8px;
            margin-right: 5px;
        }

        .img-preview {
            max-width: 200px;
            border-radius: 8px;
            border: 1px solid #e0e0e0;
            margin-top: 10px;
        }

        .btn-back {
            margin-top: 20px;
        }
    </style>

    <div class="main-content">
        <section class="section">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>📘 Dars Jadvali Tafsilotlari</h4>
                    <a href="{{ route('admin.schudeli.index') }}" class="btn btn-light text-dark border">
                        ⬅ Orqaga
                    </a>
                </div>

                <div class="card-body">
                    <div class="schedule-info">
                        <p><strong>ID:</strong> {{ $schudeli->id }}</p>
                        <p><strong>Smena turi:</strong> {{ $schudeli->smena->name_uz ?? 'Noma’lum' }}</p>
                        <p><strong>Dars:</strong> {{ $schudeli->lesson->name_uz ?? 'Noma’lum' }}</p>
                        <p><strong>Hafta kuni:</strong> {{ $schudeli->week_day }}</p>
                        <p><strong>Xona:</strong> {{ $schudeli->room }}</p>
                        <p><strong>Vaqt:</strong> {{ $schudeli->time }}</p>

                        @if($schedule->file)
                            <div class="mt-3">
                                <a href="{{ asset('admin/files/' . $schedule->file) }}" target="_blank" class="btn btn-secondary">
                                    📄 PDF-ni ko‘rish
                                </a>
                            </div>
                        @endif

                        <p><strong>Yaratilgan sana:</strong> {{ $schudeli->created_at->format('d.m.Y H:i') }}</p>
                        <p><strong>Yangilangan sana:</strong> {{ $schudeli->updated_at->format('d.m.Y H:i') }}</p>
                    </div>

                    <div class="text-center btn-back">
                        <a href="{{ route('admin.schudeli.edit', $schudeli->id) }}" class="btn btn-primary">✏️ Tahrirlash</a>
                        <a href="{{ route('admin.schudeli.index') }}" class="btn btn-secondary">⬅ Orqaga</a>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
