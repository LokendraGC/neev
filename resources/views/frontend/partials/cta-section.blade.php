     <!-- Cta Newsletter Section Start -->


     @php
         $cta_title = SettingHelper::get_field('cta_title');
         $cta_background_image = SettingHelper::get_field('cta_background_image');
         $media = $cta_background_image ? MediaHelper::getImageById($cta_background_image) : null;
      
      
         if ($media && isset($media->file_name)) {
             $image_url = asset('storage/' . $media->file_name);
         } else {
             $image_url = 'assets/img/home-1/cta-newsletter.jpg';
         }


     @endphp
     @if (!empty($cta_title) || !empty($image_url))
         <section class="cta-newsletter-section bg-cover" style="background-image: url('{{ $image_url }}');">
             <div class="container">
                 <div class="cta-newsletter-wrapper">
                     <h2 class="tx-title sec_title  tz-itm-title tz-itm-anim">
                         {{ $cta_title }}
                     </h2>
                 </div>
             </div>
         </section>
     @endif
