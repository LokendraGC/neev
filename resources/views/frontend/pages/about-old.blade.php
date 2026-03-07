@extends('frontend.layouts.app', ['payload' => $post, 'payloadMeta' => $metaData, 'title' => $post->post_title])

@section('main-section')
@include('frontend.partials.breadcrumb-section', [
'title' => $post->post_title,
'excerpt' => $post->post_excerpt,
'metaData' => $metaData['common_single_banner_image']
? MediaHelper::getImageById($metaData['common_single_banner_image'])
: null,
])

<nav class="sticky-tabs-wrapper">
    <div class="container">
        <ul class="tab-nav-list">
            <li><a href="#about-us" class="active">About Us</a></li>

            @isset($metaData['mission_and_vision_details'])
            @php
            $missionAndVisionDetails = unserialize($metaData['mission_and_vision_details']);
            @endphp
            @foreach ($missionAndVisionDetails as $index => $item)
            @php
            $slug = \Illuminate\Support\Str::slug($item['title'] ?: 'section-' . $index);
            @endphp
            <li><a href="#{{ $slug }}">{{ $item['title'] ?? '' }}</a></li>
            @endforeach
            @endisset


            <li><a href="#leadership">Board of Director</a></li>
            <li><a href="#management-team">Management Team</a></li>
            <li><a href="#our-location">Our Location</a></li>
        </ul>
    </div>
</nav>

<!-- About Us Section Start -->

@php
$feat_image = $metaData['featured_image'];

$media = MediaHelper::getImageById($feat_image);

if (!empty($media) && !empty($media->file_name)) {
$image_url = asset('storage/' . $media->file_name);
} else {
$image_url = asset('assets/img/home-1/project/bread-bg.png');
}
@endphp

<section id="about-us" class="award-section fix section-padding inner-about">
    <div class="container">
        <div class="award-wrapper detail">
            <h2 class="title text_invert-2 wow fadeInUp">{{ $post->post_title ?? 'About Us' }}</h2>
            <div class="row">

                @if ($image_url)
                <div class="col-xl-6">
                    <img src="{{ $image_url }}" alt="{{ $post->post_title }}">
                </div>
                @endif


                @if (!empty($post->post_content))
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

@isset($metaData['mission_and_vision_details'])
@php
$missionAndVisionDetails = unserialize($metaData['mission_and_vision_details']);
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


<!-- Board of Director Section Start - Old Design with Popup -->
@if (!empty($board_of_directors) && count($board_of_directors) > 0)
@php
$board_of_directors_meta = $bod_cat->GetAllMetaData();
@endphp


<section id="leadership" class="team-section-3 fix section-padding tp-panel-pin-area2">
    <div class="line-shape">
        <img src="{{ asset('assets/img/home-3/team/line-shape.png') }}" alt="img">
    </div>
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-12">
                <div class="section-title style-3">
                    <div class="row g-4">
                        <div class="col-lg-4">
                            <h2 class="text-anim">{{ $bod_cat->name ?? 'Board of Director' }}</h2>
                        </div>
                        <div class="col-lg-8">
                            {!! $board_of_directors_meta['main_description'] ?? '' !!}
                        </div>
                    </div>
                </div>
            </div>

            @if (!empty($board_of_directors) && count($board_of_directors) > 0)
            <div class="col-lg-12">
                <div class="row g-4 justify-content-center">


                    @foreach ($board_of_directors as $director)
                    @php
                    $directorMeta = $director->GetAllMetaData();
                    $media = MediaHelper::getImageById($directorMeta['featured_image']);
                    if (!empty($media) && !empty($media->file_name)) {
                    $image_url = asset('storage/' . $media->file_name);
                    } else {
                    $image_url = asset('assets/img/profile_img.jpg');
                    }
                    @endphp
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".3s">
                        <div class="team-box-item-3">
                            <a href="#teamModal{{ $director->id }}"
                                class="team-popup-trigger team-popup-open">

                                @if (!empty($image_url))
                                <div class="thumb">
                                    <img src="{{ $image_url }}" alt="{{ $director->post_title }}">
                                </div>
                                @endif

                                <div class="content">
                                    <h3>{{ $director->post_title }}</h3>
                                    <p>{{ $directorMeta['designation'] ?? '' }}</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
            @endif

        </div>
    </div>
</section>
@endif

<!-- Team Member Popups (Magnific Popup inline) -->

@if (!empty($board_of_directors) && count($board_of_directors) > 0)
@foreach ($board_of_directors as $director)
@php
$directorMeta = $director->GetAllMetaData();

$media = MediaHelper::getImageById($directorMeta['featured_image']);
if (!empty($media) && !empty($media->file_name)) {
$image_url = asset('storage/' . $media->file_name);
} else {
$image_url = asset('assets/img/profile_img.jpg');
}
@endphp
<div id="teamModal{{ $director->id }}" class="team-popup-content mfp-hide">
    <div class="team-popup-inner">
        <button type="button" class="mfp-close team-popup-close" aria-label="Close">×</button>
        <div class="team-popup-header">
            <h5>{{ $director->post_title }}</h5>
        </div>
        <div class="team-popup-body">

            @if (!empty($image_url))
            <div class="d-flex gap-4 flex-md-row flex-column">
                <img src="{{ $image_url }}" alt="{{ $director->post_title }}"
                    class="rounded flex-shrink-0" style="width: 180px; height: 200px; object-fit: cover;">
                <div>
                    @endif


                    <p class="text-muted mb-3">{{ $directorMeta['designation'] ?? '' }}</p>


                    <p>{!! $director->post_content ?? '' !!}</p>


                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@endif


