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
              
              @if(!empty($post->post_content))
                <li><a href="#investors" class="active">Description</a></li>
                @endif

                @if(!empty($metaData['investor_relations_title']) || !empty($metaData['investor_relations_description']) || !empty($metaData['investor_relations_featured_image']))
                <li><a href="#investor-relations">Investor Relations</a></li>
                @endif

                @if(!empty($metaData['subsidiaries_associates_title']) || !empty($metaData['subsidiaries_associates_description']) || !empty($metaData['subsidiaries_associates_featured_image']))
                <li><a href="#subsidiaries">Subsidiaries & Associates</a></li>
                @endif

            </ul>
        </div>
    </nav>

    <section id="investors" class="award-section fix section-padding">
        <div class="container">
            <div class="award-wrapper detail">
                <h2 class="title text_invert-2 wow fadeInUp">{{ $post->post_title }}</h2>
                <div class="row">
                    <div class="col-xl-3"></div>
                    <div class="col-xl-9">
                        <div class="section-title style-4">
                            {!! $post->post_content !!}


                            @isset($metaData['investors_details'])
                                @php
                                    $investorsDetails = unserialize($metaData['investors_details']);
                                    $count = 1;

                                @endphp
                                <div class="row g-3 mb-4">

                                    @foreach ($investorsDetails as $index => $item)
                                        @php
                                            $delay = $loop->index * 0.15;

                                            if ($loop->index == 0) {
                                                $icon = 'building';
                                            } elseif ($loop->index == 1) {
                                                $icon = 'users';
                                            } elseif ($loop->index == 2) {
                                                $icon = 'globe';
                                            } else {
                                                $icon = 'building';
                                            }
                                        @endphp
                                        <div class="col-md-4 wow fadeInUp" data-wow-delay="{{ $delay }}s">
                                            <div class="d-flex align-items-center gap-3 p-3 rounded-3 border">

                                                @php
                                                    $image_url = null; // IMPORTANT reset

                                                    $image = !empty($item['image'])
                                                        ? MediaHelper::getImageById($item['image'])
                                                        : null;

                                                    if (!empty($image) && !empty($image->file_name)) {
                                                        $image_url = asset('storage/' . $image->file_name);
                                                    }
                                                @endphp

                                                @if (!empty($image_url))
                                                    <div class="flex-shrink-0">
                                                        <img src="{{ $image_url }}" alt="{{ $item['title'] }}"
                                                            class="img-fluid">
                                                    </div>
                                                @else
                                                    <div class="flex-shrink-0">
                                                        <i class="fa-solid fa-{{ $icon }} fa-2x"
                                                            style="color: var(--theme);"></i>
                                                    </div>
                                                @endif


                                                <div>
                                                    <h6 class="mb-0">{{ $item['title'] }}</h6><small
                                                        class="text-muted">{{ $item['sub_title'] }}</small>
                                                </div>
                                            </div>
                                        </div>

                                        @php
                                            $count++;
                                        @endphp
                                    @endforeach


                                </div>
                            @endisset




                            {!! $metaData['investors_details_description'] ?? '' !!}



                            @isset($metaData['partner_details'])
                                @php
                                    $partnerDetails = unserialize($metaData['partner_details']);
                                    $count = 1;

                                @endphp
                                <div class="row g-3">



                                    @foreach ($partnerDetails as $index => $item)
                                        @php
                                            $delay = $loop->index * 0.15;

                                            if ($loop->index == 0) {
                                                $icon = 'sitemap';
                                            } elseif ($loop->index == 1) {
                                                $icon = 'handshake';
                                            } elseif ($loop->index == 2) {
                                                $icon = 'chart-pie';
                                            } else {
                                                $icon = 'link';
                                            }
                                        @endphp

                                        @php
                                            $image_url = null; // IMPORTANT reset

                                            $image = !empty($item['image'])
                                                ? MediaHelper::getImageById($item['image'])
                                                : null;

                                            if (!empty($image) && !empty($image->file_name)) {
                                                $image_url = asset('storage/' . $image->file_name);
                                            }
                                        @endphp

                                        <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay=".35s">
                                            <div class="text-center p-4 rounded-3 border h-100">



                                                @if (!empty($image_url))
                                                    <img src="{{ $image_url }}" alt="{{ $item['title'] }}" class="img-fluid">
                                                @else
                                                    <i class="fa-solid fa-{{ $icon }} fa-2x mb-3 d-block"
                                                        style="color: var(--theme);"></i>
                                                @endif


                                                <h6 class="mb-1">{{ $item['title'] }}</h6>
                                                <small class="text-muted">{{ $item['sub_title'] }}</small>
                                            </div>
                                        </div>
                                        @php
                                            $count++;
                                        @endphp
                                    @endforeach


                                </div>
                            @endisset



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @php
        $investor_relations_title = $metaData['investor_relations_title'];
        $investor_relations_description = $metaData['investor_relations_description'];
        $investor_relations_featured_image = $metaData['investor_relations_featured_image'];
        $investor_relations_featured_image_media = MediaHelper::getImageById($investor_relations_featured_image);

        if (
            !empty($investor_relations_featured_image_media) &&
            !empty($investor_relations_featured_image_media->file_name)
        ) {
            $investor_relations_featured_image_url = asset(
                'storage/' . $investor_relations_featured_image_media->file_name,
            );
        } else {
            $investor_relations_featured_image_url = asset('assets/img/home-1/project/hospitality.png');
        }
    @endphp

    @if (
        !empty($investor_relations_title) ||
            !empty($investor_relations_description) ||
            !empty($investor_relations_featured_image_url))
        <section id="investor-relations" class="award-section fix section-padding section-bg-5">
            <div class="container">
                <div class="award-wrapper detail">



                    <div class="row align-items-center g-4">

                        @if (!empty($investor_relations_featured_image_url))
                            <div class="col-xl-4">
                                <img src="{{ $investor_relations_featured_image_url }}"
                                    alt="{{ $investor_relations_title }}" class="rounded-3 w-100">
                            </div>
                        @endif

                        @if (!empty($investor_relations_description))
                            <div class="col-xl-8">
                                @if (!empty($investor_relations_title))
                                    <h2 class="title text_invert-2 wow fadeInUp">{{ $investor_relations_title }}</h2>
                                @endif

                                <p class="tx-title sec_title tz-itm-title tz-itm-anim">
                                    {!! $investor_relations_description !!}
                                </p>
                            </div>
                        @endif


                    </div>
                </div>
            </div>
        </section>
    @endif


    @php
        $subsidiaries_associates_title = $metaData['subsidiaries_associates_title'];
        $subsidiaries_associates_description = $metaData['subsidiaries_associates_description'];
        $subsidiaries_associates_featured_image = $metaData['subsidiaries_associates_featured_image'];
        $subsidiaries_associates_featured_image_media = MediaHelper::getImageById(
            $subsidiaries_associates_featured_image,
        );

        if (
            !empty($subsidiaries_associates_featured_image_media) &&
            !empty($subsidiaries_associates_featured_image_media->file_name)
        ) {
            $subsidiaries_associates_featured_image_url = asset(
                'storage/' . $subsidiaries_associates_featured_image_media->file_name,
            );
        } else {
            $subsidiaries_associates_featured_image_url = asset('assets/img/home-1/project/hospitality.png');
        }
    @endphp

    @if (
        !empty($subsidiaries_associates_title) ||
            !empty($subsidiaries_associates_description) ||
            !empty($subsidiaries_associates_featured_image_url))
        <section id="subsidiaries" class="award-section fix section-padding section-bg-5">
            <div class="container">
                <div class="award-wrapper detail">

                    <div class="row align-items-center g-4">

                        @if (!empty($subsidiaries_associates_featured_image_url))
                            <div class="col-xl-4">
                                <img src="{{ $subsidiaries_associates_featured_image_url }}"
                                    alt="{{ $subsidiaries_associates_title }}" class="rounded-3 w-100">
                            </div>
                        @endif

                        @if (!empty($subsidiaries_associates_description))
                            <div class="col-xl-8">
                                @if (!empty($subsidiaries_associates_title))
                                    <h2 class="title text_invert-2 wow fadeInUp">{{ $subsidiaries_associates_title }}</h2>
                                @endif

                                <p class="tx-title sec_title tz-itm-title tz-itm-anim">
                                    {!! $subsidiaries_associates_description !!}
                                </p>
                            </div>
                        @endif


                    </div>
                </div>
            </div>
        </section>
    @endif


    @include('frontend.partials.cta-section')

    @push('frontend-js')
        <script>
            $(document).ready(function() {
                gsap.registerPlugin(ScrollTrigger, ScrollToPlugin);
                const tabs = document.querySelector(".sticky-tabs-wrapper");
                const mainHeader = document.querySelector("#header-sticky");
                if (tabs && mainHeader) {
                    ScrollTrigger.create({
                        trigger: tabs,
                        start: () => `top-=${mainHeader.offsetHeight} top`,
                        endTrigger: "html",
                        end: "max",
                        pin: true,
                        pinSpacing: false,
                        addClass: "is-stuck"
                    });
                    const links = gsap.utils.toArray(".tab-nav-list a");
                    links.forEach(a => {
                        const element = document.querySelector(a.getAttribute("href"));
                        if (!element) return;
                        ScrollTrigger.create({
                            trigger: element,
                            start: "top center",
                            end: "bottom center",
                            onEnter: () => setActive(a),
                            onEnterBack: () => setActive(a),
                        });
                    });

                    function setActive(link) {
                        links.forEach(el => el.classList.remove("active"));
                        link.classList.add("active");
                    }
                    links.forEach(a => {
                        a.addEventListener("click", e => {
                            e.preventDefault();
                            const target = a.getAttribute("href");
                            const offset = mainHeader.offsetHeight + tabs.offsetHeight;
                            gsap.to(window, {
                                duration: 1,
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
