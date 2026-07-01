    @extends('layouts.adminLayout')

    @section('title', 'Users')

    @section('content')
        <div class="main-content">
            <section class="section">

                <h1>Users</h1>

                <div class="card mt-4"  style="margin-left: 50vh">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4>User List</h4>
                        <a href="{{ route('admin.users.create') }}" class="btn btn-success">
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
                                    <th>Email</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($users as $user)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td><b>{{ $user->name }}</b></td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            <a href="{{ route('admin.users.show', $user->id) }}"
                                               class="btn btn-warning btn-sm">
                                                👁 Show
                                            </a>
                                            <a href="{{ route('admin.users.edit', $user->id) }}"
                                               class="btn btn-primary btn-sm">
                                                ✏️ Edit
                                            </a>
                                            <form action="{{ route('admin.users.destroy', $user->id) }}" class="d-inline"
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
