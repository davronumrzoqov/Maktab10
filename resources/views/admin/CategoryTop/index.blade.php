@extends('layouts.adminLayout')
@section('title')
    Admin - CategoryTop
@endsection

@section('content')

    <style>
        .main-content {
            margin-left: 250px; /* Sidebar kengligi bilan mos */
            padding: 30px;
            background-color: #f5f6fa;
            min-height: 100vh;
        }

        .card-custom {
            background: white;
            border-radius: 16px;
            box-shadow: 0 4px 16px rgba(0,0,0,0.07);
            padding: 30px;
            max-width: 900px;
            margin: 0 auto;
        }

        .btn-create {
            background-color: #8b5cf6;
            color: white;
            padding: 10px 18px;
            border-radius: 10px;
            font-weight: 500;
            text-decoration: none;
            display: inline-block;
            transition: background-color 0.3s ease;
        }
        .btn-create:hover {
            background-color: #7c3aed;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .table th, .table td {
            padding: 14px 16px;
            vertical-align: middle;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }
        .table thead {
            background-color: #f3f4f6;
            font-weight: 600;
            color: #111827;
        }

        .btn-custom {
            border: none;
            padding: 6px 14px;
            font-size: 14px;
            border-radius: 8px;
            cursor: pointer;
            color: white;
            transition: 0.2s ease-in-out;
            margin-right: 6px;
            text-decoration: none;
            display: inline-block;
        }
        .btn-view {
            background-color: #4ade80; /* green */
        }
        .btn-edit {
            background-color: #3b82f6; /* blue */
        }
        .btn-delete {
            background-color: #ef4444; /* red */
        }

        #flash-message {
            animation: fade-in 0.4s ease-in-out;
            margin-bottom: 20px;
            text-align: center;
            font-weight: 500;
            color: #155724;
            background-color: #d4edda;
            border: 1px solid #c3e6cb;
            border-radius: 6px;
            padding: 12px;
            max-width: 900px;
            margin-left: auto;
            margin-right: auto;
        }

        @keyframes fade-in {
            from { opacity: 0; transform: translateY(-6px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>

    <div class="main-content">
        <div class="card-custom">

            @if (session('success'))
                <div id="flash-message">
                    {{ session('success') }}
                </div>
            @endif

            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="fw-bold text-dark">📁 Category Top</h4>
                <a href="{{ route('admin.CategoryTop.create') }}" class="btn-create">Create New</a>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered align-middle">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name (UZ)</th>
                        <th>Name (RU)</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($categoryTop as $categorytop)
                        <tr>
                            <td>{{ $categorytop->id }}</td>
                            <td>{{ $categorytop->name_uz }}</td>
                            <td>{{ $categorytop->name_ru }}</td>
                            <td>
                                <div class="d-flex justify-content-center flex-wrap gap-2">
                                    <form action="{{ route('admin.CategoryTop.destroy', $categorytop->id) }}" method="POST" onsubmit="return confirm('«{{ $categorytop->name_uz }}» ni o‘chirishga ishonchingiz komilmi?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-custom btn-delete">Delete</button>
                                    </form>
                                    <a href="{{ route('admin.CategoryTop.show', $categorytop->id) }}" class="btn-custom btn-view">Show</a>
                                    <a href="{{ route('admin.CategoryTop.edit', $categorytop->id) }}" class="btn-custom btn-edit">Edit</a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-muted text-center py-4">Hozircha category top mavjud emas.</td>
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
