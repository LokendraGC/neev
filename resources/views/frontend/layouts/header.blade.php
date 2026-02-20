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


       <!-- Offcanvas Area Start -->
       <div class="fix-area">
           <div class="offcanvas__info">
               <div class="offcanvas__wrapper">
                   <div class="offcanvas__content">
                       <div class="offcanvas__top mb-5 d-flex justify-content-between align-items-center">
                           <div class="offcanvas__logo">
                               <a href="{{ url('/') }}">
                                   <img src="{{ asset('assets/img/logo/neev-logo.png') }}" alt="logo-img">
                               </a>
                           </div>
                           <div class="offcanvas__close">
                               <button>
                                   <i class="fas fa-times"></i>
                               </button>
                           </div>
                       </div>
                       <p class="text d-none d-xl-block">
                           Nullam dignissim, ante scelerisque the is euismod fermentum odio sem semper the is erat, a
                           feugiat leo urna eget eros. Duis Aenean a imperdiet risus.
                       </p>
                       <div class="mobile-menu fix mb-3"></div>
                       <div class="offcanvas__contact">
                           <h4>Contact Info</h4>
                           <ul>
                               <!-- <li class="d-flex align-items-center">
                                    <div class="offcanvas__contact-icon">
                                        <i class="fal fa-map-marker-alt"></i>
                                    </div>
                                    <div class="offcanvas__contact-text">
                                        <a target="_blank" href="#">Main Street, Melbourne, Australia</a>
                                    </div>
                                </li> -->
                               <li class="d-flex align-items-center">
                                   <div class="offcanvas__contact-icon mr-15">
                                       <i class="fal fa-envelope"></i>
                                   </div>
                                   <div class="offcanvas__contact-text">
                                       <a href="mailto:hello@neevcorporation.com.np"><span
                                               class="mailto:hello@neevcorporation.com.np">hello@neevcorporation.com.np</span></a>
                                   </div>
                               </li>
                               <li class="d-flex align-items-center">
                                   <div class="offcanvas__contact-icon mr-15">
                                       <i class="fal fa-clock"></i>
                                   </div>
                                   <div class="offcanvas__contact-text">
                                       <a target="_blank" href="#">Mod-friday, 09am -05pm</a>
                                   </div>
                               </li>
                               <li class="d-flex align-items-center">
                                   <div class="offcanvas__contact-icon mr-15">
                                       <i class="far fa-phone"></i>
                                   </div>
                                   <div class="offcanvas__contact-text">
                                       <a href="tel:+977-9851336289">+977-9851336289</a>
                                   </div>
                               </li>
                           </ul>
                           <a href="#" class="theme-btn mt-4">
                               <div class="btn_inner">
                                   <div class="btn_icon">
                                       <span>
                                           <i class="fa-solid fa-arrow-up-right"></i>
                                           <i class="fa-solid fa-arrow-up-right"></i>
                                       </span>
                                   </div>
                                   <div class="btn_text">
                                       <span>Contact us</span>
                                   </div>
                               </div>
                           </a>
                           <div class="social-icon d-flex align-items-center">
                               <a href="#"><i class="fab fa-facebook-f"></i></a>
                               <a href="#"><i class="fab fa-twitter"></i></a>
                               <a href="#"><i class="fab fa-youtube"></i></a>
                               <a href="#"><i class="fab fa-linkedin-in"></i></a>
                           </div>
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
                       <a href="{{ url('/') }}" class="logo">
                           <img src="{{ asset('assets/img/logo/neev-bg.png') }}" alt="img">
                       </a>
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
                           <!-- <a href="tel:+86661233562" class="theme-btn d-none d-xxl-block">
                                <div class="btn_inner">
                                    <div class="btn_icon">
                                        <span>
                                            <img src="assets/img/call2.svg" alt="">
                                            <img src="assets/img/call2.svg" alt="">
                                        </span>
                                    </div>
                                    <div class="btn_text">
                                        <span>+977-9851336289</span>
                                    </div>
                                </div>
                            </a> -->
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
        