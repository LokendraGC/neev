@extends('frontend.layouts.app', ['payload' => $post, 'payloadMeta' => $metaData, 'title' => $post->post_title])

@section('main-section')
 
    @include('frontend.partials.breadcrumb-section')

    <section id="media-coverage" class="media-reports-section">
        <div class="media-filter-bar">
            <div class="container">
                <div class=" wow fadeInUp" data-wow-delay=".2s">
                    <form class="media-filter-form d-flex flex-wrap align-items-center gap-3">
                        <div class="media-filter-select">
                            <select class="single-select media-filter-dropdown" name="sector">
                                <option value="">Sector</option>
                                <option value="hospitality">Hospitality & Tourism</option>
                                <option value="agro">Agro Industry</option>
                                <option value="renewable">Renewable Energy</option>
                            </select>
                        </div>
                        <div class="media-filter-select">
                            <select class="single-select media-filter-dropdown" name="company">
                                <option value="">Company</option>
                                <option value="neev">Neev Corporation</option>
                                <option value="metro">Metro Hospitality</option>
                                <option value="ncagro">NC Agro Tech</option>
                                <option value="metro-dubar">Metro Dubar</option>
                            </select>
                        </div>
                        <div class="media-filter-select">
                            <select class="single-select media-filter-dropdown" name="year">
                                <option value="">Year</option>
                                <option value="2026">2026</option>
                                <option value="2025">2025</option>
                                <option value="2024">2024</option>
                                <option value="2023">2023</option>
                            </select>
                        </div>
                        <button type="submit" class="media-filter-btn theme-btn">
                            <div class="btn_inner">
                                <div class="btn_text"><span>Filter</span></div>
                            </div>
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="section-padding">
            <div class="container">


                <div class="row g-4">
                    <div class="col-lg-3 col-md-6 media-coverage-item wow fadeInUp" data-sector="hospitality"
                        data-company="neev" data-year="2026">
                        <div class="media-report-card">

                            <h2 class="media-report-title"><a hred="">Neev Hospitality Expansion in Kathmandu</a>
                            </h2>
                            <div class="media-report-meta">
                                <span class="media-report-date">11 February, 2026</span>
                                <span class="media-report-source">The Himalayan Times</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 media-coverage-item wow fadeInUp" data-sector="agro" data-company="ncagro"
                        data-year="2026">
                        <div class="media-report-card">

                            <h4 class="media-report-title"><a hred="">NC Agro Tech Farm Initiative Launch</a></h4>
                            <div class="media-report-meta">
                                <span class="media-report-date">2 February, 2026</span>
                                <span class="media-report-source">Kantipur</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 media-coverage-item wow fadeInUp" data-sector="renewable"
                        data-company="neev" data-year="2025">
                        <div class="media-report-card">

                            <h4 class="media-report-title"><a hred="">Renewable Energy Investment Report</a></h4>
                            <div class="media-report-meta">
                                <span class="media-report-date">9 December, 2025</span>
                                <span class="media-report-source">Republica</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 media-coverage-item wow fadeInUp" data-sector="hospitality"
                        data-company="metro" data-year="2025">
                        <div class="media-report-card">

                            <h4 class="media-report-title"><a hred="">Metro Hospitality Annual Milestone</a></h4>
                            <div class="media-report-meta">
                                <span class="media-report-date">15 November, 2025</span>
                                <span class="media-report-source">Business 360</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 media-coverage-item wow fadeInUp" data-sector="agro" data-company="neev"
                        data-year="2024">
                        <div class="media-report-card">

                            <h4 class="media-report-title"><a hred="">Agro Industry Growth in Nepal</a></h4>
                            <div class="media-report-meta">
                                <span class="media-report-date">8 October, 2024</span>
                                <span class="media-report-source">The Kathmandu Post</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 media-coverage-item wow fadeInUp" data-sector="renewable"
                        data-company="neev" data-year="2024">
                        <div class="media-report-card">

                            <h4 class="media-report-title"><a hred="">Solar Energy Project Update</a></h4>
                            <div class="media-report-meta">
                                <span class="media-report-date">22 August, 2024</span>
                                <span class="media-report-source">Invest Nepal</span>
                            </div>
                        </div>
                    </div>
                </div>
                <nav class="media-reports-pagination mt-5 wow fadeInUp" aria-label="Media reports pagination">
                    <ul class="pagination justify-content-center gap-2">
                        <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1"><i
                                    class="fa-solid fa-chevron-left"></i></a></li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">...</a></li>
                        <li class="page-item"><a class="page-link" href="#">6</a></li>
                        <li class="page-item"><a class="page-link" href="#"><i
                                    class="fa-solid fa-chevron-right"></i></a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </section>

    @include('frontend.partials.cta-section')
@endsection
