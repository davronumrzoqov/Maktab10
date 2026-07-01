@extends('layouts.adminLayout')
@section('content')

    <style>
        .page-center {
            display: flex;
            justify-content: flex-start; /* chapdan boshlansin */
            align-items: center;
            min-height: 50%;
            background-color: #f3f4f6;
            padding-left: 350px; /* bu joy sidebar kengligiga qarab o‘zgartiriladi */
            padding-right: 50px;
        }

        .card {
            width: 100%;
            max-width: 650px;
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
            transition: 0.3s ease;
        }

        .card:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 30px rgba(99, 102, 241, 0.2);
        }

        .card-header {
            background: linear-gradient(90deg, #4e73df, #6366f1);
            color: white;
            font-weight: 600;
            font-size: 1.3rem;
            text-align: center;
            border-top-left-radius: 16px;
            border-top-right-radius: 16px;
            padding: 1rem;
        }

        .form-label {
            font-weight: 500;
            color: #374151;
        }

        .form-control {
            border-radius: 10px;
            padding: 10px 12px;
            border: 1px solid #d1d5db;
            background-color: #f9fafb;
        }

        .form-control:focus {
            border-color: #6366f1;
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.2);
        }

        .btn-primary {
            background: linear-gradient(90deg, #4e73df, #6366f1);
            border: none;
            color: #fff;
            padding: 10px 20px;
            border-radius: 12px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 14px rgba(99, 102, 241, 0.25);
        }

        .btn-success {
            border-radius: 12px;
            padding: 10px 20px;
            font-weight: 500;
            background-color: #22c55e;
            border: none;
            color: #fff;
            transition: all 0.3s ease;
        }

        .btn-success:hover {
            background-color: #16a34a;
            transform: translateY(-2px);
        }
    </style>

    <div class="page-center">
        <form action="{{ route('admin.employee.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <h5 class="card-header">👔 Create Employee</h5>
                <div class="card-body">

                    <a href="{{ route('admin.employee.index') }}" class="btn btn-success mb-3">⬅ Back</a>

                    {{-- Name (UZ) --}}
                    <div class="mb-4">
                        <label for="name_uz" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name_uz" name="name_uz" placeholder="Ism (UZ)">
                    </div>

                    {{-- Name (RU) --}}
                    <div class="mb-4">
                        <label for="name_ru" class="form-label">Sure name</label>
                        <input type="text" class="form-control" id="name_ru" name="name_ru" placeholder="Sure name">
                    </div>

                    {{-- Image --}}
                    <div class="mb-4">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" class="form-control" id="image" name="image">
                    </div>

                    {{-- Email --}}
                    <div class="mb-4">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="email@example.com">
                    </div>

                    {{-- Category --}}
                    <div class="mb-4">
                        <label for="category_id" class="form-label">Category</label>
                        <select class="form-control" name="category_id" id="category_id">
                            <option value="" disabled selected>— Tanlang —</option>
                            @foreach($empCategories as $empCategory)
                                <option value="{{ $empCategory->id }}">{{ $empCategory->name_uz }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Position --}}
                    <div class="mb-4">
                        <label for="position_id" class="form-label">Position</label>
                        <select class="form-control" name="position_id" id="position_id">
                            <option value="" disabled selected>— Tanlang —</option>
                            @foreach($positions as $position)
                                <option value="{{ $position->id }}">{{ $position->name_uz }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Phone --}}
                    <div class="mb-4">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="+998...">
                    </div>

                    {{-- Work Time --}}
                    <div class="mb-4">
                        <label for="work_time" class="form-label">Work Time</label>
                        <input type="time" class="form-control" id="work_time" name="work_time">
                    </div>

                    <div class="d-flex justify-content-end">
                        <button class="btn btn-primary" type="submit">Save ✅</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection
