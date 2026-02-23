@extends('layouts.vertical', ['page_title' => 'Edit Media', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('css')
    @vite(['node_modules/select2/dist/css/select2.min.css', 'node_modules/daterangepicker/daterangepicker.css', 'node_modules/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.css', 'node_modules/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css', 'node_modules/bootstrap-timepicker/css/bootstrap-timepicker.min.css', 'node_modules/flatpickr/dist/flatpickr.min.css'])
@endsection


@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Edit Media</h4>
                </div>
            </div>
        </div>
        <form method="POST" action="{{ route('backend.media.update', $post->id) }}">
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
                                        <h4 class="header-title">Single Media Builder</h4>
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

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="product-order">Source</label>
                                                        <input name="source" type="text" class="form-control"
                                                            id="product-order" value="{{ isset($metaDatas['source']) ? $metaDatas['source'] : '' }}" />
                                                    </div>

                                                </div>

                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="product-order">Source URL</label>
                                                        <input name="source_url" type="url" class="form-control"
                                                            id="product-order" value="{{ isset($metaDatas['source_url']) ? $metaDatas['source_url'] : '' }}" />
                                                    </div>

                                                </div>

                                            </div>

                                            <hr>

                                                 <div class="row">

                                                    <div class="mb-3">
                                                        <label class="form-label">Choose Company</label>
                                                        <select class="select2 form-control select2-multiple"
                                                            data-toggle="select2" data-placeholder="Select Company"
                                                            name="choose_company">
                                                            <option value="0">None</option>
                                                            @foreach ($companies as $company)
                                                                @isset($metaDatas['choose_company'])
                                                                    <option value="{{ $company->id }}"
                                                                        @if ($metaDatas['choose_company'] == $company->id) selected @endif>
                                                                        {{ $company->post_title }}
                                                                    </option>
                                                                @else
                                                                    <option value="{{ $company->id }}">
                                                                        {{ $company->post_title }}
                                                                    </option>
                                                                @endisset
                                                            @endforeach
                                                        </select>
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
                    <x-backend.post.status :post="$post" route="" button="Update" />

                    {{-- featured image --}}
                    <x-backend.post.featured-image :metaDatas="$metaDatas" />



                    {{-- sector categories --}}
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
