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
            border-radius: 8px;
            margin-bottom: 10px;
        }

        input[disabled], select[disabled] {
            background-color: #e9ecef;
            cursor: not-allowed;
        }
    </style>

    <div class="center-form">
        <form class="card p-4">
            <h5 class="card-header">Show Employee</h5>

            <a href="{{ route('admin.employee.index') }}" class="btn btn-success mb-3">⬅ Back</a>

            <div class="mb-4">
                <label for="name_uz" class="form-label">Name</label>
                <input type="text" class="form-control" id="name_uz" value="{{ $employee->name_uz }}" disabled>
            </div>

            <div class="mb-4">
                <label for="name_ru" class="form-label">Sure Name</label>
                <input type="text" class="form-control" id="name_ru" value="{{ $employee->name_ru }}" disabled>
            </div>

            <div class="mb-4">
                <label class="form-label">Image</label><br>
                <img src="{{ asset('admin/images/' . $employee->image) }}" alt="Employee Image" style="width: 150px; height: auto;">
            </div>

            <div class="mb-4">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" value="{{ $employee->email }}" disabled>
            </div>

            <div class="mb-4">
                <label for="category_id" class="form-label">Kategoriya (empCategory)</label>
                <select class="form-control" id="category_id" disabled>
                    @foreach($empCategories as $category)
                        <option value="{{ $category->id }}" {{ $employee->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name_uz }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="position_id" class="form-label">Lavozimi (Position)</label>
                <select class="form-control" id="position_id" disabled>
                    @foreach($positions as $position)
                        <option value="{{ $position->id }}" {{ $employee->position_id == $position->id ? 'selected' : '' }}>
                            {{ $position->name_uz }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" class="form-control" id="phone" value="{{ $employee->phone }}" disabled>
            </div>

            <div class="mb-4">
                <label for="work_time" class="form-label">Work Time</label>
                <input type="time" class="form-control" id="work_time" value="{{ $employee->work_time }}" disabled>
            </div>
        </form>
    </div>

@endsection
