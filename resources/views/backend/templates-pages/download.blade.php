



{{-- Details --}}
<div class="mb-3">
<label class="form-label">Details</label>
<div class="table-responsive">
    <table class="table table-bordered mb-0">
        <thead>
            <tr>
                <th class="custom-table-sno" style="width:5%">S.No</th>
                <th style="width:25%">Title</th>
                <th style="width:25%">Image
                    <span class="form-text text-muted">
                        <small><i>(Recommended Size: 1320 x 720 px)</i></small>
                    </span>
                </th>
                <th style="width:25%">Upload File (PDF)
                </th>

                <th style="width:10%" class="text-center">Action</th>
            </tr>
        </thead>
        <tbody class="addMoreSlider">
            @isset($metaDatas['resources_details'])
                @php
                    $chooseUs = unserialize($metaDatas['resources_details']);
                @endphp
                @foreach ($chooseUs as $index => $item)
                    <tr>
                        <td class="custom-table-no">{{ $loop->iteration }}</td>
                        <td>
                            <input type="text" name="resources_details[{{ $index }}][title]"
                                class="form-control" value="{{ isset($item['title']) ? $item['title'] : '' }}" />
                        </td>
                        <td>
                            <div class="media-input image-input">
                                <div class="input-group open-media-manager" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal" style="cursor: pointer;"
                                    data-field="resources_details_{{ $index }}_image" data-select="single">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text bg-soft-secondary font-weight-medium">
                                            Browse</div>
                                    </div>
                                    <div class="form-control file-amount">Choose
                                        File</div>
                                </div>
                                <div class="preview-closer">
                                    @if (isset($item['image']) && ($media = \App\Models\Media::where('id', $item['image'])->first()))
                                        <input type="hidden" id="resources_details_{{ $index }}_image"
                                            name="resources_details[{{ $index }}][image]" class="selected-files"
                                            value="{{ $item['image'] }}" />
                                        <div id="resources_details_{{ $index }}_image_select">
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
                                                    <div class="remove"><button data-id="{{ $item['image'] }}"
                                                            data-slug="resources_details_{{ $index }}_image"
                                                            class="btn btn-sm btn-link remove-attachment"
                                                            type="button"><i class="bi bi-x-circle"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <input type="hidden" id="resources_details_{{ $index }}_image"
                                            name="resources_details[{{ $index }}][image]" class="selected-files"
                                            value="" />
                                        <div id="resources_details_{{ $index }}_image_select">
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </td>
                        <td>
                            <label for="resources_details_{{ $index }}_pdf" class="form-label">Upload
                                PDF</label>
                            <div class="input-group open-media-manager" data-bs-toggle="modal"
                                data-bs-target="#exampleModal" style="cursor: pointer;"
                                data-field="resources_details_{{ $index }}_pdf" data-select="single">
                                <div class="input-group-prepend">
                                    <div class="input-group-text bg-soft-secondary font-weight-medium">
                                        Browse
                                    </div>
                                </div>
                                <div class="form-control file-amount">Choose File</div>
                            </div>

                            <div class="preview-closer mt-2">
                                @if (isset($item['pdf']) && ($media = \App\Models\Media::find($item['pdf'])))
                                    <input type="hidden" id="resources_details_{{ $index }}_pdf"
                                        name="resources_details[{{ $index }}][pdf]" class="selected-files"
                                        value="{{ $item['pdf'] }}">

                                    <div id="resources_details_{{ $index }}_pdf_select">
                                        <div class="file-preview box sm">
                                            <div
                                                class="d-flex justify-content-between align-items-center mt-2 file-preview-item">
                                                <div
                                                    class="align-items-center align-self-stretch d-flex justify-content-center thumb">
                                                    @if ($media->extension == 'pdf')
                                                        <img class="img-fit"
                                                            src="{{ asset('assets/img/pdf-preview.png') }}"
                                                            alt="PDF">
                                                    @else
                                                        <img class="img-fit"
                                                            src="{{ asset('storage/' . $media->file_name) }}"
                                                            alt="Media">
                                                    @endif
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
                                                    <button type="button" data-id="{{ $item['pdf'] }}"
                                                        data-slug="resources_details_{{ $index }}_pdf"
                                                        class="btn btn-sm btn-link remove-attachment">
                                                        <i class="bi bi-x-circle"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <input type="hidden" id="resources_details_{{ $index }}_pdf"
                                        name="resources_details[{{ $index }}][pdf]" class="selected-files"
                                        value="">
                                    <div id="resources_details_{{ $index }}_pdf_select">
                                    </div>
                                @endif
                            </div>
                        </td>
                        <td class="text-center">
                            <a href="javascript:void(0);" class="text-success fs-16 px-1 add_more_slider">
                                <i class="bi bi-plus-circle"></i>
                            </a>
                            <a href="javascript:void(0);" class="text-danger fs-16 px-1 remove_slider">
                                <i class="bi bi-x-circle"></i>
                            </a>
                            <hr>
                            <a href="javascript:void(0);" class="text-primary fs-16 px-1 move-up" title="Move Up">
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
        <button type="button" class="btn btn-primary btn-sm add_slider">Add Detail</button>
    </div>
</div>
</div>


@include('backend.templates-pages.download.download-repeater')
