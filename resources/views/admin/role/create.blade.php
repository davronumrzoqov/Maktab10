@extends('layouts.adminLayout')
@section('title')
    Role create
@endsection

@section('content')
    <div class="main-content">
        <section class="section" style="margin-left: 50vh; width: 1000px">
            <h1>Role create</h1>
            <div class="row">
                <div class="col-8">
                    <form action="{{ route('admin.roles.store') }}" method="POST">
                        <div class="card">
                            <div class="card-header">
                                <a href="{{ route('admin.roles.index') }}" class="btn btn-success">Back</a>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Role name</label>
                                    <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
                                            <div class="form-group">
                                                <label>Roles</label>
                                                    <select class="form-control" multiple="" data-height="100%" style="height: 100%;"name="roles[]">
                                                         @foreach ($permissions as $permission)
                                                            <option value="{{$permission->id}}">{{ $permission->name}}</option>
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

