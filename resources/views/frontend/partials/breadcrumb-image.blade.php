 @php
     $background_image = $postMeta['featured_image'];
     $media = MediaHelper::getImageById($background_image);

     if (!empty($media) && !empty($media->file_name)) {
         $image_url = asset('storage/' . $media->file_name);
     } else {
         $image_url = asset('assets/img/home-1/project/bread-bg.png');
     }

 @endphp


 <div class="breadcrumb-wrapper bg-cover" style="background-image: url('{{ $image_url }}');">
     <div class="hero-dark-overlay"></div>
     <div class="container">
         <div class="page-heading">
             <div class="breadcrumb-sub-title">
                 <h1 class="text-white wow fadeInUp" data-wow-delay=".3s">{{ $post->post_title }}</h1>
                 <p>{{ $post->post_excerpt }}</p>
             </div>
         </div>
     </div>
 </div>
