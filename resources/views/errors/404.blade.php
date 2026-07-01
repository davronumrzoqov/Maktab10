@extends('admin.site')
@section('title', '404 - Sahifa topilmadi')
@section('content')
<main>
    <div class="container py-5 text-center">
        <h1 class="display-1 text-warning">404</h1>
        <h2>Sahifa topilmadi</h2>
        <p>Qidirilayotgan sahifa mavjud emas yoki o'chirilgan</p>
        <a href="{{ route('index') }}" class="btn btn-primary mt-3">Bosh sahifa</a>
    </div>
</main>
@endsection
