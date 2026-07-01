@extends('layouts.adminLayout')
@section('title', 'Statick ma’lumot qo‘shish')

@section('content')
    <style>
        .main-content {
            margin-left: 250px;
            padding: 40px;
            background-color: #f8fafc;
            min-height: 100vh;
        }

        .card-custom {
            background: white;
            border-radius: 16px;
            box-shadow: 0 6px 18px rgba(0,0,0,0.06);
            padding: 30px;
            max-width: 800px;
            margin: 0 auto;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .page-header h2 {
            font-weight: 700;
            color: #1e3a8a;
        }

        .btn-back {
            background-color: #3b82f6;
            color: white;
            padding: 10px 20px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 500;
        }

        .btn-back:hover {
            background-color: #2563eb;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-weight: 600;
            color: #1e3a8a;
            margin-bottom: 8px;
            display: block;
        }

        input {
            width: 100%;
            padding: 10px 14px;
            border-radius: 10px;
            border: 1px solid #cbd5e1;
            transition: border-color 0.2s ease;
        }

        input:focus {
            border-color: #4f46e5;
            outline: none;
        }

        .btn-submit {
            background-color: #4f46e5;
            color: white;
            padding: 12px 25px;
            border: none;
            border-radius: 10px;
            font-weight: 500;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-submit:hover {
            background-color: #4338ca;
        }
    </style>

    <div class="main-content">
        <div class="card-custom">
            <div class="page-header">
                <h2>📊 Statick ma’lumot qo‘shish</h2>
                <a href="{{ route('admin.statictik.index') }}" class="btn-back">⬅ Orqaga</a>
            </div>

            <form action="{{ route('admin.statictik.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="classesCount">Sinflar soni</label>
                    <input type="number" id="classesCount" name="classesCount" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="studentsCount">O‘quvchilar soni</label>
                    <input type="number" id="studentsCount" name="studentsCount" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="teachersCount">O‘qituvchilar soni</label>
                    <input type="number" id="teachersCount" name="teachersCount" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="graduatesCount">Bitiruvchilar soni</label>
                    <input type="number" id="graduatesCount" name="graduatesCount" class="form-control" required>
                </div>

                <div style="text-align: center;">
                    <button type="submit" class="btn-submit">💾 Saqlash</button>
                </div>
            </form>
        </div>
    </div>
@endsection
