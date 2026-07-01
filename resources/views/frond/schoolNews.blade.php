@extends('admin.site')
@section('content')

    <!-- Image Header Start-->
    <div class="mainContent withImage">
        <div class="imageHeader" style="padding-bottom: 0px;">
            <div class="container">
                <h1 class="pageTitle text-dark">{{ __('message.Yangiliklar') }}</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('index') }}">{{ __('message.home') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('message.Yangiliklar') }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- Image Header End -->

    <!-- Main section Start -->
    <main>
        <section>
            <div class="schoolNews">
                <div class="container">

                    <!-- Tabs -->
                    <div class="navigationTabs mb-4">
                        <a href="#" class="tab-link active" data-tab="tab1">
                            <i class="fas fa-newspaper"></i> {{ __('message.Yangiliklar') }}
                        </a>
                        <a href="#" class="tab-link" data-tab="tab2">
                            <i class="fas fa-bullhorn"></i> {{ __("message.E'lonlar") }}
                        </a>
                    </div>

                    <!-- Tab Content -->
                    <div class="tab-content">

                        <!-- 📰 Yangiliklar -->
                        <div class="tab-pane active" id="tab1">
                            <div class="row">
                                @forelse($news as $post)
                                    <div class="col-lg-4 col-md-6 mb-4">
                                        <div class="imageBox p-2 rounded shadow-sm cursor-pointer"
                                             data-bs-toggle="modal"
                                             data-bs-target="#postModal"
                                             data-title="{{ $post->{'title_'. app()->getLocale()} }}"
                                             data-body="{{ $post->{'body_'. app()->getLocale()} }}"
                                             data-date="{{ $post->created_at->format('d M Y') }}"
                                             data-image="{{ asset('storage/' . $post->image) }}">
                                            <img src="{{ asset('storage/' . $post->image) }}" class="w-100 rounded" alt="image">
                                            <h5 class="mt-2">{{ $post->{'title_'. app()->getLocale()} }}</h5>
                                            <span>{{ $post->created_at->format('d M Y') }}</span>
                                        </div>
                                    </div>
                                @empty
                                    <p>{{ __('message.Yangiliklar mavjud emas.') }}</p>
                                @endforelse
                            </div>
                        </div>

                        <!-- 📢 E’lonlar -->
                        <div class="tab-pane" id="tab2">
                            <div class="row">
                                @forelse($announcements as $post)
                                    <div class="col-lg-4 col-md-6 mb-4">
                                        <div class="imageBox p-2 rounded shadow-sm cursor-pointer"
                                             data-bs-toggle="modal"
                                             data-bs-target="#postModal"
                                             data-title="{{ $post->{'title_'. app()->getLocale()} }}"
                                             data-body="{{ $post->{'body_'. app()->getLocale()} }}"
                                             data-date="{{ $post->created_at->format('d M Y') }}"
                                             data-image="{{ asset('storage/' . $post->image) }}">
                                            <img src="{{ asset('storage/' . $post->image) }}" class="w-100 rounded" alt="image">
                                            <h5 class="mt-2">{{ $post->{'title_'. app()->getLocale()} }}</h5>
                                            <span>{{ $post->created_at->format('d M Y') }}</span>
                                        </div>
                                    </div>
                                @empty
                                    <p>{{ __("message.E'lonlar mavjud emas.") }}</p>
                                @endforelse
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </main>
    <!-- Main section End -->

    <!-- Modal -->
    <div class="modal fade" id="postModal" tabindex="-1" aria-labelledby="postModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="postModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img id="postModalImage" src="" class="img-fluid mb-3 rounded" alt="image">
                    <p id="postModalBody"></p>
                    <span id="postModalDate" class="text-muted"></span>
                </div>
            </div>
        </div>
    </div>

    <!-- JS for Tabs and Modal -->
    <script>
        // Tabs toggle
        document.querySelectorAll('.tab-link').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                document.querySelectorAll('.tab-link').forEach(el => el.classList.remove('active'));
                document.querySelectorAll('.tab-pane').forEach(el => el.classList.remove('active'));
                this.classList.add('active');
                document.getElementById(this.dataset.tab).classList.add('active');
            });
        });

        // Modal data populate
        var postModal = document.getElementById('postModal');
        postModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            document.getElementById('postModalLabel').textContent = button.getAttribute('data-title');
            document.getElementById('postModalBody').textContent = button.getAttribute('data-body');
            document.getElementById('postModalDate').textContent = button.getAttribute('data-date');
            document.getElementById('postModalImage').src = button.getAttribute('data-image');
        });
    </script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

@endsection
