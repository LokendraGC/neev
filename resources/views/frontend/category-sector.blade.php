@extends('frontend.layouts.app', ['payload' => $cat, 'payloadMeta' => $catMeta, 'title' => $cat->name])

@section('main-section')
@php
$background_image = $catMeta['featured_image'];
$media = MediaHelper::getImageById($background_image);

if (!empty($media) && !empty($media->file_name)) {
$image_url = asset('storage/' . $media->file_name);
} else {
$image_url = asset('assets/img/home-1/project/bread-bg.png');
}

@endphp
<div class="breadcrumb-wrapper bg-cover" style="background-image: url('{{ $image_url }}');">
    <div class="hero-dark-overlay"></div>

    <div class="container">
        <div class="page-heading">
            <div class="breadcrumb-sub-title">
                <h1 class="text-white wow fadeInUp" data-wow-delay=".3s">{{ $cat->name }}</h1>
                <p>
                    {{ $catMeta['sector_description'] }}
                </p>
            </div>

        </div>
    </div>
</div>

@php
$business_page_id = 3;

$business_page = PostHelper::getModel()
->where('id', $business_page_id)
->where('post_type', 'page')
->where('post_status', 'publish')
->first();

@endphp



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

                @if (!empty($business_page))
                <li>
                    <a
                        href="{{ route('frontend.post.index', $business_page->slug) }}">{{ $business_page->post_title }}</a>
                </li>
                <li>
                    /
                </li>
                @endif

                <li>
                    {{ $cat->name }}
                </li>
            </ul>
        </div>
    </div>
</div>


@php
$sectorDetails = [];
if (!empty($catMeta['sector_details'])) {
    $unserialized = @unserialize($catMeta['sector_details']);
    $sectorDetails = (is_array($unserialized)) ? $unserialized : [];
}
@endphp

<nav class="sticky-tabs-wrapper">
    <div class="container">
        <ul class="tab-nav-list">
            <li><a href="#purpose" class="active">Description</a></li>
            @if (!empty($sectorDetails) && count($sectorDetails) > 0)
            <li><a href="#sector-details">Sector Details</a></li>
            @endif
            <li><a href="#chairman">Companies</a></li>
            @if (!empty($catMeta['location_image']))
            <li><a href="#location">Location</a></li>
            @endif
            <li><a href="#stories">Stories</a></li>
            <li><a href="#other-businesses">Other Businesses</a></li>
        </ul>
    </div>
</nav>

@php
$sustainability_image = $catMeta['sector_image']  ?? null;


$media = MediaHelper::getImageById($sustainability_image);

if (!empty($media) && !empty($media->file_name)) {
$sustainability_image_url = asset('storage/' . $media->file_name);
$custom_css = 'col-xl-6';
} else {
$sustainability_image_url = null;
$custom_css = 'col-xl-9';
$custom_div = '<div class="col-xl-3"></div>';
}


@endphp



<section id="purpose" class="award-section fix section-padding inner-about">
    <div class="container">
        <div class="award-wrapper detail">
            <h2 class="title text_invert-2 wow fadeInUp">{{ $cat->name ?? 'Sustainability' }}</h2>
            <div class="row">

                @if ($sustainability_image_url)
                <div class="col-xl-6">
                    <img src="{{ $sustainability_image_url }}" alt="{{ $cat->name }}">
                </div>
                @endif

                @if ( !empty($custom_div) )
                {!! $custom_div !!}
                @endif

                @if (!empty($catMeta['main_description']))
                <div class="{{$custom_css}}">
                    <div class="section-title style-4">
                        {!! $catMeta['main_description'] !!}
                    </div>
                </div>
                @endif


            </div>
        </div>
    </div>
</section>


<!-- Brand Section Start -->
@if (!empty($sectorDetails) && count($sectorDetails) > 0)
    @foreach ($sectorDetails as $item)

    @php
    $media = MediaHelper::getImageById($item['image']);
    if (!empty($media) && !empty($media->file_name)) {
    $image_url = asset('storage/' . $media->file_name);
    } else {
    $image_url = asset('assets/img/sector-img.png');
    }
