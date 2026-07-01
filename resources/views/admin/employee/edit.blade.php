@extends('layouts.adminLayout')
@section('content')

    <style>
        .center-form {
            display: flex;
            justify-content: center;
            align-items: flex-start;
            min-height: 100vh;
            padding: 40px 20px;
            margin-left: 250px; /* sidebar eni */
            width: calc(100% - 250px);
            position: relative;
            z-index: 10;
        }

        @media (max-width: 992px) {
            .center-form {
                margin-left: 0;
                width: 100%;
            }
        }

        .card {
            width: 100%;
            max-width: 700px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }

        .card-header {
            background: linear-gradient(90deg, #007bff, #00c9a7);
            color: white;
            font-size: 20px;
            text-align: center;
            font-weight: 600;
            padding: 15px;
            border-radius: 15px 15px 0 0;
        }

        .btn-success {
            margin-bottom: 15px;
        }

        img {
            border-radius: 10px;
            margin-bottom: 10px;
        }
    </style>

    <div class="center-form">
        <form action="{{ route('admin.employee.update', $employee->id) }}" method="POST" enctype="multipart/form-data" class="card p-4">
            @csrf
            @method('PUT')
            <h5 class="card-header">Edit Employee</h5>

            <a href="{{ route('admin.employee.index') }}" class="btn btn-success mb-3">⬅ Back</a>

            <div class="mb-3">
                <label for="name_uz" class="form-label">Name</label>
                <input type="text" class="form-control" name="name_uz" id="name_uz" value="{{ $employee->name_uz }}">
            </div>

            <div class="mb-3">
                <label for="name_ru" class="form-label">Sure Name</label>
                <input type="text" class="form-control" name="name_ru" id="name_ru" value="{{ $employee->name_ru }}">
            </div>

            <div class="mb-3">
                <label>Current Image</label><br>
                <img src="{{ asset('admin/images/' . $employee->image) }}" width="120" alt="current image">
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Upload New Image</label>
                <input type="file" class="form-control" name="image" id="image">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="email" value="{{ $employee->email }}">
            </div>

            <div class="mb-3">
                <label for="category_id" class="form-label">Category</label>
                <select name="category_id" class="form-control" id="category_id">
                    @foreach($empCategories as $category)
                        <option value="{{ $category->id }}" {{ $employee->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name_uz }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="position_id" class="form-label">Position</label>
                <select name="position_id" class="form-control" id="position_id">
                    @foreach($positions as $position)
                        <option value="{{ $position->id }}" {{ $employee->position_id == $position->id ? 'selected' : '' }}>
                            {{ $position->name_uz }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" class="form-control" name="phone" id="phone" value="{{ $employee->phone }}">
            </div>

            <div class="mb-3">
                <label for="work_time" class="form-label">Work Time</label>
                <input type="time" class="form-control" name="work_time" id="work_time" value="{{ $employee->work_time }}">
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>

@endsection
