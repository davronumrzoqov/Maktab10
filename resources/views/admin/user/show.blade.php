@extends('layouts.adminLayout')
@section('title', 'User Details')

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
        .user-info p {
            font-size: 16px;
            margin: 8px 0;
        }
        .badge {
            font-size: 14px;
            background-color: #0d6efd;
            color: white;
            padding: 6px 10px;
            border-radius: 8px;
            margin-right: 5px;
        }
        .btn-back {
            margin-top: 20px;
        }
    </style>

    <div class="main-content">
        <section class="section">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>👤 Foydalanuvchi tafsilotlari</h4>
                    <a href="{{ route('admin.users.index') }}" class="btn btn-light text-dark border">
                        ⬅ Orqaga
                    </a>
                </div>

                <div class="card-body">
                    <div class="user-info">
                        <p><strong>ID:</strong> {{ $user->id }}</p>
                        <p><strong>Ism:</strong> {{ $user->name }}</p>
                        <p><strong>Email:</strong> {{ $user->email }}</p>
                        <p><strong>Rollar:</strong>
                            @foreach($user->roles as $role)
                                <span class="badge">{{ $role->name }}</span>
                            @endforeach
                        </p>
                        <p><strong>Yaratilgan sana:</strong> {{ $user->created_at->format('d.m.Y H:i') }}</p>
                        <p><strong>Yangilangan sana:</strong> {{ $user->updated_at->format('d.m.Y H:i') }}</p>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
