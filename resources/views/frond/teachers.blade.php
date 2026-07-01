@extends('admin.site')
@section('content')

    <style>
        /* Umumiy fon va joylashuv */
        body {
            background-color: #f5f7fb;
            font-family: 'Poppins', sans-serif;
        }

        .categoriesContainer {
            display: flex;
            flex-wrap: wrap;
            gap: 40px;
            padding: 40px;
            justify-content: center;
        }

        /* Har bir kategoriya (bo‘lim) kartasi */
        .categoryCard {
            background-color: #ffffff;
            border-radius: 20px;
            padding: 30px;
            flex: 1 1 100%;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.05);
            transition: 0.3s ease;
        }

        .categoryCard:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.08);
        }

        .categoryCard h1 {
            font-size: 28px;
            font-weight: 700;
            color: #1e40af;
            margin-bottom: 30px;
            text-align: center;
            border-bottom: 3px solid #007bff;
            display: inline-block;
            padding-bottom: 6px;
        }

        /* O‘qituvchilar grid */
        .teacherGrid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 30px;
            justify-items: center;
        }

        /* Har bir o‘qituvchi kartasi */
        .teacherCard {
            background: linear-gradient(145deg, #ffffff, #f0f3fa);
            border-radius: 18px;
            text-align: center;
            padding: 25px 20px;
            width: 100%;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease-in-out;
            position: relative;
            overflow: hidden;
        }

        .teacherCard:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.1);
        }

        /* Hoverda chiroyli gradient chizig‘i */
        .teacherCard::after {
            content: "";
            position: absolute;
            width: 100%;
            height: 5px;
            background: linear-gradient(90deg, #007BFF, #00C9A7);
            bottom: 0;
            left: 0;
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.3s ease;
        }

        .teacherCard:hover::after {
            transform: scaleX(1);
        }

        /* Surat */
        .photo {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            overflow: hidden;
            border: 4px solid #007bff;
            margin: 0 auto 15px;
            transition: transform 0.3s ease;
        }

        .teacherCard:hover .photo {
            transform: scale(1.1);
        }

        .photo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Ma’lumotlar */
        .description h2 {
            font-size: 20px;
            color: #1e293b;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .description p {
            margin: 5px 0;
            color: #475569;
            font-size: 15px;
        }

        .description a {
            color: #007BFF;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .description a:hover {
            color: #00C9A7;
        }

        /* Kirish animatsiyasi */
        .teacherCard {
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInUp 0.6s ease forwards;
        }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>

    <div class="mainContent withImage">
        <div class="imageHeader" style="padding-bottom: 0px;">
            <div class="container">
                <h1 class="pageTitle text-dark">{{ __('message.O`qituvchilar') }}</h1>
                <nav aria-label="breadcrumb">
                    <ol id="w5" class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('index') }}">{{ __('message.home') }}</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('message.O`qituvchilar') }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <main>
        <section>
            <div class="categoriesContainer">

                @foreach($teachers as $categoryName => $teachersGroup)
                    <div class="categoryCard">
                        <h1>{{ $categoryName }}</h1>

                        <div class="teacherGrid">
                            @foreach($teachersGroup as $teacher)
                                <div class="teacherCard">
                                    <div class="photo">
                                        <img alt="image" src="{{ asset('admin/images/' . $teacher->image) }}">
                                    </div>
                                    <div class="description">
                                        <h2>{{ $teacher['name_'.\App::getLocale()] }}</h2>
                                        <p>Lavozimi: {{ $teacher->position['name_'.\App::getLocale()] ?? 'Belgilanmagan' }}</p>
                                        <p>Telefon: <a href="tel:{{ $teacher->phone }}">{{ $teacher->phone }}</a></p>
                                        <p>Email: <a href="mailto:{{ $teacher->email }}">{{ $teacher->email }}</a></p>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>
                @endforeach

            </div>
        </section>
    </main>

@endsection
