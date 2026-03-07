@extends('frontend.layouts.app', ['payload' => $post, 'payloadMeta' => $metaData, 'title' => $post->post_title])

@section('main-section')

@include('frontend.partials.breadcrumb-section', [
        'title' => $post->post_title,
        'excerpt' => $post->post_excerpt,
        'metaData' => $metaData['featured_image'] ? MediaHelper::getImageById($metaData['featured_image']) : null,
    ])


<!-- Board of Director Section Start - Old Design with Popup -->
@if (!empty($board_of_directors) && count($board_of_directors) > 0)
@php
$board_of_directors_meta = $bod_cat->GetAllMetaData();
@endphp


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
                            <h2 class="text-anim">{{ $bod_cat->name ?? 'Board of Director' }}</h2>
                        </div>
                        <div class="col-lg-8">
                            {!! $board_of_directors_meta['main_description'] ?? '' !!}
                        </div>
                    </div>
                </div>
            </div>

            @if (!empty($board_of_directors) && count($board_of_directors) > 0)
            <div class="col-lg-12">
                <div class="row g-4 justify-content-center">


                    @foreach ($board_of_directors as $director)
                    @php
                    $directorMeta = $director->GetAllMetaData();
                    $media = MediaHelper::getImageById($directorMeta['featured_image']);
                    if (!empty($media) && !empty($media->file_name)) {
                    $image_url = asset('storage/' . $media->file_name);
                    } else {
                    $image_url = asset('assets/img/profile_img.jpg');
                    }
                    @endphp
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".3s">
                        <div class="team-box-item-3">
                            <a href="#teamModal{{ $director->id }}"
                                class="team-popup-trigger team-popup-open">

                                @if (!empty($image_url))
                                <div class="thumb">
                                    <img src="{{ $image_url }}" alt="{{ $director->post_title }}">
                                </div>
                                @endif

                                <div class="content">
                                    <h3>{{ $director->post_title }}</h3>
                                    <p>{{ $directorMeta['designation'] ?? '' }}</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
            @endif

        </div>
    </div>
</section>
@endif

<!-- Team Member Popups (Magnific Popup inline) -->

@if (!empty($board_of_directors) && count($board_of_directors) > 0)
@foreach ($board_of_directors as $director)
@php
$directorMeta = $director->GetAllMetaData();

$media = MediaHelper::getImageById($directorMeta['featured_image']);
if (!empty($media) && !empty($media->file_name)) {
$image_url = asset('storage/' . $media->file_name);
} else {
$image_url = asset('assets/img/profile_img.jpg');
}
@endphp
<div id="teamModal{{ $director->id }}" class="team-popup-content mfp-hide">
    <div class="team-popup-inner">
        <button type="button" class="mfp-close team-popup-close" aria-label="Close">×</button>
        <div class="team-popup-header">
            <h5>{{ $director->post_title }}</h5>
        </div>
        <div class="team-popup-body">

            @if (!empty($image_url))
            <div class="d-flex gap-4 flex-md-row flex-column">
                <img src="{{ $image_url }}" alt="{{ $director->post_title }}"
                    class="rounded flex-shrink-0" style="width: 180px; height: 200px; object-fit: cover;">
                <div>
                    @endif


                    <p class="text-muted mb-3">{{ $directorMeta['designation'] ?? '' }}</p>


                    <p>{!! $director->post_content ?? '' !!}</p>


                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@endif


<!-- Management Team Section Start -->
@if (!empty($management_teams) && count($management_teams) > 0)
<section id="management-team" class="team-section-3 fix section-padding section-bg-5">
    <div class="line-shape">
        <img src="{{ asset('assets/img/home-3/team/line-shape.png') }}" alt="img">
    </div>
    <div class="container">

        @if (!empty($management_cat->name))
        <div class="section-title style-5 text-center mb-5">

            @if (!empty($metaData['team_subtitle']))
            <h6 class="sub-title wow fadeInUp">{{ $metaData['team_subtitle'] ?? 'Our People' }}</h6>
            @endif

            <h2 class="text-anim wow fadeInUp" data-wow-delay=".2s">
                {{ $management_cat->name ?? 'Management Team' }}
            </h2>


            @if (!empty($metaData['team_title']))
            <p class="mt-3 wow fadeInUp" data-wow-delay=".3s">
                {{ $metaData['team_title'] ?? 'Experts, Professionals' }}
            </p>
            @endif


        </div>
        @endif

        <div class="row g-4 justify-content-center">



            @php
            $count = 1;
            @endphp
            @foreach ($management_teams as $management)
            @php
            $managementMeta = $management->GetAllMetaData();

            if ($count == 1) {
            $delay = '.2s';
            } else {
            $delay = '.3s';
            }

            $media = MediaHelper::getImageById($managementMeta['featured_image']);

            if (!empty($media) && !empty($media->file_name)) {
            $img_url = asset('storage/' . $media->file_name);
            } else {
            $img_url = asset('assets/img/profile_img.jpg');
            }
            @endphp
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="{{ $delay }}">
                <div class="management-team-card">

                    @if (!empty($img_url))
                    <div class="thumb">
                        <img src="{{ $img_url }}" alt="{{ $management->post_title }}">
                    </div>
                    @else
                    <div class="thumb">
                        <img src="{{ asset('assets/img/profile_img.jpg') }}"
                            alt="{{ $management->post_title }}">
                    </div>
                    @endif


                    <div class="content">
                        <h4>{{ $management->post_title }}</h4>
                        <p>{{ $managementMeta['designation'] ?? '' }}</p>
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