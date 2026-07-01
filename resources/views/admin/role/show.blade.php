@extends('layouts.adminLayout')

@section('title', 'Show Role')

@section('content')
<div class="main-content">
    <section class="section">

        <div class="card mt-4" style="margin-left: 50vh; max-width: 600px;">
            <div class="card-header">
                <h4>Show Role</h4>
            </div>
            <div class="card-body">
                <h5>Role Name:</h5>
                <p><b>{{ $role->name }}</b></p>

                <h5>Permissions:</h5>
                @if($role->permissions->isEmpty())
                    <p>No permissions assigned.</p>
                @else
                    <div>
                        @foreach($role->permissions as $permission)
                            <span class="badge bg-info text-dark">{{ $permission->name }}</span>
                        @endforeach
                    </div>
                @endif

                <a href="{{ route('admin.roles.index') }}" class="btn btn-secondary mt-3">
                    ⬅ Back
                </a>
            </div>
        </div>

    </section>
</div>
@endsection
