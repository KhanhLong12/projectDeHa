@extends('backend.main')
@section('content')
    <div class="container-fluid">
        <h1 class="mt-4">Sách</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">phần sách</li>
        </ol>

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addPost">
            <i class="fas fa-plus"></i> Thêm mới
        </button>
        <!-- ----create post------ -->
    @include('backend.page.post.create')

    <!-- edit post -->
    @include('backend.page.post.edit')

    <!-- ----delete post------ -->
        @include('backend.page.post.delete')
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2>Danh sách</h2>
                        </div>
                        <div class="col-sm-6">
                            <div class="search-box">
                                <div class="input-group">
                                    <input type="text" id="search" class="form-control" placeholder="Search by Name">
                                    <span class="input-group-addon"><i class="material-icons">&#xE8B6;</i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="list" data-action="{{route('posts.list')}}">
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script type="text/javascript">
        let postCreate = CKEDITOR.replace('content');
    </script>
    <script src="{{ asset('backend/post/post.js') }}"></script>
@endpush
