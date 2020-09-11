@extends('backend.main')
@section('content')
    <div class="container-fluid">
        <h1 class="mt-4">Danh muc</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">phan danh sach</li>
        </ol>

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addCategory">
            <i class="fas fa-plus"></i> Them moi
        </button>

        <!-- create category -->
    @include('backend.page.category.create')

    <!-- edit category -->
    @include('backend.page.category.edit')

    <!-- delete category -->
        @include('backend.page.category.delete')
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2>Danh sach</h2>
                        </div>
                        <div class="col-sm-6">
                            <div class="search-box">

                                <form class="form-inline" id="formSearch" name="search"
                                      action="{{ route('categories.list') }}">
                                    <div class="form-group">
                                        <input type="text" id="search" class="form-control"
                                               placeholder="Search by Name">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">search</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
                <div id="list" data-action="{{route('categories.list')}}">
                </div>
            </div>
        </div>
    </div>


@endsection
@push('js')
    <script type="text/javascript">
        let urlCategory = "{{route('categories.parent_category')}}";
        let urlCategoryEdit = "{{route('categories.category_edit')}}";
    </script>
    <script src="{{ asset('backend/category/category.js') }}"></script>
@endpush
