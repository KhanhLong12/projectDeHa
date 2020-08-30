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
				<?php $key = 0 ?>
				@foreach($items as $value)
				<tr>
					<td>{{ $key = $key + 1 }}</td>
					<td>{{ $value->name }}</td>
					<td>{{ $value->thumbnail }}</td>
					<td>
						<a href="#" class="show" title="Show" data-toggle="tooltip" style="color: blue"><i class="fas fa-eye"></i></a>
						<a href="#" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
						<a href="#" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
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