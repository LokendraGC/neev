@extends('frontend.layouts.app', ['payload' => $cat, 'payloadMeta' => $catMeta, 'title' => $cat->name])

@section('main-section')
    <div class="breadcrumb-wrapper bg-cover"
        style="background-image: url('{{ asset('assets/img/home-1/project/bread-bg.png') }}');">
        <div class="hero-dark-overlay"></div>

        <div class="container">
            <div class="page-heading">
                <div class="breadcrumb-sub-title">
                    <h1 class="text-white wow fadeInUp" data-wow-delay=".3s">Business</h1>
                    <p>
                        Neev Corporation invests in sectors having high potentiality of growth and support
                        the local economy. Among several sectors, the Corporation have invested and evolve
                        in Hospitality & Tourism, Solar Energy and Agro- Industry.

                    </p>
                </div>

            </div>
        </div>
    </div>


    <div class="breadcrumb-new">
        <div class="container">
            <div class="page-heading">
                <ul class="breadcrumb-items wow fadeInUp" data-wow-delay=".5s">
                    <li>
                        <a href="index.html"> Home
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

    <nav class="sticky-tabs-wrapper">
        <div class="container">
            <ul class="tab-nav-list">
                <li><a href="#purpose" class="active">Description</a></li>
                <li><a href="#chairman">Companies</a></li>
                <li><a href="#stories">Stories</a></li>
                <li><a href="#other-businesses">Other Businesses</a></li>
            </ul>
        </div>
    </nav>

    <section id="purpose" class="award-section fix section-padding">
        <div class="container">
            <div class="award-wrapper detail">
                <h2 class="title text_invert-2">
                    Hospitality and Tourism
                </h2>
                <div class="row">
                    <div class="col-xl-3"></div>
                    <div class="col-xl-9">
                        <div class="section-title style-4">
                            <p>
                                Under the Hospitality and Tourism division, Neev Corporation has built a
                                solid operational foundation through its experience in hotel development and
                                management. This includes properties like Metro Hospitality and Metro Dubar
                                in Dang along with other areas in Nepal. These projects show the
                                Corporation’s ability to provide quality and cost-effective hospitality
                                services while maintaining local identity and service excellence. With its
                                existing hotels, Neev Corporation has helped boost domestic tourism,
                                generate jobs, and set consistent hospitality standards in regional markets.
                            </p>
                            <p>
                                Building on this success, the Corporation is working on establishing ten
                                high-quality business hotels in its first phase across all seven provinces
                                of Nepal. The Corporation aims to raise service standards by offering
                                world-class hospitality at an affordable price, making exceptional
                                experiences available to everyone. By making premium-quality services
                                accessible to local communities in every corner of the country, the
                                Corporation seeks to strengthen regional economies, promote inclusive
                                tourism development, and position Nepal as a competitive destination for
                                both domestic and international travelers.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Brand Section Start -->
    <div id="chairman" class="brand-section-2 section-padding mt-0 ">
        <div class="container">
            <div class="section-title style-3">
                <h2 class="text-anim text-white">
                    Companies
                </h2>
            </div>

            <div class="swiper brand-slider">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="news-box-items">
                            <div class="thumb">
                                <img src="{{ asset('assets/img/home-1/news/news-01.jpg') }}" alt="img">
                                <img src="{{ asset('assets/img/home-1/news/news-01.jpg') }}" alt="img">
                            </div>
                            <div class="content">
                                <h3>
                                    <a href="news-details.html">How building stronger client for
                                        relationships
                                        success.</a>
                                </h3>
                                <div class="news-bottom">
                                    <a href="news-details.html" class="link-btn">
                                        <span class="content-wrap">
                                            <span class="default-content">
                                                <i class="fa-solid fa-arrow-up-right"></i>
                                                <span>Read more</span>
                                            </span>
                                            <span class="hover-content">
                                                <i class="fa-solid fa-arrow-up-right"></i>
                                                <span>Read more</span>
                                            </span>
                                        </span>
                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="news-box-items">
                            <div class="thumb">
                                <img src="{{ asset('assets/img/home-1/news/news-01.jpg') }}" alt="img">
                                <img src="{{ asset('assets/img/home-1/news/news-01.jpg') }}" alt="img">
                            </div>
                            <div class="content">
                                <h3>
                                    <a href="news-details.html">How building stronger client for
                                        relationships
                                        success.</a>
                                </h3>
                                <div class="news-bottom">
                                    <a href="news-details.html" class="link-btn">
                                        <span class="content-wrap">
                                            <span class="default-content">
                                                <i class="fa-solid fa-arrow-up-right"></i>
                                                <span>Read more</span>
                                            </span>
                                            <span class="hover-content">
                                                <i class="fa-solid fa-arrow-up-right"></i>
                                                <span>Read more</span>
                                            </span>
                                        </span>
                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="news-box-items">
                            <div class="thumb">
                                <img src="{{ asset('assets/img/home-1/news/news-01.jpg') }}" alt="img">
                                <img src="{{ asset('assets/img/home-1/news/news-01.jpg') }}" alt="img">
                            </div>
                            <div class="content">
                                <h3>
                                    <a href="news-details.html">How building stronger client for
                                        relationships
                                        success.</a>
                                </h3>
                                <div class="news-bottom">
                                    <a href="news-details.html" class="link-btn">
                                        <span class="content-wrap">
                                            <span class="default-content">
                                                <i class="fa-solid fa-arrow-up-right"></i>
                                                <span>Read more</span>
                                            </span>
                                            <span class="hover-content">
                                                <i class="fa-solid fa-arrow-up-right"></i>
                                                <span>Read more</span>
                                            </span>
                                        </span>
                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="news-box-items">
                            <div class="thumb">
                                <img src="{{ asset('assets/img/home-1/news/news-01.jpg') }}" alt="img">
                                <img src="{{ asset('assets/img/home-1/news/news-01.jpg') }}" alt="img">
                            </div>
                            <div class="content">
                                <h3>
                                    <a href="news-details.html">How building stronger client for
                                        relationships
                                        success.</a>
                                </h3>
                                <div class="news-bottom">
                                    <a href="news-details.html" class="link-btn">
                                        <span class="content-wrap">
                                            <span class="default-content">
                                                <i class="fa-solid fa-arrow-up-right"></i>
                                                <span>Read more</span>
                                            </span>
                                            <span class="hover-content">
                                                <i class="fa-solid fa-arrow-up-right"></i>
                                                <span>Read more</span>
                                            </span>
                                        </span>
                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="news-box-items">
                            <div class="thumb">
                                <img src="{{ asset('assets/img/home-1/news/news-01.jpg') }}" alt="img">
                                <img src="{{ asset('assets/img/home-1/news/news-01.jpg') }}" alt="img">
                            </div>
                            <div class="content">
                                <h3>
                                    <a href="news-details.html">How building stronger client for
                                        relationships
                                        success.</a>
                                </h3>
                                <div class="news-bottom">
                                    <a href="news-details.html" class="link-btn">
                                        <span class="content-wrap">
                                            <span class="default-content">
                                                <i class="fa-solid fa-arrow-up-right"></i>
                                                <span>Read more</span>
                                            </span>
                                            <span class="hover-content">
                                                <i class="fa-solid fa-arrow-up-right"></i>
                                                <span>Read more</span>
                                            </span>
                                        </span>
                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="news-box-items">
                            <div class="thumb">
                                <img src="{{ asset('assets/img/home-1/news/news-01.jpg') }}" alt="img">
                                <img src="{{ asset('assets/img/home-1/news/news-01.jpg') }}" alt="img">
                            </div>
                            <div class="content">
                                <h3>
                                    <a href="news-details.html">How building stronger client for
                                        relationships
                                        success.</a>
                                </h3>
                                <div class="news-bottom">
                                    <a href="news-details.html" class="link-btn">
                                        <span class="content-wrap">
                                            <span class="default-content">
                                                <i class="fa-solid fa-arrow-up-right"></i>
                                                <span>Read more</span>
                                            </span>
                                            <span class="hover-content">
                                                <i class="fa-solid fa-arrow-up-right"></i>
                                                <span>Read more</span>
                                            </span>
                                        </span>
                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Testimonial Section Start -->
    <section class="testimonial-section-2 fix section-padding pb-0" id="stories">
        <div class="container">
            <div class="section-title-area">
                <div class="section-title style-2">

                    <h2 class="text-anim">
                        Stories
                    </h2>
                </div>
            </div>
        </div>
        <div class="swiper testimonial-slider-2">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="testimonial-box-items">

                        <div class="content">
                            <img src="{{ asset('assets/img/home-1/project/solar.png') }}">
                            <h3>
                                <a href="story-detail.html"> A Super Unveiling of Supa San: The neighbourhood Izakaya
                                    designed by Fanatics</a>
                            </h3>

                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="testimonial-box-items">

                        <div class="content">
                            <img src="{{ asset('assets/img/home-1/project/hospitality.png') }}">
                            <h3>
                                <a href="story-detail.html"> A Super Unveiling of Supa San: The neighbourhood Izakaya
                                    designed by Fanatics</a>
                            </h3>

                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="testimonial-box-items">

                        <div class="content">
                            <img src="{{ asset('assets/img/home-1/project/solar.png') }}">
                            <h3>
                                <a href="story-detail.html"> A Super Unveiling of Supa San: The neighbourhood Izakaya
                                    designed by Fanatics</a>
                            </h3>

                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-dot text-center mt-5">
                <div class="dot2"></div>
            </div>
        </div>
    </section>

    <!-- Other Businesses Section Start -->
    <section id="other-businesses" class="project-section fix section-padding">
        <div class="container">
            <div class="section-title style-3 mb-5">
                <h2 class="text-anim">
                    Other Businesses
                </h2>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".3s">
                    <div class="project-box-items-inner">
                        <div class="thumb">
                            <img src="{{ asset('assets/img/home-1/project/hospitality.png') }}"
                                alt="Hospitality & Tourism">
                            <img src="{{ asset('assets/img/home-1/project/hospitality.png') }}"
                                alt="Hospitality & Tourism">
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
                            <img src="{{ asset('assets/img/home-1/project/agro.png') }}" alt="Agro Industry">
                            <img src="{{ asset('assets/img/home-1/project/agro.png') }}" alt="Agro Industry">
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
                            <img src="{{ asset('assets/img/home-1/project/solar.png') }}" alt="Solar Energy">
                            <img src="{{ asset('assets/img/home-1/project/solar.png') }}" alt="Solar Energy">
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
