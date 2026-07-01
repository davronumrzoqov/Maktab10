@extends('layouts.adminLayout')
@section('title', 'Statistika tahrirlash')

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
        .form-label {
            font-weight: 600;
        }
        .btn-save {
            background-color: #0d6efd;
            color: white;
        }
        .btn-save:hover {
            background-color: #0b5ed7;
        }
    </style>

    <div class="main-content">
        <section class="section">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>✏️ Statistika tahrirlash</h4>
                    <a href="{{ route('admin.statictik.index') }}" class="btn btn-light text-dark border">
                        ⬅ Orqaga
                    </a>
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.statictik.update', $statictik->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label">Sinf soni</label>
                            <input type="number" name="classesCount" class="form-control" value="{{ old('classesCount', $statictik->classesCount) }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">O‘quvchi soni</label>
                            <input type="number" name="studentsCount" class="form-control" value="{{ old('studentsCount', $statictik->studentsCount) }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">O‘qituvchi soni</label>
                            <input type="number" name="teachersCount" class="form-control" value="{{ old('teachersCount', $statictik->teachersCount) }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Bitiruvchi soni</label>
                            <input type="number" name="graduatesCount" class="form-control" value="{{ old('graduatesCount', $statictik->graduatesCount) }}" required>
                        </div>

                        <button type="submit" class="btn btn-save w-100">💾 Saqlash</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection
