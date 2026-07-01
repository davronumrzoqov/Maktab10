@extends('layouts.adminLayout')

@section('title', 'Admin - Category Children')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="row">
                <div class="col-md-12">

                    {{-- --- STYLE --- --}}
                    <style>
                        .main-content {
                            margin-left: 250px; /* Sidebar kengligi bilan mos */
                            padding: 20px;
                        }
                        .table th, .table td {
                            text-align: center;
                            vertical-align: middle;
                        }
                        .truncate {
                            max-width: 180px;
                            white-space: nowrap;
                            overflow: hidden;
                            text-overflow: ellipsis;
                        }
                    </style>

                    {{-- --- FLASH MESSAGE --- --}}
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

                    {{-- --- HEADER --- --}}
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="mb-0">Children Categories</h4>
                        <a href="{{ route('admin.categorychildren.create') }}" class="btn btn-primary">+ Create</a>
                    </div>

                    {{-- --- TABLE --- --}}
                    <div class="card">
                        <div class="card-body table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead class="thead-light">
                                <tr>
                                    <th>#</th>
                                    <th>Name (UZ)</th>
                                    <th>Name (RU)</th>
                                    <th>Parent Category</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($childrens as $category)
                                    <tr>
                                        <td>{{ $category->id }}</td>
                                        <td class="truncate">{{ $category->name_uz }}</td>
                                        <td class="truncate">{{ $category->name_ru }}</td>
                                        <td>{{ $category->category->name_uz ?? '—' }}</td>
                                        <td class="d-flex justify-content-center gap-2">
                                            <a href="{{ route('admin.categorychildren.edit', $category->id) }}" class="btn btn-success btn-sm">Edit</a>
                                            <form action="{{ route('admin.categorychildren.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this item?');">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center text-muted">No category children found</td>
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
