@extends('layouts.adminLayout')
@section('title', 'Statistika Tafsilotlari')

@section('content')
    <style>
        .main-content {
            margin-left: 250px;
            padding: 30px;
            background-color: #f8fafc;
            min-height: 100vh;
        }
        .card {
            max-width: 700px;
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
        .stat-info p {
            font-size: 16px;
            margin: 8px 0;
        }
        .btn-back {
            margin-top: 20px;
        }
    </style>

    <div class="main-content">
        <section class="section">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>📊 Statistika tafsilotlari</h4>
                    <a href="{{ route('admin.statictik.index') }}" class="btn btn-light text-dark border">
                        ⬅ Orqaga
                    </a>
                </div>

                <div class="card-body">
                    <div class="stat-info">
                        <p><strong>ID:</strong> {{ $statictik->id }}</p>
                        <p><strong>Sinf soni:</strong> {{ $statictik->classesCount }}</p>
                        <p><strong>O‘quvchi soni:</strong> {{ $statictik->studentsCount }}</p>
                        <p><strong>O‘qituvchi soni:</strong> {{ $statictik->teachersCount }}</p>
                        <p><strong>Bitiruvchi soni:</strong> {{ $statictik->graduatesCount }}</p>
                        <p><strong>Yaratilgan sana:</strong> {{ $statictik->created_at->format('d.m.Y H:i') }}</p>
                        <p><strong>Yangilangan sana:</strong> {{ $statictik->updated_at->format('d.m.Y H:i') }}</p>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
