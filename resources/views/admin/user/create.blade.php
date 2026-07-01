@extends('layouts.adminLayout')
@section('title')
    User create
@endsection

@section('content')
    <div class="main-content">
        <section class="section" style="margin-left: 50vh; width: 1000px">
            <h1>User create</h1>
            <div class="row">
                <div class="col-8">
                    <form action="{{ route('admin.users.store') }}" method="POST">
                        <div class="card">
                            <div class="card-header">
                                <a href="{{ route('admin.users.index') }}" class="btn btn-success">Back</a>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">User name</label>
                                    <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
                                    @error('name') <i style="color: #ff0000;">{{ $message }}</i> @enderror
                                    <div class="form-group">
                                        <label for="email">User email</label>
                                        <input type="text" class="form-control" name="email" id="email" value="{{ old('email') }}">
                                        @error('email') <i style="color: #ff0000;">{{ $message }}</i> @enderror
                                        <div>
                                        <div class="form-group">
                                        <label for="password">User password</label>
                                        <input type="password" class="form-control" name="password" id="password" value="{{ old('password') }}">
                                        @error('password') <i style="color: #ff0000;">{{ $message }}</i> @enderror
                                        <div>
                                            <div class="form-group">
                                                <label>Roles</label>
                                                    <select class="form-control" multiple="" data-height="100%" style="height: 100%;"name="roles[]">
                                                         @foreach ($roles as $role)
                                                            <option value="{{$role->id}}">{{ $role->name}}</option>
                                                        @endforeach
                                                    </select>
                                            </div>


                                            </div>
                                            <div class="card-footer text-right">
                                                <button class="btn btn-primary mr-1" type="submit">Save</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @csrf
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection

