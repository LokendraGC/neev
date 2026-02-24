   <div class="page-wrapper">


       <!-- Preloader Start -->
       <div id="preloader" class="preloader">
           <div class="animation-preloader">
               <div class="txt-loading">
                   <span data-text-preloader="N" class="letters-loading">
                       N
                   </span>
                   <span data-text-preloader="E" class="letters-loading">
                       E
                   </span>
                   <span data-text-preloader="E" class="letters-loading">
                       E
                   </span>
                   <span data-text-preloader="V" class="letters-loading">
                       V
               </div>
               <p class="text-center">Corporation</p>
           </div>
           <div class="loader">
               <div class="row">
                   <div class="col-3 loader-section section-left">
                       <div class="bg"></div>
                   </div>
                   <div class="col-3 loader-section section-left">
                       <div class="bg"></div>
                   </div>
                   <div class="col-3 loader-section section-right">
                       <div class="bg"></div>
                   </div>
                   <div class="col-3 loader-section section-right">
                       <div class="bg"></div>
                   </div>
               </div>
           </div>
       </div>


       <!-- Back To Top Start -->
       <button id="back-top" class="back-to-top">
           <i class="fa-regular fa-arrow-up"></i>
       </button>


       @php
           $footer_logo = SettingHelper::get_field('footer_logo');
           $media = $footer_logo ? MediaHelper::getImageById($footer_logo) : null;
           $office_timing = SettingHelper::get_field('office_timing');
           $websiteName = SettingHelper::get_field('site_title');

           if (!empty($media) && !empty($media->file_name)) {
               $image_url = asset('storage/' . $media->file_name);
           } else {
               $image_url = asset('assets/img/logo/neev-logo.png');
           }

       @endphp

       <!-- Offcanvas Area Start -->
       <div class="fix-area">
           <div class="offcanvas__info">
               <div class="offcanvas__wrapper">
                   <div class="offcanvas__content">
                       <div class="offcanvas__top mb-5 d-flex justify-content-between align-items-center">

                           @if (!empty($image_url))
                               <div class="offcanvas__logo">
                                   <a href="{{ url('/') }}">
                                       <img src="{{ $image_url }}" alt="{{ $websiteName }}">
                                   </a>
                               </div>
                           @endif


                           <div class="offcanvas__close">
                               <button>
                                   <i class="fas fa-times"></i>
                               </button>
                           </div>
                       </div>

                       {{-- 
                       <p class="text d-none d-xl-block">
                           Nullam dignissim, ante scelerisque the is euismod fermentum odio sem semper the is erat, a
                           feugiat leo urna eget eros. Duis Aenean a imperdiet risus.
                       </p>
                     --}}


                       <div class="mobile-menu fix mb-3"></div>
                       <div class="offcanvas__contact">

                           @php
                               $first_email = SettingHelper::get_field('first_email');
                               $second_email = SettingHelper::get_field('second_email');
                               $first_phone = SettingHelper::get_field('first_phone');

                               $contact_us = 9;
                               $contact_us_page = !empty($contact_us)
                                   ? PostHelper::getModel()->find($contact_us)
                                   : null;
                           @endphp

                           <h4>Contact Info</h4>
                           <ul>


                               @if (!empty($first_email))
                                   <li class="d-flex align-items-center">
                                       <div class="offcanvas__contact-icon mr-15">
                                           <i class="fal fa-envelope"></i>
                                       </div>
                                       <div class="offcanvas__contact-text">
                                           <a href="mailto:{{ $first_email }}"><span
                                                   class="mailto:hello@neevcorporation.com.np">
                                                   {{ $first_email }}
                                               </span></a>
                                       </div>
                                   </li>
                               @endif


                               @if (!empty($office_timing))
                                   <li class="d-flex align-items-center">
                                       <div class="offcanvas__contact-icon mr-15">
                                           <i class="fal fa-clock"></i>
                                       </div>
                                       <div class="offcanvas__contact-text">
                                           <a target="_blank" href="javascript:void(0);">{{ $office_timing }}</a>
                                       </div>
                                   </li>
                               @endif



                               @if (!empty($first_phone))
                                   <li class="d-flex align-items-center">
                                       <div class="offcanvas__contact-icon mr-15">
                                           <i class="far fa-phone"></i>
                                       </div>
                                       <div class="offcanvas__contact-text">
                                           <a href="tel:{{ $first_phone }}">{{ $first_phone }}</a>
                                       </div>
                                   </li>
                               @endif



                           </ul>

                           <div class="btn_text">
                               <a href="{{ route('frontend.post.index', $contact_us_page->slug) }}"
                                   class="gt-theme-btn-main style-5 mt-5">
                                   <span class="gt-theme-btn">Contact us</span>
                               </a>
                           </div>

                           @php
                               $medias = SettingHelper::get_field('social_media');
                               $social_medias = unserialize($medias);
                           @endphp

                           @if (!empty($social_medias))
                               <div class="social-icon d-flex align-items-center">

                                   @foreach ($social_medias as $social_media)
                                       <a href="{{ $social_media['link'] ? $social_media['link'] : 'javascript:void(0)' }}"
                                           target="{{ $social_media['link'] ? '_blank' : '_self' }}"
                                           class="text-white">
                                           <i class="fab {{ $social_media['media'] }}"></i>
                                       </a>
                                   @endforeach


                               </div>
                           @endif


                       </div>
                   </div>
               </div>
           </div>
       </div>
       <div class="offcanvas__overlay"></div>

       <!-- Header Section Start -->
       <header id="header-sticky" class="header-1">
           <div class="container">
               <div class="mega-menu-wrapper">
                   <div class="header-main">

                       @php
                           $header_logo = SettingHelper::get_field('header_logo');

                           $media = $header_logo ? MediaHelper::getImageById($header_logo) : null;

                           if (!empty($media) && !empty($media->file_name)) {
                               $image_url = asset('storage/' . $media->file_name);
                           } else {
                               $image_url = asset('assets/img/logo/neev-bg.png');
                           }

                       @endphp


                       @if (!empty($image_url))
                           <a href="{{ url('/') }}" class="logo">
                               <img src="{{ $image_url }}" alt="{{ $websiteName }}">
                           </a>
                       @endif

                       <div class="mean__menu-wrapper">
                           <div class="main-menu">
                               <nav id="mobile-menu">
                                   <ul>

                                       <li>
                                           <a href="about.html">Our Story</a>
                                           <ul class="submenu">
                                               <li><a href="about.html#about-us">About Us</a></li>
                                               <li><a href="about.html#vision-values">Vision & Values</a></li>
                                               <li><a href="about.html#leadership">Leadership</a></li>
                                               <li><a href="about.html#our-location">Our Locations</a></li>
                                           </ul>
                                       </li>
                                       <li>
                                           <a href="service.html">
                                               Business

                                           </a>
                                           <ul class="submenu">
                                               <li><a href="service-detail.html">Hospitality & Tourism</a></li>
                                               <li><a href="service.html">Agro Industry</a></li>
                                               <li><a href="service.html"> Solar Energy</a></li>
                                           </ul>
                                       </li>
                                       <li>
                                           <a href="media.html">Media</a>
                                           <ul class="submenu">
                                               <li><a href="media.html#media-coverage">Media Reports</a></li>
                                               <li><a href="media.html#press-release">Press Release</a></li>
                                               <li><a href="download.html">Download</a></li>
                                           </ul>
                                       </li>
                                       <li>
                                           <a href="investors.html">Investors</a>

                                       </li>
                                       <li>
                                           <a href="sustainability.html">Sustainability</a>

                                       </li>
                                   </ul>
                               </nav>
                           </div>
                           <a href="#" class="main-header__search search-toggler d-none d-xxl-block">
                               <i class="fa-regular fa-magnifying-glass"></i>
                           </a>
                       </div>
                       <div class="header-right d-flex justify-content-end align-items-center">
                           <a href="#" class="main-header__search search-toggler d-xxl-none">
                               <i class="fa-regular fa-magnifying-glass"></i>
                           </a>

                           <div class="header__hamburger d-xl-none my-auto">
                               <div class="sidebar__toggle">
                                   <i class="fa-regular fa-bars"></i>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </header>

       <!-- Search Start -->
       <div class="search-popup">
           <div class="search-popup__overlay search-toggler"></div>
           <div class="search-popup__content">
               <form role="search" method="get" class="search-popup__form" action="#">
                   <input type="text" id="search" name="search" placeholder="Search Here...">
                   <button type="submit" aria-label="search submit" class="search-btn">
                       <span><i class="fa-regular fa-magnifying-glass"></i></span>
                   </button>
               </form>
           </div>
       </div>


       <div id="smooth-wrapper">
           <div id="smooth-content">
