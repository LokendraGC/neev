@extends('layouts.vertical', ['page_title' => 'All Posts', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('css')
    @vite(['node_modules/datatables.net-bs5/css/dataTables.bootstrap5.min.css', 'node_modules/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css', 'node_modules/datatables.net-fixedcolumns-bs5/css/fixedColumns.bootstrap5.min.css', 'node_modules/datatables.net-fixedheader-bs5/css/fixedHeader.bootstrap5.min.css', 'node_modules/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css', 'node_modules/datatables.net-select-bs5/css/select.bootstrap5.min.css'])
@endsection

@section('content')
    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box py-3 d-flex justify-content-start align-content-center  gap-2">
                    <div class="align-self-center">
                        <h4 class="page-title" style="line-height: unset;">Posts</h4>
                    </div>
                    @can('create_post')
                        <div>
                            <a href="{{ route('backend.post.create') }}" class="btn btn-outline-primary">Add New Post</a>
                        </div>
                    @endcan
                </div>
            </div>
        </div>
        <!-- end page title -->

        @php
            $siteURL = SettingHelper::get_field('site_url');
        @endphp

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-2">
                            <div class="row-action">
                                <span class="edit">
                                    <a href="{{ route('backend.post') }}">
                                        <span class="@if ($status == 'all') text-black fw-700 @endif">
                                            All
                                        </span>
                                        ({{ $all }})</a>
                                </span>
                                @if ($publishPosts > 0)
                                    <span class="publish">
                                        |
                                        <a href="{{ route('backend.post', ['status' => 'publish']) }}" class="">
                                            <span class="@if ($status == 'publish') text-black fw-700 @endif">
                                                Publish
                                            </span> ({{ $publishPosts }})</a>
                                    </span>
                                @endif
                                @if ($draftPosts > 0)
                                    <span class="draft">
                                        |
                                        <a href="{{ route('backend.post', ['status' => 'draft']) }}" class="">
                                            <span
                                                class="@if ($status == 'draft') text-black fw-700 @endif">Draft</span>
                                            ({{ $draftPosts }})</a>
                                    </span>
                                @endif

                                @if ($trashPosts > 0)
                                    <span class="delete">
                                        |
                                        <a href="{{ route('backend.post.trash', $postType) }}" class="">
                                            <span
                                                class="@if ($status == 'trash') text-black fw-700 @endif">Trashed</span>
                                            ({{ $trashPosts }})</a>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped dt-responsive nowrap w-100 basic-datatable-id">
                                <thead>
                                    <tr>
                                        <th class="d-none">#ID</th>
                                        <th>Title</th>
                                        <th>Author</th>
                                        <th>Category</th>
                                        <th>User</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($posts as $post)
                                        <tr>
                                            <td class="d-none">{{ $post->id }}</td>
                                            <td>
                                                <span class="fw-600">{{ $post->post_title }}</span>
                                                {{ $post->post_status != 'publish' ? ' — Draft' : '' }}
                                                <br />
                                                <div class="row-action">
                                                    {{-- @can('update_post') --}}
                                                    <span class="edit">
                                                        <a href="{{ route('backend.post.edit', $post->id) }}"
                                                            class="text-primary">Edit</a>
                                                        |
                                                    </span>
                                                    {{-- @endcan --}}
                                                    {{-- @can('delete_post') --}}
                                                    <span class="delete">
                                                        <a href="{{ route('backend.post.delete', $post->id) }}"
                                                            onclick="return confirm('Are you sure you want to delete?');"
                                                            class="text-danger">Delete</a>
                                                    </span>
                                                    {{-- @endcan --}}
                                                    @if ($post->post_status == 'publish' && $siteURL)
                                                        <span class="view">
                                                            |
                                                            <a href="{{ $siteURL . '/news/' . $post->slug }}"
                                                                target="_blank" class="text-primary">View</a>
                                                        </span>
                                                    @endif
                                                </div>
                                            </td>
                                            <td>
                                                @php
                                                    $categories = $post->categories
                                                        ->where('type', 'author')
                                                        ->pluck('name')
                                                        ->sort()
                                                        ->implode(', ');
                                                @endphp
                                                {{ $categories ? $categories : '' }}
                                            </td>
                                            <td>
                                                @php
                                                    $categories = $post->categories
                                                        ->where('type', 'category')
                                                        ->pluck('name')
                                                        ->sort()
                                                        ->implode(', ');
                                                @endphp
                                                {{ $categories ? $categories : '' }}
                                            </td>
                                            <td>
                                                <a
                                                    href="{{ route('backend.user.profile', $post->user->id) }}">{{ $post->user->name }}</a>
                                                <p class="form-text text-muted" style="font-size: 0.7rem;">
                                                    {{ $post->user->email }}</p>
                                            </td>
                                            <td>
                                                Published
                                                <br>
                                                {{ \Carbon\Carbon::parse($post->created_at)->format('Y-m-d h:i a') }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div> <!-- end row-->
    </div> <!-- container -->
@endsection

@section('script')
    @vite(['resources/js/pages/demo.datatable-init.js'])
@endsection
