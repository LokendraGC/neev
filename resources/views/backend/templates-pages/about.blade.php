 {{-- banner Imaage --}}

 <div class="mb-3">
     <div class="card">
         <div class="card-body">
             <div class="mb-2 d-flex align-content-center border-1 border-bottom">
                 <h4 class="header-title">About Page Builder</h4>
             </div>

             <div class="mb-3">
                 <div class="row">
                     <div class="col-md-12">
                         <div class="mb-3">
                             <label for="common_single_banner_image" class="form-label">Upload Banner Image</label>
                             <div class="input-group open-media-manager" data-bs-toggle="modal"
                                 data-bs-target="#exampleModal" style="cursor: pointer;"
                                 data-field="common_single_banner_image" data-select="single">
                                 <div class="input-group-prepend">
                                     <div class="input-group-text bg-soft-secondary font-weight-medium">
                                         Browse</div>
                                 </div>

                                 <div class="form-control file-amount">Choose File</div>
                             </div>
                             <div class="preview-closer">
                                 @if (isset($metaDatas['common_single_banner_image']) &&
                                         ($media = MediaHelper::getModel()->where('id', $metaDatas['common_single_banner_image'])->first()))
                                     <input type="hidden" id="common_single_banner_image"
                                         name="common_single_banner_image" class="selected-files"
                                         value="{{ $metaDatas['common_single_banner_image'] }}">
                                     <div id="common_single_banner_image_select">
                                         <div class="file-preview box sm">
                                             <div
                                                 class="d-flex justify-content-between align-items-center mt-2 file-preview-item">
                                                 <div
                                                     class="align-items-center align-self-stretch d-flex justify-content-center thumb">
                                                     <img class="img-fit"
                                                         src="{{ asset('storage/' . $media->file_name) }}"
                                                         alt="image" />
                                                 </div>
                                                 <div class="col body">
                                                     <h6 class="d-flex">
                                                         <span
                                                             class="text-truncate title">{{ $media->file_original_name }}</span>
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
                                     <input type="hidden" id="common_single_banner_image"
                                         name="common_single_banner_image" class="selected-files" value="" />
                                     <div id="common_single_banner_image_select"></div>
                                 @endisset
                         </div>
                         <span class="form-text text-muted">
                             <small><i>Recommended Image size: 1920 by 600 px</i></small>
                         </span>
                     </div>
                     <hr>
                 </div>
             </div>
         </div>

         <div class="row mb-3">

             <label for="about_title" class="form-label">About Title</label>
             <input type="text" class="form-control" id="about_title" name="about_title"
                 value="{{ isset($metaDatas['about_title']) ? $metaDatas['about_title'] : '' }}" />

         </div>


         <div class="row mb-3">

             {{-- Details --}}
             <div class="mb-3">
                 <label class="form-label">Mission & Vision</label>
                 <div class="table-responsive">
                     <table class="table table-bordered mb-0">
                         <thead>
                             <tr>
                                 <th class="custom-table-sno" style="width:5%">S.No</th>
                                 <th style="width:25%">Title</th>
                                 <th style="width:25%">Description</th>
                                 <th style="width:25%">Upload Icon
                                     <span class="form-text text-muted">
                                         <small><i>(Recommended image size: 645 by 620 px)</i></small>
                                     </span>
                                 </th>
                                 <th style="width:10%" class="text-center">Action</th>
                             </tr>
                         </thead>
                         <tbody class="addMoreSlider">
                             @isset($metaDatas['mission_and_vision_details'])
                                 @php
                                     $missionAndVisionDetails = unserialize($metaDatas['mission_and_vision_details']);
                                 @endphp

                                 @foreach ($missionAndVisionDetails as $index => $item)
                                     {{-- Fixed variable name --}}
                                     <tr>
                                         <td class="custom-table-no">{{ $loop->iteration }}</td>
                                         <td>
                                             <input type="text"
                                                 name="mission_and_vision_details[{{ $index }}][title]"
                                                 class="form-control"
                                                 value="{{ isset($item['title']) ? $item['title'] : '' }}" />
                                         </td>
                                         <td>
                                             <textarea class="editor" id="content" name="mission_and_vision_details[{{ $index }}][description]"
                                                 rows="5">{{ isset($item['description']) ? $item['description'] : '' }}</textarea>
                                         </td>
                                         <td>
                                             <div class="media-input image-input">
                                                 <div class="input-group open-media-manager" data-bs-toggle="modal"
                                                     data-bs-target="#exampleModal" style="cursor: pointer;"
                                                     data-field="mission_and_vision_details_{{ $index }}_image"
                                                     data-select="single">
                                                     <div class="input-group-prepend">
                                                         <div
                                                             class="input-group-text bg-soft-secondary font-weight-medium">
                                                             Browse
                                                         </div>
                                                     </div>
                                                     <div class="form-control file-amount">Choose File</div>
                                                 </div>
                                                 <div class="preview-closer">
                                                     @if (isset($item['image']) && ($media = \App\Models\Media::where('id', $item['image'])->first()))
                                                         <input type="hidden"
                                                             id="mission_and_vision_details_{{ $index }}_image"
                                                             name="mission_and_vision_details[{{ $index }}][image]"
                                                             class="selected-files" value="{{ $item['image'] }}" />
                                                         <div
                                                             id="mission_and_vision_details_{{ $index }}_image_select">
                                                             <div class="file-preview box sm">
                                                                 <div
                                                                     class="d-flex justify-content-between align-items-center mt-2 file-preview-item">
                                                                     <div
                                                                         class="align-items-center align-self-stretch d-flex justify-content-center thumb">
                                                                         <img class="img-fit"
                                                                             src="{{ asset('storage/' . $media->file_name) }}"
                                                                             alt="">
                                                                     </div>
                                                                     <div class="col body">
                                                                         <h6 class="d-flex">
                                                                             <span
                                                                                 class="text-truncate title">{{ $media->file_original_name }}</span>
                                                                             <span
                                                                                 class="flex-shrink-0 ext">.{{ $media->extension }}</span>
                                                                         </h6>
                                                                         <p>{{ MediaHelper::getKBorMB($media->file_size) }}
                                                                         </p>
                                                                     </div>
                                                                     <div class="remove">
                                                                         <button data-id="{{ $item['image'] }}"
                                                                             data-slug="mission_and_vision_details_{{ $index }}_image"
                                                                             class="btn btn-sm btn-link remove-attachment"
                                                                             type="button">
                                                                             <i class="bi bi-x-circle"></i>
                                                                         </button>
                                                                     </div>
                                                                 </div>
                                                             </div>
                                                         </div>
                                                     @else
                                                         <input type="hidden"
                                                             id="mission_and_vision_details_{{ $index }}_image"
                                                             name="mission_and_vision_details[{{ $index }}][image]"
                                                             class="selected-files" value="" />
                                                         <div
                                                             id="mission_and_vision_details_{{ $index }}_image_select">
                                                         </div>
                                                     @endif
                                                 </div>
                                             </div>
                                         </td>
                                         <td class="text-center">
                                             <a href="javascript:void(0);"
                                                 class="text-success fs-16 px-1 add_more_slider">
                                                 <i class="bi bi-plus-circle"></i>
                                             </a>
                                             <a href="javascript:void(0);"
                                                 class="text-danger fs-16 px-1 remove_slider">
                                                 <i class="bi bi-x-circle"></i>
                                             </a>
                                             <hr>
                                             <a href="javascript:void(0);" class="text-primary fs-16 px-1 move-up"
                                                 title="Move Up">
                                                 <i class="bi bi-arrow-up-circle"></i>
                                             </a>
                                             <a href="javascript:void(0);" class="text-primary fs-16 px-1 move-down"
                                                 title="Move Down">
                                                 <i class="bi bi-arrow-down-circle"></i>
                                             </a>
                                         </td>
                                     </tr>
                                 @endforeach
                             @endisset
                         </tbody>
                     </table>
                     <div class="text-end mt-2">
                         <button type="button" class="btn btn-primary btn-sm add_more_slider">Add Detail</button>
                     </div>
                 </div>
             </div>


         </div>


         <div class="row mb-3">
             <div class="col-md-6">
                 <label for="about_subtitle" class="form-label">Team Subtitle</label>
                 <input type="text" class="form-control" id="team_subtitle" name="team_subtitle"
                     value="{{ isset($metaDatas['team_subtitle']) ? $metaDatas['team_subtitle'] : '' }}" />
             </div>

             <div class="col-md-6">
                 <label for="location_title" class="form-label">Team Main Title</label>
                 <input type="text" class="form-control" id="team_title" name="team_title"
                     value="{{ isset($metaDatas['team_title']) ? $metaDatas['team_title'] : '' }}" />
             </div>
         </div>


         <div class="row mb-3">
             <div class="col-md-6">
                 <label for="about_subtitle" class="form-label">Location Subtitle</label>
                 <input type="text" class="form-control" id="location_subtitle" name="location_subtitle"
                     value="{{ isset($metaDatas['location_subtitle']) ? $metaDatas['location_subtitle'] : '' }}" />
             </div>

             <div class="col-md-6">
                 <label for="location_title" class="form-label">Location Main Title</label>
                 <input type="text" class="form-control" id="location_title" name="location_title"
                     value="{{ isset($metaDatas['location_title']) ? $metaDatas['location_title'] : '' }}" />
             </div>
         </div>







         <div class="mb-3">
             <div class="row">
                 <div class="col-md-12">
                     <div class="mb-3">
                         <label for="location_image" class="form-label">Upload Location Image</label>
                         <div class="input-group open-media-manager" data-bs-toggle="modal"
                             data-bs-target="#exampleModal" style="cursor: pointer;" data-field="location_image"
                             data-select="single">
                             <div class="input-group-prepend">
                                 <div class="input-group-text bg-soft-secondary font-weight-medium">
                                     Browse</div>
                             </div>

                             <div class="form-control file-amount">Choose File</div>
                         </div>
                         <div class="preview-closer">
                             @if (isset($metaDatas['location_image']) &&
                                     ($media = MediaHelper::getModel()->where('id', $metaDatas['location_image'])->first()))
                                 <input type="hidden" id="location_image" name="location_image"
                                     class="selected-files" value="{{ $metaDatas['location_image'] }}">
                                 <div id="location_image_select">
                                     <div class="file-preview box sm">
                                         <div
                                             class="d-flex justify-content-between align-items-center mt-2 file-preview-item">
                                             <div
                                                 class="align-items-center align-self-stretch d-flex justify-content-center thumb">
                                                 <img class="img-fit"
                                                     src="{{ asset('storage/' . $media->file_name) }}"
                                                     alt="image" />
                                             </div>
                                             <div class="col body">
                                                 <h6 class="d-flex">
                                                     <span
                                                         class="text-truncate title">{{ $media->file_original_name }}</span>
                                                     <span
                                                         class="flex-shrink-0 ext">.{{ $media->extension }}</span>
                                                 </h6>
                                                 <p>{{ MediaHelper::getKBorMB($media->file_size) }}</p>
                                             </div>
                                             <div class="remove"><button data-id="{{ $media->id }}"
                                                     data-slug="location_image"
                                                     class="btn btn-sm btn-link remove-attachment"
                                                     type="button"><i class="bi bi-x-circle"></i></button>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             @else
                                 <input type="hidden" id="location_image" name="location_image"
                                     class="selected-files" value="" />
                                 <div id="location_image_select"></div>
                             @endisset
                     </div>
                     <span class="form-text text-muted">
                         <small><i>Recommended Image size: 1431 by 631 px</i></small>
                     </span>
                 </div>
                 <hr>
             </div>
         </div>
     </div>

     <div class="mb-3">
         <label for="location_details" class="form-label">Location Details</label>
         <textarea class="editor" id="content" name="location_details">{{ isset($metaDatas['location_details']) ? $metaDatas['location_details'] : '' }}</textarea>
     </div>

 </div>
</div>
</div>

@include('backend.mission-repeater.mission_and_vision_repeater')
