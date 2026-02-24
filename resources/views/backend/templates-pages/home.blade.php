<div class="mb-3">
    <div class="card">
        <div class="card-body">
            <div class="mb-2 d-flex align-content-center border-1 border-bottom">
                <h4 class="header-title">Home Page Builder</h4>
            </div>
            <div class="tab-heading">

                <ul class="nav nav-tabs mb-3">
                    <li class="nav-item">
                        <a href="#general-section" data-bs-toggle="tab"
                            aria-expanded="{{ !request()->has('tab') || request()->query('tab') == 'general-section' ? 'true' : 'false' }}"
                            class="nav-link {{ !request()->has('tab') || request()->query('tab') == 'general-section' ? 'active' : '' }}">
                            General
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#banner" data-bs-toggle="tab"
                            aria-expanded="{{ request()->query('tab') == 'banner' ? 'true' : 'false' }}"
                            class="nav-link {{ request()->query('tab') == 'banner' ? 'active' : '' }}">
                            Banner
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="#business" data-bs-toggle="tab"
                            aria-expanded="{{ request()->query('tab') == 'business' ? 'true' : 'false' }}"
                            class="nav-link {{ request()->query('tab') == 'business' ? 'active' : '' }}">
                            Business
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="#media" data-bs-toggle="tab"
                            aria-expanded="{{ request()->query('tab') == 'media' ? 'true' : 'false' }}"
                            class="nav-link {{ request()->query('tab') == 'media' ? 'active' : '' }}">
                            Media
                        </a>
                    </li>

                </ul>
            </div>
            <div class="tab-content">
                <div class="tab-pane fade {{ !request()->has('tab') || request()->query('tab') === 'general-section' ? 'active show' : '' }}"
                    id="general-section" role="tabpanel">
                    {{-- main title --}}

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="about_subtitle" class="form-label">About Subtitle</label>
                            <input type="text" class="form-control" id="about_subtitle" name="about_subtitle"
                                value="{{ isset($metaDatas['about_subtitle']) ? $metaDatas['about_subtitle'] : '' }}" />
                        </div>

                        <div class="col-md-6">
                            <label for="about_title" class="form-label">About Main Title</label>
                            <input type="text" class="form-control" id="about_title" name="about_title"
                                value="{{ isset($metaDatas['about_title']) ? $metaDatas['about_title'] : '' }}" />
                        </div>
                    </div>


                    {{-- Our Vision --}}
                    <hr>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="our_vision" class="form-label">Our Vision Title</label>
                            <input type="text" class="form-control" id="our_vision" name="our_vision"
                                value="{{ isset($metaDatas['our_vision']) ? $metaDatas['our_vision'] : '' }}" />
                        </div>

                        <div class="col-md-6">
                            <label for="our_vision_descro" class="form-label">Our Vision Description</label>
                            <textarea class="form-control" id="our_vision_description" name="our_vision_description" rows="3">{{ isset($metaDatas['our_vision_description']) ? $metaDatas['our_vision_description'] : '' }}</textarea>
                        </div>
                    </div>

                    {{-- Our Mission --}}
                    <hr>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="our_mission" class="form-label">Our Mission Title</label>
                            <input type="text" class="form-control" id="our_mission" name="our_mission"
                                value="{{ isset($metaDatas['our_mission']) ? $metaDatas['our_mission'] : '' }}" />
                        </div>

                        <div class="col-md-6">
                            <label for="our_mission_description" class="form-label">Our Mission Description</label>
                            <textarea class="form-control" id="our_mission_description" name="our_mission_description" rows="3">{{ isset($metaDatas['our_mission_description']) ? $metaDatas['our_mission_description'] : '' }}</textarea>
                        </div>
                    </div>


                </div>

                <div class="tab-pane {{ request()->query('tab') == 'banner' ? 'show active' : '' }}" id="banner">


                    <div class="mb-3">
                        <label for="banner_main_title" class="form-label">Banner Main Title</label>
                        <input type="text" class="form-control" id="banner_main_title" name="banner_main_title"
                            value="{{ isset($metaDatas['banner_main_title']) ? $metaDatas['banner_main_title'] : '' }}" />
                    </div>

                    <hr>


                    <div class="mb-3">
                        <label class="form-label">Banners</label>
                        <div class="table-responsive">
                            <table class="table table-bordered mb-0">
                                <thead>
                                    <tr>
                                        <th class="custom-table-sno">S.No</th>
                                        <th style="width:30%">Background Image
                                            <span class="form-text text-muted">
                                                <small><i>(Recommended Size: 1920 x 860 px)</i></small>
                                            </span>
                                        </th>
                                        <th>Title</th>

                                        <th style="width:10%" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="addMoreSlider">
                                    @isset($metaDatas['banners'])
                                        @php
                                            $chooseUs = unserialize($metaDatas['banners']);
                                        @endphp
                                        @foreach ($chooseUs as $index => $item)
                                            <tr>
                                                <td class="custom-table-no">{{ $loop->iteration }}</td>
                                                <td>

                                                    <div class="media-input image-input">
                                                        <div class="input-group open-media-manager" data-bs-toggle="modal"
                                                            data-bs-target="#exampleModal" style="cursor: pointer;"
                                                            data-field="banners{{ $index }}_image"
                                                            data-select="single">
                                                            <div class="input-group-prepend">
                                                                <div
                                                                    class="input-group-text bg-soft-secondary font-weight-medium">
                                                                    Browse</div>
                                                            </div>
                                                            <div class="form-control file-amount">Choose
                                                                File</div>
                                                        </div>
                                                        <div class="preview-closer">
                                                            @if (isset($item['image']) && ($media = \App\Models\Media::where('id', $item['image'])->first()))
                                                                <input type="hidden"
                                                                    id="banners{{ $index }}_image"
                                                                    name="banners[{{ $index }}][image]"
                                                                    class="selected-files"
                                                                    value="{{ $item['image'] }}" />
                                                                <div id="banners{{ $index }}_image_select">
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
                                                                            <div class="remove"><button
                                                                                    data-id="{{ $item['image'] }}"
                                                                                    data-slug="banners{{ $index }}_image"
                                                                                    class="btn btn-sm btn-link remove-attachment"
                                                                                    type="button"><i
                                                                                        class="bi bi-x-circle"></i></button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @else
                                                                <input type="hidden"
                                                                    id="banners{{ $index }}_image"
                                                                    name="banners[{{ $index }}][image]"
                                                                    class="selected-files" value="" />
                                                                <div id="banners{{ $index }}_image_select">
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <label for="sub_title">Title</label>
                                                    <input type="text" id="sub_title" class="form-control"
                                                        name="banners[{{ $index }}][title]"
                                                        value="{{ $item['title'] ?? '' }}" />
                                                    <!-- Hidden input for order -->
                                                    <input type="hidden" class="row-order"
                                                        name="banners[{{ $index }}][order]"
                                                        value="{{ $index }}" />

                                                    <!-- Hidden input for order -->
                                                    <input type="hidden" class="row-order"
                                                        name="banners[{{ $index }}][order]"
                                                        value="{{ $index }}" />

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
                                                    <a href="javascript:void(0);"
                                                        class="text-primary fs-16 px-1 move-down" title="Move Down">
                                                        <i class="bi bi-arrow-down-circle"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endisset
                                </tbody>
                            </table>
                            <div class="text-end mt-2">
                                <button type="button" class="btn btn-primary btn-sm add_slider">Add Banner</button>
                            </div>
                        </div>
                    </div>

                </div>


                <div class="tab-pane {{ request()->query('tab') == 'business' ? 'show active' : '' }}"
                    id="business">

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="business_subtitle" class="form-label">Business Subtitle</label>
                            <input type="text" class="form-control" id="business_subtitle"
                                name="business_subtitle"
                                value="{{ isset($metaDatas['business_subtitle']) ? $metaDatas['business_subtitle'] : '' }}" />
                        </div>

                        <div class="col-md-6">
                            <label for="business_title" class="form-label">Business Title</label>
                            <input type="text" class="form-control" id="business_title" name="business_title"
                                value="{{ isset($metaDatas['business_title']) ? $metaDatas['business_title'] : '' }}" />
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="business_description" class="form-label">Business Description</label>
                        <textarea class="form-control" id="business_description" name="business_description" rows="3">{{ isset($metaDatas['business_description']) ? $metaDatas['business_description'] : '' }}</textarea>
                    </div>

                    @php
                        $pages = PostHelper::getModel()
                            ->where('post_type', 'page')
                            ->where('post_status', 'publish')
                            ->get();
                    @endphp


                    <div class="row">
                        <div class="col-md-6">
                            <label for="business_title" class="form-label">Business Button Title</label>
                            <input type="text" class="form-control" id="business_button_title"
                                name="business_button_title"
                                value="{{ isset($metaDatas['business_button_title']) ? $metaDatas['business_button_title'] : '' }}" />
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Business Button Link</label>
                                <select class="select2 form-control select2-multiple" data-toggle="select2"
                                    data-placeholder="Select Page" name="business_button_link">
                                    <option value="0">None</option>
                                    @foreach ($pages as $page)
                                        @isset($metaDatas['business_button_link'])
                                            <option value="{{ $page->id }}"
                                                @if ($metaDatas['business_button_link'] == $page->id) selected @endif>
                                                {{ $page->post_title }}
                                            </option>
                                        @else
                                            <option value="{{ $page->id }}">
                                                {{ $page->post_title }}
                                            </option>
                                        @endisset
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>


                </div>

                <div class="tab-pane {{ request()->query('tab') == 'media' ? 'show active' : '' }}" id="media">


                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="media_main_title" class="form-label">Media Main Title</label>
                            <input type="text" class="form-control" id="media_main_title" name="media_main_title"
                                value="{{ isset($metaDatas['media_main_title']) ? $metaDatas['media_main_title'] : '' }}" />
                        </div>

                        <div class="col-md-6">
                            <label for="media_description" class="form-label">Media Description</label>
                            <textarea class="form-control" id="media_description" name="media_description" rows="5">{{ isset($metaDatas['media_description']) ? $metaDatas['media_description'] : '' }}</textarea>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
@include('backend.templates-pages.home.banner-scripts')
