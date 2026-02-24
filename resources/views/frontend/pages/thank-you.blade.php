@extends('frontend.layouts.app', ['payload' => $post, 'payloadMeta' => $postMeta, 'title' => 'Thank You'])

@section('main-section')
    @include('frontend.partials.breadcrumb-section'
    ,[
    'title' => 'Thank You',
    'excerpt' => $post->post_excerpt,
    'metaData' => $postMeta['featured_image'] ? MediaHelper::getImageById($postMeta['featured_image']) : null,
    ])

    <section class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="text-center">Thank You</h1>

                    <p class="text-center text-success">{{ $message }}</p>

                    <div class="col-lg-12 wow fadeInUp text-center" data-wow-delay=".5s">
                        <a class="gt-theme-btn-main style-5 mt-5" href="{{ url('/') }}">
                            <span class="gt-theme-btn">Back to Home</span>
                        </a>
                    </div>


                </div>
            </div>
        </div>
    </section>

    @include('frontend.partials.cta-section')
@endsection
