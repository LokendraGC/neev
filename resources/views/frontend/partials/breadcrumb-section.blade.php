   @php

       $common_banner = SettingHelper::get_field('banner_background_image');

       $media = MediaHelper::getImageById($common_banner);

       if (!empty($media) && !empty($media->file_name)) {
           $banner_url = asset('storage/' . $media->file_name);
       } else {
           $banner_url = asset('assets/img/home-1/project/bread-bg.png');
       }

       if (!empty($metaData) && !empty($metaData->file_name)) {
           $image_url = 'storage/' . $metaData->file_name;
       } else {
           $image_url = $banner_url;
       }
   @endphp


   <div class="breadcrumb-wrapper bg-cover" style="background-image: url('{{ $image_url }}');">
       <div class="hero-dark-overlay"></div>
       <div class="container">
           <div class="page-heading">
               <div class="breadcrumb-sub-title">
                   <h1 class="text-white wow fadeInUp" data-wow-delay=".3s">{{ $title }}</h1>
                   <p>{{ $excerpt }}</p>
               </div>
           </div>
       </div>
   </div>
   <div class="breadcrumb-new">
       <div class="container">
           <div class="page-heading">
               <ul class="breadcrumb-items wow fadeInUp" data-wow-delay=".5s">
                   <li><a href="{{ url('/') }}">Home</a></li>
                   <li>/</li>
                   <li>{{ $title }}</li>
               </ul>
           </div>
       </div>
   </div>
