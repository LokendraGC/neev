@extends('frontend.layouts.app', ['payload' => $post, 'payloadMeta' => $postMeta, 'title' => $post->post_title])

@section('main-section')
    <div class="breadcrumb-wrapper bg-cover"
        style="background-image: url('{{ asset('assets/img/home-1/project/bread-bg.png') }}');">
        <div class="hero-dark-overlay"></div>
        <div class="container">
            <div class="page-heading">
                <div class="breadcrumb-sub-title">
                    <h1 class="text-white wow fadeInUp" data-wow-delay=".3s">Stories</h1>
                    <p>Hospitality Portfolio - Metro Hospitality</p>
                </div>
            </div>
        </div>
    </div>

    <div class="breadcrumb-new">
        <div class="container">
            <div class="page-heading">
                <ul class="breadcrumb-items wow fadeInUp" data-wow-delay=".5s">
                    <li><a href="index.html">Home</a></li>
                    <li>/</li>
                    <li><a href="media.html">Media</a></li>
                    <li>/</li>
                    <li><a href="news.html">Stories</a></li>
                    <li>/</li>
                    <li>Hospitality Portfolio</li>
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
                            <p class="wow fadeInUp"
                                style="font-size: 17px; line-height: 1.75; margin-bottom: 28px; color: var(--text);">Neev
                                Corporation has also collaborated with partners to launch a portfolio of hospitality
                                ventures across Nepal. Our properties blend contemporary design with authentic Nepali
                                warmth, offering guests experiences that are globally refined and locally rooted.</p>
                            <h2 id="venture-overview" class="wow fadeInUp"
                                style="font-size: 28px; font-weight: 700; margin-bottom: 24px; color: var(--header);">
                                Hospitality portfolio</h2>
                            <ul class="story-portfolio-list">
                                <li class="wow fadeInUp">
                                    <span class="venture-name">Metro Hospitality:</span>
                                    <p class="venture-desc">Metro Hospitality is Neev Corporation's flagship hospitality
                                        brand, operating premium properties in Kathmandu. The brand combines international
                                        standards with Nepali hospitality, offering discerning travellers and business
                                        guests world-class accommodation, dining, and wellness experiences in the heart of
                                        Nepal.</p>
                                </li>
                                <li class="wow fadeInUp">
                                    <span class="venture-name">Metro Dubar:</span>
                                    <p class="venture-desc">Metro Dubar brings the warmth and sophistication of traditional
                                        Nepali hospitality to modern travellers. Located in key destinations, it offers
                                        guests an authentic experience—blending heritage design, locally sourced cuisine,
                                        and genuine Nepali service that reflects the best of our culture.</p>
                                </li>
                                <li class="wow fadeInUp">
                                    <span class="venture-name">NC Agro Farm Stay:</span>
                                    <p class="venture-desc">NC Agro Farm Stay offers a unique agritourism experience,
                                        connecting guests with Nepal's rich agricultural heritage. Visitors enjoy
                                        farm-to-table dining, hands-on experiences, and stays that support local farming
                                        communities while showcasing sustainable practices.</p>
                                </li>
                                <li class="wow fadeInUp">
                                    <span class="venture-name">Solar Lodge:</span>
                                    <p class="venture-desc">Solar Lodge is an eco-friendly accommodation initiative, powered
                                        by renewable energy and designed for sustainability-minded travellers. It
                                        demonstrates Neev Corporation's commitment to responsible tourism and clean energy
                                        across the hospitality sector.</p>
                                </li>
                            </ul>
                            <p class="wow fadeInUp"
                                style="font-size: 16px; line-height: 1.7; margin-top: 32px; color: var(--text);">Neev
                                Corporation continues to expand its hospitality footprint across Nepal and the wider region,
                                with a focus on sustainable growth, community engagement, and world-class guest experiences.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-12">
                        <div class="gt-main-sideber sticky-style story-sticky-sidebar">
                            <div class="story-sidebar-address">
                                <strong>Head Office</strong><br>
                                Redcross Marg, Soalteemode, Kathmandu, Nepal
                            </div>
                            <div class="story-stay-updated">
                                <h3>Stay Updated</h3>
                                <p style="font-size: 14px; color: var(--text); margin-bottom: 16px;">Follow us on social
                                    media for the latest news and updates.</p>
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
