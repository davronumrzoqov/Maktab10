@extends('admin.site')
@section('content')
    <style>
        /* Umumiy stillar */
        .mainLeader {
            display: flex;
            align-items: center;
            gap: 20px;
            cursor: pointer; /* Rasm bosiladiganligini bildiradi */
        }
        .mainLeader .details h1 {
            font-size: 30px;
            margin-bottom: 15px;
        }
        .mainLeader .details span {
            display: inline-block;
            position: relative;
        }
        .mainLeader img {
            border-radius: 50%;
        }
        .deputy_director {
            margin-top: 50px;
        }

        /* Mobil uchun 412px va kichik ekranlar */
        @media (max-width: 412px) {
            .mainLeader {
                flex-direction: column;
                align-items: flex-start;
            }
            .mainLeader .details {
                padding: 20px 0;
            }
            .mainLeader .details h1 {
                font-size: 27px;
                padding-left: 0;
            }
            .mainLeader .details span {
                padding-left: 0;
            }
            .mainLeader img {
                margin-left: 0;
                margin-bottom: 10px;
            }
        }
        @media (max-width: 375px) {
            .mainLeader .details h1 {
                font-size: 25px;
            }
        }
    </style>

    <main>
        <section>
            <div class="mainContent withImage">
                <div class="imageHeader" style="padding-bottom: 0px;">
                    <div class="container">
                        <h1 class="pageTitle text-dark">{{ __('message.Rahbariyat batafsil') }}</h1>
                        <nav aria-label="breadcrumb">
                            <ol id="w5" class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('index') }}">{{ __('message.home') }}</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">{{ __('message.Rahbariyat batafsil') }}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>

            <!-- 👨‍💼 Direktor -->
            <div class="container py-4">
                <div class="mainLeader text-dark p-3 rounded-3 shadow-sm" data-bs-toggle="modal" data-bs-target="#directorModal">
                    <img src="{{ asset('image/director.png') }}" alt="Director" width="120" height="120">
                    <div class="details">
                        <h1>
                            <b>{{ __('message.director_lastname') }}</b><br>
                            {{ __('message.director_firstname') }}<br>
                            {{ __('message.director_middlename') }}
                        </h1>
                        <span>{{ __('message.director_position') }}</span>
                    </div>
                </div>
            </div>

            <hr class="sections__line">

            <!-- Modal -->
            <div class="modal fade" id="directorModal" tabindex="-1" aria-labelledby="directorModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="directorModalLabel">{{ __('message.director_lastname') }} {{ __('message.director_firstname') }} {{ __('message.director_middlename') }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <img src="{{ asset('image/director.png') }}" alt="Director" class="rounded-circle mb-3" width="150" height="150">
                            <p><b>Lavozimi:</b> {{ __('message.director_position') }}</p>
                            <p><b>Qo‘shimcha ma’lumot:</b> Bu yerga direktorga oid qo‘shimcha batafsil ma’lumot yozish mumkin.</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Yopish</button>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </main>

    <!-- Bootstrap JS (agar loyihada hali qo‘shilmagan bo‘lsa) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
@endsection
