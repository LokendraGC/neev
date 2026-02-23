 {{-- banner Imaage --}}
 <div class="mb-3">
     <div class="row">
         <div class="col-md-12">
             <div class="mb-3">
                 <label for="common_single_banner_image" class="form-label">Upload Banner Image</label>
                 <div class="input-group open-media-manager" data-bs-toggle="modal" data-bs-target="#exampleModal"
                     style="cursor: pointer;" data-field="common_single_banner_image" data-select="single">
                     <div class="input-group-prepend">
                         <div class="input-group-text bg-soft-secondary font-weight-medium">
                             Browse</div>
                     </div>

                     <div class="form-control file-amount">Choose File</div>
                 </div>
                 <div class="preview-closer">
                     @if (isset($metaDatas['common_single_banner_image']) &&
                             ($media = MediaHelper::getModel()->where('id', $metaDatas['common_single_banner_image'])->first()))
                         <input type="hidden" id="common_single_banner_image" name="common_single_banner_image"
                             class="selected-files" value="{{ $metaDatas['common_single_banner_image'] }}">
                         <div id="common_single_banner_image_select">
                             <div class="file-preview box sm">
                                 <div class="d-flex justify-content-between align-items-center mt-2 file-preview-item">
                                     <div
                                         class="align-items-center align-self-stretch d-flex justify-content-center thumb">
                                         <img class="img-fit" src="{{ asset('storage/' . $media->file_name) }}"
                                             alt="image" />
                                     </div>
                                     <div class="col body">
                                         <h6 class="d-flex">
                                             <span class="text-truncate title">{{ $media->file_original_name }}</span>
                                             <span class="flex-shrink-0 ext">.{{ $media->extension }}</span>
                                         </h6>
                                         <p>{{ MediaHelper::getKBorMB($media->file_size) }}</p>
                                     </div>
                                     <div class="remove"><button data-id="{{ $media->id }}"
                                             data-slug="common_single_banner_image"
                                             class="btn btn-sm btn-link remove-attachment" type="button"><i
                                                 class="bi bi-x-circle"></i></button>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     @else
                         <input type="hidden" id="common_single_banner_image" name="common_single_banner_image"
                             class="selected-files" value="" />
                         <div id="common_single_banner_image_select"></div>
                     @endisset
             </div>
             <span class="form-text text-muted">
                 <small><i>(Recommended image size: 525 by 736px)</i></small>
             </span>
         </div>
         <hr>
     </div>
 </div>
</div>




@include('backend.mission-repeater.mission_and_vision_repeater')

@section('script')
 @vite(['resources/js/pages/demo.form-advanced.js'])
 @vite(['resources/js/media.js'])
@endsection
