@extends('layouts.adminLayout')
@section('content')

    <style>
        .right-form {
            display: flex;
            justify-content: flex-start;
            align-items: center;
            min-height: 100vh;
            background-color: #f3f4f6;
            padding-left: 350px; /* sidebar joy */
            padding-right: 50px;
        }

        .card {
            width: 100%;
            max-width: 600px;
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #007bff;
            color: white;
            font-weight: 600;
            text-align: center;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
        }

        .btn-success {
            margin-bottom: 15px;
        }
    </style>

    <div class="right-form">
        <form action="{{ route('admin.smenatype.store') }}" method="POST" style="width: 100%; max-width: 600px;">
            @csrf

            <div class="card">
                <h5 class="card-header">Create SmenaType</h5>
                <div class="card-body">
                    <a href="{{ route('admin.smenatype.index') }}" class="btn btn-success">Back</a>

                    <div class="mb-4">
                        <label for="name_uz" class="form-label">Name (uz)</label>
                        <input type="text"
                               class="form-control @error('name_uz') is-invalid @enderror"
                               id="name_uz"
                               placeholder="name..."
                               name="name_uz"
                               value="{{ old('name_uz') }}">
                        @error('name_uz')
                        <div class="invalid-feedback" style="color: red;">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="name_ru" class="form-label">Name (ru)</label>
                        <input type="text"
                               class="form-control @error('name_ru') is-invalid @enderror"
                               id="name_ru"
                               placeholder="name..."
                               name="name_ru"
                               value="{{ old('name_ru') }}">
                        @error('name_ru')
                        <div class="invalid-feedback" style="color: red;">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-end">
                        <button class="btn btn-primary" type="submit">Save</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection
