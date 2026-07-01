@extends('layouts.adminLayout')
@section('title', 'Resurs tafsilotlari')

@section('content')
<style>
    .main-content {
        margin-left: 250px;
        padding: 30px;
        background-color: #f8fafc;
        min-height: 100vh;
    }
    .card {
        max-width: 800px;
        margin: 0 auto;
        background: white;
        border-radius: 12px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }
    .card-header {
        background: #007bff;
        color: white;
        border-radius: 12px 12px 0 0;
        padding: 15px 20px;
    }
    .card-body {
        padding: 25px;
    }
    .card-body img {
        max-width: 100%;
        border-radius: 8px;
        margin-bottom: 20px;
    }
    .qr-image {
        width: 150px;
        margin-top: 10px;
        border: 1px solid #ddd;
        border-radius: 8px;
    }
    .btn-back {
        margin-top: 20px;
    }
</style>

<div class="main-content">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4>📘 Resurs tafsilotlari</h4>
            <a href="{{ route('admin.usefulResource.index') }}" class="btn btn-light text-dark border">⬅ Orqaga</a>
        </div>

        <div class="card-body">
            <img src="{{ asset('admin/images/' . $resource->image) }}" alt="Image">
            <h3>{{ $resource->title_uz }}</h3>
            <p><strong>Title (RU):</strong> {{ $resource->title_ru }}</p>
            <p><strong>Body (UZ):</strong> {!! $resource->body_uz !!}</p>
            <p><strong>Body (RU):</strong> {!! $resource->body_ru !!}</p>
            {{-- <p><strong>URL:</strong> 
                <a href="{{ $resource->url }}" target="_blank">{{ $resource->url }}</a>
            </p>
            <div>
                <strong>QR Code:</strong><br>
                <img src="{{ asset('admin/images/' . $resource->qr_code) }}" class="qr-image" alt="QR Code">
            </div> --}}
        </div>
    </div>
</div>
@endsection
