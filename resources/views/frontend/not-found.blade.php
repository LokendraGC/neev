@extends('frontend.layouts.app', ['payload' => null, 'payloadMeta' => null, 'title' => 'Not Found'])

@section('main-section')
    <!-- Breadcrumb Section Start -->

    @php
        $common_banner = SettingHelper::get_field('banner_background_image');

        $media = MediaHelper::getImageById($common_banner);

        if (!empty($media) && !empty($media->file_name)) {
            $banner_url = asset('storage/' . $media->file_name);
        } else {
            $banner_url = asset('assets/img/home-1/project/bread-bg.png');
        }
    @endphp



    <div class="breadcrumb-wrapper bg-cover" style="background-image: url('{{ $banner_url }}');">
        <div class="hero-dark-overlay"></div>
        <div class="container">
            <div class="page-heading">
                <div class="breadcrumb-sub-title">
                    <h1 class="text-white wow fadeInUp" data-wow-delay=".3s">Not Found</h1>
                    <p>The page you are looking for does not exist.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="breadcrumb-new">
        <div class="container">
            <div class="page-heading">
                <ul class="breadcrumb-items wow fadeInUp" data-wow-delay=".5s">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li>/</li>
                    <li>Not Found</li>
                </ul>
            </div>
        </div>
    </div>


    <!-- Error Section Start -->
    <section class="error-section section-padding fix">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="error-items">
                        <div class="error-image wow fadeInUp" data-wow-delay=".3s">
                            <img src="{{ asset('assets/img/not_found.webp') }}" alt="img">
                        </div>
                        <div class="error-image2 d-none wow fadeInUp" data-wow-delay=".3s">
                            <img src="{{ asset('assets/img/inner-page/4042.png') }}" alt="img">
                        </div>
                        <h2 class="wow fadeInUp" data-wow-delay=".5s">
                            The page you are looking for does not exist.
                        </h2>
                        <p class="wow fadeInUp" data-wow-delay=".3s">
                            The page you are looking for does not exist.
                        </p>
                        <a class="gt-theme-btn-main style-5 mt-5" href="{{ url('/') }}">
                            <span class="gt-theme-btn">Back to Home</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
