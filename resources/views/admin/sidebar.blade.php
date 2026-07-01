<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>

    <!-- Bootstrap va Boxicons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">

    <style>
        body {
            font-family: "Public Sans", sans-serif;
            background-color: #f0f2f5;
            margin: 0;
        }

        /* ================= SIDEBAR ================= */
        .sidebar {
            width: 250px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background: linear-gradient(180deg, #4e73df, #224abe);
            color: #fff;
            overflow-y: auto;
            transition: all 0.3s ease;
            z-index: 100;
            box-shadow: 2px 0 12px rgba(0,0,0,0.1);
        }

        .sidebar.collapsed { width: 80px; }

        .sidebar .logo {
            padding: 1rem;
            text-align: center;
            border-bottom: 1px solid rgba(255,255,255,0.2);
        }

        .sidebar .logo img {
            height: 50px;
            transition: all 0.3s ease;
        }

        /* Nav links */
        .sidebar .nav-link {
            display: flex;
            align-items: center;
            padding: 12px 20px;
            margin: 5px 10px;
            border-radius: 8px;
            color: #e2e8f0;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .sidebar .nav-link i {
            font-size: 20px;
            min-width: 25px;
            text-align: center;
            margin-right: 12px;
            color: #f8f9fa;
            transition: 0.3s;
        }

        .sidebar .nav-link:hover {
            background: linear-gradient(90deg, rgba(255,255,255,0.1), rgba(255,255,255,0.15));
            color: #ffd700;
            text-shadow: 0 0 3px #ffd700;
            transform: translateX(5px) scale(1.02);
        }

        .sidebar .nav-link.active {
            background-color: #ffd700;
            color: #1a1a1a;
            font-weight: 600;
            box-shadow: 0 0 12px #ffd700, 0 0 20px rgba(255, 215, 0, 0.5);
            transform: scale(1.03);
        }

        .sidebar.collapsed .nav-link span { display: none; }

        .sidebar .text-muted {
            color: rgba(255,255,255,0.6);
            margin-left: 10px;
        }

        /* Scrollbar customization */
        .sidebar {
            scroll-behavior: smooth;
        }
        .sidebar::-webkit-scrollbar {
            width: 6px;
        }
        .sidebar::-webkit-scrollbar-thumb {
            background-color: rgba(255, 255, 255, 0.25);
            border-radius: 3px;
            transition: all 0.3s ease;
        }
        .sidebar::-webkit-scrollbar-thumb:hover {
            background-color: rgba(255, 255, 255, 0.5);
        }

        /* ================= MAIN CONTENT ================= */
        .main-content {
            margin-left: 250px;
            padding: 25px;
            transition: all 0.3s ease;
            background-color: #f0f2f5;
            min-height: 100vh;
        }

        .collapsed ~ .main-content { margin-left: 80px; }

        /* ================= TOGGLE BUTTON ================= */
        .toggle-btn {
            position: fixed;
            top: 15px;
            left: 260px;
            width: 40px;
            height: 40px;
            background-color: #ffd700;
            color: #224abe;
            border: none;
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.2);
            z-index: 1000;
            transition: all 0.3s ease;
        }

        .toggle-btn:hover {
            background-color: #ffec70;
            transform: scale(1.1);
        }

        .collapsed + .toggle-btn { left: 90px; }

        /* ================= RESPONSIVE ================= */
        @media (max-width: 992px) {
            .sidebar { left: -250px; }
            .sidebar.show { left: 0; }
            .main-content { margin-left: 0; }
            .toggle-btn { left: 15px; }
        }
        .logo {
            padding: 1rem;
            text-align: center;
            border-bottom: 1px solid rgba(255,255,255,0.2);
            transition: all 0.3s ease;
        }

        .logo a {
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-weight: 600;
            font-size: 1.1rem;
            transition: all 0.3s ease;
        }

        .logo a:hover .logo-text {
            color: #ffd700;
            text-shadow: 0 0 5px #ffd700;
        }

        .logo-img {
            height: 40px;
            width: 40px;
            object-fit: contain;
            margin-right: 10px;
            transition: transform 0.3s ease;
        }

        .logo a:hover .logo-img {
            transform: scale(1.1) rotate(-5deg);
        }

        .logo-text {
            transition: all 0.3s ease;
            white-space: nowrap;
        }

        @media (max-width: 768px) {
            .logo {
                padding: 0.8rem;
            }
            .logo-text {
                font-size: 0.95rem;
            }
            .logo-img {
                height: 35px;
                width: 35px;
                margin-right: 8px;
            }
        }
    </style>
