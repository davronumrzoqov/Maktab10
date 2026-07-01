@extends('layouts.adminLayout')

@section('title', 'Roles')

@section('content')
    <div class="main-content">
        <section class="section">

            <h1>Roles</h1>

            <div class="card mt-4" style="margin-left: 50vh">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>Role List</h4>
                    <a href="{{ route('admin.roles.create') }}" class="btn btn-success">
                        + Create New
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped text-center align-middle">
                            <thead class="table-primary">
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Permission</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($roles as $role)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><b>{{ $role->name }}</b></td>
                                    <td>
                                        @foreach($role->permissions as $permission)
                                            <span class="badge badge-info">{{ $permission->name }}</span>
                                        @endforeach
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.roles.show', $role->id) }}"
                                           class="btn btn-warning btn-sm">
                                            👁 Show
                                        </a>
                                        <a href="{{ route('admin.roles.edit', $role->id) }}"
                                           class="btn btn-primary btn-sm">
                                            ✏️ Edit
                                        </a>
                                        <form action="{{ route('admin.roles.destroy', $role->id) }}" class="d-inline"
                                              method="POST"
                                              onsubmit="return confirm('Rostdan ham ushbu tagni o‘chirmoqchimisiz?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash"></i> Delete
                                            </button>
                                        </form>

                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">No Users found</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

        </section>
    </div>
@endsection