<!-- Management Team Section Start -->
@if (!empty($management_teams) && count($management_teams) > 0)
<section id="management-team" class="team-section-3 fix section-padding section-bg-5">
    <div class="line-shape">
        <img src="{{ asset('assets/img/home-3/team/line-shape.png') }}" alt="img">
    </div>
    <div class="container">

        @if (!empty($management_cat->name))
        <div class="section-title style-5 text-center mb-5">

            @if (!empty($metaData['team_subtitle']))
            <h6 class="sub-title wow fadeInUp">{{ $metaData['team_subtitle'] ?? 'Our People' }}</h6>
            @endif

            <h2 class="text-anim wow fadeInUp" data-wow-delay=".2s">
                {{ $management_cat->name ?? 'Management Team' }}
            </h2>


            @if (!empty($metaData['team_title']))
            <p class="mt-3 wow fadeInUp" data-wow-delay=".3s">
                {{ $metaData['team_title'] ?? 'Experts, Professionals' }}
            </p>
            @endif


        </div>
        @endif

        <div class="row g-4 justify-content-center">



            @php
            $count = 1;
            @endphp
            @foreach ($management_teams as $management)
            @php
            $managementMeta = $management->GetAllMetaData();

            if ($count == 1) {
            $delay = '.2s';
            } else {
            $delay = '.3s';
            }

            $media = MediaHelper::getImageById($managementMeta['featured_image']);

            if (!empty($media) && !empty($media->file_name)) {
            $img_url = asset('storage/' . $media->file_name);
            } else {
            $img_url = asset('assets/img/profile_img.jpg');
            }
            @endphp
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="{{ $delay }}">
                <div class="management-team-card">

                    @if (!empty($img_url))
                    <div class="thumb">
                        <img src="{{ $img_url }}" alt="{{ $management->post_title }}">
                    </div>
                    @else
                    <div class="thumb">
                        <img src="{{ asset('assets/img/profile_img.jpg') }}"
                            alt="{{ $management->post_title }}">
                    </div>
                    @endif


                    <div class="content">
                        <h4>{{ $management->post_title }}</h4>
                        <p>{{ $managementMeta['designation'] ?? '' }}</p>
                    </div>
                </div>
            </div>
            @php
            $count++;
            @endphp
            @endforeach



        </div>
    </div>
</section>
@endif

<!-- Our Location Section Start - Image at top, text below (Golyan Group style) -->
<section id="our-location" class="section-padding">
    <div class="container">
        <div class="section-title style-5 text-center mb-5">


            @if (!empty($metaData['location_subtitle']))
            <h6 class="sub-title wow fadeInUp">{{ $metaData['location_subtitle'] ?? 'Nationwide Presence' }}</h6>
            @endif


            @if (!empty($metaData['location_title']))
            <h2 class="text-anim wow fadeInUp" data-wow-delay=".2s">
                {{ $metaData['location_title'] ?? 'Our Location' }}
            </h2>
            @endif

        </div>
        <div class="location-content">
            <div class="row g-4 align-items-center">


                @php
                $location_image = $metaData['location_image'];
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

                @if (!empty($metaData['location_details']))
                <div class="col-lg-12 wow fadeInUp" data-wow-delay=".4s">
                    <div>
                        {!! $metaData['location_details'] ?? '' !!}
                    </div>
                </div>
                @endif


            </div>
        </div>
    </div>
</section>

@include('frontend.partials.cta-section')


@push('frontend-js')
<script>
    $(document).ready(function() {
        // Ensure GSAP and plugins are loaded
        if (typeof gsap === 'undefined') {
            console.warn('GSAP is not defined. Skipping sticky navigation logic.');
            return;
        }

        gsap.registerPlugin(ScrollTrigger, ScrollToPlugin);

        const tabs = document.querySelector(".sticky-tabs-wrapper");
        const mainHeader = document.querySelector("#header-sticky");

        if (tabs) {
            // Pinning logic for tabs
            ScrollTrigger.create({
                trigger: tabs,
                start: () => {
                    const headerHeight = mainHeader ? mainHeader.offsetHeight : 0;
                    return `top-=${headerHeight} top`;
                },
                endTrigger: "html",
                end: "max",
                pin: true,
                pinSpacing: false,
                addClass: "is-stuck"
            });

            const links = gsap.utils.toArray(".tab-nav-list a");
            links.forEach(a => {
                const href = a.getAttribute("href");
                if (!href || href === '#' || !href.startsWith('#')) return;

                try {
                    const element = document.querySelector(href);
                    if (!element) return;

                    // Active state handling
                    ScrollTrigger.create({
                        trigger: element,
                        start: "top center",
                        end: "bottom center",
                        onEnter: () => setActive(a),
                        onEnterBack: () => setActive(a),
                    });
                } catch (e) {
                    console.error(`Invalid selector: ${href}`, e);
                }
            });

            function setActive(link) {
                links.forEach(el => el.classList.remove("active"));
                link.classList.add("active");
            }

            // Click to scroll logic
            links.forEach(a => {
                a.addEventListener("click", e => {
                    e.preventDefault();
                    const target = a.getAttribute("href");
                    if (!target || target === '#' || !target.startsWith('#')) return;

                    const element = document.querySelector(target);
                    if (!element) return;

                    // Calculate offset dynamically at moment of click
                    const headerHeight = mainHeader ? mainHeader.offsetHeight : 0;
                    const tabsHeight = tabs.offsetHeight;
                    const totalOffset = headerHeight + tabsHeight;

                    gsap.to(window, {
                        duration: 0.8,
                        scrollTo: {
                            y: target,
                            offsetY: totalOffset
                        },
                        ease: "power2.inOut"
                    });
                });
            });
        }
    });
</script>
@endpush
@endsection