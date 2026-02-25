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

                        @if (!empty($business_subtitle))
                        <h6 class="sub-title bg-white wow fadeInUp">
                            {{ $business_subtitle }}
                        </h6>
                        @endif


                        @if (!empty($business_title))
                        <h2 class="text-anim">
                            {{ $business_title }}
                        </h2>
                        @endif


                        @if (!empty($business_description))
                        <p class="wow fadeInUp" data-wow-delay=".3s">
                            {{ $business_description }}
                        </p>
                        @endif


                        @if (!empty($business_button_title) || !empty($business_page))
                        <a class="gt-theme-btn-main style-5"
                            href="{{ !empty($business_page) ? route('frontend.post.index', $business_page->slug) : '#' }}">
                            <span class="gt-theme-btn">{{ $business_button_title }}</span>
                        </a>
                        @endif


                    </div>
                </div>


                @php
                $sectors = CategoryHelper::getModel()
                ->where('type', 'sector')
                ->orderBy('menu_order', 'asc')
                ->get();
                @endphp

                @if (!empty($sectors) && count($sectors) > 0)
                <div class="col-lg-7">
                    <ul class="project-box-items-3 approach-wrapper-box fix">


                        @foreach ($sectors as $sector)
                        @php
                        $sectorMeta = $sector->GetAllMetaData();

                        $media = MediaHelper::getImageById($sectorMeta['featured_image']);
                        if (!empty($media) && !empty($media->file_name)) {
                        $image_url = asset('storage/' . $media->file_name);
                        } else {
                        $image_url = asset('assets/img/home-1/project/hospitality.png');
                        }
                        @endphp
                        <li class="approach-box">
                            <div class="thumb">
                                <img src="{{ $image_url }}" alt="{{ $sector->name }}">
                                <img src="{{ $image_url }}" alt="{{ $sector->name }}">
                            </div>
                            <div class="content">
                                <h3>
                                    <a
                                        href="{{ route('frontend.category.sector.index', $sector->slug) }}">{{ $sector->name }}</a>
                                </h3>
                                <p> {{ $sectorMeta['sector_description'] ?? '' }}</p>
                            </div>
                        </li>
                        @endforeach

                    </ul>
                </div>
                @endif


            </div>
        </div>
    </div>
</section>


<!-- Global Section Start -->

@php
$stories = PostHelper::getModel()
->where('post_type', 'story')
->where('post_status', 'publish')
->latest()
->get();
@endphp


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

                    {!! $media_page->post_content ?? '' !!}

                </div>
            </div>
        </div>
    </div>

    @if (!empty($stories) && count($stories) > 0)
    <div class="swiper project-slider">
        <div class="swiper-wrapper">


            @foreach ($stories as $story)
            @php
            $storyMeta = $story->GetAllMetaData();
            $media = MediaHelper::getImageById($storyMeta['featured_image']);
            if (!empty($media) && !empty($media->file_name)) {
            $image_url = asset('storage/' . $media->file_name);
            } else {
            $image_url = asset('assets/img/home-1/news/news-01.jpg');
            }
            @endphp
            <div class="swiper-slide">
                <div class="project-image-items-2 tp-team-item tp-hover-btn-wrapper marque">


                    @if (!empty($image_url))
                    <img src="{{ $image_url }}" alt="{{ $story->post_title }}">
                    @endif
                    @if (!empty($image_url))
                    <img src="{{ $image_url }}" alt="{{ $story->post_title }}">
                    @endif


                    <div class="project-gradient"></div>
                    <a href="{{ route('frontend.story.index', $story->slug) }}" class="arrow-icon">
                        <i class="fa-solid fa-arrow-up-right"></i>
                    </a>

                    <h3 class="project-title">
                        <a href="{{ route('frontend.story.index', $story->slug) }}">
                            {{ $story->post_title }}
                        </a>
                    </h3>


                </div>
            </div>
            @endforeach


        </div>
        <div class="swiper-dot text-center mt-5">
            <div class="dot"></div>
        </div>
    </div>
    @endif

</section>



@include('frontend.partials.cta-section')
@endsection