@endphp
<section id="sector-details" class="award-section fix section-padding section-bg-5">
            <div class="container">
                <div class="award-wrapper detail">

                    <div class="row align-items-center g-4">

                    

                        @if (!empty($image_url))
                            <div class="col-xl-4">
                                <img src="{{ $image_url }}"
                                    alt="{{ $item['title'] }}" class="rounded-3 w-100">
                            </div>
                        @endif

                        @if (!empty($item['description']))
                            <div class="col-xl-8">
                                @if (!empty($item['title']))
                                    <h2 class="title text_invert-2 wow fadeInUp">{{ $item['title'] }}</h2>
                                @endif

                                @if (!empty($item['description']))
                                <p class="tx-title sec_title tz-itm-title tz-itm-anim">
                                        {!! $item['description'] !!}
                                    </p>
                                @endif


                            </div>
                        @endif


                    </div>
                </div>
            </div>
        </section>
        @endforeach
        @endif



@if (!empty($companies) && count($companies) > 0)
<div id="chairman" class="brand-section-2 section-padding mt-0 ">
    <div class="container">
        <div class="section-title style-3">
            <h2 class="text-anim text-white">
                Companies
            </h2>
        </div>

        <div class="swiper brand-slider">
            <div class="swiper-wrapper">

                @foreach ($companies as $company)
                @php
                $companyMeta = $company->GetAllMetaData();

                $media = MediaHelper::getImageById($companyMeta['featured_image']);

                if (!empty($media) && !empty($media->file_name)) {
                $image_url = asset('storage/' . $media->file_name);
                } else {
                $image_url = asset('assets/img/home-1/news/news-01.jpg');
                }

                @endphp
                <div class="swiper-slide">
                    <div class="news-box-items">
                        <div class="thumb">
                            <img src="{{ $image_url }}" alt="img">
                            <img src="{{ $image_url }}" alt="img">
                        </div>
                        <div class="content">
                            <h3>
                                <a
                                    href="{{ route('frontend.company.index', $company->slug) }}">{{ $company->post_title }}</a>
                            </h3>
                            <div class="news-bottom">
                                <a href="{{ route('frontend.company.index', $company->slug) }}"
                                    class="link-btn">
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
                @endforeach

            </div>
        </div>
    </div>
</div>
@endif

<!-- Our Location Section Start - Image at top, text below (Golyan Group style) -->
@if (!empty($catMeta['location_image']))

<section id="location" class="section-padding">
    <div class="container">
        <div class="section-title-area">
            <div class="section-title style-2">
                @if (!empty($catMeta['location_name']))
                    <h2 class="text-anim">
                        {{ $catMeta['location_name'] ?? 'Our Location' }}
                    </h2>
                @endif
            </div>
        </div>
    
        <div class="location-content">
            <div class="row g-4 align-items-center">

                @php

                $location_image = $catMeta['location_image'];
                $location_image_media = MediaHelper::getImageById($location_image);

                if (!empty($location_image_media) && !empty($location_image_media->file_name)) {
                $location_image_url = asset('storage/' . $location_image_media->file_name);
                } else {
                $location_image_url = asset('assets/img/map.png');
                }

                $websiteName = SettingHelper::get_field('site_title');

                @endphp

                @if (!empty($location_image_url))
                <div class="col-lg-12 wow fadeInUp" data-wow-delay=".5s">
                    <div class="location-image">
                        <img src="{{ $location_image_url }}" alt="{{ $websiteName }} Nationwide"
                            class="img-fluid rounded">
                    </div>
                </div>
                @endif

                @if (!empty($catMeta['location_description']))
                <div class="col-lg-12 wow fadeInUp" data-wow-delay=".4s">
                    <div class="location-description">
                        {!! $catMeta['location_description'] ?? '' !!}
                    </div>
                </div>
                @endif


            </div>
        </div>
    </div>
</section>
@endif
<!-- stories Section Start -->
@if (!empty($stories) && count($stories) > 0)
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


            @foreach ($stories as $story)
            @php
            $storyMeta = $story->GetAllMetaData();
            $media = MediaHelper::getImageById($storyMeta['featured_image']);

            if (!empty($media) && !empty($media->file_name)) {
            $image_url = asset('storage/' . $media->file_name);
            } else {
            $image_url = asset('assets/img/home-1/project/solar.png');
            }
            @endphp
            <div class="swiper-slide">
                <div class="testimonial-box-items">

                    <div class="content">

                        @if (!empty($image_url))
                        <img src="{{ $image_url }}" alt="{{ $story->post_title }}">
                        @endif

                        <h3>
                            <a href="{{ route('frontend.story.index', $story->slug) }}">
                                {{ $story->post_title }}
                            </a>
                        </h3>

                    </div>
                </div>
            </div>
            @endforeach



        </div>
        <div class="swiper-dot text-center mt-5">
            <div class="dot2"></div>
        </div>
    </div>
