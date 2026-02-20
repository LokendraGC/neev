@extends('frontend.layouts.app', ['payload' => $post, 'payloadMeta' => $metaData, 'title' => $post->post_title])

@section('main-section')
    @include('frontend.partials.breadcrumb-section')


    <nav class="sticky-tabs-wrapper">
        <div class="container">
            <ul class="tab-nav-list">
                <li><a href="#sustainability" class="active">Description</a></li>
                <li><a href="#our-commitment">Our Commitment</a></li>
                <li><a href="#local-community">Local Community</a></li>
                <li><a href="#responsible-business">Responsible Business</a></li>
            </ul>
        </div>
    </nav>

    <section id="sustainability" class="award-section fix section-padding">
        <div class="container">
            <div class="award-wrapper detail">
                <h2 class="title text_invert-2 wow fadeInUp">Sustainability</h2>
                <div class="row">
                    <div class="col-xl-3"></div>
                    <div class="col-xl-9">
                        <div class="section-title style-4">
                            <p>At Neev Corporation, sustainability is a core business principle that guides investment
                                decisions, operational practices, and long-term strategy. The Corporation is committed to
                                building enterprises that generate economic value while safeguarding environmental resources
                                and supporting inclusive social development. Across its diversified business
                                portfolio—spanning agro-industry, hospitality and tourism, and renewable energy—Neev
                                Corporation integrates responsible practices that balance growth with long-term resilience.
                            </p>
                            <p>Neev Corporation's sustainability approach is reinforced through disciplined governance,
                                transparent investment structures, and strategic partnerships, including subsidiaries, joint
                                ventures, equity participation, and foreign direct investment. By aligning business growth
                                with environmental stewardship and social responsibility, the Corporation aims to create
                                enduring value for investors, communities, and the national economy. Sustainability is not
                                treated as a separate objective but as an integrated foundation for decision-making,
                                ensuring that Neev Corporation's growth remains ethical, resilient, and aligned with Nepal's
                                long-term development goals.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="project-section tp-project-5-2-area fix section-padding section-bg-2">

        <div class="container">
            <div class="project-box-area des-portfolio-wrap">
                <div class="project-box-items des-portfolio-panel" id="our-commitment">
                    <div class="content">
                        <h3>
                            Our Commitment
                        </h3>
                        <p>Sustainability guides how we operate across hospitality, agriculture, and renewable energy,
                            ensuring positive impact for future generations.</p>
                    </div>
                    <div class="thumb">
                        <img src="{{ asset('assets/img/commitment.jpg') }}" alt="img">
                    </div>
                </div>
                <div class="project-box-items des-portfolio-panel" id="local-community">
                    <div class="content">
                        <h3>Local Community
                        </h3>
                        <p>We support local communities through employment, partnerships, and social development
                            initiatives.</p>
                    </div>
                    <div class="thumb">
                        <img src="{{ asset('assets/img/community.jpg') }}" alt="img">
                    </div>
                </div>
                <div class="project-box-items mb-0 des-portfolio-panel" id="responsible-business">
                    <div class="content">
                        <h3>
                            Responsible Business
                        </h3>
                        <p>We conduct our business with integrity, safety, and respect for people and the environment.</p>
                    </div>
                    <div class="thumb">
                        <img src="{{ asset('assets/img/business.jpg') }}" alt="img">
                    </div>
                </div>
            </div>
        </div>
    </section>


    @include('frontend.partials.cta-section')


    @push('frontend-scripts')
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
