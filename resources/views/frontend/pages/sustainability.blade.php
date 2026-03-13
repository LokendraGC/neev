@extends('frontend.layouts.app', ['payload' => $post, 'payloadMeta' => $metaData, 'title' => $post->post_title])

@section('main-section')

@include('frontend.partials.breadcrumb-section', [
'title' => $post->post_title,
'excerpt' => $post->post_excerpt,
'metaData' => $metaData['featured_image'] ? MediaHelper::getImageById($metaData['featured_image']) : null,
])

<nav class="sticky-tabs-wrapper">
    <div class="container">
        <ul class="tab-nav-list">
            <li><a href="#sustainability" class="active">Description</a></li>

            @php
            $sustainability_details = isset($metaData['sustainability_details'])
            ? unserialize($metaData['sustainability_details'])
            : [];
            @endphp


            @if (!empty($sustainability_details) && count($sustainability_details) > 0)
            @foreach ($sustainability_details as $item)
            <li><a href="#{{ Str::slug($item['title']) }}">{{ $item['title'] }}</a></li>
            @endforeach
            @endif


        </ul>
    </div>
</nav>


@php
$sustainability_image = $metaData['sustainability_image'];

$media = MediaHelper::getImageById($sustainability_image);

if (!empty($media) && !empty($media->file_name)) {
$sustainability_image_url = asset('storage/' . $media->file_name);
$custom_css = 'col-xl-6';
} else {
$sustainability_image_url = null;
$custom_css = 'col-xl-9';
$custom_div = '<div class="col-xl-3"></div>';
}
@endphp

@if (!empty($post->post_content ?? ''))
<section id="sustainability" class="award-section fix section-padding inner-about">
    <div class="container">
        <div class="award-wrapper detail">
            <h2 class="title text_invert-2 wow fadeInUp">{{ $post->post_title ?? 'Sustainability' }}</h2>
            <div class="row">

                @if ($sustainability_image_url)
                <div class="col-xl-6">
                    <img src="{{ $sustainability_image_url }}" alt="{{ $post->post_title }}">
                </div>
                @endif

                @if ( !empty($custom_div) )
                {!! $custom_div !!}
                @endif

                @if (!empty($post->post_content))
                <div class="{{$custom_css}}">
                    <div class="section-title style-4">
                        {!! $post->post_content !!}
                    </div>
                </div>
                @endif


            </div>
        </div>
    </div>
</section>

@endif



@php
$sustainability_details = isset($metaData['sustainability_details'])
? unserialize($metaData['sustainability_details'])
: [];
@endphp


@if (!empty($sustainability_details) && count($sustainability_details) > 0)
<section class="project-section tp-project-5-2-area fix section-padding section-bg-2">

    <div class="container">
        <div class="project-box-area des-portfolio-wrap">

            @foreach ($sustainability_details as $item)
            @php
            $media = MediaHelper::getImageById($item['image']);

            if (!empty($media) && !empty($media->file_name)) {
            $image_url = asset('storage/' . $media->file_name);
            } else {
            $image_url = asset('assets/img/commitment.jpg');
            }
            @endphp
            <div class="project-box-items des-portfolio-panel" id="{{ Str::slug($item['title']) }}">
                <div class="content">

                    @isset($item['title'])
                    <h3>
                        {{ $item['title'] }}
                    </h3>
                    @endisset

                    @isset($item['description'])
                    
                        {!! $item['description'] !!}
                    
                    @endisset

                </div>

                @isset($image_url)
                <div class="thumb">
                    <img src="{{ $image_url }}" alt="{{ $item['title'] }}">
                </div>
                @endisset


            </div>
            @endforeach

        </div>
    </div>
</section>
@endif


@include('frontend.partials.cta-section')


@push('frontend-js')
<script>
    $(document).ready(function() {
        if (typeof gsap === 'undefined') {
            console.warn('GSAP is not defined. Skipping sticky navigation logic.');
            return;
        }

        gsap.registerPlugin(ScrollTrigger, ScrollToPlugin);

        const tabs = document.querySelector(".sticky-tabs-wrapper");
        const mainHeader = document.querySelector("#header-sticky");

        if (tabs) {
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
                if (!href || !href.startsWith('#')) return;
                try {
                    const element = document.querySelector(href);
                    if (!element) return;
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

            links.forEach(a => {
                a.addEventListener("click", e => {
                    e.preventDefault();
                    const target = a.getAttribute("href");
                    if (!target || !target.startsWith('#')) return;
                    const element = document.querySelector(target);
                    if (!element) return;

                    // Mark clicked tab active immediately
                    setActive(a);

                    const headerHeight = mainHeader ? mainHeader.offsetHeight : 0;
                    const tabsHeight = tabs.offsetHeight;
                    const offset = headerHeight + tabsHeight;

                    gsap.to(window, {
                        duration: 0.8,
                        scrollTo: {
                            y: target,
                            offsetY: offset
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