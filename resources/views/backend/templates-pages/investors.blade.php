<div class="mb-3">
    <div class="card">
        <div class="card-body">
            <div class="mb-2 d-flex align-content-center border-1 border-bottom">
                <h4 class="header-title">Investors Page Builder</h4>
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
                        <a href="#investors-details" data-bs-toggle="tab"
                            aria-expanded="{{ request()->query('tab') == 'investors-details' ? 'true' : 'false' }}"
                            class="nav-link {{ request()->query('tab') == 'investors-details' ? 'active' : '' }}">
                            Investors Details
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="#investor-relations" data-bs-toggle="tab"
                            aria-expanded="{{ request()->query('tab') == 'investor-relations' ? 'true' : 'false' }}"
                            class="nav-link {{ request()->query('tab') == 'investor-relations' ? 'active' : '' }}">
                            Investor Relations
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="#subsidiaries-associates" data-bs-toggle="tab"
                            aria-expanded="{{ request()->query('tab') == 'subsidiaries-associates' ? 'true' : 'false' }}"
                            class="nav-link {{ request()->query('tab') == 'subsidiaries-associates' ? 'active' : '' }}">
                            Subsidiaries & Associates
                        </a>
                    </li>


                </ul>
            </div>
            <div class="tab-content">
                <div class="tab-pane fade {{ !request()->has('tab') || request()->query('tab') === 'general-section' ? 'active show' : '' }}"
                    id="general-section" role="tabpanel">
                    {{-- main title --}}

                    {{-- banner Imaage --}}
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="common_single_banner_image" class="form-label">Upload Banner
                                        Image</label>
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
                                                                <span
                                                                    class="flex-shrink-0 ext">.{{ $media->extension }}</span>
                                                            </h6>
                                                            <p>{{ MediaHelper::getKBorMB($media->file_size) }}</p>
                                                        </div>
                                                        <div class="remove"><button data-id="{{ $media->id }}"
                                                                data-slug="common_single_banner_image"
                                                                class="btn btn-sm btn-link remove-attachment"
                                                                type="button"><i class="bi bi-x-circle"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <input type="hidden" id="common_single_banner_image"
                                                name="common_single_banner_image" class="selected-files"
                                                value="" />
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


                {{-- Details --}}
                <div class="mb-3">
                    <label class="form-label"> Investors Details</label>
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0">
                            <thead>
                                <tr>
                                    <th class="custom-table-sno" style="width:5%">S.No</th>
                                    <th style="width:25%">Title</th>
                                    <th style="width:25%">Sub Title</th>
                                    <th style="width:25%">Upload Icon</th>
                                    <th style="width:10%" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody class="addMoreSlider">
                                @isset($metaDatas['investors_details'])
                                    @php
                                        $investorsDetails = unserialize($metaDatas['investors_details']);
                                    @endphp
                                    @foreach ($investorsDetails as $index => $item)
                                        <tr>
                                            <td class="custom-table-no">{{ $loop->iteration }}</td>
                                            <td>
                                                <input type="text"
                                                    name="investors_details[{{ $index }}][title]"
                                                    class="form-control"
                                                    value="{{ isset($item['title']) ? $item['title'] : '' }}" />
                                            </td>
                                            <td>
                                                {{-- FIXED: Added missing closing bracket --}}
                                                <input type="text"
                                                    name="investors_details[{{ $index }}][sub_title]"
                                                    class="form-control"
                                                    value="{{ isset($item['sub_title']) ? $item['sub_title'] : '' }}" />
                                            </td>
                                            <td>
                                                <div class="media-input image-input">
                                                    <div class="input-group open-media-manager" data-bs-toggle="modal"
                                                        data-bs-target="#exampleModal" style="cursor: pointer;"
                                                        data-field="investors_details_{{ $index }}_image"
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
                                                                id="investors_details_{{ $index }}_image"
                                                                name="investors_details[{{ $index }}][image]"
                                                                class="selected-files"
                                                                value="{{ $item['image'] }}" />
                                                            <div
                                                                id="investors_details_{{ $index }}_image_select">
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
                                                                                data-slug="investors_details_{{ $index }}_image"
                                                                                class="btn btn-sm btn-link remove-attachment"
                                                                                type="button"><i
                                                                                    class="bi bi-x-circle"></i></button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @else
                                                            <input type="hidden"
                                                                id="investors_details_{{ $index }}_image"
                                                                name="investors_details[{{ $index }}][image]"
                                                                class="selected-files" value="" />
                                                            <div
                                                                id="investors_details_{{ $index }}_image_select">
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
                            <button type="button" class="btn btn-primary btn-sm add_slider">Add Detail</button>
                        </div>
                    </div>
                </div>

            </div>

            <div class="tab-pane {{ request()->query('tab') == 'investors-details' ? 'show active' : '' }}"
                id="investors-details">

                <div class="row mb-3">

                    <div class="mb-3">
                        <label for="content" class="form-label">Investors Details Description</label>
                        <textarea class="editor" id="content" name="investors_details_description">{{ isset($metaDatas['investors_details_description']) ? $metaDatas['investors_details_description'] : '' }}</textarea>
                    </div>



                    {{-- Details --}}
                    <div class="mb-3">
                        <label class="form-label">Partnerships</label>
                        <div class="table-responsive">
                            <table class="table table-bordered mb-0">
                                <thead>
                                    <tr>
                                        <th class="custom-table-sno" style="width:5%">S.No</th>
                                        <th style="width:25%">Title</th>
                                        <th style="width:25%">Sub Title</th>
                                        <th style="width:25%">Upload Icon</th>
                                        <th style="width:10%" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="addMorePartner">
                                    @isset($metaDatas['partner_details'])
                                        @php
                                            $partnerDetails = unserialize($metaDatas['partner_details']);
                                        @endphp
                                        @foreach ($partnerDetails as $index => $item)
                                            {{-- Fixed variable name --}}
                                            <tr>
                                                <td class="custom-table-no">{{ $loop->iteration }}</td>
                                                <td>
                                                    <input type="text"
                                                        name="partner_details[{{ $index }}][title]"
                                                        class="form-control"
                                                        value="{{ isset($item['title']) ? $item['title'] : '' }}" />
                                                </td>
                                                <td>
                                                    <input type="text"
                                                        name="partner_details[{{ $index }}][sub_title]"
                                                        class="form-control"
                                                        value="{{ isset($item['sub_title']) ? $item['sub_title'] : '' }}" />
                                                </td>
                                                <td>
                                                    <div class="media-input image-input">
                                                        <div class="input-group open-media-manager"
                                                            data-bs-toggle="modal" data-bs-target="#exampleModal"
                                                            style="cursor: pointer;"
                                                            data-field="partner_details_{{ $index }}_image"
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
                                                                    id="partner_details_{{ $index }}_image"
                                                                    name="partner_details[{{ $index }}][image]"
                                                                    class="selected-files"
                                                                    value="{{ $item['image'] }}" />
                                                                <div
                                                                    id="partner_details_{{ $index }}_image_select">
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
                                                                                    data-slug="partner_details_{{ $index }}_image"
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
                                                                    id="partner_details_{{ $index }}_image"
                                                                    name="partner_details[{{ $index }}][image]"
                                                                    class="selected-files" value="" />
                                                                <div
                                                                    id="partner_details_{{ $index }}_image_select">
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <a href="javascript:void(0);"
                                                        class="text-success fs-16 px-1 add_more_partner">
                                                        <i class="bi bi-plus-circle"></i>
                                                    </a>
                                                    <a href="javascript:void(0);"
                                                        class="text-danger fs-16 px-1 remove_partner">
                                                        <i class="bi bi-x-circle"></i>
                                                    </a>
                                                    <hr>
                                                    <a href="javascript:void(0);"
                                                        class="text-primary fs-16 px-1 move-up" title="Move Up">
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
                                <button type="button" class="btn btn-primary btn-sm add_partner">Add
                                    Detail</button>
                            </div>
                        </div>
                    </div>


                </div>

            </div>

            <div class="tab-pane {{ request()->query('tab') == 'investor-relations' ? 'show active' : '' }}"
                id="investor-relations">

                <div class="row mb-3">

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="investor_relations_title" class="form-label">Investor Relations
                                Title</label>
                            <input type="text" class="form-control" id="investor_relations_title"
                                name="investor_relations_title"
                                value="{{ isset($metaDatas['investor_relations_title']) ? $metaDatas['investor_relations_title'] : '' }}" />
                        </div>

                        <div class="col-md-6">
                            {{-- banner Imaage --}}
                            <div class="mb-3">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="investor_relations_featured_image"
                                                class="form-label">Upload
                                                Featured
                                                Image</label>
                                            <div class="input-group open-media-manager" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal" style="cursor: pointer;"
                                                data-field="investor_relations_featured_image"
                                                data-select="single">
                                                <div class="input-group-prepend">
                                                    <div
                                                        class="input-group-text bg-soft-secondary font-weight-medium">
                                                        Browse</div>
                                                </div>

                                                <div class="form-control file-amount">Choose File</div>
                                            </div>
                                            <div class="preview-closer">
                                                @if (isset($metaDatas['investor_relations_featured_image']) &&
                                                        ($media = MediaHelper::getModel()->where('id', $metaDatas['investor_relations_featured_image'])->first()))
                                                    <input type="hidden" id="investor_relations_featured_image"
                                                        name="investor_relations_featured_image"
                                                        class="selected-files"
                                                        value="{{ $metaDatas['investor_relations_featured_image'] }}">
                                                    <div id="investor_relations_featured_image_select">
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
                                                                    <p>{{ MediaHelper::getKBorMB($media->file_size) }}
                                                                    </p>
                                                                </div>
                                                                <div class="remove"><button
                                                                        data-id="{{ $media->id }}"
                                                                        data-slug="investor_relations_featured_image"
                                                                        class="btn btn-sm btn-link remove-attachment"
                                                                        type="button"><i
                                                                            class="bi bi-x-circle"></i></button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @else
                                                    <input type="hidden" id="investor_relations_featured_image"
                                                        name="investor_relations_featured_image"
                                                        class="selected-files" value="" />
                                                    <div id="investor_relations_featured_image_select"></div>
                                                @endisset
                                        </div>
                                        <span class="form-text text-muted">
                                            <small><i>(Recommended image size: 1320 by 720px)</i></small>
                                        </span>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="content" class="form-label">Investor Relations Description</label>
                    <textarea class="editor" id="content" name="investor_relations_description">{{ isset($metaDatas['investor_relations_description']) ? $metaDatas['investor_relations_description'] : '' }}</textarea>
                </div>
            </div>

        </div>


        <div class="tab-pane {{ request()->query('tab') == 'subsidiaries-associates' ? 'show active' : '' }}"
            id="subsidiaries-associates">

            <div class="row mb-3">

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="subsidiaries_associates_title" class="form-label">Subsidiaries & Associates
                            Title</label>
                        <input type="text" class="form-control" id="subsidiaries_associates_title"
                            name="subsidiaries_associates_title"
                            value="{{ isset($metaDatas['subsidiaries_associates_title']) ? $metaDatas['subsidiaries_associates_title'] : '' }}" />
                    </div>

                    <div class="col-md-6">
                        {{-- banner Imaage --}}
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="subsidiaries_associates_featured_image"
                                            class="form-label">Upload
                                            Featured
                                            Image</label>
                                        <div class="input-group open-media-manager" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal" style="cursor: pointer;"
                                            data-field="subsidiaries_associates_featured_image"
                                            data-select="single">
                                            <div class="input-group-prepend">
                                                <div
                                                    class="input-group-text bg-soft-secondary font-weight-medium">
                                                    Browse</div>
                                            </div>

                                            <div class="form-control file-amount">Choose File</div>
                                        </div>
                                        <div class="preview-closer">
                                            @if (isset($metaDatas['subsidiaries_associates_featured_image']) &&
                                                    ($media = MediaHelper::getModel()->where('id', $metaDatas['subsidiaries_associates_featured_image'])->first()))
                                                <input type="hidden" id="subsidiaries_associates_featured_image"
                                                    name="subsidiaries_associates_featured_image"
                                                    class="selected-files"
                                                    value="{{ $metaDatas['subsidiaries_associates_featured_image'] }}">
                                                <div id="subsidiaries_associates_featured_image_select">
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
                                                                <p>{{ MediaHelper::getKBorMB($media->file_size) }}
                                                                </p>
                                                            </div>
                                                            <div class="remove"><button
                                                                    data-id="{{ $media->id }}"
                                                                    data-slug="subsidiaries_associates_featured_image"
                                                                    class="btn btn-sm btn-link remove-attachment"
                                                                    type="button"><i
                                                                        class="bi bi-x-circle"></i></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @else
                                                <input type="hidden" id="subsidiaries_associates_featured_image"
                                                    name="subsidiaries_associates_featured_image"
                                                    class="selected-files" value="" />
                                                <div id="subsidiaries_associates_featured_image_select"></div>
                                            @endisset
                                    </div>
                                    <span class="form-text text-muted">
                                        <small><i>(Recommended image size: 1320 by 720px)</i></small>
                                    </span>
                                </div>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="content" class="form-label">Subsidiaries & Associates Description</label>
                <textarea class="editor" id="content" name="subsidiaries_associates_description">{{ isset($metaDatas['subsidiaries_associates_description']) ? $metaDatas['subsidiaries_associates_description'] : '' }}</textarea>
            </div>
        </div>
    </div>

</div>
</div>
</div>
</div>


@include('backend.templates-pages.investors.investors-repeater')
@include('backend.templates-pages.investors.invest-partner-repeater')
