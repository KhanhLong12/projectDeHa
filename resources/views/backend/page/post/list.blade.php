<div id="list">
	@if($posts->count() > 0)
	<table class="table table-striped" id="organizationTable">
		<thead>
			<tr>
				<th>#</th>
				<th>Ten truyen</th>
				<th>Danh muc</th>
				<th>Tac gia</th>
				<th style="width: 25%;">Mo ta</th>
				<th>Trang thai</th>
				<th>Hanh dong</th>
			</tr>
		</thead>
		<tbody>
			<?php $key = 0 ?>
			@foreach($posts as $value)
			<tr>
				<td>{{ $key = $key+1 }}</td>
				<td>{{ $value->name }}</td>
				<td>{{ $value->category->name }}</td>
				<td>{{ $value->author->name }}</td>
				<td>{!! substr($value->description,0,-40) !!}...</td>
				<td>{{ $value->status }}</td>
				<td>
					<a href="{{ route('post.edit',$value->id) }}" class="edit btnEdit" data-toggle="modal" data-target="#editPost" data-update="{{ route('post.update',$value->id) }}"><i class="material-icons">&#xE254;</i></a>
					<a href="{{route('post.delete',$value['id'])}}" class="delete btnDelete" data-toggle="modal" data-target="#deleteForm"><i class="material-icons">&#xE872;</i></a>
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