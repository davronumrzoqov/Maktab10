@extends('admin.site')
@section('title', '403 - Ruxsat yo\'q')
@section('content')
<main>
    <div class="container py-5 text-center">
        <h1 class="display-1 text-danger">403</h1>
        <h2>Ruxsat yo'q</h2>
        <p>Sizga ushbu sahifaga kirish ruxsati berilmagan</p>
        <a href="{{ route('index') }}" class="btn btn-primary mt-3">Bosh sahifa</a>
    </div>
</main>
@endsection
