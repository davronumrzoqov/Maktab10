@extends('admin.site')
@section('title', '500 - Server xatosi')
@section('content')
<main>
    <div class="container py-5 text-center">
        <h1 class="display-1 text-danger">500</h1>
        <h2>Serverda xatolik yuz berdi</h2>
        <p>Iltimos keyinroq urinib ko'ring</p>
        <a href="{{ route('index') }}" class="btn btn-primary mt-3">Bosh sahifa</a>
    </div>
</main>
@endsection
