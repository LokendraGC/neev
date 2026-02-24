@extends('layouts.vertical', ['page_title' => 'Edit Company', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('css')
    @vite(['node_modules/select2/dist/css/select2.min.css', 'node_modules/daterangepicker/daterangepicker.css', 'node_modules/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.css', 'node_modules/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css', 'node_modules/bootstrap-timepicker/css/bootstrap-timepicker.min.css', 'node_modules/flatpickr/dist/flatpickr.min.css'])
@endsection


@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Edit Company</h4>
                </div>
            </div>
        </div>
        <form method="POST" action="{{ route('backend.company.update', $post->id) }}">
            @csrf
            <div class="row">
                <div class="col-md-9">
                    {{-- main content --}}
                    <x-backend.post.main-section :title="$post->post_title" :slug="$post->slug" :content="$post->post_content" />

                    {{-- excerpt --}}
                    {{-- <x-backend.post.excerpt :content="$post->post_excerpt" /> --}}

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="mb-2 d-flex align-content-center border-1 border-bottom">
                                        <h4 class="header-title">Company Details</h4>
                                    </div>
                                    <div class="tab-heading">
                                        <ul class="nav nav-tabs mb-3">
                                            <li class="nav-item">
                                                <a href="#general" data-bs-toggle="tab"
                                                    aria-expanded="{{ !request()->has('tab') || request()->query('tab') == 'general' ? 'true' : 'false' }}"
                                                    class="nav-link {{ !request()->has('tab') || request()->query('tab') == 'general' ? 'active' : '' }}">
                                                    General
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="tab-content">
                                        <div class="tab-pane {{ !request()->has('tab') || request()->query('tab') == 'general' ? 'show active' : '' }}"
                                            id="general">
                                            <div class="mb-3">
                                                <label class="form-label">Head Office</label>
                                                <input type="text" name="head_office" class="form-control"
                                                    value="{{ isset($metaDatas['head_office']) ? $metaDatas['head_office'] : '' }}" />
                                            </div>


                                            <div class="mb-3">
                                                <label class="form-label">Stay Updated</label>
                                                <input type="text" name="stay_updated_text" class="form-control"
                                                    value="{{ isset($metaDatas['stay_updated_text']) ? $metaDatas['stay_updated_text'] : '' }}" />
                                            </div>


                                            <div class="mb-3">
                                                <label class="form-label">Website URL</label>
                                                <input type="text" name="website_url" class="form-control"
                                                    value="{{ isset($metaDatas['website_url']) ? $metaDatas['website_url'] : '' }}" />
                                            </div>


                                            <div class="mb-3">
                                                <label for="social-media" class="form-label">Follow Us on our Social
                                                    Media</label>
                                                <div class="table-responsive">
                                                    <table class="table table-bordered mb-0">
                                                        <thead>
                                                            <tr>
                                                                <th class="custom-table-sno" style="width: 40px;"><i
                                                                        class="bi bi-grip-vertical"></i></th>
                                                                <th class="custom-table-sno">S.No</th>
                                                                <th>Media</th>
                                                                <th>Link</th>
                                                                <th class="text-center">Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody class="addMoreItem_s">
                                                            @isset($metaDatas['social_media_company'])
                                                                @php
                                                                    $socialMedia = unserialize(
                                                                        $metaDatas['social_media_company'],
                                                                    );
                                                                @endphp
                                                                @foreach ($socialMedia as $index => $data)
                                                                    <tr style="cursor: move;">
                                                                        <td class="drag-handle" style="cursor: move;">
                                                                            <i class="bi bi-grip-vertical text-muted"></i>
                                                                        </td>
                                                                        <td class="custom-table-no no">{{ $loop->iteration }}
                                                                        </td>
                                                                        <td>
                                                                            <select
                                                                                name="social_media_company[{{ $index }}][media]"
                                                                                class="form-control select2"
                                                                                data-toggle="select2">
                                                                                @foreach (\App\Enums\SocialMediaType::getKeyValuePairs() as $label => $value)
                                                                                    <option value="{{ $value }}"
                                                                                        @if (isset($data['media']) && $value == $data['media']) selected @endif>
                                                                                        {{ $label }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </td>
                                                                        <td>
                                                                            <input type="url" class="form-control"
                                                                                name="social_media_company[{{ $index }}][link]"
                                                                                value="{{ isset($data['link']) ? $data['link'] : '' }}" />
                                                                        </td>
                                                                        <td class="text-center"><a href="javascript: void(0);"
                                                                                class="text-reset fs-16 px-1 add_more">
                                                                                <i class="bi bi-plus-circle"></i></a> <a
                                                                                href="javascript: void(0);"
                                                                                class="text-reset fs-16 px-1 remove"> <i
                                                                                    class="bi bi-x-circle"></i></a></td>
                                                                    </tr>
                                                                @endforeach
                                                            @endisset
                                                        </tbody>
                                                    </table>
                                                    <div class="text-end mt-2">
                                                        <button type="button"
                                                            class="btn btn-primary btn-sm add_new_row">Add
                                                            New</button>
                                                    </div>
                                                </div>
                                            </div>


                                            {{-- banner image --}}

                                            <div class="mb-3">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <label for="company_banner_image"
                                                                class="form-label">Upload Banner Image</label>
                                                            <div class="input-group open-media-manager"
                                                                data-bs-toggle="modal" data-bs-target="#exampleModal"
                                                                style="cursor: pointer;"
                                                                data-field="company_banner_image"
                                                                data-select="single">
                                                                <div class="input-group-prepend">
                                                                    <div
                                                                        class="input-group-text bg-soft-secondary font-weight-medium">
                                                                        Browse</div>
                                                                </div>

                                                                <div class="form-control file-amount">Choose File</div>
                                                            </div>
                                                            <div class="preview-closer">
                                                                @if (isset($metaDatas['company_banner_image']) &&
                                                                        ($media = MediaHelper::getModel()->where('id', $metaDatas['company_banner_image'])->first()))
                                                                    <input type="hidden" id="company_banner_image"
                                                                        name="company_banner_image"
                                                                        class="selected-files"
                                                                        value="{{ $metaDatas['company_banner_image'] }}">
                                                                    <div id="company_banner_image_select">
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
                                                                                        data-slug="company_banner_image"
                                                                                        class="btn btn-sm btn-link remove-attachment"
                                                                                        type="button"><i
                                                                                            class="bi bi-x-circle"></i></button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @else
                                                                    <input type="hidden" id="company_banner_image"
                                                                        name="company_banner_image"
                                                                        class="selected-files" value="" />
                                                                    <div id="company_banner_image_select"></div>
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


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- SEO --}}
                {{-- <x-backend.seo.seo-section :metaDatas="$metaDatas" /> --}}
            </div>
            <input type="hidden" id="pageID" value="{{ $post->id }}" />
            <div class="col-md-3">
                {{-- publish / submit --}}
                <x-backend.post.status :post="$post" route="frontend.company.index" button="Update" />


                {{-- featured image --}}
                <x-backend.post.featured-image :metaDatas="$metaDatas" />



                {{-- team categories --}}
                @php
                    $selectedCategories = isset($metaDatas['sector_categories'])
                        ? unserialize($metaDatas['sector_categories'])
                        : [];
                @endphp
                <x-backend.post.category title="Sector Categories" name="sector_categories[]" type="multiple"
                    :categories="$sectorCategories" :post="$post" :selected="$selectedCategories" />


            </div>
        </div>
    </form>
    <livewire:backend.medias />
</div>
@endsection

@section('script')
@vite(['resources/js/pages/demo.form-advanced.js'])
@vite(['resources/js/media.js'])
@endsection

@push('backend-js')
<script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
<script>
    // tab url
    document.addEventListener('DOMContentLoaded', function() {

        const tabs = document.querySelectorAll('a.nav-link');

        tabs.forEach(tab => {
            tab.addEventListener('click', function() {
                const tabId = tab.getAttribute('href').substr(1);
                const urlParams = new URLSearchParams(window.location.search);
                urlParams.set('tab', tabId);
                const newUrl = window.location.pathname + '?' + urlParams.toString();
                history.pushState({}, '', newUrl);
            });
        });
    });
</script>
<script>
    // select2 reinitialize
    function selectReinitialize() {
        $('.select2').select2();
    }

    // updateSerialNumbers
    function updateSerialNumbers() {
        $('.addMoreItem_s tr').each(function(index) {
            let newIndex = index;
            // Update serial number (second td, after drag handle)
            $(this).find('td').eq(1).text(index + 1);
            // Update form field names
            $(this).find('select').attr('name', 'social_media_company[' + newIndex + '][media]');
            $(this).find('input').attr('name', 'social_media_company[' + newIndex + '][link]');
        });
    }

    // add new row
    function addRowData() {
        let numberOfRow = $('.addMoreItem_s tr').length;
        let options = '';

        options = '<option value="none" selected disabled>Select</option>';
        @foreach (\App\Enums\SocialMediaType::getKeyValuePairs() as $key => $value)
            options += `<option value="{{ $value }}">{{ $key }}</option>`;
        @endforeach

        let tr = `
            <tr style="cursor: move;">
                <td class="drag-handle" style="cursor: move;">
                    <i class="bi bi-grip-vertical text-muted"></i>
                </td>
                <td class="custom-table-no no">${numberOfRow + 1}</td>
                <td>
                    <select class="form-control select2" data-toggle="select2" name="social_media_company[${numberOfRow}][media]">
                        ${options}
                    </select>
                </td>
                <td><input name="social_media_company[${numberOfRow}][link]" class="form-control" /></td>
                <td class="text-center">
                    <a href="javascript: void(0);" class="text-reset fs-16 px-1 add_more"><i class="bi bi-plus-circle"></i></a>
                    <a href="javascript: void(0);" class="text-reset fs-16 px-1 remove"><i class="bi bi-x-circle"></i></a>
                </td>
            </tr>
        `;

        return tr;
    }



    // click on icon
    $(document).on('click', '.add_more', function() {
        let clickedRow = $(this).closest('tr');
        let row = addRowData();
        clickedRow.after(row);
        updateSerialNumbers();
        selectReinitialize();
    });

    // click on add new button
    $(document).off('click', '.add_new_row').on('click', '.add_new_row', function() {
        let row = addRowData();
        $('.addMoreItem_s').append(row);
        updateSerialNumbers();
        selectReinitialize();
    });


    // click on remove
    $('.addMoreItem_s').delegate('.remove', 'click', function() {
        $(this).closest('tr').remove();
        updateSerialNumbers();
    });

    // Initialize SortableJS for drag and drop
    $(document).ready(function() {
        const tbody = document.querySelector('.addMoreItem_s');
        if (tbody) {
            const sortable = new Sortable(tbody, {
                handle: '.drag-handle',
                animation: 150,
                ghostClass: 'sortable-ghost',
                chosenClass: 'sortable-chosen',
                dragClass: 'sortable-drag',
                onEnd: function(evt) {
                    // Update serial numbers and form field names after drag
                    updateSerialNumbers();
                    // Reinitialize select2 after reordering
                    selectReinitialize();
                }
            });
        }
    });
</script>
<style>
    .sortable-ghost {
        opacity: 0.4;
        background: #f0f0f0;
    }

    .sortable-chosen {
        cursor: grabbing !important;
    }

    .sortable-drag {
        opacity: 0.8;
    }

    .drag-handle {
        cursor: grab;
    }

    .drag-handle:active {
        cursor: grabbing;
    }
</style>
@endpush
