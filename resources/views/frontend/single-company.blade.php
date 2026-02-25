@extends('frontend.layouts.app', ['payload' => $post, 'payloadMeta' => $postMeta, 'title' => $post->post_title])

@section('main-section')


    @php
        $company_page_id = 29;
        $business_page_id = 3;

        $company_page = PostHelper::getModel()
            ->where('id', $company_page_id)
            ->where('post_type', 'page')
            ->where('post_status', 'publish')
            ->first();

        $business_page = PostHelper::getModel()
            ->where('id', $business_page_id)
            ->where('post_type', 'page')
            ->where('post_status', 'publish')
            ->first();

    @endphp


    @php

        $common_banner = SettingHelper::get_field('banner_background_image');

        $media = MediaHelper::getImageById($common_banner);

        if (!empty($media) && !empty($media->file_name)) {
            $banner_url = asset('storage/' . $media->file_name);
        } else {
            $banner_url = asset('assets/img/home-1/project/bread-bg.png');
        }

        $background_image = $postMeta['company_banner_image'];

        $media = MediaHelper::getImageById($background_image);

        if (!empty($media) && !empty($media->file_name)) {
            $image_url = asset('storage/' . $media->file_name);
        } else {
            $image_url = $banner_url;
        }

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

                    @if (!empty($business_page))
                        <li><a
                                href="{{ route('frontend.post.index', $business_page->slug) }}">{{ $business_page->post_title }}</a>
                        </li>
                        <li>/</li>
                    @endif

                    @if (!empty($company_page))
                        <li><a
                                href="{{ route('frontend.post.index', $company_page->slug) }}">{{ $company_page->post_title }}</a>
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
            <div class="story-details-area">
                <div class="row g-4 align-items-start">
                    <div class="col-12 col-lg-8">
                        <div class="story-detail-content">
                            {!! $post->post_content !!}
                        </div>
                    </div>
                    <div class="col-lg-4 col-12">
                        <div class="gt-main-sideber sticky-style story-sticky-sidebar">

                            @if (!empty($postMeta['head_office']))
                                <div class="story-sidebar-address mb-4">
                                    <strong>Head Office</strong><br>
                                    {{ $postMeta['head_office'] }}
                                </div>
                            @endif

                            <div class="story-stay-updated">

                                <h3>Share this story</h3>

                                @if (!empty($postMeta['stay_updated_text']))
                                    <p style="font-size: 14px; color: var(--text); margin-bottom: 16px;">
                                        {{ $postMeta['stay_updated_text'] }}</p>
                                @endif

                                @php
                                    $medias = $postMeta['social_media_company'];
                                    $social_medias = unserialize($medias);
                                @endphp

                                @if (!empty($social_medias))
                                    <div class="social-icon d-flex align-items-center wow fadeInUp" data-wow-delay=".5s">
                                        @foreach ($social_medias as $social_media)
                                            <a aria-label="{{ $social_media['media'] }}"
                                                href="{{ $social_media['link'] ? $social_media['link'] : 'javascript:void(0)' }}"
                                                target="{{ $social_media['link'] ? '_blank' : '_self' }}"
                                                class="text-white">
                                                <i class="fab {{ $social_media['media'] }}"></i>
                                            </a>
                                        @endforeach
                                    </div>
                                @endif


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('frontend.partials.cta-section')
@endsection
