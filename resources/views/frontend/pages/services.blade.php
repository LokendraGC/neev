@extends('frontend.layouts.app', ['payload' => $post, 'payloadMeta' => $metaData, 'title' => $post->post_title])

@section('main-section')
    @include('frontend.partials.breadcrumb-section', [
        'title' => $post->post_title,
        'excerpt' => $post->post_excerpt,
        'metaData' => $metaData['featured_image'] ? MediaHelper::getImageById($metaData['featured_image']) : null,
    ])


    @php
        $sectors = CategoryHelper::getModel()->where('type', 'sector')->get();
    @endphp

    @if (!empty($sectors) && count($sectors) > 0)
        <section class="project-section fix section-padding">
            <div class="container">

             <h2 class="section-title">Services</h2>



                <div class="row g-4">

                    @php
                        $count = 0;

                        if ($count == 0) {
                            $delay = '.3s';
                        } elseif ($count == 1) {
                            $delay = '.6s';
                        } elseif ($count == 2) {
                            $delay = '.9s';
                        } elseif ($count == 3) {
                            $delay = '1.2s';
                        } elseif ($count == 4) {
                            $delay = '1.5s';
                        }
                    @endphp
                    @foreach ($sectors as $sector)
                        @php
                            $sectorMeta = $sector->GetAllMetaData();

                            $media = MediaHelper::getImageById($sectorMeta['featured_image']);

                            if (!empty($media) && !empty($media->file_name)) {
                                $image_url = asset('storage/' . $media->file_name);
                            } else {
                                $image_url = asset('assets/img/home-1/project/hospitality.png');
                            }
                        @endphp
                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="{{ $delay }}">
                            <div class="project-box-items-inner">

                                @if (!empty($image_url))
                                    <div class="thumb">
                                        <img src="{{ $image_url }}" alt="{{ $sector->name }}">
                                        <img src="{{ $image_url }}" alt="{{ $sector->name }}">
                                    </div>
                                @endif

                                <div class="project-content-area">
                                    <div class="content">
                                        <h3><a
                                                href="{{ route('frontend.category.sector.index', $sector->slug) }}">{{ $sector->name }}</a>
                                        </h3>
                                    </div>
                                    <a href="{{ route('frontend.category.sector.index', $sector->slug) }}"
                                        class="circle-check"><i class="fa-solid fa-arrow-up-right"></i></a>
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


    @include('frontend.partials.cta-section')
@endsection
