@extends('layouts.vertical', ['page_title' => 'Edit Team Category', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])



@section('content')
    <main>
        <!-- Start Content-->
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Edit Team Category</h4>
                        <form method="POST" action="{{ route('backend.category.team_category.update', $category->id) }}">
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
                                                <label class="form-label" for="category-order"> Menu Order</label>
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
                                                            <h4 class="header-title">Team Category Builder</h4>
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




                                                    </div>



                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                {{-- team category builder --}}
                                <div class="row">
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div
                                                        class="mb-2 d-flex align-content-center border-1 border-bottom">
                                                        <h4 class="header-title">Team Category Details</h4>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label" for="subtitle">Subtitle</label>
                                                        <input name="subtitle" id="subtitle" type="text"
                                                            class="form-control"
                                                            value="{{ isset($metaDatas['subtitle']) ? $metaDatas['subtitle'] : '' }}" />
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label" for="short_description">Short
                                                            Description</label>
                                                        <textarea name="short_description" id="short_description" class="form-control" rows="3">{{ isset($metaDatas['short_description']) ? $metaDatas['short_description'] : '' }}</textarea>
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

<livewire:backend.medias :multiple="false" :openModal="false" />

{{-- <livewire:backend.category.edit-category :id="$id" :category="$category" :categories="$categories" /> --}}
@endsection

@section('script')
@vite(['resources/js/media.js'])
@endsection
