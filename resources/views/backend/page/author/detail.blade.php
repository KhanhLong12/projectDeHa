@extends('backend.main')
@section('content')
<div class="container-fluid">
	<h1 class="mt-4">Tac gia</h1>
	<ol class="breadcrumb mb-4">
		<li class="breadcrumb-item active">phan tac gia</li>
	</ol>
	<a href="{{ route('author.index') }}"> Quay lai <i class="fas fa-undo-alt"></i></a>
	<div class="table-responsive">
		<div class="table-wrapper">			
			<div class="table-title">
				<h5>Truyen hay - {{ $data[0]->name }}</h5	>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-5">
					<div class="title" style="font-size: 20px; color: black; font-weight: bold ; padding: 10px 0px;">
						Anh tac gia
					</div>
					@if(!$data[0]->thumbnail)
						<img style="width: 70%;" src="{{ asset('backend/assets/img/unnamed.png') }}">
					@else
					<div>
						<img src="{{ asset('images/author/'.$data[0]['thumbnail']) }}">
					</div>
					@endif
				</div>
				<div class="col-xs-12 col-sm-6 col-md-7" style="border-left: 1px solid #dedede;">
					<div class="title" style="font-size: 20px; color: black; font-weight: bold ;border-bottom: 1px solid #dedede; padding: 10px 0px;">
						Danh sach truyen 
					</div>
					@if($data[0]->name)
						<?php $key = 0; ?>
							
						<div style="padding: 10px 0px;">
							@foreach($data[1] as $namePost)
							<p><span style="color: black">{{ $key = $key + 1 }}.</span> <a href="" style="color: #008cba;">{{$namePost->name}}</a></p>
							@endforeach
						</div>
					@else
						<div style="padding: 10px 0px;">
							<div class="alert alert-dark" role="alert">
								Du lieu dang duoc cap nhat
							</div>
						</div>
					@endif
				</div>
			</div>
		</div>
	</div>        
</div>
@endsection