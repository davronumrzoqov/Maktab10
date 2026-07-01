@extends('layouts.adminLayout')

@section('title', 'Admin - Useful Resources')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="row">
                <div class="col-md-12">

                    {{-- CSS --}}
                    <style>
                        .main-content {
                            margin-left: 250px; /* Sidebar kengligi bilan mos */
                            padding: 20px;
                        }
                        .table th, .table td {
                            text-align: center;
                            vertical-align: middle;
                        }
                        .table img {
                            width: 60px;
                            height: 60px;
                            border-radius: 6px;
                            object-fit: cover;
                        }
                        .truncate {
                            max-width: 180px;
                            white-space: nowrap;
                            overflow: hidden;
                            text-overflow: ellipsis;
                        }
                    </style>

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

                    {{-- Header + Create --}}
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="mb-0">Useful Resources List</h4>
                        <a href="{{ route('admin.usefulResource.create') }}" class="btn btn-primary">+ Create</a>
                    </div>

                    {{-- Table --}}
                    <div class="card">
                        <div class="card-body table-responsive">
                            <table class="table table-bordered">
                                <thead class="thead-light">
                                <tr>
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>Title (UZ)</th>
                                    <th>Title (RU)</th>
                                    <th>Body (UZ)</th>
                                    <th>Body (RU)</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse ($usefulResources as $usefulResource)
                                    <tr>
                                        <td>{{ $usefulResource->id }}</td>
                                        <td>
                                            @if ($usefulResource->image)
                                                <img src="{{ asset('admin/images/' . $usefulResource->image) }}" alt="Image">
                                            @else
                                                <span class="text-muted">No Image</span>
                                            @endif
                                        </td>
                                        <td class="truncate">{{ $usefulResource->title_uz }}</td>
                                        <td class="truncate">{{ $usefulResource->title_ru }}</td>
                                        <td class="truncate">{{ $usefulResource->body_uz }}</td>
                                        <td class="truncate">{{ $usefulResource->body_ru }}</td>
                                        <td class="d-flex justify-content-center gap-2">
                                            <a href="{{ route('admin.usefulResource.show', $usefulResource->id) }}" class="btn btn-success btn-sm">Show</a>
                                            <a href="{{ route('admin.usefulResource.edit', $usefulResource->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                            <form action="{{ route('admin.usefulResource.destroy', $usefulResource->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center text-muted">No useful resources found</td>
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
