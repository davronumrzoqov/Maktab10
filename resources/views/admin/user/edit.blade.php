@extends('layouts.adminLayout')

@section('title', 'Edit User')

@section('content')
    <div class="main-content">
        <section class="section">

            <h1>Edit User</h1>

            <div class="card mt-4" style="margin-left: 50vh; max-width: 600px;">
                <div class="card-header bg-primary text-white text-center">
                    <h4 class="mb-0">Foydalanuvchini tahrirlash: {{ $user->name }}</h4>
                </div>
                <div class="card-body">

                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    @if(session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="name" class="form-label">Ism</label>
                            <input type="text" name="name"
                                   class="form-control @error('name') is-invalid @enderror"
                                   value="{{ old('name', $user->name) }}" required>
                            @error('name')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email"
                                   class="form-control @error('email') is-invalid @enderror"
                                   value="{{ old('email', $user->email) }}" required>
                            @error('email')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Parol
                                <small class="text-muted">(agar o‘zgarmasa bo‘sh qoldiring)</small>
                            </label>
                            <input type="password" name="password"
                                   class="form-control @error('password') is-invalid @enderror">
                            @error('password')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Rollar</label>
                            <div class="d-flex flex-wrap">
                                @foreach($roles as $role)
                                    <div class="form-check me-3 mb-2">
                                        <input type="checkbox" name="roles[]" value="{{ $role->id }}"
                                               class="form-check-input" id="role{{ $role->id }}"
                                            {{ in_array($role->name, $userRoles) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="role{{ $role->id }}">{{ $role->name }}</label>
                                    </div>
                                @endforeach
                            </div>
                            @error('roles')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Orqaga</a>
                            <button type="submit" class="btn btn-primary">Saqlash</button>
                        </div>
                    </form>

                </div>
            </div>

        </section>
    </div>
@endsection
