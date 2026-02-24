@extends('frontend.layouts.app', ['payload' => $post, 'payloadMeta' => $postMeta, 'title' => $post->post_title])

@section('main-section')
    @php
        $banner_main_title = $postMeta['banner_main_title'] ?? '';
        $banners = [];

        if (!empty($postMeta['banners'])) {
            $unserialized = @unserialize($postMeta['banners']);
            $banners = is_array($unserialized) ? $unserialized : [];
        }

        $page_id = 2;

        $about_page = PostHelper::getModel()
            ->where('id', $page_id)
            ->where('post_type', 'page')
            ->where('post_status', 'publish')
            ->first();
    @endphp

    <!-- Hero Section Start -->

    @if (!empty($banners) && is_array($banners))
        <section class="hero-wrapper">
            <div class="swiper main-image-slider">

                <div class="swiper-wrapper">

                    @foreach ($banners as $banner)
                        @php
                            $media = MediaHelper::getImageById($banner['image']);
                            if ($media) {
                                $image_url = asset('storage/' . $media->file_name);
                            } else {
                                $image_url = asset('assets/img/home-1/hero/hero-2.jpg');
                            }
                        
                        @endphp

                        @if ($image_url)
                            <div class="swiper-slide" style="background-image: url('{{ $image_url }}')"></div>
                        @endif
                    @endforeach

                </div>

            </div>
            <div class="hero-dark-overlay"></div>
            <div class="hero-overlay-content">
                <div class="container">
                    <div class="combined-headline">
                        <p class="static-text">{{ $banner_main_title ?? 'NEEV CORPORATION |' }}</p>

                        <div class="swiper vertical-text-slider">
                            <div class="swiper-wrapper">
                                @foreach ($banners as $banner)
                                    @if ($banner['title'])
                                        <div class="swiper-slide"><span>{{ $banner['title'] ?? '' }}</span></div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <section class="about-inner-section fix section-padding">
        <div class="container">
            <div class="row">

                @php
                    $image_url = null;

                    if (!empty($postMeta['featured_image'])) {
                        $media = MediaHelper::getImageById($postMeta['featured_image']);

                        if ($media) {
                            $image_url = asset('storage/' . $media->file_name);
                        } else {
                            $image_url = asset('assets/img/home-1/project/hospitality.png');
                        }
                    }
                @endphp

                @if ($image_url)
                    <div class="col-lg-6">
                        <div class="section-title">
                            <img src="{{ $image_url }}" alt="img">
                        </div>
                    </div>
                @endif


                <div class="col-lg-6">
                    <div class="about-content">
                        <div class="section-title">

                            @isset($postMeta['about_subtitle'])
                                <h6 class="sub-title wow fadeInUp">
                                    {{ $postMeta['about_subtitle'] }}
                                </h6>
                            @endisset


                            <h1 class="text-anim">
                                @isset($postMeta['about_title'])
                                    {{ $postMeta['about_title'] }}
                                @endisset
                            </h1>


                        </div>


                        @isset($post->post_content)
                            {!! $post->post_content ?? '' !!}
                        @endisset



                        @if (!empty($about_page))
                            <a class="gt-theme-btn-main style-5 mt-5"
                                href="{{ route('frontend.post.index', $about_page->slug) }}">
                                <span class="gt-theme-btn">Explore more</span>
                            </a>
                        @endif


                    </div>
                </div>
            </div>
            <div class="section-title-area ">


                @php
                    $our_vision = $postMeta['our_vision'] ?? '';
                    $our_mission = $postMeta['our_mission'] ?? '';

                    $our_vision_description = $postMeta['our_vision_description'] ?? '';
                    $our_mission_description = $postMeta['our_mission_description'] ?? '';
                @endphp

                @if (
                    (!empty($our_vision) && !empty($our_mission)) ||
                        (!empty($our_vision_description) && !empty($our_mission_description)))
                    <div class="about-counter-wrapper">
                        <div class="row g-4">


                            @if (!empty($our_vision))
                                <div class="col-xl-6 col-md-6 wow fadeInUp" data-wow-delay=".3s">
                                    <div class="about-counter-item">

                                        @isset($our_vision)
                                            <h2>
                                                <span>{{ $our_vision }}</span>
                                            </h2>
                                        @endisset


                                        @isset($our_vision_description)
                                            <p>
                                                {{ $our_vision_description }}
                                            </p>
                                        @endisset

                                    </div>
                                </div>
                            @endif

                            @if (!empty($our_mission))
                                <div class="col-xl-6 col-md-6 wow fadeInUp" data-wow-delay=".5s">
                                    <div class="about-counter-item">


                                        @isset($our_mission)
                                            <h2>
                                                <span>{{ $our_mission }}</span>
                                            </h2>
                                        @endisset


                                        @isset($our_mission_description)
                                            <p>
                                                {{ $our_mission_description }}
                                            </p>
                                        @endisset


                                    </div>
                                </div>
                            @endif

                        </div>
                    </div>
                @endif
    </section>



    <!-- Project Section Start -->

    @php
        $business_subtitle = $postMeta['business_subtitle'] ?? '';
        $business_title = $postMeta['business_title'] ?? '';
        $business_description = $postMeta['business_description'] ?? '';
        $business_button_title = $postMeta['business_button_title'] ?? '';
        $business_button_link = $postMeta['business_button_link'] ?? '';

        $business_page = PostHelper::getModel()
            ->where('id', $business_button_link)
            ->where('post_type', 'page')
            ->where('post_status', 'publish')
            ->first();
    @endphp


    <section class="project-section-3 fix tp-panel-pin-area section-padding section-bg approach-area">
        <div class="line-shape">
            <img src="{{ asset('assets/img/home-3/project/line-shape.png') }}" alt="img">
        </div>
        <div class="container">
            <div class="project-wrapper-3">
                <div class="row g-4">
                    <div class="col-lg-5">
                        <div class="section-title style-3 mb-0 tp-panel-pin">
                         
                         @if(!empty($business_subtitle))
                            <h6 class="sub-title bg-white wow fadeInUp">
                                {{ $business_subtitle }}
                            </h6>
                            @endif

                          
                          @if(!empty($business_title))
                            <h2 class="text-anim">
                                    {{ $business_title }}
                                </h2>
                            @endif


                           @if(!empty($business_description))
                            <p class="wow fadeInUp" data-wow-delay=".3s">
                                {{ $business_description }}
                                </p>
                            @endif


                          @if(!empty($business_button_title) || !empty($business_page))
                            <a class="gt-theme-btn-main style-5" href="{{ !empty($business_page) ? route('frontend.post.index', $business_page->slug) : '#' }}">
                                <span class="gt-theme-btn">{{ $business_button_title }}</span>
                            </a>
                          @endif


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
