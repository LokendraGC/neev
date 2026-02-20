@extends('frontend.layouts.app', ['payload' => $post, 'payloadMeta' => $metaData, 'title' => $post->post_title])

@section('main-section')
    
    @include('frontend.partials.breadcrumb-section')


                <nav class="sticky-tabs-wrapper">
                    <div class="container">
                        <ul class="tab-nav-list">
                            <li><a href="#investors" class="active">Description</a></li>
                            <li><a href="#investor-relations">Investor Relations</a></li>
                            <li><a href="#shareholder-info">Shareholder Information</a></li>
                            <li><a href="#subsidiaries">Subsidiaries & Associates</a></li>
                            <li><a href="#resource-center">Resource Center</a></li>
                        </ul>
                    </div>
                </nav>

                <section id="investors" class="award-section fix section-padding">
                    <div class="container">
                        <div class="award-wrapper detail">
                            <h2 class="title text_invert-2 wow fadeInUp">Investors</h2>
                            <div class="row">
                                <div class="col-xl-3"></div>
                                <div class="col-xl-9">
                                    <div class="section-title style-4">
                                        <p class="tx-title sec_title tz-itm-title tz-itm-anim wow fadeInUp" data-wow-delay=".1s">Neev Corporation welcomes investment from a broad base of stakeholders, including corporate investors, individual investors, and foreign direct investment (FDI) partners. By offering transparent structures, professionally managed projects, and clearly defined growth objectives, the Corporation seeks to create mutually beneficial opportunities that align investor returns with national development priorities and sustainable business practices.</p>
                                        <div class="row g-3 mb-4">
                                            <div class="col-md-4 wow fadeInUp" data-wow-delay=".15s">
                                                <div class="d-flex align-items-center gap-3 p-3 rounded-3 border">
                                                    <div class="flex-shrink-0"><i class="fa-solid fa-building fa-2x" style="color: var(--theme);"></i></div>
                                                    <div><h6 class="mb-0">Corporate Investors</h6><small class="text-muted">Institutional capital</small></div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 wow fadeInUp" data-wow-delay=".2s">
                                                <div class="d-flex align-items-center gap-3 p-3 rounded-3 border">
                                                    <div class="flex-shrink-0"><i class="fa-solid fa-users fa-2x" style="color: var(--theme);"></i></div>
                                                    <div><h6 class="mb-0">Individual Investors</h6><small class="text-muted">Personal participation</small></div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 wow fadeInUp" data-wow-delay=".25s">
                                                <div class="d-flex align-items-center gap-3 p-3 rounded-3 border">
                                                    <div class="flex-shrink-0"><i class="fa-solid fa-globe fa-2x" style="color: var(--theme);"></i></div>
                                                    <div><h6 class="mb-0">Foreign Direct Investment</h6><small class="text-muted">FDI partners</small></div>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="tx-title sec_title tz-itm-title tz-itm-anim wow fadeInUp" data-wow-delay=".3s">Neev Corporation's investment strategy is structured to support sustainable growth through diversified and flexible participation models, including subsidiaries, joint ventures, equity participation, and strategic partnerships. This approach enables the Corporation to collaborate with domestic and international partners while maintaining strong governance, operational efficiency, and long-term value creation across its core business sectors.</p>
                                        <div class="row g-3">
                                            <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay=".35s">
                                                <div class="text-center p-4 rounded-3 border h-100">
                                                    <i class="fa-solid fa-sitemap fa-2x mb-3 d-block" style="color: var(--theme);"></i>
                                                    <h6 class="mb-1">Subsidiary</h6>
                                                    <small class="text-muted">Owned ventures</small>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay=".4s">
                                                <div class="text-center p-4 rounded-3 border h-100">
                                                    <i class="fa-solid fa-handshake fa-2x mb-3 d-block" style="color: var(--theme);"></i>
                                                    <h6 class="mb-1">Joint Venture</h6>
                                                    <small class="text-muted">Collaborative ventures</small>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay=".45s">
                                                <div class="text-center p-4 rounded-3 border h-100">
                                                    <i class="fa-solid fa-chart-pie fa-2x mb-3 d-block" style="color: var(--theme);"></i>
                                                    <h6 class="mb-1">Equity Participation</h6>
                                                    <small class="text-muted">Shareholding models</small>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay=".5s">
                                                <div class="text-center p-4 rounded-3 border h-100">
                                                    <i class="fa-solid fa-link fa-2x mb-3 d-block" style="color: var(--theme);"></i>
                                                    <h6 class="mb-1">Strategic Partnership</h6>
                                                    <small class="text-muted">Long-term alliances</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section id="investor-relations" class="award-section fix section-padding section-bg-5">
                    <div class="container">
                        <div class="award-wrapper detail">
                            <h2 class="title text_invert-2 wow fadeInUp">Investor Relations</h2>
                            <div class="row align-items-center g-4">
                                <div class="col-xl-4">
                                    <img src="{{ asset('assets/img/home-1/project/hospitality.png') }}" alt="Investor Relations" class="rounded-3 w-100">
                                </div>
                                <div class="col-xl-8">
                                    <p class="tx-title sec_title tz-itm-title tz-itm-anim">Neev Corporation is committed to transparency and building strong relationships with our investors. As we open to public investment, everyone has the opportunity to become a part-owner in ventures that deliver real, sustainable value. Contact us for investor inquiries.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

    @include('frontend.partials.cta-section')
@endsection
