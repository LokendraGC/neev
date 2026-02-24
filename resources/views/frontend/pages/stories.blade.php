@extends('frontend.layouts.app', ['payload' => $post, 'payloadMeta' => $metaData, 'title' => $post->post_title])

@section('main-section')
    @include('frontend.partials.breadcrumb-image', [
        'post' => $post,
        'postMeta' => $metaData,
    ])

    @php
        $media_page_id = 4;

        $media_page = PostHelper::getModel()
            ->where('id', $media_page_id)
            ->where('post_type', 'page')
            ->where('post_status', 'publish')
            ->first();
    @endphp

    <div class="breadcrumb-new">
        <div class="container">
            <div class="page-heading">
                <ul class="breadcrumb-items wow fadeInUp" data-wow-delay=".5s">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li>/</li>

                    @if (!empty($media_page))
                        <li><a href="{{ route('frontend.post.index', $media_page->slug) }}">{{ $media_page->post_title }}</a>
                        </li>
                        <li>/</li>
                    @endif

                    <li>{{ $post->post_title }}</li>
                </ul>
            </div>
        </div>
    </div>

    @php
        $stories = PostHelper::getModel()
            ->where('post_type', 'story')
            ->where('post_status', 'publish')
            ->latest()
            ->get();
    @endphp

    @if (!empty($stories) && count($stories) > 0)
        <section class="news-section section-padding">
            <div class="container">
                <div class="row g-4">

                    @foreach ($stories as $story)
                        <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".3s">
                            <div class="news-box-items mt-0">
                              
                              
                              @php

                              $story_meta = $story->GetAllMetaData();
                              
                              
                              $media = MediaHelper::getImageById($story_meta['featured_image']);

                                if (!empty($media) && !empty($media->file_name)) {
                                    $image_url = asset('storage/' . $media->file_name);
                                } else {
                                    $image_url = asset('assets/img/home-1/news/news-01.jpg');
                                }
                              @endphp
                                <div class="thumb">
                                    <img src="{{ $image_url }}" alt="img">
                                    <img src="{{ $image_url }}" alt="img">
                                </div>


                                <div class="content">
                                    <ul>

                                        <li>
                                            <span>{{ $story->post_date }}</span>
                                        </li>
                                    </ul>
                                    <h3>
                                        <a href="{{ route('frontend.story.index', $story->slug) }}">{{ $story->post_title }}</a>
                                    </h3>
                                    <div class="news-bottom">
                                        <a href="{{ route('frontend.story.index', $story->slug) }}" class="link-btn">
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

                {{--  
                <div class="page-nav-wrap text-center">
                    <ul>
                        <li><a class="page-numbers" href="#"><i class="fa-solid fa-arrow-up-left"></i></a></li>
                        <li class="active"><a class="page-numbers" href="#">01</a></li>
                        <li><a class="page-numbers" href="#">02</a></li>
                        <li><a class="page-numbers" href="#">03</a></li>
                        <li><a class="page-numbers" href="#"><i class="fa-solid fa-arrow-up-right"></i></a></li>
                    </ul>
                </div>
 --}}

            </div>
        </section>
    @endif

    @include('frontend.partials.cta-section')
@endsection
