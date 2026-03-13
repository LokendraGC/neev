@extends('frontend.layouts.app', ['payload' => $post, 'payloadMeta' => $metaData, 'title' => $post->post_title])

@section('main-section')

@include('frontend.partials.breadcrumb-section', [
        'title' => $post->post_title,
        'excerpt' => $post->post_excerpt,
        'metaData' => $metaData['featured_image'] ? MediaHelper::getImageById($metaData['featured_image']) : null,
    ])

    @php
    $home_page_id = 1;

$home_page = PostHelper::getModel()
    ->where('id', $home_page_id)
    ->where('post_type', 'page')
    ->where('post_status', 'publish')
    ->first();

    $home_page_meta = $home_page->GetAllMetaData();

    $vision_and_mission_details = (!empty($home_page_meta['mission_and_vision_details']))
        ? @unserialize($home_page_meta['mission_and_vision_details'])
        : [];
    $vision_and_mission_details = is_array($vision_and_mission_details) ? $vision_and_mission_details : [];
    @endphp


    @if (!empty($vision_and_mission_details) && count($vision_and_mission_details) > 0)
    <section id="mission-vision" class="about-inner-section fix section-padding">
    <div class="container">
          
            <div class="about-counter-wrapper">
                <div class="row g-4">

                    @foreach ($vision_and_mission_details as $index => $item)

                    @php 
                    $icon_image = $item['icon'] ?? null;
                    $media = MediaHelper::getImageById($icon_image);

                    if (!empty($media) && !empty($media->file_name)) {
                        $image_url = asset('storage/' . $media->file_name);
                    } else {
                        $image_url = asset('assets/img/vision.svg');
                    }
                    @endphp
                    <div class="col-xl-6 col-md-6 wow fadeInUp" data-wow-delay=".3s">
                        <div class="about-counter-item">

                            @if ($image_url)
                        <div class="mission-home">
                                    <img src="{{ $image_url }}" alt="{{ $item['title'] ?? '' }}">
                                </div>
                            @endif

                            @if (!empty($item['title']))
                            <h2>
                                <span>{{ $item['title'] ?? '' }}</span>
                            </h2>

                            @endif

                            @if (!empty($item['description']))
                           
                                {!! $item['description'] ?? '' !!}
                            
                            @endif

                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
    </div>
</section>
@endif




@include('frontend.partials.cta-section')


@endsection