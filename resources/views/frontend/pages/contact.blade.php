@extends('frontend.layouts.app', ['payload' => $post, 'payloadMeta' => $metaData, 'title' => $post->post_title])

@section('main-section')
    @include('frontend.partials.breadcrumb-section', [
        'title' => $post->post_title,
        'excerpt' => $post->post_excerpt,
        'metaData' => $metaData['featured_image'] ? MediaHelper::getImageById($metaData['featured_image']) : null,
    ])


    @php
        $map_url = SettingHelper::get_field('map_url');
        $map_link = SettingHelper::get_field('map_link');
        $address = SettingHelper::get_field('address');
        $websiteName = SettingHelper::get_field('site_title');
        $first_phone = SettingHelper::get_field('first_phone');
        $second_phone = SettingHelper::get_field('second_phone');
        $first_email = SettingHelper::get_field('first_email');
        $second_email = SettingHelper::get_field('second_email');

    @endphp

    <!-- Contact Info Section Start -->
    <section class="contact-info-section fix section-padding">
        <div class="container">
            <div class="section-title text-center">
                <h6 class="sub-title wow fadeInUp">
                    <img src=" {{ asset('assets/img/home-1/star.svg') }}" alt="img"> get in touch
                </h6>
                <h2 class="text-anim">
                    Our Contact Information
                </h2>
            </div>
            <div class="row">

                @if (!empty($map_link) || !empty($address))
                    <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".3s">
                        <div class="contact-info-box">
                            <div class="icon">
                                <i class="fa-sharp fa-solid fa-location-dot"></i>
                            </div>
                            <div class="content">
                                <h4>Our address</h4>
                                <p>
                                    @if (!empty($map_link))
                                        <a href="{{ $map_link }}" target="_blank">{{ $address }}</a>
                                    @else
                                        {{ $address }}
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                @endif


                @if (!empty($first_phone) || !empty($second_phone))
                    <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".5s">
                        <div class="contact-info-box">
                            <div class="icon">
                                <i class="fa-solid fa-phone-xmark"></i>
                            </div>
                            <div class="content">
                                <h4>Contact number</h4>
                                <p>
                                    @if (!empty($first_phone))
                                        <a class="d-block" href="tel:{{ $first_phone }}">{{ $first_phone }}</a>
                                    @endif
                                    @if (!empty($second_phone))
                                        <span>|</span>
                                        <a class="d-block" href="tel:{{ $second_phone }}">{{ $second_phone }}</a>
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                @endif


                @if (!empty($first_email) || !empty($second_email))
                    <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".7s">
                        <div class="contact-info-box">
                            <div class="icon">
                                <i class="fa-solid fa-envelope"></i>
                            </div>
                            <div class="content">
                                <h4>Email</h4>
                                <p>
                                    @if (!empty($first_email))
                                        <a href="mailto:{{ $first_email }}">{{ $first_email }}</a>
                                    @endif
                                    @if (!empty($second_email))
                                        <span>|</span>
                                        <a href="mailto:{{ $second_email }}">{{ $second_email }}</a>
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                @endif


            </div>
        </div>
    </section>

    <!-- Contact Section Start -->
    <section class="contact-section fix section-padding pt-0">
        <div class="container">
            <div class="contact-wrapper">
                <div class="row g-4">


                    @if (!empty($map_url))
                        <div class="col-lg-6">
                            <div class="contact-map">
                                {!! $map_url !!}
                            </div>
                        </div>
                    @endif

                    <div class="col-lg-6">
                        <div class="contact-box-items">
                            <h2 class="text-anim">Send Us A Message.</h2>
                            <form action="contact.php" id="contact-form" class="contact-form-box">
                                <div class="row g-4 align-items-center">
                                    <div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".3s">
                                        <div class="form-clt">
                                            <input type="text" placeholder="Full name *">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".5s">
                                        <div class="form-clt">
                                            <input type="text" placeholder="Email address *">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".3s">
                                        <div class="form-clt">
                                            <input type="text" placeholder="Phone number *">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".5s">
                                        <div class="form-clt">
                                            <div class="form">
                                                <select class="single-select w-100">
                                                    <option>Chose a option</option>
                                                    <option>Digital Marketing</option>
                                                    <option>Software & IT Service</option>
                                                    <option>Finance & Investment</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 wow fadeInUp" data-wow-delay=".3s">
                                        <div class="form-clt">
                                            <textarea name="message" placeholder="Type your message"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 wow fadeInUp" data-wow-delay=".5s">

                                        <a class="gt-theme-btn-main style-5 mt-5" href="about.html">
                                            <span class="gt-theme-btn">Send now</span>
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('frontend.partials.cta-section')
@endsection