</section>
@endif

<!-- Other Businesses Section Start -->
@if (!empty($otherCategories) && count($otherCategories) > 0)
<section id="other-businesses" class="project-section fix section-padding">
    <div class="container">
        <div class="section-title style-3 mb-5">
            <h2 class="text-anim">
                Other Businesses
            </h2>
        </div>
        <div class="row g-4">


            @foreach ($otherCategories as $otherCategory)
            @php
            $otherCategoryMeta = $otherCategory->GetAllMetaData();

            $media = MediaHelper::getImageById($otherCategoryMeta['featured_image']);
            if (!empty($media) && !empty($media->file_name)) {
            $image_url = asset('storage/' . $media->file_name);
            } else {
            $image_url = asset('assets/img/home-1/project/hospitality.png');
            }

            @endphp
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".3s">
                <div class="project-box-items-inner">

                    @if (!empty($image_url))
                    <div class="thumb">
                        <img src="{{ $image_url }}" alt="{{ $otherCategory->name }}">
                        <img src="{{ $image_url }}" alt="{{ $otherCategory->name }}">
                    </div>
                    @endif

                    <div class="project-content-area">
                        <div class="content">
                            <h3><a
                                    href="{{ route('frontend.category.sector.index', $otherCategory->slug) }}">{{ $otherCategory->name }}</a>
                            </h3>
                        </div>
                        <a href="{{ route('frontend.category.sector.index', $otherCategory->slug) }}"
                            class="circle-check"><i class="fa-solid fa-arrow-up-right"></i></a>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>
@endif

@include('frontend.partials.cta-section')


@push('frontend-js')
<script>
    $(document).ready(function() {
        // Ensure GSAP and plugins are loaded
        if (typeof gsap === 'undefined') {
            console.warn('GSAP is not defined. Skipping sticky navigation logic.');
            return;
        }

        gsap.registerPlugin(ScrollTrigger, ScrollToPlugin);

        const tabs = document.querySelector(".sticky-tabs-wrapper");
        const mainHeader = document.querySelector("#header-sticky");

        if (tabs) {
            // Pinning logic for tabs
            ScrollTrigger.create({
                trigger: tabs,
                start: () => {
                    const headerHeight = mainHeader ? mainHeader.offsetHeight : 0;
                    return `top-=${headerHeight} top`;
                },
                endTrigger: "html",
                end: "max",
                pin: true,
                pinSpacing: false,
                addClass: "is-stuck"
            });

            const links = gsap.utils.toArray(".tab-nav-list a");
            links.forEach(a => {
                const href = a.getAttribute("href");
                if (!href || href === '#' || !href.startsWith('#')) return;

                try {
                    const element = document.querySelector(href);
                    if (!element) return;

                    // Active state handling
                    ScrollTrigger.create({
                        trigger: element,
                        start: "top center",
                        end: "bottom center",
                        onEnter: () => setActive(a),
                        onEnterBack: () => setActive(a),
                    });
                } catch (e) {
                    console.error(`Invalid selector: ${href}`, e);
                }
            });

            function setActive(link) {
                links.forEach(el => el.classList.remove("active"));
                link.classList.add("active");
            }

            // Click to scroll logic
            links.forEach(a => {
                a.addEventListener("click", e => {
                    e.preventDefault();
                    const target = a.getAttribute("href");
                    if (!target || target === '#' || !target.startsWith('#')) return;

                    const element = document.querySelector(target);
                    if (!element) return;

                    // Calculate offset dynamically at moment of click
                    const headerHeight = mainHeader ? mainHeader.offsetHeight : 0;
                    const tabsHeight = tabs.offsetHeight;
                    const totalOffset = headerHeight + tabsHeight;

                    gsap.to(window, {
                        duration: 0.8,
                        scrollTo: {
                            y: target,
                            offsetY: totalOffset
                        },
                        ease: "power2.inOut"
                    });
                });
            });
        }
    });
</script>
@endpush


@endsection