@extends('frontend.layouts.app', ['payload' => $post, 'payloadMeta' => $postMeta, 'title' => $post->post_title])

@section('main-section')
    <div class="breadcrumb-wrapper bg-cover" style="background-image: url('{{ asset('assets/img/home-1/project/bread-bg.png') }}');">
        <div class="hero-dark-overlay"></div>

        <div class="container">
            <div class="page-heading">
                <div class="breadcrumb-sub-title">
                    <h1 class="text-white wow fadeInUp" data-wow-delay=".3s">News</h1>
                    <p>
                        Neev Corporation invests in sectors having high potentiality of growth and support the local
                        economy. Among several sectors, the Corporation have invested and evolve in Hospitality & Tourism,
                        Solar Energy and Agro- Industry.

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
                        News
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <section class="news-standard-section section-padding">
        <div class="container">
            <div class="news-details-area">
                <div class="row g-4">
                    <div class="col-12 col-lg-8">
                        <div class="blog-post-details">
                            <div class="single-blog-post">

                                <div class="post-content">

                                    <h3>Unlocking Business Growth with Innovative Solutions</h3>
                                    <ul class="post-list d-flex align-items-center">

                                        <li>
                                            <i class="fa-solid fa-calendar-days"></i>
                                            18 Dec, 2025
                                        </li>

                                    </ul>
                                    <div class="post-featured-thumb fix mb-5">
                                        <img data-speed=".8" src="assets/img/news-01.jpg" alt="">
                                    </div>
                                    <p>
                                        Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore
                                        of magna aliqua. Ut enim ad minim veniam, made of owl the quis nostrud exercitation
                                        ullamco laboris nisi ut aliquip ex ea dolor commodo consequat. Duis aute irure and
                                        dolor in reprehenderit.
                                    </p>
                                    <p>
                                        The is ipsum dolor sit amet consectetur adipiscing elit. Fusce eleifend porta arcu
                                        In hac habitasse the is platea augue thelorem turpoi dictumst. In lacus libero
                                        faucibus at malesuada sagittis placerat eros sed istincidunt augue ac ante rutrum
                                        sed the is sodales augue consequat.
                                    </p>
                                    <p>
                                        Nulla facilisi. Vestibulum tristique sem in eros eleifend imperdiet. Donec quis
                                        convallis neque. In id lacus pulvinar lacus, eget vulputate lectus. Ut viverra
                                        bibendum lorem, at tempus nibh mattis in. Sed a massa eget lacus consequat auctor.
                                    </p>
                                    <div class="hilight-text mt-4 mb-4">
                                        <p>Pellentesque sollicitudin congue dolor non aliquam. Morbi volutpat, nisi vel
                                            ultricies urnacondimentum, sapien neque
                                            lobortis tortor, quis efficitur mi ipsum eu metus. Praesent eleifend orci sit
                                            amet
                                            est vehicula.</p>
                                        <svg width="36" height="36" viewBox="0 0 36 36" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M0 20.3698H7.71428L2.57139 30.5546H10.2857L15.4286 20.3698V5.09247H0V20.3698Z"
                                                fill="#3C72FC"></path>
                                            <path
                                                d="M20.5703 5.09247V20.3698H28.2846L23.1417 30.5546H30.856L35.9989 20.3698V5.09247H20.5703Z"
                                                fill="#3C72FC"></path>
                                        </svg>
                                    </div>
                                    <p>
                                        Lorem ipsum dolor sit amet consectetur adipiscing elit Ut et massa mi. Aliquam in
                                        hendrerit urna. Pellentesque sit amet sapien fringilla, mattis ligula consectetur,
                                        ultrices mauris. Maecenas vitae mattis tellus. Nullam quis imperdiet augue.
                                        Vestibulum auctor ornare leo, non suscipit magna interdum eu. Curabitur pellentesque
                                        nibh nibh, at maximus ante fermentum sit amet. Pellentesque commodo lacus at sodales
                                        sodales. Quisque sagittis orci ut diam condimentum, vel euismod erat placerat. In
                                        iaculis arcu eros.
                                    </p>


                                    <p>
                                        Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore
                                        of magna aliqua. Ut enim ad minim veniam, made of owl the quis nostrud exercitation
                                        ullamco laboris nisi ut aliquip ex ea dolor commodo consequat. Duis aute irure and
                                        dolor in reprehenderit.Consectetur adipisicing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore of magna aliqua. Ut enim ad minim veniam, made of owl
                                        the quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea dolor commodo
                                        consequat. Duis aute irure and dolor in reprehenderit.
                                    </p>
                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="col-lg-4 col-12">
                        <div class="gt-main-sideber sticky-style">


                            <div class="gt-single-sideber-widget">
                                <div class="gt-widget-title">
                                    <h3>Recent Post</h3>
                                </div>
                                <div class="gt-recent-post-area">
                                    <div class="gt-recent-items">
                                        <div class="gt-recent-thumb">
                                            <img src="assets/img/news-01.jpg" alt="img">
                                        </div>
                                        <div class="gt-recent-content">
                                            <h5>
                                                <a href="news-details.html">
                                                    How to Stay Ahead of the Business Curve
                                                </a>
                                            </h5>
                                            <ul>
                                                <li>
                                                    March 26, 2025
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="gt-recent-items">
                                        <div class="gt-recent-thumb">
                                            <img src="assets/img/news-01.jpg" alt="img">
                                        </div>
                                        <div class="gt-recent-content">
                                            <h5>
                                                <a href="news-details.html">
                                                    How Digital Tools Shaping the Workforce
                                                </a>
                                            </h5>
                                            <ul>
                                                <li>
                                                    March 26, 2025
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="gt-recent-items">
                                        <div class="gt-recent-thumb">
                                            <img src="assets/img/news-01.jpg" alt="img">
                                        </div>
                                        <div class="gt-recent-content">
                                            <h5>
                                                <a href="news-details.html">
                                                    How to Sustainability into your Strategy
                                                </a>
                                            </h5>
                                            <ul>
                                                <li>
                                                    March 26, 2025
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('frontend.partials.cta-section')
@endsection
