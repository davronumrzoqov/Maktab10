@extends('layouts.adminLayout')
@section('title', 'Admin Dashboard')
@section('content')

    <style>
        /* 🌐 UMUMIY USTUNLIK */
        * { box-sizing: border-box; margin:0; padding:0; }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f0f2f5, #e9ecef);
            color: #333;
            overflow-x: hidden;
            transition: background 0.5s ease;
        }

        /* === NAVBAR === */
        .navbar {
            background: linear-gradient(90deg, #4e73df, #6610f2);
            padding: 0.75rem 1rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            color: #fff;
            position: sticky;
            top: 0;
            z-index: 1050;
            box-shadow: 0 3px 12px rgba(0,0,0,0.15);
            border-radius: 0 0 15px 15px;
            animation: slideDown 0.6s ease;
        }

        @keyframes slideDown {
            from { transform: translateY(-60px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }

        .navbar input {
            border: none;
            border-radius: 50px;
            padding: 0.4rem 1rem;
            transition: box-shadow 0.3s ease;
            width: 100%;
        }

        .navbar input:focus {
            box-shadow: 0 0 0 3px rgba(255,255,255,0.35);
            outline: none;
        }

        .navbar img {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .navbar img:hover {
            transform: scale(1.1) rotate(3deg);
            box-shadow: 0 0 0 3px rgba(255,255,255,0.25);
        }

        /* === SIDEBAR === */
        aside {
            width: 250px;
            min-height: 100vh;
            background: linear-gradient(180deg, #224abe, #4e73df);
            padding-top: 1rem;
            position: fixed;
            top: 0;
            left: 0;
            overflow-y: auto;
            z-index: 1000;
            transition: all 0.3s ease;
            border-right: 1px solid rgba(255,255,255,0.1);
            color: #fff;
        }

        aside a.nav-link {
            display: flex;
            align-items: center;
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            color: rgba(255,255,255,0.9);
            font-weight: 500;
            margin: 4px 10px;
            transition: all 0.3s ease;
        }

        aside a.nav-link i { margin-right: 12px; font-size: 1.2rem; }

        aside a.nav-link:hover {
            background: rgba(255,255,255,0.15);
            transform: translateX(5px);
            color: #ffd700;
            text-shadow: 0 0 5px #ffd700;
        }

        aside a.nav-link.active {
            background: rgba(255,255,255,0.3);
            color: #ffd700 !important;
            font-weight: 600;
        }

        aside .text-muted { color: rgba(255,255,255,0.7); margin-left: 10px; }

        /* === MAIN CONTENT === */
        .main-content, main {
            margin-left: 250px;
            padding: 2rem;
            transition: all 0.4s ease;
            width: calc(100% - 250px);
        }

        aside.active ~ .main-content { margin-left: 0; width: 100%; }

        /* === CARDLAR === */
        .card {
            background: #fff;
            border-radius: 16px;
            padding: 1.5rem;
            box-shadow: 0 4px 20px rgba(0,0,0,0.05);
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .card:hover {
            transform: translateY(-6px) scale(1.02);
            box-shadow: 0 6px 25px rgba(102,16,242,0.2);
        }

        .card img { transition: transform 0.4s ease; }
        .card:hover img { transform: scale(1.05); }

        /* === BUTTONLAR === */
        .btn-primary {
            background: linear-gradient(90deg, #4e73df, #6610f2);
            border: none;
            box-shadow: 0 4px 12px rgba(102,16,242,0.25);
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 14px rgba(102,16,242,0.25);
        }

        .btn-outline-secondary {
            border-radius: 30px;
            font-weight: 500;
            transition: all 0.3s ease;
            border: 1px solid #4e73df;
            color: #4e73df;
        }

        .btn-outline-secondary:hover {
            background: #4e73df;
            color: #fff;
            transform: translateY(-2px);
        }

        /* === STATISTIKA CARDLAR === */
        .card.text-center {
            background: linear-gradient(135deg, #e9ecef, #f8f9fa);
            border-radius: 16px;
            padding: 1rem;
            transition: all 0.3s ease;
        }

        .card.text-center:hover { transform: translateY(-4px); }

        .card.text-center h4 { color: #224abe; font-weight: 700; }
        .card.text-center small.text-success { color: #28a745 !important; }

        /* === RESPONSIVE === */
        @media (max-width: 991px) {
            aside { left: -250px; }
            aside.active { left: 0; }
            main { margin-left: 0; width: 100%; }
        }

        /* Scrollbar */
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-thumb { background: rgba(0,0,0,0.2); border-radius: 4px; }
        ::-webkit-scrollbar-thumb:hover { background: rgba(0,0,0,0.3); }

        /* Logo sidebar */
        aside .logo {
            text-align: center;
            margin-bottom: 1rem;
        }
        aside .logo img {
            height: 50px;
            margin-right: 10px;
            transition: transform 0.3s ease;
        }
        aside .logo img:hover {
            transform: scale(1.1) rotate(5deg);
        }
        aside .logo span {
            font-weight: 700;
            font-size: 1.2rem;
        }

    </style>

    <div class="layout-menu-100vh">

        <!-- 🔹 Navbar -->
        <nav class="navbar navbar-expand-xl navbar-dark px-4 py-2">
            <div class="container-fluid">
                <button class="btn text-white d-xl-none me-2" id="sidebarToggle">
                    <i class="bx bx-menu fs-4"></i>
                </button>

                <!-- 🔍 Search -->
                <form class="d-flex align-items-center flex-grow-1 me-3">
                    <i class="bx bx-search text-white fs-4 me-2"></i>
                    <input type="text" class="form-control" placeholder="Qidiruv..." />
                </form>

                <!-- 👤 User -->
                <ul class="navbar-nav flex-row align-items-center ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" data-bs-toggle="dropdown">
                            <img
                                src="{{ auth()->user()->avatar ? asset('storage/' . auth()->user()->avatar) : asset('assets/img/avatars/1.png') }}"
                                class="rounded-circle me-2"
                                width="40"
                                height="40"
                                alt="User">
                            <span class="text-white fw-semibold d-none d-sm-inline">{{ auth()->user()->name }}</span>
                        </a>

                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                    <i class="bx bx-user me-2"></i> Profil
                                </a>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item">
                                        <i class="bx bx-log-out me-2"></i> Chiqish
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- 📦 Content -->
        <div class="container-fluid py-4">
            <div class="row g-4 align-items-stretch">
                <!-- 🏠 Xush kelibsiz card -->
                <div class="col-lg-8">
                    <div class="card p-4 h-100">
                        <div class="row align-items-center g-3">
                            <div class="col-md-7">
                                <h5>🎉 Xush kelibsiz,
                                    <span class="fw-bold">{{ auth()->user()->name }}</span>!
                                </h5>

                                <p class="mb-1">
                                <span class="badge bg-info text-dark px-3 py-2 shadow-sm">
                                    {{ auth()->user()->getRoleNames()->first() ?? 'Foydalanuvchi' }}
                                </span>
                                </p>

                                <p class="text-muted">
                                    Bugun tizimni boshqarishga tayyorsiz. Quyidagi bo‘limlardan ishni boshlang.
                                </p>

                                @role('SuperAdmin|Admin|Creator')
                                <a href="{{ route('admin.category.index') }}"
                                   class="btn btn-primary btn-sm rounded-pill shadow-sm">
                                    <i class="bx bx-category-alt me-1"></i> Kategoriyalar
                                </a>
                                @endrole

                                @role('SuperAdmin')
                                <a href="{{ route('admin.users.index') }}"
                                   class="btn btn-outline-secondary btn-sm rounded-pill shadow-sm ms-2">
                                    <i class="bx bx-user-circle me-1"></i> Foydalanuvchilar
                                </a>
                                @endrole
                            </div>

                            <div class="col-md-5 text-center">
                                <img src="{{ asset('assets/img/illustrations/man-with-laptop.png') }}"
                                     height="150" alt="Admin" />
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 📈 Statistik kartalar -->
                <div class="col-lg-4">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="card p-3 text-center">
                                <div class="avatar mb-2">
                                    <img src="{{ asset('assets/img/icons/unicons/chart-success.png') }}" width="48">
                                </div>
                                <p class="mb-1 text-muted">Postlar</p>
                                <h4>128</h4>
                                <small class="text-success">
                                    <i class="bx bx-up-arrow-alt"></i> +12.3%
                                </small>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card p-3 text-center">
                                <div class="avatar mb-2">
                                    <img src="{{ asset('assets/img/icons/unicons/wallet-info.png') }}" width="48">
                                </div>
                                <p class="mb-1 text-muted">Xodimlar</p>
                                <h4>64</h4>
                                <small class="text-success">
                                    <i class="bx bx-up-arrow-alt"></i> +8.5%
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar toggle JS -->
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const sidebarToggle = document.getElementById('sidebarToggle');
                const aside = document.querySelector('aside');
                sidebarToggle.addEventListener('click', () => {
                    aside.classList.toggle('active');
                });
            });
        </script>

    </div>

@endsection