</head>
<body>

<!-- Sidebar -->
<aside class="sidebar" id="sidebar">
    <div class="logo d-flex align-items-center justify-content-center gap-2">
        <a href="{{ route('index') }}" class="d-flex align-items-center text-decoration-none">
            <img src="{{ asset('image/gerb.png') }}" alt="Logo" class="logo-img">
            <span class="logo-text">10-Maktab</span>
        </a>
    </div>
    <!-- Toggle Button -->
    <button class="toggle-btn" id="toggleBtn"><i class="bx bx-menu"></i></button>

    <ul class="nav flex-column py-3">
        <!-- Dashboard -->
        <li>
            <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="bx bx-home"></i><span>Bosh sahifa</span>
            </a>
        </li>

        <!-- SuperAdmin bo‘limlar -->
        @hasanyrole('Super Admin')
        <li><a href="{{ route('admin.roles.index') }}" class="nav-link {{ request()->routeIs('admin.roles.*') ? 'active' : '' }}"><i class="bx bx-lock"></i><span>Rollar</span></a></li>
        <li><a href="{{ route('admin.users.index') }}" class="nav-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}"><i class="bx bx-group"></i><span>Foydalanuvchilar</span></a></li>
        <li><a href="{{ route('admin.category.index') }}" class="nav-link {{ request()->routeIs('admin.category.*') ? 'active' : '' }}"><i class="bx bx-category"></i><span>Kategoriya</span></a></li>
        <li><a href="{{ route('admin.categorychildren.index') }}" class="nav-link {{ request()->routeIs('admin.categorychildren.*') ? 'active' : '' }}"><i class="bx bx-folder-open"></i><span>Kategoriya Farzandlari</span></a></li>
        <li><a href="{{ route('admin.CategoryTop.index') }}" class="nav-link {{ request()->routeIs('admin.CategoryTop.*') ? 'active' : '' }}"><i class="bx bx-layer"></i><span>Kategoriya Tepasi</span></a></li>
        <li><a href="{{ route('admin.empCategory.index') }}" class="nav-link {{ request()->routeIs('admin.empCategory.*') ? 'active' : '' }}"><i class="bx bx-user-pin"></i><span>Xodim Kategoriyasi</span></a></li>
        <li><a href="{{ route('admin.employee.index') }}" class="nav-link {{ request()->routeIs('admin.employee.*') ? 'active' : '' }}"><i class="bx bx-user"></i><span>Xodimlar</span></a></li>
        <li><a href="{{ route('admin.gallery.index') }}" class="nav-link {{ request()->routeIs('admin.gallery.*') ? 'active' : '' }}"><i class="bx bx-images"></i><span>Galereya</span></a></li>
        <li><a href="{{ route('admin.HomePageImageTag.index') }}" class="nav-link {{ request()->routeIs('admin.HomePageImageTag.*') ? 'active' : '' }}"><i class="bx bx-photo-album"></i><span>Bosh sahifa direktor ismi</span></a></li>
        <li><a href="{{ route('admin.infografika.index') }}" class="nav-link {{ request()->routeIs('admin.infografika.*') ? 'active' : '' }}"><i class="bx bx-bar-chart"></i><span>Infografika</span></a></li>
        <li><a href="{{ route('admin.lesson.index') }}" class="nav-link {{ request()->routeIs('admin.lesson.*') ? 'active' : '' }}"><i class="bx bx-book"></i><span>Darslar</span></a></li>
        <li><a href="{{ route('admin.position.index') }}" class="nav-link {{ request()->routeIs('admin.position.*') ? 'active' : '' }}"><i class="bx bx-id-card"></i><span>Lavozimlar</span></a></li>
        <li><a href="{{ route('admin.posts.index') }}" class="nav-link {{ request()->routeIs('admin.posts.*') ? 'active' : '' }}"><i class="bx bx-news"></i><span>Postlar</span></a></li>
        <li><a href="{{ route('admin.schudeli.index') }}" class="nav-link {{ request()->routeIs('admin.schudeli.*') ? 'active' : '' }}"><i class="bx bx-time"></i><span>Dars Jadvali</span></a></li>
        <li><a href="{{ route('admin.smenatype.index') }}" class="nav-link {{ request()->routeIs('admin.smenatype.*') ? 'active' : '' }}"><i class="bx bx-repeat"></i><span>Smena Turlari</span></a></li>
        <li><a href="{{ route('admin.statictik.index') }}" class="nav-link {{ request()->routeIs('admin.statictik.*') ? 'active' : '' }}"><i class="bx bx-line-chart"></i><span>Statistika</span></a></li>
        <li><a href="{{ route('admin.usefulResource.index') }}" class="nav-link {{ request()->routeIs('admin.usefulResource.*') ? 'active' : '' }}"><i class="bx bx-link"></i><span>Foydali Resurslar</span></a></li>
        @endhasanyrole

        <!-- Admin -->
        @role('Admin')
        <li><a href="{{ route('admin.CategoryTop.index') }}" class="nav-link {{ request()->routeIs('admin.CategoryTop.*') ? 'active' : '' }}"><i class="bx bx-layer"></i><span>Kategoriya Tepasi</span></a></li>
        <li><a href="{{ route('admin.posts.index') }}" class="nav-link {{ request()->routeIs('admin.posts.*') ? 'active' : '' }}"><i class="bx bx-news"></i><span>Postlar</span></a></li>
        <li><a href="{{ route('admin.gallery.index') }}" class="nav-link {{ request()->routeIs('admin.gallery.*') ? 'active' : '' }}"><i class="bx bx-images"></i><span>Galereya</span></a></li>
        <li><a href="{{ route('admin.statictik.index') }}" class="nav-link {{ request()->routeIs('admin.statictik.*') ? 'active' : '' }}"><i class="bx bx-line-chart"></i><span>Statistika</span></a></li>
        <li><a href="{{ route('admin.usefulResource.index') }}" class="nav-link {{ request()->routeIs('admin.usefulResource.*') ? 'active' : '' }}"><i class="bx bx-link"></i><span>Foydali Resurslar</span></a></li>
        @endrole

        <!-- Creator -->
        @role('Creator')
        <li><a href="{{ route('admin.posts.index') }}" class="nav-link {{ request()->routeIs('admin.posts.*') ? 'active' : '' }}"><i class="bx bx-news"></i><span>Postlar</span></a></li>
        <li><a href="{{ route('admin.statictik.index') }}" class="nav-link {{ request()->routeIs('admin.statictik.*') ? 'active' : '' }}"><i class="bx bx-line-chart"></i><span>Statistika</span></a></li>
        @endrole
    </ul>
</aside>


<script>
    const sidebar = document.getElementById('sidebar');
    const toggleBtn = document.getElementById('toggleBtn');

    toggleBtn.addEventListener('click', () => {
        if (window.innerWidth <= 992) {
            sidebar.classList.toggle('show');
        } else {
            sidebar.classList.toggle('collapsed');
            document.querySelector('.main-content')?.classList.toggle('collapsed');
        }
    });
</script>

</body>
</html>
