     <!-- Footer Section Start -->

     @php
         $footer_logo = SettingHelper::get_field('footer_logo');
         $media = $footer_logo ? MediaHelper::getImageById($footer_logo) : null;
         $map_link = SettingHelper::get_field('map_link');
         $address = SettingHelper::get_field('address');
         $websiteName = SettingHelper::get_field('site_title');
         $first_phone = SettingHelper::get_field('first_phone');
         $second_phone = SettingHelper::get_field('second_phone');
         $first_email = SettingHelper::get_field('first_email');
         $second_email = SettingHelper::get_field('second_email');

         if ($media && isset($media->file_name)) {
             $image_url = 'storage/' . $media->file_name;
         } else {
             $image_url = 'assets/img/logo/neev-logo.png';
         }

     @endphp



     <footer class="footer-section">
         <div class="footer-area">
             <div class="container">
                 <div class="footer-widget-wrapper">
                     <div class="row justify-content-between">
                         <div class="col-xl-4 col-lg-5 col-md-6 wow fadeInUp" data-wow-delay=".2s">
                             <div class="footer-widget-items border-right">

                                 @if (!empty($image_url))
                                     <div class="widget-head">
                                         <a href="{{ url('/') }}" class="footer-logo">
                                             <img src="{{ $image_url }}" alt="{{ $websiteName }}">
                                         </a>
                                     </div>
                                 @endif

                                 <div class="footer-widget-items">

                                     <ul class="contact-list">

                                         @if (!empty($map_link))
                                             <li><i class="fa-regular fa-location-dot"></i>
                                                 <a href="{{ $map_link }}" target="_blank">
                                                     {{ $address }}
                                                 </a>
                                             </li>
                                         @endif


                                         @if (!empty($first_phone) || !empty($second_phone))
                                             <li><i class="fa-regular fa-phone"></i>
                                                 @if (!empty($first_phone))
                                                     <a href="tel:{{ $first_phone }}">
                                                         {{ $first_phone }}
                                                     </a>
                                                 @endif
                                                 @if (!empty($second_phone))
                                                     <span>|</span>
                                                     <a href="tel:{{ $second_phone }}">
                                                         {{ $second_phone }}
                                                     </a>
                                                 @endif
                                             </li>
                                         @endif


                                         @if (!empty($first_email) || !empty($second_email))
                                             <li><i class="fa-regular fa-envelope"></i>
                                                 @if (!empty($first_email))
                                                     <a href="mailto:{{ $first_email }}">
                                                         {{ $first_email }}
                                                     </a>
                                                 @endif
                                                 @if (!empty($second_email))
                                                     <span>|</span>
                                                     <a href="mailto:{{ $second_email }}">
                                                         {{ $second_email }}
                                                     </a>
                                                 @endif
                                             </li>
                                         @endif


                                     </ul>
                                 </div>
                             </div>
                         </div>
                         <div class="col-xl-2 col-lg-3 col-md-6 wow fadeInUp footer-column" data-wow-delay=".4s">
                             <div class="footer-widget-items">
                                 <div class="widget-head">
                                     <h3>Corporate</h3>
                                 </div>
                                 <ul class="gt-list-area">
                                     <li>
                                         <a href="about.html">
                                             About Us
                                         </a>
                                     </li>
                                     <li>
                                         <a href="service.html">
                                             Services
                                         </a>
                                     </li>
                                     <li>
                                         <a href="about.html">
                                             Contact US
                                         </a>
                                     </li>
                                     <li>
                                         <a href="about.html">
                                             News & Events
                                         </a>
                                     </li>
                                 </ul>
                             </div>
                         </div>
                         <div class="col-xl-3 ps-lg-0 col-lg-4 col-md-6 wow fadeInUp footer-column"
                             data-wow-delay=".6s">
                             <div class="footer-widget-items">
                                 <div class="widget-head">
                                     <h3>Business</h3>
                                 </div>
                                 <ul class="gt-list-area">
                                     <li>
                                         <a href="service-details.html">
                                             Hospitality & Tourism
                                         </a>
                                     </li>
                                     <li>
                                         <a href="service-details.html">
                                             Agriculture
                                         </a>
                                     </li>
                                     <li>
                                         <a href="service-details.html">
                                             Renewal Energy
                                         </a>
                                     </li>
                                 </ul>
                             </div>
                         </div>
                         <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".8s">
                             <div class="footer-widget-items">

                                 <div class="widget-head">
                                     <h3>Get Connected</h3>
                                 </div>

                                 @php
                                     $medias = SettingHelper::get_field('social_media');
                                     $social_medias = unserialize($medias);
                                 @endphp

                                 @if (!empty($social_medias))
                                     <div class="social-icon d-flex align-items-center wow fadeInUp"
                                         data-wow-delay=".5s">

                                         @foreach ($social_medias as $social_media)
                                             <a href="{{ $social_media['link'] ? $social_media['link'] : 'javascript:void(0)' }}"
                                                 target="{{ $social_media['link'] ? '_blank' : '_self' }}"
                                                 class="text-white">
                                                 <i class="fab {{ $social_media['media'] }}"></i>
                                             </a>
                                         @endforeach
                                     </div>
                                 @endif



                                 <div class="newsletter-form wow fadeInUp" data-wow-delay=".3s"
                                     style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">
                                     <p>
                                         Sign up for our newsletter!
                                     </p>
                                     <div class="cta-newsletter-wrapper">
                                         <div class="newsletter-form ">
                                             <form action="#">
                                                 <input type="text" placeholder="Enter your email...">
                                                 <button class="email-btn" type="submit">
                                                     <i class="fa-solid fa-envelope"></i>
                                                 </button>
                                             </form>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
             <div class="footer-bottom">
                 <div class="container">
                     <div class="footer-bottom-wrapper">
                         <p class="wow fadeInUp" data-wow-delay=".3s">
                             Copyright © {{ date('Y') }} <b>{{ $websiteName }}</b> All rights reserved. Developed
                             By
                             <a href="https://webtechnepal.com/" target="_blank">
                                 Webtech Nepal</a>
                         </p>


                         @if (!empty($social_medias))
                             <div class="social-icon d-flex align-items-center wow fadeInUp" data-wow-delay=".5s">

                                 @foreach ($social_medias as $social_media)
                                     <a href="{{ $social_media['link'] ? $social_media['link'] : 'javascript:void(0)' }}"
                                         target="{{ $social_media['link'] ? '_blank' : '_self' }}" class="text-white">
                                         <i class="fab {{ $social_media['media'] }}"></i>
                                     </a>
                                 @endforeach

                             </div>
                         @endif


                         @php
                             $privacy_policy = 24;
                             $privacy_policy_page = !empty($privacy_policy) ? PostHelper::getModel()->find($privacy_policy) : null;

                             $terms_and_conditions = 25;
                             $terms_and_conditions_page = !empty($terms_and_conditions) ? PostHelper::getModel()->find($terms_and_conditions) : null;
                         @endphp

                         <ul class="footer-list wow fadeInUp" data-wow-delay=".7s">

                             @if (!empty($privacy_policy_page))
                                 <li>
                                     <a href="{{ route('frontend.post.index', $privacy_policy_page->slug) }}">{{ $privacy_policy_page->post_title }}</a>
                                 </li>
                             @endif

                             @if (!empty($terms_and_conditions_page))
                                 <li>
                                     <a href="{{ route('frontend.post.index', $terms_and_conditions_page->slug) }}">{{ $terms_and_conditions_page->post_title }}</a>
                                 </li>
                             @endif
                         </ul>


                     </div>
                 </div>
             </div>
         </div>
     </footer>

     </div>

     </div>
     </div>
