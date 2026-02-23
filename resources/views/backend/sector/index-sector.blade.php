@extends('layouts.vertical', ['page_title' => $page_title, 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('css')
    @vite(['node_modules/datatables.net-bs5/css/dataTables.bootstrap5.min.css', 'node_modules/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css', 'node_modules/datatables.net-fixedcolumns-bs5/css/fixedColumns.bootstrap5.min.css', 'node_modules/datatables.net-fixedheader-bs5/css/fixedHeader.bootstrap5.min.css', 'node_modules/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css', 'node_modules/datatables.net-select-bs5/css/select.bootstrap5.min.css'])
@endsection


@section('content')
    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">{{ ucfirst($categoryType) }}</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-5">

                <div class="card">
                    <div class="card-body">

                        <form method="POST" action="{{ route('backend.category.sector.store') }}">
                            @csrf
                            <input type="hidden" name="type" value="{{ $type }}" />
                            <div class="mb-3">
                                <label class="form-label" for="category-name">Name<span class="text-danger">*</span></label>
                                <input name="name" type="text" class="form-control" id="category-name" />
                                @error('name')
                                    <div class="invalid-feedback d-block ">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="category-slug">Slug</label>
                                <input name="slug" type="text" class="form-control" id="category-slug" />
                                {{-- @error('slug')
                                    <div class="invalid-feedback d-block ">
                                        {{ $message }}
                                    </div>
                                @enderror --}}
                            </div>

                            <div class="my-3">
                                <label for="content" class="form-label">Main
                                    Description</label>
                                <textarea class="editor" id="content" name="main_description"></textarea>
                            </div>
                            <div>
                                <div class="mb-2 d-flex align-content-center">
                                    <h4 class="header-title">Featured Image</h4>
                                </div>
                                <div class="input-group open-media-manager" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal" style="cursor: pointer;" data-field="featured_image">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text bg-soft-secondary font-weight-medium">
                                            Browse</div>
                                    </div>
                                    <div class="form-control file-amount">Choose File</div>
                                </div>
                                <div class="preview-closer">
                                    <input type="hidden" id="featured_image" name="featured_image" class="selected-files"
                                        value="" />
                                    <div id="featured_image_select" class="clearfix"></div>
                                </div>


                                <span class="form-text text-muted">
                                    <small><i>(Recommended image size: 1920 by 600 pixels)</i></small>
                                </span>



                            </div>
                            <div class="d-block">
                                <button class="btn btn-primary mt-3" type="submit">Add New
                                    Sector</button>
                            </div>
                        </form>

                    </div>
                    <!-- end card-body-->
                </div>
                <!-- end card-->


                {{-- <livewire:backend.category.create-category :category_name="$category_name" /> --}}

            </div> <!-- end col-->


            <div class="col-lg-7">

                {{-- <livewire:backend.category.list-category :category_name="$category_name" /> --}}

                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="basic-datatable" class="table table-striped dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Slug</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @isset($categories)
                                        {{-- children  --}}
                                        <?php
                                        if (!function_exists('displaySubCategories')) {

                                        function displaySubCategories($categories, $level = 0, $cat = NULL)
                                        {
                                            $dashed = '';
                                            foreach ($categories as $category) {
                                                $dashed = '';
                                                for ($i = 1; $i <= $level; $i++) {
                                                    $dashed .= '— ';
                                                }
                                        ?>
                                        <tr>
                                            <td>
                                                <span class="fw-600"> <?php echo $dashed . $category->name; ?></span>
                                                <div class="row-action">
                                                    <span class="edit">
                                                        <a href="{{ route('backend.category.sector.edit', $category->id) }}"
                                                            class="text-primary">Edit</a>
                                                    </span>
                                                    <span class="delete">
                                                        |
                                                        <a href="{{ route('backend.category.sector.delete', $category->id) }}"
                                                            onclick="return confirm('Are you sure you want to delete?');"
                                                            class="text-danger">Delete</a>
                                                    </span>

                                                </div>
                                            </td>
                                            <td>{{ $category->slug }}</td>
                                            <td>
                                                Published <br>
                                                {{ \Carbon\Carbon::parse($category->created_at)->format('Y-m-d h:i a') }}
                                            </td>
                                        </tr>
                                        <?php
                                        // Recursively call the function for child categories with increased indentation level
                                                if ($category->children->count() > 0) {
                                                    displaySubCategories($category->children, $level + 1);
                                                }
                                            }
                                        }
                                        }
                                        ?>

                                        @foreach ($categories as $category)
                                            {{-- show parent category --}}
                                            <tr>
                                                <td>
                                                    <span class="fw-600"> {{ $category->name }}</span>
                                                    <div class="row-action">
                                                        <span class="edit">
                                                            <a href="{{ route('backend.category.sector.edit', $category->id) }}"
                                                                class="text-primary">Edit</a>
                                                        </span>
                                                        <span class="delete">
                                                            |
                                                            <a href="{{ route('backend.category.sector.delete', $category->id) }}"
                                                                onclick="return confirm('Are you sure you want to delete?');"
                                                                class="text-danger">Delete</a>
                                                        </span>
                                                        <span class="view">
                                                            |
                                                            <a href="{{ route('frontend.category.sector.index', $category->slug) }}"
                                                                target="_blank" class="text-primary">View</a>
                                                        </span>
                                                    </div>
                                                </td>
                                                <td>{{ $category->slug }}</td>
                                                <td>
                                                    Published <br>
                                                    {{ \Carbon\Carbon::parse($category->created_at)->format('Y-m-d h:i a') }}
                                                </td>
                                            </tr>

                                            {{-- show children --}}
                                            @if ($category->children->count() > 0)
                                                @php displaySubCategories($category->children, 1, $categoryType) @endphp
                                            @endif
                                        @endforeach
                                    @endisset
                                </tbody>

                            </table>
                        </div>

                        <div class="d-flex justify-content-center justify-content-lg-end">
                            {{-- {{ $categories->links() }} --}}
                        </div>
                    </div> <!-- end card body-->
                </div> <!-- end card -->


            </div> <!-- end col-->
        </div>
        <!-- end row -->

    </div> <!-- container -->
    <livewire:backend.medias :multiple="false" :openModal="false" />
@endsection

@section('script')
    @vite(['resources/js/pages/demo.datatable-init.js'])
    @vite(['resources/js/media.js'])
@endsection
