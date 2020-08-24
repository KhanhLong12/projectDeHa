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

	<div class="table-responsive">
		<div class="table-wrapper">			
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<a  style="color: white">Danh sach</a>
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
			@include('backend.page.category.list')
		</div>
	</div> 
</div>

<div class="row">
	<div id="list">
		
	</div>

</div>

@endsection
@push('js')
<script type="text/javascript">
	let urlList = "{{route('category.list')}}";
</script>
<script src="{{ asset('backend/category/category_create.js') }}"></script>
@endpush