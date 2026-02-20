@extends('frontend.layouts.app', ['payload' => $post, 'payloadMeta' => $metaData, 'title' => $post->post_title])

@section('main-section')
    
    @include('frontend.partials.breadcrumb-section')

    <nav class="sticky-tabs-wrapper">
        <div class="container">
            <ul class="tab-nav-list">
                <li><a href="#about-us" class="active">About Us</a></li>
                <li><a href="#vision-values">Vision</a></li>
                <li><a href="#mission">Mission</a></li>
                <li><a href="#leadership">Board of Director</a></li>
                <li><a href="#management-team">Management Team</a></li>
                <li><a href="#our-location">Our Location</a></li>
            </ul>
        </div>
    </nav>

    <!-- About Us Section Start -->
    <section id="about-us" class="award-section fix section-padding inner-about">
        <div class="container">
            <div class="award-wrapper detail">
                <h2 class="title text_invert-2 wow fadeInUp">About Us</h2>
                <div class="row">
                    <div class="col-xl-6">
                        <img src="{{ asset('assets/img/home-1/project/hospitality.png') }}">
                    </div>
                    <div class="col-xl-6">
                        <div class="section-title style-4">
                            <p>Neev Corporation is one of the leading investment companies in Nepal, committed in building a
                                strong foundation for sustainable and meaningful growth. Backed by its strong team of
                                experts and professionals, the Corporation has built a robust and resilient business
                                portfolio over the years.</p>
                            <p>The corporation aims to build a sustainable business model, giving utmost priority to locally
                                produced resource and services through its investment in Hospitality & Tourism,
                                Agro-Industry and Solar Energy sectors. The Corporation believes in investing in
                                opportunities that have strong roots in the soil of Nepal and have the strength to
                                contribute to a better future.</p>
                            <p>In the hospitality & tourism industry, the Corporation not only aims to redefine standards by
                                offering a world-class service at an affordable cost but also aims to make these exceptional
                                experiences closer to home, making them accessible to local communities in every corner of
                                the country.</p>
                            <p>In agro-industry business segment, the Corporation emphasizes on using agro-tech based
                                innovation in the production of organic and hygienic food products tailored for the Nepali
                                market. Finally, as a dedicated corporation marching towards sustainable future, the
                                Corporation feels proud to invest in promoting clean and renewable power solutions for
                                Nepal.</p>
                            <p>Through its diverse investment segments and service, the Corporation is committed to play a
                                meaningful role in Nepal's economic development while supporting sustainability and
                                self-reliance.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Vision & Values Section Start -->
    <section id="vision-values" class="award-section fix section-padding section-bg-5">
        <div class="container">
            <div class="award-wrapper detail">
                <h2 class="title text_invert-2 wow fadeInUp">Vision & Values</h2>
                <div class="row g-4">
                    <div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".2s">
                        <div class="vision-mission-card h-100">
                            <div class="thumb mb-4">
                                <img src="{{ asset('assets/img/home-1/project/hospitality.png') }}" alt="Our Vision"
                                    class="img-fluid rounded">
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".2s">
                        <div class="vision-mission-card h-100">
                            <p>To transform Nepal through sustainable, innovative businesses that deliver world-class
                                experiences, empower local communities, and drive long-term prosperity.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </section>

    <section id="mission" class="award-section fix section-padding section-bg-5">
        <div class="container">
            <div class="award-wrapper detail">
                <h2 class="title text_invert-2 wow fadeInUp">Our Mission</h2>
                <div class="row g-4">
                    <div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".3s">

                        <p>To create and operate sustainable, innovative businesses that provide exceptional experiences,
                            support and uplift local communities, and foster economic growth throughout Nepal.</p>
                    </div>

                    <div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".3s">
                        <div class="vision-mission-card h-100">
                            <div class="thumb mb-4">
                                <img src="{{ asset('assets/img/home-1/project/solar.png') }}" alt="Our Mission" class="img-fluid rounded">
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <!-- Board of Director Section Start - Old Design with Popup -->
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
                                <h2 class="text-anim">Board of Director</h2>
                            </div>
                            <div class="col-lg-8">
                                <p>With over 15 years of proven experience, Neev Corporation has successfully managed
                                    ventures like Metro Hospitality and other thriving businesses. Guided by a strong Board
                                    of Directors and Management Team, we combine operational excellence with strategic
                                    vision. As we open to public investment, everyone has the opportunity to become a
                                    part-owner in ventures that deliver real, sustainable value. Our Board of Director
                                    ensures growth, transparency, and a future-focused approach that benefits all
                                    stakeholders.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="row g-4 justify-content-center">
                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".3s">
                            <div class="team-box-item-3">
                                <a href="#teamModal1" class="team-popup-trigger team-popup-open">
                                    <div class="thumb">
                                        <img src="{{ asset('assets/img/home-3/team/team-01.jpg') }}" alt="Mr. Yagya Murti Neupane">
                                    </div>
                                    <div class="content">
                                        <h3>Mr. Yagya Murti Neupane</h3>
                                        <p>Chairperson</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".5s">
                            <div class="team-box-item-3">
                                <a href="#teamModal2" class="team-popup-trigger team-popup-open">
                                    <div class="thumb">
                                        <img src="{{ asset('assets/img/home-3/team/team-02.jpg') }}" alt="CA Krishna Ranabhat">
                                    </div>
                                    <div class="content">
                                        <h3>CA Krishna Ranabhat</h3>
                                        <p>Chartered Accountant</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".3s">
                            <div class="team-box-item-3">
                                <a href="#teamModal3" class="team-popup-trigger team-popup-open">
                                    <div class="thumb">
                                        <img src="{{ asset('assets/img/home-3/team/team-03.jpg') }}" alt="Mr. Yubraj Nepal">
                                    </div>
                                    <div class="content">
                                        <h3>Mr. Yubraj Nepal</h3>
                                        <p>Business Leader</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Member Popups (Magnific Popup inline) -->
    <div id="teamModal1" class="team-popup-content mfp-hide">
        <div class="team-popup-inner">
            <button type="button" class="mfp-close team-popup-close" aria-label="Close">×</button>
            <div class="team-popup-header">
                <h5>Mr. Yagya Murti Neupane</h5>
            </div>
            <div class="team-popup-body">
                <div class="d-flex gap-4 flex-md-row flex-column">
                    <img src="{{ asset('assets/img/home-3/team/team-01.jpg') }}" alt="Mr. Yagya Murti Neupane"
                        class="rounded flex-shrink-0" style="width: 180px; height: 200px; object-fit: cover;">
                    <div>
                        <p class="text-muted mb-3">Chairman</p>
                        <p>Mr. Yagya Murti Neupane is a visionary business leader with over 30 years of entrepreneurial and
                            managerial expertise spanning hospitality & tourism, agriculture, import–export, and
                            manufacturing. As Chairman of Neev Corporation, he has guided the company toward
                            innovation-driven, sustainable, and inclusive growth, by fostering local resources and
                            expertise.</p>
                        <p>Beyond Neev Corporation, Mr. Neupane is the Chairman of NC Agro Tech, and Proprietor of Jems
                            Readymade Udhyog in Kathmandu, contributing significantly to Nepal's manufacturing and
                            agro-industry sector. Renowned for his strategic insight, integrity, and practical wisdom, he
                            has a proven track record of leading diverse business portfolios with excellence while driving
                            measurable impact, empowering communities, and fostering long-term sustainable growth.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="teamModal2" class="team-popup-content mfp-hide">
        <div class="team-popup-inner">
            <button type="button" class="mfp-close team-popup-close" aria-label="Close">×</button>
            <div class="team-popup-header">
                <h5>CA Krishna Ranabhat</h5>
            </div>
            <div class="team-popup-body">
                <div class="d-flex gap-4 flex-md-row flex-column">
                    <img src="{{ asset('assets/img/home-3/team/team-02.jpg') }}" alt="CA Krishna Ranabhat" class="rounded flex-shrink-0"
                        style="width: 180px; height: 200px; object-fit: cover;">
                    <div>
                        <p class="text-muted mb-3">Chartered Accountant</p>
                        <p>Mr. Krishna Ranabhat is a distinguished Chartered Accountant and strategic business leader with
                            over 14 years of experience across Nepal's core economic sectors, including hydropower,
                            hospitality, manufacturing, healthcare, IT, and agriculture. With deep expertise in accountancy,
                            auditing, taxation, corporate finance, business valuation, and FDI strategy, he combines
                            financial acumen with operational excellence and strategic vision, making him a trusted advisor
                            and effective leader in both public and private ventures.</p>
                        <p>At Neev Corporation, Mr. Ranabhat drives the company's strategic direction, governance, and
                            operational growth, ensuring robust financial discipline, risk management, and scalable
                            expansion of priority sectors, from improving farm-level productivity to increasing market
                            access to ensuring high standard in hospitality sector. Beyond Neev Corporation, he contributes
                            to organizational growth and innovation as a board member of Eastern Sahara Co. Ltd and NC Agro
                            Tech. Renowned for his integrity, foresight, and results-driven Board of Director, Mr. Ranabhat
                            has played a pivotal role in aligning business objectives with national development priorities
                            and sustainable practices, strengthening financial resilience, and advancing long-term impact in
                            Nepal's economy sector.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="teamModal3" class="team-popup-content mfp-hide">
        <div class="team-popup-inner">
            <button type="button" class="mfp-close team-popup-close" aria-label="Close">×</button>
            <div class="team-popup-header">
                <h5>Mr. Yubraj Nepal</h5>
            </div>
            <div class="team-popup-body">
                <div class="d-flex gap-4 flex-md-row flex-column">
                    <img src="{{ asset('assets/img/home-3/team/team-03.jpg') }}" alt="Mr. Yubraj Nepal" class="rounded flex-shrink-0"
                        style="width: 180px; height: 200px; object-fit: cover;">
                    <div>
                        <p class="text-muted mb-3">Business Leader</p>
                        <p>Yubraj Nepal is a seasoned business leader with over 16 years of experience driving growth and
                            innovation across Nepal's tech industry, manufacturing industry, business development, and
                            innovation sectors. Renowned for his strategic insight and forward-looking approach, he has
                            played a pivotal role in shaping the trajectory of multiple businesses, fostering operational
                            excellence, and creating scalable growth opportunities in Nepal's evolving market landscape.</p>
                        <p>Throughout his career, Yubraj has focused on leveraging technology and innovative strategies to
                            strengthen organizational performance, expand market reach, and deliver sustainable business
                            outcomes. His Board of Director is defined by a commitment to excellence, value creation, and
                            empowering teams to achieve ambitious goals, making him a trusted figure in Nepal's business and
                            entrepreneurial community.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Management Team Section Start -->
    <section id="management-team" class="team-section-3 fix section-padding section-bg-5">
        <div class="line-shape">
            <img src="{{ asset('assets/img/home-3/team/line-shape.png') }}" alt="img">
        </div>
        <div class="container">
            <div class="section-title style-5 text-center mb-5">
                <h6 class="sub-title wow fadeInUp">Our People</h6>
                <h2 class="text-anim wow fadeInUp" data-wow-delay=".2s">Management Team</h2>
                <p class="mt-3 wow fadeInUp" data-wow-delay=".3s">Experts, Professionals</p>
            </div>
            <div class="row g-4 justify-content-center">
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay=".2s">
                    <div class="management-team-card">
                        <div class="thumb">
                            <img src="{{ asset('assets/img/home-3/team/team-01.jpg') }}" alt="Rajesh Shrestha">
                        </div>
                        <div class="content">
                            <h4>Rajesh Shrestha</h4>
                            <p>Chief Operations Officer</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay=".3s">
                    <div class="management-team-card">
                        <div class="thumb">
                            <img src="assets/img/home-3/team/team-02.jpg" alt="Sita Adhikari">
                        </div>
                        <div class="content">
                            <h4>Sita Adhikari</h4>
                            <p>Head of Hospitality & Tourism</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay=".4s">
                    <div class="management-team-card">
                        <div class="thumb">
                            <img src="assets/img/home-3/team/team-03.jpg" alt="Bimal Thapa">
                        </div>
                        <div class="content">
                            <h4>Bimal Thapa</h4>
                            <p>Head of Agro Business</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay=".5s">
                    <div class="management-team-card">
                        <div class="thumb">
                            <img src="assets/img/home-3/team/team-01.jpg" alt="Anita Pandey">
                        </div>
                        <div class="content">
                            <h4>Anita Pandey</h4>
                            <p>Head of Solar Energy</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Location Section Start - Image at top, text below (Golyan Group style) -->
    <section id="our-location" class="section-padding">
        <div class="container">
            <div class="section-title style-5 text-center mb-5">
                <h6 class="sub-title wow fadeInUp">Nationwide Presence</h6>
                <h2 class="text-anim wow fadeInUp" data-wow-delay=".2s">Our Location</h2>
            </div>
            <div class="location-content">
                <div class="row g-4 align-items-center">
                    <div class="col-lg-12 wow fadeInUp" data-wow-delay=".5s">
                        <div class="location-image">
                            <img src="assets/img/map.png" alt="Neev Corporation Nationwide" class="img-fluid rounded">
                        </div>
                    </div>
                    <div class="col-lg-12 wow fadeInUp" data-wow-delay=".4s">
                        <div>
                            <p>We operate in all provinces of Nepal with a strong commitment to sourcing at the local level
                                and serving communities locally. By working closely with local producers, suppliers, and
                                partners, we aim to strengthen regional economies and promote sustainable growth.</p>
                            <p>Our nationwide presence enables us to deliver world-class products and services that meet
                                international standards while remaining responsive to local needs and preferences. Through
                                innovation, quality assurance, and customer-focused service, we strive to bridge local
                                resources with global-level excellence, ensuring value, reliability, and long-term impact
                                for our customers and stakeholders across Nepal.</p>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </section>

    @include('frontend.partials.cta-section')
@endsection
