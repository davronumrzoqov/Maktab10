@extends('layouts.adminLayout')
@section('title', 'Admin - Statick Ma’lumotlar')

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
            max-width: 1000px;
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

        .btn-create {
            background-color: #4f46e5;
            color: white;
            padding: 10px 20px;
            border-radius: 10px;
            font-weight: 500;
            text-decoration: none;
            transition: 0.3s ease;
        }

        .btn-create:hover {
            background-color: #4338ca;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table thead {
            background-color: #eef2ff;
            color: #1e3a8a;
            font-weight: 600;
        }

        .table th, .table td {
            padding: 14px 16px;
            text-align: center;
            border-bottom: 1px solid #e5e7eb;
            word-break: break-word;
            vertical-align: middle;
        }

        .table tbody tr:hover {
            background-color: #f9fafc;
        }

        .btn-custom {
            border: none;
            padding: 6px 14px;
            font-size: 14px;
            border-radius: 8px;
            cursor: pointer;
            color: white;
            transition: 0.2s ease;
            margin-right: 5px;
            text-decoration: none;
            display: inline-block;
        }

        .btn-view {
            background-color: #22c55e;
        }

        .btn-edit {
            background-color: #3b82f6;
        }

        .btn-delete {
            background-color: #ef4444;
        }

        .btn-view:hover {
            background-color: #16a34a;
        }

        .btn-edit:hover {
            background-color: #2563eb;
        }

        .btn-delete:hover {
            background-color: #dc2626;
        }

        #flash-message {
            animation: fadeIn 0.4s ease;
            margin-bottom: 20px;
            text-align: center;
            font-weight: 500;
            color: #155724;
            background-color: #d1fae5;
            border: 1px solid #bbf7d0;
            border-radius: 8px;
            padding: 12px;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-5px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>

    <div class="main-content">
        <div class="card-custom">

            {{-- Flash message --}}
            @if (session('success'))
                <div id="flash-message">
                    {{ session('success') }}
                </div>
            @endif

            <div class="page-header">
                <h2>📊 Statick ma’lumotlar</h2>
                <a href="{{ route('admin.statictik.create') }}" class="btn-create">➕ Yangi ma’lumot qo‘shish</a>
            </div>


            <div class="table-responsive">
                <table class="table table-bordered align-middle">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Sinflar soni</th>
                        <th>O‘quvchilar soni</th>
                        <th>O‘qituvchilar soni</th>
                        <th>Bitiruvchilar</th>
                        <th>Amallar</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($statictik as $static)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $static->classesCount }}</td>
                            <td>{{ $static->studentsCount }}</td>
                            <td>{{ $static->teachersCount }}</td>
                            <td>{{ $static->graduatesCount }}</td>
                            <td>
                                <div class="d-flex justify-content-center flex-wrap">
                                    <a href="{{ route('admin.statictik.show', $static->id) }}" class="btn-custom btn-view">Ko‘rish</a>
                                    <a href="{{ route('admin.statictik.edit', $static->id) }}" class="btn-custom btn-edit">Tahrirlash</a>
                                    <form action="{{ route('admin.statictik.destroy', $static->id) }}" method="POST"
                                          onsubmit="return confirm('Haqiqatan ham bu ma’lumotni o‘chirmoqchimisiz?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-custom btn-delete">O‘chirish</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted py-4">
                                Hozircha hech qanday ma’lumot mavjud emas.
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>

    <script>
        setTimeout(() => {
            const flash = document.getElementById('flash-message');
            if (flash) flash.remove();
        }, 3000);
    </script>
@endsection
