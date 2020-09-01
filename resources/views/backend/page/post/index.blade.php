@extends('backend.main')
@section('content')
<div class="container-fluid">
	<h1 class="mt-4">Sach</h1>
	<ol class="breadcrumb mb-4">
		<li class="breadcrumb-item active">phan sach</li>
	</ol>

	<!-- Button trigger modal -->
	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addPost">
		<i class="fas fa-plus"></i> Them moi
	</button>
	<!-- ----create post------ -->
	@include('backend.page.post.create')

	<!-- ----delete post------ -->
	@include('backend.page.post.delete')
	<div class="table-responsive">
		<div class="table-wrapper">			
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2>Danh sach</h2>
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
			@include('backend.page.post.list')
		</div>
	</div>        
</div>
@endsection
@push('js')
<script type="text/javascript">
	var urlList = "{{route('post.list')}}";
</script>
<script src="{{ asset('backend/post/post.js') }}"></script>
@endpush