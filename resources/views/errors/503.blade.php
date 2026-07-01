@extends('admin.site')
@section('title', '503 - Xizmat vaqtincha mavjud emas')
@section('content')
<main>
    <div class="container py-5 text-center">
        <h1 class="display-1 text-secondary">503</h1>
        <h2>Xizmat vaqtincha mavjud emas</h2>
        <p>Sayt texnik ishlar tufayli vaqtincha ishlamayapti</p>
        <a href="{{ route('index') }}" class="btn btn-primary mt-3">Bosh sahifa</a>
    </div>
</main>
@endsection
