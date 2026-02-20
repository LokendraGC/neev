@extends('frontend.layouts.app', ['payload' => $post, 'payloadMeta' => $postMeta, 'title' => $post->post_title])

@section('main-section')
   

            <!-- Hero Section Start -->
            <section class="hero-wrapper">
                <div class="swiper main-image-slider">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide" style="background-image: url('{{ asset('assets/img/home-1/hero/hero-2.jpg') }}');"></div>
                        <div class="swiper-slide" style="background-image: url('{{ asset('assets/img/home-1/hero/hero-3.jpg') }}');"></div>
                        <div class="swiper-slide" style="background-image: url('{{ asset('assets/img/home-1/hero/hero-4.jpg') }}');"></div>
                    </div>
                </div>
                <div class="hero-dark-overlay"></div>
                <div class="hero-overlay-content">
                    <div class="container">
                        <div class="combined-headline">
                            <p class="static-text">NEEV CORPORATION |</p>

                            <div class="swiper vertical-text-slider">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide"><span>Hospitality</span></div>
                                    <div class="swiper-slide"><span>Solar Energy</span></div>
                                    <div class="swiper-slide"><span>Agro Industry</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="about-inner-section fix section-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="section-title">

                                <img src="{{ asset('assets/img/home-1/project/hospitality.png') }}" alt="img">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="about-content">
                                <div class="section-title">
                                    <h6 class="sub-title wow fadeInUp">
                                        About company
                                    </h6>
                                    <h1 class="text-anim">
                                        Investing wisely, growing sustainably.
                                    </h1>
                                </div>
                                <p>
                                    Neev Corporation is a leading investment company in Nepal that drives sustainable
                                    progress
                                    rooted in the nation’s strengths, turning local potential into meaningful, lasting
                                    impact. Guided
                                    by expertise, innovation, and a commitment to responsible growth, the Corporation
                                    creates
                                    value that empowers communities and strengthens the country.
                                </p>
                                <a class="gt-theme-btn-main style-5 mt-5" href="about.html">

                                    <span class="gt-theme-btn">Explore more</span>

                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="section-title-area ">


                        <div class="about-counter-wrapper">
                            <div class="row g-4">
                                <div class="col-xl-6 col-md-6 wow fadeInUp" data-wow-delay=".3s">
                                    <div class="about-counter-item">

                                        <h2>
                                            <span>Our Vision</span>
                                        </h2>
                                        <p>
                                            To transform Nepal through sustainable, innovative businesses that deliver
                                            world-class experiences, empower local communities, and drive long-term
                                            prosperity
                                        </p>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-md-6 wow fadeInUp" data-wow-delay=".5s">
                                    <div class="about-counter-item">

                                        <h2>
                                            <span>Our mission</span>
                                        </h2>
                                        <p>
                                            To create and operate sustainable, innovative businesses that provide
                                            exceptional experiences, support and uplift local communities, and foster
                                            economic growth throughout Nepal.
                                        </p>
                                    </div>
                                </div>

                            </div>
                        </div>
            </section>



            <!-- Project Section Start -->
            <section class="project-section-3 fix tp-panel-pin-area section-padding section-bg approach-area">
                <div class="line-shape">
                    <img src="{{ asset('assets/img/home-3/project/line-shape.png') }}" alt="img">
                </div>
                <div class="container">
                    <div class="project-wrapper-3">
                        <div class="row g-4">
                            <div class="col-lg-5">
                                <div class="section-title style-3 mb-0 tp-panel-pin">
                                    <h6 class="sub-title bg-white wow fadeInUp">
                                        EXPLORE OUR
                                    </h6>
                                    <h2 class="text-anim">
                                        Business

                                    </h2>
                                    <p class="wow fadeInUp" data-wow-delay=".3s">
                                        Through these diverse investment areas, Neev Corporation strives to drive
                                        economic growth while contributing positively to society and the
                                        environment.

                                    </p>
                                    <a class="gt-theme-btn-main style-5" href="about.html">

                                        <span class="gt-theme-btn">Explore more</span>

                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <ul class="project-box-items-3 approach-wrapper-box fix">
                                    <li class="approach-box">
                                        <div class="thumb">
                                            <img src="{{ asset('assets/img/home-1/project/hospitality.png') }}" alt="img">
                                            <img src="{{ asset('assets/img/home-1/project/hospitality.png') }}" alt="img">
                                        </div>
                                        <div class="content">
                                            <h3>
                                                <a href="project-details.html">HOSPITALITY</a>
                                            </h3>
                                            <p> Exceptional experiences, locally rooted, globally inspired.</p>
                                        </div>
                                    </li>
                                    <li class="approach-box">
                                        <div class="thumb">
                                            <img src="{{ asset('assets/img/home-1/project/solar.png') }}" alt="img">
                                            <img src="{{ asset('assets/img/home-1/project/solar.png') }}" alt="img">
                                        </div>
                                        <div class="content">
                                            <h3>
                                                <a href="project-details.html">SOLAR ENERGY</a>
                                            </h3>
                                            <p>Sustainable energy today for a stronger tomorrow. </p>
                                        </div>
                                    </li>
                                    <li class="approach-box">
                                        <div class="thumb">
                                            <img src="{{ asset('assets/img/home-1/project/agro.png') }}" alt="img">
                                            <img src="{{ asset('assets/img/home-1/project/agro.png') }}" alt="img">
                                        </div>
                                        <div class="content">
                                            <h3>
                                                <a href="project-details.html">AGRO INDUSTRY
                                                </a>
                                            </h3>
                                            <p>Modernizing agriculture to deliver safe, sustainable food for Nepal.</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


            <!-- Global Section Start -->
            <section class="project-section-2 tp-team-area  section-padding bg-cover">
                <div class="container">
                    <div class="section-title-area">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="section-title style-2">
                                    <h2 class="text-anim">
                                        Media
                                    </h2>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <p class="wow fadeInUp mr-15" data-wow-delay=".3s">
                                    Stay connected with Neev Corporation through our press releases, media reports, stories,
                                    events, and resources. Discover the pulse of Neev Corporation with real-time press
                                    releases, media coverage, exclusive stories, events, and downloadable files at your
                                    fingertips.
                                </p>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper project-slider">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="project-image-items-2 tp-team-item tp-hover-btn-wrapper marque">
                                <img src="{{ asset('assets/img/home-1/news/news-01.jpg') }}" alt="img">
                                <img src="{{ asset('assets/img/home-1/news/news-01.jpg') }}" alt="img">
                                <div class="project-gradient"></div>
                                <a href="project-details.html" class="arrow-icon">
                                    <i class="fa-solid fa-arrow-up-right"></i>
                                </a>
                                <h3 class="project-title">
                                    <a href="project-details.html">
                                        Strategic Business <br> Planning
                                    </a>
                                </h3>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="project-image-items-2 tp-team-item tp-hover-btn-wrapper marque">
                                <img src="{{ asset('assets/img/home-1/news/news-02.jpg') }}" alt="img">
                                <img src="{{ asset('assets/img/home-1/news/news-02.jpg') }}" alt="img">
                                <div class="project-gradient"></div>
                                <a href="project-details.html" class="arrow-icon">
                                    <i class="fa-solid fa-arrow-up-right"></i>
                                </a>
                                <h3 class="project-title">
                                    <a href="project-details.html">
                                        Digital transformation <br> success.
                                    </a>
                                </h3>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="project-image-items-2 tp-team-item tp-hover-btn-wrapper marque">
                                <img src="{{ asset('assets/img/home-1/news/news-03.jpg') }}" alt="img">
                                <img src="{{ asset('assets/img/home-1/news/news-03.jpg') }}" alt="img">
                                <div class="project-gradient"></div>
                                <a href="project-details.html" class="arrow-icon">
                                    <i class="fa-solid fa-arrow-up-right"></i>
                                </a>
                                <h3 class="project-title">
                                    <a href="project-details.html">
                                        Customer acquisition <br> boosting.
                                    </a>
                                </h3>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="project-image-items-2 tp-team-item tp-hover-btn-wrapper marque">
                                <img src="{{ asset('assets/img/home-1/news/news-01.jpg') }}" alt="img">
                                <img src="{{ asset('assets/img/home-1/news/news-01.jpg') }}" alt="img">
                                <div class="project-gradient"></div>
                                <a href="project-details.html" class="arrow-icon">
                                    <i class="fa-solid fa-arrow-up-right"></i>
                                </a>
                                <h3 class="project-title">
                                    <a href="project-details.html">
                                        Operational efficiency <br> improvement.
                                    </a>
                                </h3>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="project-image-items-2 tp-team-item tp-hover-btn-wrapper marque">
                                <img src="{{ asset('assets/img/home-1/news/news-02.jpg') }}" alt="img">
                                <img src="{{ asset('assets/img/home-1/news/news-02.jpg') }}" alt="img">
                                <div class="project-gradient"></div>
                                <a href="project-details.html" class="arrow-icon">
                                    <i class="fa-solid fa-arrow-up-right"></i>
                                </a>
                                <h3 class="project-title">
                                    <a href="project-details.html">
                                        Strategic Business <br> Planning
                                    </a>
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-dot text-center mt-5">
                        <div class="dot"></div>
                    </div>
                </div>
            </section>



        @include('frontend.partials.cta-section')

@endsection
