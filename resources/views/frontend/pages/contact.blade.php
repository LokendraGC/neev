@extends('frontend.layouts.app', ['payload' => $post, 'payloadMeta' => $metaData, 'title' => $post->post_title])

@section('main-section')
    @include('frontend.partials.breadcrumb-section')



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
                <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".3s">
                    <div class="contact-info-box">
                        <div class="icon">
                            <i class="fa-sharp fa-solid fa-location-dot"></i>
                        </div>
                        <div class="content">
                            <h4>Our address</h4>
                            <p>Redcross Marg, Soalteemode, Kathmandu</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".5s">
                    <div class="contact-info-box">
                        <div class="icon">
                            <i class="fa-solid fa-phone-xmark"></i>
                        </div>
                        <div class="content">
                            <h4>Contact number</h4>
                            <p>
                                <a class="d-block" href="tel:+977-9851336289">+977-9851336289</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".7s">
                    <div class="contact-info-box">
                        <div class="icon">
                            <i class="fa-solid fa-envelope"></i>
                        </div>
                        <div class="content">
                            <h4>Email</h4>
                            <p>
                                <a href="mailto:hello@neevcorporation.com.np">hello@neevcorporation.com.np</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section Start -->
    <section class="contact-section fix section-padding pt-0">
        <div class="container">
            <div class="contact-wrapper">
                <div class="row g-4">
                    <div class="col-lg-6">
                        <div class="contact-map">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6678.7619084840835!2d144.9618311901502!3d-37.81450084255415!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad642b4758afc1d%3A0x3119cc820fdfc62e!2sEnvato!5e0!3m2!1sen!2sbd!4v1641984054261!5m2!1sen!2sbd"
                                style="border:0;" allowfullscreen="" loading="lazy"></iframe>

                        </div>
                    </div>
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
                                        <button type="submit" class="theme-btn wow fadeInUp" data-wow-delay=".5s">
                                            <span class="btn_inner">
                                                <span class="btn_icon">
                                                    <span>
                                                        <i class="fa-solid fa-arrow-up-right"></i>
                                                        <i class="fa-solid fa-arrow-up-right"></i>
                                                    </span>
                                                </span>
                                                <span class="btn_text">
                                                    <span>Send now</span>
                                                </span>
                                            </span>
                                        </button>
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
