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
                {{ $cat->name }}
            </h2>
            <div class="row">
                <div class="col-xl-3"></div>
                <div class="col-xl-9">
                    <div class="section-title style-4">
                        {!! $catMeta['main_description'] !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Brand Section Start -->



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
@endsection