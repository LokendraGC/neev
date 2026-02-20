@extends('frontend.layouts.app', ['payload' => $post, 'payloadMeta' => $metaData, 'title' => $post->post_title])

@section('main-section')
    @include('frontend.partials.breadcrumb-section')


    <section class="download-section section-padding">
        <div class="container">
            <div class="download-cards-row row g-4">
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay=".2s">
                    <div class="download-card">
                        <div class="download-card-image">
                            <img src="{{ asset('assets/img/home-1/project/hospitality.png') }}" alt="Neev Corporation Sustainability Report">
                        </div>
                        <h3 class="download-card-title">Neev Corporation Sustainability Report 2021-24</h3>
                        <a href="{{ asset('assets/pdf/sustainability-report-2024.pdf') }}" class="download-card-cta" download>
                            <span>Download Now</span>
                            <i class="fa-solid fa-download"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay=".3s">
                    <div class="download-card">
                        <div class="download-card-image">
                            <img src="{{ asset('assets/img/home-1/cta-newsletter.jpg') }}" alt="Neev Corporation Corporate Presentation">
                        </div>
                        <h3 class="download-card-title">Neev Corporation: Corporate Presentation</h3>
                        <a href="{{ asset('assets/pdf/corporate-presentation.pdf') }}" class="download-card-cta" download>
                            <span>Download Now</span>
                            <i class="fa-solid fa-download"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay=".4s">
                    <div class="download-card">
                        <div class="download-card-image">
                            <img src="{{ asset('assets/img/home-1/project/agro.png') }}" alt="Neev Corporation Annual Report">
                        </div>
                        <h3 class="download-card-title">Neev Corporation Annual Report 2024-25</h3>
                        <a href="{{ asset('assets/pdf/annual-report-2025.pdf') }}" class="download-card-cta" download>
                            <span>Download Now</span>
                            <i class="fa-solid fa-download"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay=".5s">
                    <div class="download-card">
                        <div class="download-card-image">
                            <img src="{{ asset('assets/img/home-1/project/solar.png') }}" alt="Neev Corporation Brochure">
                        </div>
                        <h3 class="download-card-title">Neev Corporation: Company Brochure</h3>
                        <a href="{{ asset('assets/pdf/company-brochure.pdf') }}" class="download-card-cta" download>
                            <span>Download Now</span>
                            <i class="fa-solid fa-download"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    @include('frontend.partials.cta-section')
@endsection
