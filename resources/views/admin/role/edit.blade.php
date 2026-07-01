@extends('layouts.adminLayout')

@section('title', 'Edit Role')

@section('content')
<div class="main-content">
    <section class="section">

        <div class="card mt-4" style="margin-left: 50vh; max-width: 700px;">
            <div class="card-header">
                <h4>Edit Role</h4>
            </div>
            <div class="card-body">

                <form action="{{ route('admin.roles.update', $role->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="name" class="form-label">Role Name</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $role->name) }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Permissions</label>
                        <div class="d-flex flex-wrap gap-2">
                            @foreach($permissions as $permission)
                                <div class="form-check">
                                    <input type="checkbox" name="permissions[]" value="{{ $permission->id }}"
                                        class="form-check-input" id="perm_{{ $permission->id }}"
                                        {{ $role->permissions->contains($permission->id) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="perm_{{ $permission->id }}">{{ $permission->name }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="d-flex justify-content-between mt-4">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('admin.roles.index') }}" class="btn btn-secondary">⬅ Back</a>
                    </div>

                </form>

            </div>
        </div>

    </section>
</div>
@endsection
