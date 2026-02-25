@extends('frontend.layouts.app', ['payload' => $post, 'payloadMeta' => $postMeta, 'title' => $post->post_title])

@section('main-section')
    @php

        $common_banner = SettingHelper::get_field('banner_background_image');

        $media = MediaHelper::getImageById($common_banner);

        if (!empty($media) && !empty($media->file_name)) {
            $banner_url = asset('storage/' . $media->file_name);
        } else {
            $banner_url = asset('assets/img/home-1/project/bread-bg.png');
        }

        $background_image = $postMeta['featured_image'];

        $media = MediaHelper::getImageById($background_image);

        if (!empty($media) && !empty($media->file_name)) {
            $image_url = asset('storage/' . $media->file_name);
        } else {
            $image_url = $banner_url;
        }

        $news_page_id = 8;

        $news_page = PostHelper::getModel()
            ->where('id', $news_page_id)
            ->where('post_type', 'page')
            ->where('post_status', 'publish')
            ->first();
    @endphp


    <div class="breadcrumb-wrapper bg-cover" style="background-image: url('{{ $image_url }}');">
        <div class="hero-dark-overlay"></div>
        <div class="container">
            <div class="page-heading">
                <div class="breadcrumb-sub-title">
                    <h1 class="text-white wow fadeInUp" data-wow-delay=".3s">{{ $post->post_title }}</h1>
                    <p>{{ $post->post_excerpt }}</p>
                </div>
            </div>
        </div>
    </div>


    <div class="breadcrumb-new">
        <div class="container">
            <div class="page-heading">
                <ul class="breadcrumb-items wow fadeInUp" data-wow-delay=".5s">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li>/</li>

                    @if (!empty($news_page))
                        <li><a href="{{ route('frontend.post.index', $news_page->slug) }}">{{ $news_page->post_title }}</a>
                        </li>
                        <li>/</li>
                    @endif

                    <li>{{ $post->post_title }}</li>
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

                                    <h3>{{ $post->post_title }}</h3>

                                    <ul class="post-list d-flex align-items-center">

                                        <li>
                                            <i class="fa-solid fa-calendar-days"></i>
                                            {{ $post->created_at->format('d M, Y') }}
                                        </li>

                                    </ul>


                                    @php
                                        $media = MediaHelper::getImageById($postMeta['featured_image']);

                                        if (!empty($media) && !empty($media->file_name)) {
                                            $image_url = asset('storage/' . $media->file_name);
                                        } else {
                                            $image_url = asset('assets/img/home-1/news/news-01.jpg');
                                        }
                                    @endphp

                                    @if (!empty($image_url))
                                        <div class="post-featured-thumb fix mb-5">
                                            <img data-speed=".8" src="{{ $image_url }}" alt="{{ $post->post_title }}">
                                        </div>
                                    @endif

                                    <div class="post-content-details">
                                        {!! $post->post_content !!}
                                    </div>


                                </div>
                            </div>


                        </div>
                    </div>


                    @if (!empty($related_posts) && count($related_posts) > 0)
                        <div class="col-lg-4 col-12">
                            <div class="gt-main-sideber sticky-style">


                                <div class="gt-single-sideber-widget">
                                    <div class="gt-widget-title">
                                        <h3>Recent Post</h3>
                                    </div>
                                    <div class="gt-recent-post-area">

                                        @foreach ($related_posts as $related_post)
                                            @php

                                            $meta = $related_post->GetAllMetaData();

                                                $media = MediaHelper::getImageById(
                                                    $meta['featured_image'] ?? null,
                                                );
                                                if (!empty($media) && !empty($media->file_name)) {
                                                    $image_url = asset('storage/' . $media->file_name);
                                                } else {
                                                    $image_url = asset('assets/img/home-1/news/news-01.jpg');
                                                }
                                            @endphp

                                            <div class="gt-recent-items">

                                                @if (!empty($image_url))
                                                    <div class="gt-recent-thumb">
                                                        <img src="{{ $image_url }}"
                                                            alt="{{ $related_post->post_title }}">
                                                    </div>
                                                @endif


                                                <div class="gt-recent-content">

                                                    @if (!empty($related_post->post_title))
                                                        <h5>
                                                            <a
                                                                href="{{ route('frontend.post.index', $related_post->slug) }}">
                                                                {{ $related_post->post_title }}
                                                            </a>
                                                        </h5>
                                                    @endif


                                                    <ul>
                                                        <li>
                                                            {{ $related_post->created_at->format('d M, Y') }}
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        @endforeach


                                    </div>
                                </div>

                            </div>
                        </div>
                    @endif


                </div>
            </div>
        </div>
    </section>

    @include('frontend.partials.cta-section')
@endsection
