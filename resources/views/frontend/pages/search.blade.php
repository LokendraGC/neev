@extends('frontend.layouts.app', ['payload' => $payload, 'payloadMeta' => $payloadMeta, 'title' => $title])

@section('main-section')
@include('frontend.partials.breadcrumb-section', [
'title' => $title,
'excerpt' => $query ? "Search results for: " . $query : "Search Results",
'metaData' => null,
])

@if (!empty($posts) && count($posts) > 0)
<section class="news-section section-padding">
    <div class="container">
        <div class="row g-4">

            @foreach ($posts as $post)
            @php
            $meta = $post->GetAllMetaData();

            $media = MediaHelper::getImageById($meta['featured_image'] ?? null);

            if (!empty($media) && !empty($media->file_name)) {
            $image_url = asset('storage/' . $media->file_name);
            } else {
            $image_url = asset('assets/img/home-1/news/news-01.jpg');
            }
            @endphp
            <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".3s">
                <div class="news-box-items mt-0">

                    @if (!empty($image_url))
                    <div class="thumb">
                        <img src="{{ $image_url }}" alt="{{ $post->post_title }}">
                        <img src="{{ $image_url }}" alt="{{ $post->post_title }}">
                    </div>
                    @endif


                    <div class="content">
                        <ul>

                            <li>
                                <span>{{ $post->created_at->format('d M, Y') }}</span>
                            </li>
                        </ul>
                        <h3>
                            <a
                                href="{{ route('frontend.post.index', $post->slug) }}">{{ $post->post_title }}</a>
                        </h3>
                        <div class="news-bottom">
                            <a href="{{ route('frontend.post.index', $post->slug) }}" class="link-btn">
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
@else
<section class="news-section section-padding">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>No results found</h2>
            </div>
        </div>
    </div>
</section>
@endif

@include('frontend.partials.cta-section')
@endsection