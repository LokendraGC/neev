@extends('frontend.layouts.app', ['payload' => $post, 'payloadMeta' => $metaData, 'title' => $post->post_title])

@section('main-section')

@include('frontend.partials.breadcrumb-section', [
'title' => $post->post_title,
'excerpt' => $post->post_excerpt,
'metaData' => $metaData['featured_image'] ? MediaHelper::getImageById($metaData['featured_image']) : null,
])


<!-- Media Coverage -->
@if (!empty($total_medias_count) && $total_medias_count > 0)
<section id="media-coverage" class="media-reports-section">
    <div class="media-filter-bar" style="position: relative; z-index: 10;">
        <div class="container">
            <div>
                <div id="mediaFilterForm" class="media-filter-form d-flex flex-wrap align-items-center gap-3">

                    @if (!empty($sectors) && count($sectors) > 0)
                    <div class="media-filter-select">
                        <select class="single-select media-filter-dropdown" name="sector" id="filterSector">
                            <option value="">Sector</option>
                            @foreach ($sectors as $sector)
                            <option value="{{ $sector->id }}">{{ $sector->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @endif

                    @if (!empty($companies) && count($companies) > 0)
                    <div class="media-filter-select">
                        <select class="single-select media-filter-dropdown" name="company" id="filterCompany">
                            <option value="">Company</option>
                            @foreach ($companies as $company)
                            <option value="{{ $company->id }}">{{ $company->post_title }}</option>
                            @endforeach
                        </select>
                    </div>
                    @endif

                    @if (!empty($media_years) && $media_years->count() > 0)
                    <div class="media-filter-select">
                        <select class="single-select media-filter-dropdown" name="year" id="filterYear">
                            <option value="">All Years</option>
                            @foreach ($media_years as $year)
                            <option value="{{ $year }}">{{ $year }}</option>
                            @endforeach
                        </select>
                    </div>
                    @endif

                    <div class="media-filter-clear" id="mediaFilterClear" style="display: none;">
                        <button type="button" class="btn btn-sm btn-outline-secondary clear-filters-btn" style="padding: 12px 16px; border: 1px solid rgba(0,0,0,0.12); border-radius: 6px; font-size: 14px; background: var(--white); color: var(--text); line-height: 1; height: 48px;">Clear Filters</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="section-padding">
            <div class="container">
                <div class="row g-4" id="mediaCoverageGrid">

                    @if(count($medias) > 0)
                    @foreach ($medias as $media)
                    @php
                    $media_meta = $media->GetAllMetaData();
                    $m_year = $media_meta['year'] ?? \Carbon\Carbon::parse($media->created_at)->format('Y');
                    $m_company = $media_meta['choose_company'] ?? '';
                    $m_sectors = isset($media_meta['sector_categories']) ? unserialize($media_meta['sector_categories']) : [];
                    $m_sectors_str = is_array($m_sectors) ? implode(',', $m_sectors) : '';
                    @endphp
                    <div class="col-lg-3 col-md-6 media-coverage-item wow fadeInUp"
                        data-sector="{{ $m_sectors_str }}"
                        data-company="{{ $m_company }}"
                        data-year="{{ $m_year }}">
                        <div class="media-report-card">

                            @if (!empty($media->post_title))
                            <h2 class="media-report-title">
                                @if (!empty($media_meta['source_url']))
                                <a href="{{ $media_meta['source_url'] }}" target="_blank"
                                    rel="noopener">
                                    {{ $media->post_title }}
                                </a>
                                @else
                                {{ $media->post_title }}
                                @endif
                            </h2>
                            @endif

                            <div class="media-report-meta">
                                <span class="media-report-date">
                                    {{ \Carbon\Carbon::parse($media->created_at)->format('F d, Y') }}
                                </span>

                                @if (!empty($media_meta['source']))
                                <span class="media-report-source">{{ $media_meta['source'] }}</span>
                                @endif
                            </div>

                        </div>
                    </div>
                    @endforeach
                    @else
                    <div class="col-12 text-center py-5">
                        <p class="text-muted">No media coverage found.</p>
                    </div>
                    @endif

                    <div class="col-12 text-center py-5" id="mediaNoResults" style="display: none;">
                        <p class="text-muted">No media coverage found matching your filters.</p>
                    </div>

                </div>



                {{-- <nav class="media-reports-pagination mt-5 wow fadeInUp" aria-label="Media reports pagination">
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
            --}}


            </div>
        </div>

</section>

@else 

<section class="news-section section-padding">
    <div class="container">
        <div class="row g-4">
            <div class="col-12">
                <div class="text-center">
                    <h2>No media coverage found</h2>
                </div>
            </div>
        </div>

</section>

@endif

@include('frontend.partials.cta-section')


@push('frontend-js')
<script>
    $(document).ready(function() {
        // Media filter - client-side, no page refresh
        function applyMediaFilters() {
            var sector = $('#filterSector').val() || '';
            var company = $('#filterCompany').val() || '';
            var year = $('#filterYear').val() || '';
            var hasFilters = sector || company || year;

            $('#mediaFilterClear').toggle(hasFilters);

            var visibleCount = 0;
            $('.media-coverage-item').each(function() {
                var $item = $(this);
                var itemSectors = ($item.data('sector') || '').toString().split(',').map(function(s) { return s.trim(); });
                var itemCompany = ($item.data('company') || '').toString();
                var itemYear = ($item.data('year') || '').toString();

                var match = true;
                if (sector && itemSectors.indexOf(sector) === -1) match = false;
                if (company && itemCompany != company) match = false;
                if (year && itemYear != year) match = false;

                $item.toggle(match);
                if (match) visibleCount++;
            });

            $('#mediaNoResults').toggle(visibleCount === 0);
        }

        $('#filterSector, #filterCompany, #filterYear').on('change', applyMediaFilters);

        $('#mediaFilterClear button').on('click', function() {
            $('#filterSector, #filterCompany, #filterYear').val('');
            applyMediaFilters();
        });

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