@extends('layouts.vertical', ['page_title' => 'Edit Sector', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])



@section('content')
    <main>
        <!-- Start Content-->
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Edit Sector</h4>
                        <form method="POST" action="{{ route('backend.category.sector.update', $category->id) }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="mb-3">
                                                <label class="form-label" for="category-name">Name<span
                                                        class="text-danger">*</span></label>
                                                <input name="name" type="text" class="form-control" id="category-name"
                                                    value="{{ $category->name }}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="category-slug">Slug</label>
                                                <input name="slug" type="text" class="form-control" id="category-slug"
                                                    value="{{ $category->slug }}" />
                                            </div>


                                            <div class="mb-3" style="max-width: max-content;">
                                                <label class="form-label" for="category-order">Order</label>
                                                <input name="menu_order" type="number" class="form-control"
                                                    id="category-order" value="{{ $category->menu_order }}" required />
                                            </div>

                                        </div>
                                    </div>



                                    <div class="row">
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div
                                                            class="mb-2 d-flex align-content-center border-1 border-bottom">
                                                            <h4 class="header-title">Sector Details</h4>
                                                        </div>

                                                        <div class="my-3">
                                                            <label for="content" class="form-label">Main
                                                                Description</label>
                                                            <textarea class="editor" id="content" name="main_description">{{ isset($metaDatas['main_description']) ? $metaDatas['main_description'] : '' }}</textarea>
                                                        </div>
                                                        <div>
                                                            <div class="d-flex align-content-center">
                                                                <h4 class="header-title">Featured Image</h4>
                                                            </div>
                                                            <div class="input-group open-media-manager"
                                                                data-bs-toggle="modal" data-bs-target="#exampleModal"
                                                                style="cursor: pointer;" data-field="featured_image">
                                                                <div class="input-group-prepend">
                                                                    <div
                                                                        class="input-group-text bg-soft-secondary font-weight-medium">
                                                                        Browse</div>
                                                                </div>
                                                                <div class="form-control file-amount">Choose File</div>
                                                            </div>
                                                            <div class="preview-closer">
                                                                @if (isset($metaDatas['featured_image']) &&
                                                                        ($media = MediaHelper::getModel()->where('id', $metaDatas['featured_image'])->first()))
                                                                    <input type="hidden" id="featured_image"
                                                                        name="featured_image" class="selected-files"
                                                                        value="{{ $metaDatas['featured_image'] }}">
                                                                    <div id="featured_image_select">
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
                                                                                        data-id="{{ $media->id }}"
                                                                                        data-slug="featured_image"
                                                                                        class="btn btn-sm btn-link remove-attachment"
                                                                                        type="button"><i
                                                                                            class="bi bi-x-circle"></i></button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @else
                                                                    <input type="hidden" id="featured_image"
                                                                        name="featured_image" class="selected-files"
                                                                        value="" />
                                                                    <div id="featured_image_select"></div>
                                                                @endisset
                                                        </div>


                                                        <span class="form-text text-muted">
                                                            <small><i>(Recommended image size: 1920 by 600
                                                                    pixels)</i></small>
                                                        </span>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>


                                        <div class="mb-3">
                                            <div class="card">
                                                <div class="card-body">
                                                    <label for="sector_description" class="form-label">Sector
                                                        Description</label>
                                                    <textarea id="sector_description" name="sector_description" class="form-control">{{ isset($metaDatas['sector_description']) ? $metaDatas['sector_description'] : '' }}</textarea>
                                               
                                               
                                                                     <!-- repeater fields -->
 <div class="row mb-3">

{{-- Details --}}
<div class="mb-3">
    <label class="form-label">Sector Details</label>
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
            <tbody class="addMoreSustainability">
                @isset($metaDatas['sector_details'])
                    @php
                        $sectorDetails = unserialize($metaDatas['sector_details']);
                    @endphp
                       
                       

                    @foreach ($sectorDetails as $index => $item)
                        {{-- Fixed variable name --}}
                        <tr>
                            <td class="custom-table-no">{{ $loop->iteration }}</td>
                            <td>
                                <input type="text" name="sector_details[{{ $index }}][title]"
                                    class="form-control" value="{{ isset($item['title']) ? $item['title'] : '' }}" />
                            </td>
                            <td>
                                <textarea class="editor sector-editor" id="sector_editor_{{ $index }}" name="sector_details[{{ $index }}][description]">{{ isset($item['description']) ? $item['description'] : '' }}</textarea>
                            </td>
                            <td>
                                <div class="media-input image-input">
                                    <div class="input-group open-media-manager" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal" style="cursor: pointer;"
                                        data-field="sector_details_{{ $index }}_image"
                                        data-select="single">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text bg-soft-secondary font-weight-medium">
                                                Browse
                                            </div>
                                        </div>
                                        <div class="form-control file-amount">Choose File</div>
                                    </div>
                                    <div class="preview-closer">
                                        @if (isset($item['image']) && ($media = \App\Models\Media::where('id', $item['image'])->first()))
                                            <input type="hidden" id="sector_details_{{ $index }}_image"
                                                name="sector_details[{{ $index }}][image]"
                                                class="selected-files" value="{{ $item['image'] }}" />
                                            <div id="sector_details_{{ $index }}_image_select">
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
                                                                data-slug="sector_details_{{ $index }}_image"
                                                                class="btn btn-sm btn-link remove-attachment"
                                                                type="button">
                                                                <i class="bi bi-x-circle"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <input type="hidden" id="sector_details_{{ $index }}_image"
                                                name="sector_details[{{ $index }}][image]"
                                                class="selected-files" value="" />
                                            <div id="sector_details_{{ $index }}_image_select">
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </td>
                            <td class="text-center">
                                <a href="javascript:void(0);" class="text-success fs-16 px-1 add_more_sustainability">
                                    <i class="bi bi-plus-circle"></i>
                                </a>
                                <a href="javascript:void(0);" class="text-danger fs-16 px-1 remove_sustainability">
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
            <button type="button" class="btn btn-primary btn-sm add_sustainability">Add
                Detail</button>
        </div>
    </div>
</div>


</div>
                                               
                                                </div>
                                            </div>
                                        </div>

                  



                                    </div>
                                </div>

                                {{-- seo --}}
                                <x-backend.seo.seo-section :metaDatas="$metaDatas" />

                            </div>
                            <!-- end col-->
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between ">
                                            <p class="">
                                                <a class="btn btn-outline-info"
                                                    href="{{ route('frontend.category.sector.index', $category->slug) }}"
                                                    target="_blank">View</a>
                                            </p>
                                            <p>
                                                <input class="btn btn-primary" type="submit" value="Update" />
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>



                        </div>
                        <!-- end row -->
                    </form>
                </div>
            </div>
        </div>
        <!-- end page title -->

    </div> <!-- container -->
</main>

@include('backend.sector.partials.sector-repeater')
<livewire:backend.medias :multiple="false" :openModal="false" />

{{-- <livewire:backend.category.edit-category :id="$id" :category="$category" :categories="$categories" /> --}}
@endsection

@section('script')
@vite(['resources/js/media.js'])
@endsection
