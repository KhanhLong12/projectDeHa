@extends('backend.main')
@section('content')
<div class="container-fluid">
	<h1 class="mt-4">Tac gia</h1>
	<ol class="breadcrumb mb-4">
		<li class="breadcrumb-item active">phan tac gia</li>
	</ol>

	<!-- Button trigger modal -->
	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addAuthor">
		<i class="fas fa-plus"></i> Them moi
	</button>

	<!-- ----create author------ -->
	@include('backend.page.author.create')

	<!-- ----edit author------ -->
	@include('backend.page.author.edit')

	<!-- ----delete author------ -->
	@include('backend.page.author.delete')

	<div class="table-responsive">
		<div class="table-wrapper">			
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2>Danh sach</h2>
					</div>
					<div class="col-sm-6">
						<div class="search-box">
							<form class="form-inline" id="formSearch" name="search" action="{{ route('author.search') }}">
								<div class="form-group">								
									<input type="text" id="search" class="form-control" placeholder="Search by Name">
									<span class="input-group-addon"><i class="material-icons">&#xE8B6;</i></span>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			@include('backend.page.author.list')
		</div>
	</div>        
</div>
@endsection
@push('js')
<script type="text/javascript">
	let urlList = "{{route('author.list')}}";
</script>
<script src="{{ asset('backend/author/author.js') }}"></script>
@endpush