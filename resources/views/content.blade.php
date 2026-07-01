<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Bog'lanish</title>

    <!-- Bootstrap core css -->
    <link rel="stylesheet" href="{{ asset('front/css/bootstrap.css') }}">
    <!-- Animate css -->
    <link rel="stylesheet" href="{{ asset('front/css/animate.css') }}">
    <!-- Font awesome -->
    <link rel="stylesheet" href="{{ asset('front/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- Custom css -->
    <link rel="stylesheet" href="{{ asset('front/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/responsive.css') }}">
</head>

<body>

<!-- Header Section -->
@include('front.includes.header')

<!-- Contact Section -->
<section class="contact-section">
    <div class="container">
        <div class="section-header text-center">
            <h2 class="title">Biz bilan bog'lanish</h2>
            <p>Quyidagi forma orqali biz bilan bog‘lanishingiz mumkin</p>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <form action="{{ route('connect.store') }}" method="POST" class="contact-form">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Ismingiz</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Ismingizni kiriting" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email manzilingiz</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Email manzilingizni kiriting" required>
                    </div>

                    <div class="mb-3">
                        <label for="message" class="form-label">Xabar</label>
                        <textarea name="message" id="message" class="form-control" rows="5" placeholder="Xabaringizni yozing..." required></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Yuborish</button>
                </form>
            </div>

            <div class="col-lg-6">
                <div class="contact-info">
                    <h4>Bizning manzil:</h4>
                    <p><i class="fa-solid fa-location-dot"></i> Sirdaryo viloyati, Guliston shahri</p>

                    <h4>Telefon raqam:</h4>
                    <p><i class="fa-solid fa-phone"></i> +998 90 123 45 67</p>

                    <h4>Email:</h4>
                    <p><i class="fa-solid fa-envelope"></i> info@sirdaryoliklar.uz</p>

                    <h4>Ijtimoiy tarmoqlar:</h4>
                    <div class="social-links">
                        <a href="#"><i class="fa-brands fa-telegram"></i></a>
                        <a href="#"><i class="fa-brands fa-facebook"></i></a>
                        <a href="#"><i class="fa-brands fa-instagram"></i></a>
                        <a href="#"><i class="fa-brands fa-youtube"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Footer Section -->
@include('front.includes.footer')

<!-- JS Files -->
<script src="{{ asset('front/js/jquery.js') }}"></script>
<script src="{{ asset('front/js/bootstrap.js') }}"></script>
<script src="{{ asset('front/js/tilt.jquery.js') }}"></script>
<script src="{{ asset('front/js/wow.min.js') }}"></script>
<script src="{{ asset('front/js/custom.js') }}"></script>

</body>
</html>
