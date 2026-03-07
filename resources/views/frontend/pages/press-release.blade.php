@extends('frontend.layouts.app', ['payload' => $post, 'payloadMeta' => $metaData, 'title' => $post->post_title])

@section('main-section')

@include('frontend.partials.breadcrumb-section', [
        'title' => $post->post_title,
        'excerpt' => $post->post_excerpt,
        'metaData' => $metaData['featured_image'] ? MediaHelper::getImageById($metaData['featured_image']) : null,
    ])


@php
$feat_image = $metaData['featured_image'];

$media = MediaHelper::getImageById($feat_image);

if (!empty($media) && !empty($media->file_name)) {
$image_url = asset('storage/' . $media->file_name);
} else {
$image_url = null;
}
@endphp

<section class="award-section fix section-padding inner-about">
    <div class="container">
        <div class="award-wrapper detail">
            <h2 class="title text_invert-2 wow fadeInUp">{{ $post->post_title ?? 'Press Release' }}</h2>
            <div class="row">

                @if (!empty($image_url))
                <div class="col-xl-6">
                    <img src="{{ $image_url }}" alt="{{ $post->post_title }}">
                </div>
                @endif


                @if (!empty($post->post_content ?? ''))
                <div class="col-xl-6">
                    <div class="section-title style-4">
                        {!! $post->post_content !!}
                    </div>
                </div>
                @endif


            </div>
        </div>
    </div>
</section>



@include('frontend.partials.cta-section')


@endsection