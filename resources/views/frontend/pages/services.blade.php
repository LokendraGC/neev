@extends('frontend.layouts.app', ['payload' => $post, 'payloadMeta' => $metaData, 'title' => $post->post_title])

@section('main-section')
   

    @include('frontend.partials.breadcrumb-section')

    
    <div class="breadcrumb-new">
        <div class="container">
            <div class="page-heading">
                <ul class="breadcrumb-items wow fadeInUp" data-wow-delay=".5s">
                    <li>
                        <a href="{{ url('/') }}"> Home
                        </a>
                    </li>
                    <li>
                        /
                    </li>
                    <li>
                        Business
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <section class="project-section fix section-padding">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".3s">
                    <div class="project-box-items-inner">
                        <div class="thumb">
                            <img src="{{ asset('assets/img/home-1/project/hospitality.png') }}" alt="img">
                            <img src="{{ asset('assets/img/home-1/project/hospitality.png') }}" alt="img">
                        </div>
                        <div class="project-content-area">
                            <div class="content">
                                <h3><a href="service-detail.html">Hospitality & Tourism</a></h3>
                            </div>
                            <a href="service-detail.html" class="circle-check"><i
                                    class="fa-solid fa-arrow-up-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".5s">
                    <div class="project-box-items-inner">
                        <div class="thumb">
                            <img src="{{ asset('assets/img/home-1/project/agro.png') }}" alt="img">
                            <img src="{{ asset('assets/img/home-1/project/agro.png') }}" alt="img">
                        </div>
                        <div class="project-content-area">
                            <div class="content">
                                <h3><a href="service-detail.html">Agro Industry</a></h3>
                            </div>
                            <a href="service-detail.html" class="circle-check"><i
                                    class="fa-solid fa-arrow-up-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".3s">
                    <div class="project-box-items-inner">
                        <div class="thumb">
                            <img src="{{ asset('assets/img/home-1/project/solar.png') }}" alt="img">
                            <img src="{{ asset('assets/img/home-1/project/solar.png') }}" alt="img">
                        </div>
                        <div class="project-content-area">
                            <div class="content">
                                <h3><a href="service-detail.html">Solar Energy</a></h3>
                            </div>
                            <a href="service-detail.html" class="circle-check"><i
                                    class="fa-solid fa-arrow-up-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    @include('frontend.partials.cta-section')
@endsection
