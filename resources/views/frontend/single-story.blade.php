@extends('frontend.layouts.app', ['payload' => $post, 'payloadMeta' => $postMeta, 'title' => $post->post_title])

@section('main-section')
    @include('frontend.partials.breadcrumb-image', [
        'post' => $post,
        'postMeta' => $postMeta,
    ])

    @php
        $story_page_id = 28;
        $media_page_id = 4;

        $stories_page = PostHelper::getModel()
            ->where('id', $story_page_id)
            ->where('post_type', 'page')
            ->where('post_status', 'publish')
            ->first();

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
                        <li><a
                                href="{{ route('frontend.post.index', $media_page->slug) }}">{{ $media_page->post_title }}</a>
                        </li>
                        <li>/</li>
                    @endif

                    @if (!empty($stories_page))
                        <li><a
                                href="{{ route('frontend.post.index', $stories_page->slug) }}">{{ $stories_page->post_title }}</a>
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
                                <p style="font-size: 14px; color: var(--text); margin-bottom: 16px;">{{ $postMeta['stay_updated_text'] }}</p>
                                @endif
                                   
                                <div class="social-links">
                                    <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                                    <a href="#" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                                    <a href="#" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('frontend.partials.cta-section')
@endsection
