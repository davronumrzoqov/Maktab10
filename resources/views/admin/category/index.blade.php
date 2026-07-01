@extends('layouts.adminLayout')
@section('title')
    Admin - Kategoriyalar
@endsection

@section('content')

    <style>
        /* 🌐 UMUMIY */
        .main-content {
            margin-left: 250px; /* sidebar kengligi */
            padding: 30px;
            background: linear-gradient(135deg, #f0f2f5, #e9ecef);
            min-height: 100vh;
            transition: all 0.4s ease;
        }

        .card-custom {
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 6px 20px rgba(0,0,0,0.08);
            padding: 30px;
            max-width: 950px;
            margin: 0 auto;
            transition: all 0.3s ease;
        }

        .card-custom:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 28px rgba(102,16,242,0.15);
        }

        /* 💡 Buttonlar */
        .btn-create {
            background: linear-gradient(90deg, #8b5cf6, #6d28d9);
            color: #fff;
            padding: 10px 20px;
            border-radius: 12px;
            font-weight: 500;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(139,92,246,0.3);
        }

        .btn-create:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(139,92,246,0.4);
        }

        .btn-custom {
            border: none;
            padding: 6px 14px;
            font-size: 14px;
            border-radius: 8px;
            transition: all 0.2s ease-in-out;
            font-weight: 500;
            box-shadow: 0 2px 6px rgba(0,0,0,0.08);
        }

        .btn-view {
            background: #4ade80;
            color: #fff;
        }

        .btn-view:hover {
            background: #22c55e;
        }

        .btn-edit {
            background: #3b82f6;
            color: #fff;
        }

        .btn-edit:hover {
            background: #2563eb;
        }

        .btn-delete {
            background: #ef4444;
            color: #fff;
        }

        .btn-delete:hover {
            background: #dc2626;
        }

        /* 📝 Table */
        .table {
            border-collapse: separate;
            border-spacing: 0;
            width: 100%;
        }

        .table th, .table td {
            vertical-align: middle;
            text-align: center;
            padding: 12px 10px;
        }

        .table thead th {
            background: #f3f4f6;
            color: #374151;
            font-weight: 600;
            border-bottom: 2px solid #e5e7eb;
        }

        .table tbody tr {
            transition: all 0.2s ease-in-out;
        }

        .table tbody tr:hover {
            background: #f0f9ff;
            transform: scale(1.01);
        }

        .table tbody td {
            color: #4b5563;
        }

        /* ⚡ Flash message */
        #flash-message {
            animation: fade-in 0.4s ease-in-out;
            border-radius: 12px;
            padding: 12px;
            box-shadow: 0 4px 12px rgba(102,16,242,0.1);
        }

        @keyframes fade-in {
            from { opacity: 0; transform: translateY(-6px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Responsive */
        @media(max-width: 991px) {
            .main-content {
                margin-left: 0;
                padding: 20px;
            }
        }
    </style>

    <div class="main-content">
        <div class="card-custom">

            {{-- Flash message --}}
            @if (session('success'))
                <div id="flash-message" class="alert alert-success text-center mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="fw-bold text-dark">📁 Kategoriyalar</h4>
                <a href="{{ route('admin.category.create') }}" class="btn-create">Yangi kategoriya</a>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered align-middle">
                    <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>NOMI (UZ)</th>
                        <th>NOMI (RU)</th>
                        <th>AMALLAR</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name_uz }}</td>
                            <td>{{ $category->name_ru }}</td>
                            <td>
                                <div class="d-flex justify-content-center gap-2 flex-wrap">
                                    <a href="{{ route('admin.category.show', $category->id) }}" class="btn btn-custom btn-view">Ko‘rish</a>
                                    <a href="{{ route('admin.category.edit', $category->id) }}" class="btn btn-custom btn-edit">Tahrirlash</a>
                                    <form action="{{ route('admin.category.destroy', $category->id) }}" method="POST" onsubmit="return confirm('«{{ $category->name_uz }}» ni o‘chirishga ishonchingiz komilmi?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-custom btn-delete">O‘chirish</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-muted text-center py-4">Hozircha kategoriya mavjud emas.</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        setTimeout(function () {
            const msg = document.getElementById('flash-message');
            if (msg) msg.remove();
        }, 3000);
    </script>

@endsection
