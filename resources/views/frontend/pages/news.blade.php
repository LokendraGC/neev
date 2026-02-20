@extends('frontend.layouts.app', ['payload' => $post, 'payloadMeta' => $metaData, 'title' => $post->post_title])

@section('main-section')
    @include('frontend.partials.breadcrumb-section')

    <section class="news-section section-padding">
        <div class="container">
            <div class="row g-4">
                <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".3s">
                    <div class="news-box-items mt-0">
                        <div class="thumb">
                            <img src="{{ asset('assets/img/home-1/news/news-01.jpg') }}" alt="img">
                            <img src="{{ asset('assets/img/home-1/news/news-01.jpg') }}" alt="img">
                        </div>
                        <div class="content">
                            <ul>

                                <li>
                                    <span>23 nov, 2025</span>
                                </li>
                            </ul>
                            <h3>
                                <a href="news-details.html">Innovative solution modern global businesses success.</a>
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
                <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".5s">
                    <div class="news-box-items mt-0">
                        <div class="thumb">
                            <img src="{{ asset('assets/img/home-1/news/news-02.jpg') }}" alt="img">
                            <img src="{{ asset('assets/img/home-1/news/news-02.jpg') }}" alt="img">
                        </div>
                        <div class="content">
                            <ul>

                                <li>
                                    <span>23 nov, 2025</span>
                                </li>
                            </ul>
                            <h3>
                                <a href="news-details.html">How building stronger client for relationships success.</a>
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
                <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".7s">
                    <div class="news-box-items mt-0">
                        <div class="thumb">
                            <img src="{{ asset('assets/img/home-1/news/news-03.jpg') }}" alt="img">
                            <img src="{{ asset('assets/img/home-1/news/news-03.jpg') }}" alt="img">
                        </div>
                        <div class="content">
                            <ul>

                                <li>
                                    <span>23 nov, 2025</span>
                                </li>
                            </ul>
                            <h3>
                                <a href="news-details.html">Tips for many successful project delivery management.</a>
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
                <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".7s">
                    <div class="news-box-items mt-0">
                        <div class="thumb">
                            <img src="{{ asset('assets/img/home-1/news/news-03.jpg') }}" alt="img">
                            <img src="{{ asset('assets/img/home-1/news/news-03.jpg') }}" alt="img">
                        </div>
                        <div class="content">
                            <ul>

                                <li>
                                    <span>23 nov, 2025</span>
                                </li>
                            </ul>
                            <h3>
                                <a href="news-details.html">Digital transformation trends in corporate environments</a>
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
                <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".5s">
                    <div class="news-box-items mt-0">
                        <div class="thumb">
                            <img src="{{ asset('assets/img/home-1/news/news-01.jpg') }}" alt="img">
                            <img src="{{ asset('assets/img/home-1/news/news-01.jpg') }}" alt="img">
                        </div>
                        <div class="content">
                            <ul>

                                <li>
                                    <span>23 nov, 2025</span>
                                </li>
                            </ul>
                            <h3>
                                <a href="news-details.html">How emotion and design together brand stories.</a>
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
                <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".3s">
                    <div class="news-box-items mt-0">
                        <div class="thumb">
                            <img src="{{ asset('assets/img/home-1/news/news-02.jpg') }}" alt="img">
                            <img src="{{ asset('assets/img/home-1/news/news-02.jpg') }}" alt="img">
                        </div>
                        <div class="content">
                            <ul>

                                <li>
                                    <span>23 nov, 2025</span>
                                </li>
                            </ul>
                            <h3>
                                <a href="news-details.html">How design thinking in modern brand for growth.</a>
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
            <div class="page-nav-wrap text-center">
                <ul>
                    <li><a class="page-numbers" href="#"><i class="fa-solid fa-arrow-up-left"></i></a></li>
                    <li class="active"><a class="page-numbers" href="#">01</a></li>
                    <li><a class="page-numbers" href="#">02</a></li>
                    <li><a class="page-numbers" href="#">03</a></li>
                    <li><a class="page-numbers" href="#"><i class="fa-solid fa-arrow-up-right"></i></a></li>
                </ul>
            </div>
        </div>
    </section>

    @include('frontend.partials.cta-section')
@endsection
