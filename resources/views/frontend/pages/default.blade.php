@extends('frontend.layouts.app', ['payload' => $post, 'payloadMeta' => $metaData, 'title' => $post->post_title])



@section('main-section')
    @include('frontend.partials.breadcrumb-section', [
        'title' => $post->post_title,
        'excerpt' => $post->post_excerpt,
        'metaData' => $metaData['featured_image'] ? MediaHelper::getImageById($metaData['featured_image']) : null,
    ])



    <section class="news-standard-section section-padding">
        <div class="container">
            <div class="story-details-area">
                <div class="row g-4 align-items-start">
                  
                    <div class="col-lg-12 col-12">
                        <div class="gt-main-sideber sticky-style story-sticky-sidebar">

                            {!! $post->post_content !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
