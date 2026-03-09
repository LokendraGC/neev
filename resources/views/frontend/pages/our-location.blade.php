@extends('frontend.layouts.app', ['payload' => $post, 'payloadMeta' => $metaData, 'title' => $post->post_title])

@section('main-section')

@include('frontend.partials.breadcrumb-section', [
        'title' => $post->post_title,
        'excerpt' => $post->post_excerpt,
        'metaData' => $metaData['featured_image'] ? MediaHelper::getImageById($metaData['featured_image']) : null,
    ])

    @php
        $about_page_id = 2;

        $media_page = PostHelper::getModel()
            ->where('id', $about_page_id)
            ->where('post_type', 'page')
            ->where('post_status', 'publish')
            ->first();

            $meta = $media_page->GetAllMetaData();
    @endphp


<!-- Our Location Section Start - Image at top, text below (Golyan Group style) -->
<section id="our-location" class="section-padding">
    <div class="container">
        <div class="section-title style-5 text-center mb-5">


            @if (!empty($meta['location_subtitle']))
            <h6 class="sub-title wow fadeInUp">{{ $meta['location_subtitle'] ?? 'Nationwide Presence' }}</h6>
            @endif


            @if (!empty($meta['location_title']))
            <h2 class="text-anim wow fadeInUp" data-wow-delay=".2s">
                {{ $meta['location_title'] ?? 'Our Location' }}
            </h2>
            @endif

        </div>
        <div class="location-content">
            <div class="row g-4 align-items-center">


                @php

                $location_image = $meta['location_image'];
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

                @if (!empty($meta['location_details']))
                <div class="col-lg-12 wow fadeInUp" data-wow-delay=".4s">
                    <div class="location-description">
                        {!! $meta['location_details'] ?? '' !!}
                    </div>
                </div>
                @endif


            </div>
        </div>
    </div>
</section>

@include('frontend.partials.cta-section')

@endsection