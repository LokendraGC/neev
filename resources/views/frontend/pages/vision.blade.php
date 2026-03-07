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

@isset($meta['mission_and_vision_details'])
@php
$missionAndVisionDetails = unserialize($meta['mission_and_vision_details']);
@endphp

@foreach ($missionAndVisionDetails as $index => $item)
@php
$isEven = $loop->index % 2 == 0;
$sectionId = \Illuminate\Support\Str::slug($item['title'] ?: 'section-' . $index);
$image = isset($item['image']) ? MediaHelper::getImageById($item['image']) : null;
@endphp

<section id="{{ $sectionId }}" class="award-section fix section-padding section-bg-5">
    <div class="container">
        <div class="award-wrapper detail">
            <h2 class="title text_invert-2 wow fadeInUp">{{ $item['title'] ?? '' }}</h2>
            <div class="row g-4">
                @if ($isEven)
                <div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".2s">
                    <div class="vision-mission-card h-100">
                        <div class="thumb mb-4">
                            @if ($image)
                            <img src="{{ asset('storage/' . $image->file_name) }}"
                                alt="{{ $item['title'] ?? '' }}" class="img-fluid rounded">
                            @else
                            <img src="{{ asset('assets/img/home-1/project/hospitality.png') }}"
                                alt="{{ $item['title'] ?? '' }}" class="img-fluid rounded">
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".2s">
                    <div class="vision-mission-card h-100">
                        {!! $item['description'] ?? '' !!}
                    </div>
                </div>
                @else
                <div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".3s">
                    {!! $item['description'] ?? '' !!}
                </div>
                <div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".3s">
                    <div class="vision-mission-card h-100">
                        <div class="thumb mb-4">
                            @if ($image)
                            <img src="{{ asset('storage/' . $image->file_name) }}"
                                alt="{{ $item['title'] ?? '' }}" class="img-fluid rounded">
                            @else
                            <img src="{{ asset('assets/img/home-1/project/solar.png') }}"
                                alt="{{ $item['title'] ?? '' }}" class="img-fluid rounded">
                            @endif
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>
@endforeach
@endisset



@include('frontend.partials.cta-section')


@endsection