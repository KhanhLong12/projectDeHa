<div id="list">
	@if($items->count() > 0)
		<table class="table table-striped">
			<thead>
				<tr>
					<th>#</th>
					<th>Ten tac gia</th>
					<th>Hinh anh</th>
					<th>Hanh dong</th>
				</tr>
			</thead>
			<tbody>
				@foreach($items as $key => $value)
				<tr>
					<td>{{ $key + 1 }}</td>
					<td>{{ $value['name'] }}</td>
					@if($value['thumbnail'])
						<td><img src="{{ asset('images/author/'.$value['thumbnail']) }}" style="width: 20%;"></td>
					@else
						<td><img src="{{ asset('backend/assets/img/unnamed.png') }}" style="width: 20%;"></td>
					@endif
					<td>
						<a href="{{route('author.detail',$value['id'])}}" class="show" title="Show" data-toggle="tooltip" style="color: blue"><i class="fas fa-eye"></i></a>
						<a href="{{route('author.edit',$value['id'])}}" class="edit btnEdit" data-toggle="modal" data-target="#editAuthor" data-update="{{route('author.update',$value['id'])}}"><i class="material-icons">&#xE254;</i></a>
						<a href="{{route('author.delete',$value['id'])}}" class="delete btnDelete" data-toggle="modal" data-target="#deleteForm"><i class="material-icons">&#xE872;</i></a>
					</td>
				</tr> 
				@endforeach     
			</tbody>
		</table>
		@else
		<div class="alert alert-secondary" style="text-align: center;" role="alert">
			dang cap nhat du lieu
		</div>
	@endif
</div>