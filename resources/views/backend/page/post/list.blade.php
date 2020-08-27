@if($items->count() > 0)
	<table class="table table-striped">
		<thead>
			<tr>
				<th>#</th>
				<th>Ten</th>
				<th>Danh muc</th>
				<th>Tac gia</th>
				<th style="width: 22%;">Mo ta</th>
				<th>Trang thai</th>
				<th>Hanh dong</th>
			</tr>
		</thead>
		<tbody>
			<?php $key = 0 ?>
			@foreach($items as $value)
			<tr>
				<td>{{ $key+1 }}</td>
				<td>{{ $value->name }}</td>
				<td>{{ $value->category->name }}</td>
				<td>{{ $value->author->name }}</td>
				<td>{{ ($value->description) }}</td>
				<td>{{ $value->status }}</td>
				<td>
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