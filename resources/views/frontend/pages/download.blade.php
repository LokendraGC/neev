@extends('frontend.layouts.app', ['payload' => $post, 'payloadMeta' => $metaData, 'title' => $post->post_title])

@section('main-section')
    @include('frontend.partials.breadcrumb-section', [
        'title' => $post->post_title,
        'excerpt' => $post->post_excerpt,
        'metaData' => $metaData['featured_image'] ? MediaHelper::getImageById($metaData['featured_image']) : null,
    ])


    @php
        $resourcesDetails = isset($metaData['resources_details']) ? unserialize($metaData['resources_details']) : [];
    @endphp


    @if (!empty($resourcesDetails) && count($resourcesDetails) > 0)
        <section class="download-section section-padding">
            <div class="container">
                <div class="download-cards-row row g-4">

                    @php
                        $count = 1;
                        $delay = 0.15;
                    @endphp
                    @foreach ($resourcesDetails as $index => $item)
                        @php
                            $media = MediaHelper::getImageById($item['image']);
                            if (!empty($media) && !empty($media->file_name)) {
                                $image_url = asset('storage/' . $media->file_name);
                            } else {
                                $image_url = asset('assets/img/pdf-preview.png');
                            }

                            $pdf = MediaHelper::getImageById($item['pdf']);
                            if (!empty($pdf) && !empty($pdf->file_name)) {
                                $pdf_url = asset('storage/' . $pdf->file_name);
                            } else {
                                $pdf_url = asset('assets/img/pdf-preview.png');
                            }

                        @endphp
                        <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="{{ $delay }}s">
                            <div class="download-card">

                                @if (!empty($image_url))
                                    <div class="download-card-image">
                                        <img src="{{ $image_url }}" alt="{{ $item['title'] }}">
                                    </div>
                                @endif

                                @if (!empty($item['title']))
                                    <h3 class="download-card-title">
                                    <a href="{{ $pdf_url }}" target="_blank">
                                        {{ $item['title'] }}
                                    </a>
                                    </h3>
                                @endif

                                @if (!empty($pdf_url))
                                    <a href="{{ $pdf_url }}" class="download-card-cta" download>
                                        <span>Download Now</span>
                                        <i class="fa-solid fa-download"></i>
                                    </a>
                                @endif

                            </div>
                        </div>

                        @php
                            $count++;
                            $delay = $count * 0.15;
                        @endphp
                    @endforeach

                </div>
            </div>
        </section>
    @endif


    @include('frontend.partials.cta-section')
@endsection
