@extends('admin.site')
@section('title', '429 - Ko\'p so\'rov')
@section('content')
<main>
    <div class="container py-5 text-center">
        <h1 class="display-1 text-info">429</h1>
        <h2>Juda ko'p so'rov yuborildi</h2>
        <p>Iltimos birozdan so'ng urinib ko'ring</p>
        <a href="{{ route('index') }}" class="btn btn-primary mt-3">Bosh sahifa</a>
    </div>
</main>
@endsection
