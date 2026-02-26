@extends('frontend.layouts.app', ['payload' => $payload, 'payloadMeta' => $payloadMeta, 'title' => $title])

@section('main-section')
    @include('frontend.partials.breadcrumb-section', [
        'title' => $title,
        'excerpt' => $query ? 'Search results for: ' . $query : 'Search Results',
        'metaData' => null,
    ])

    @push('frontend-css')
        <style>
            .news-box-items .thumb img:first-child {
                position: relative !important;
                z-index: 1 !important;
                opacity: 1 !important;
                transform: none !important;
                filter: none !important;
            }
        </style>
    @endpush

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

                            // Determine the correct route based on post type
                            $routeName = 'frontend.post.index'; // default for 'post'
                            if ($post->post_type === 'story') {
                                $routeName = 'frontend.story.index';
                            } elseif ($post->post_type === 'company') {
                                $routeName = 'frontend.company.index';
                            }
                        @endphp

                        <div class="col-xl-4 col-lg-6 col-md-6">
                            <div class="news-box-items mt-0">

                                @if (!empty($image_url))
                                    <div class="thumb">
                                        <img src="{{ $image_url }}" alt="{{ $post->post_title }}">
                                    </div>
                                @endif

                                <div class="content">
                                    <ul class="d-flex align-items-center gap-2">
                                        <li>
                                            <span class="post-type-badge {{ $post->post_type }}">
                                                {{ ucfirst($post->post_type) }}
                                            </span>
                                        </li>
                                        <li>
                                            <span>{{ $post->created_at->format('d M, Y') }}</span>
                                        </li>
                                    </ul>

                                    <h3>
                                        <a href="{{ route($routeName, $post->slug) }}">
                                            {{ $post->post_title }}
                                        </a>
                                    </h3>

                                    @if ($query)
                                        <div class="search-match-info mt-2">
                                            <small class="text-muted">
                                                <i class="fa-solid fa-search"></i>
                                                Matches "{{ $query }}" in title
                                            </small>
                                        </div>
                                    @endif

                                    <div class="news-bottom">
                                        <a href="{{ route($routeName, $post->slug) }}" class="link-btn">
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

                {{-- Display result count --}}
                <div class="row mt-4">
                    <div class="col-12">
                        <p class="text-muted text-center">
                            Found {{ $posts->count() }} result(s)
                        </p>
                    </div>
                </div>

            </div>
        </section>
    @else
        <section class="news-section section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <h2>No results found</h2>
                        @if ($query)
                            <p class="mt-3">No matches found for "{{ $query }}"</p>
                        @endif
                        <div class="mt-4">
                            <a class="gt-theme-btn-main style-5 mt-5" href="{{ url('/') }}">
                                <span class="gt-theme-btn">Back to Home</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    @include('frontend.partials.cta-section')
@endsection
