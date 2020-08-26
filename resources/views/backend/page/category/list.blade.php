<div id="list">
	@if($items->count() > 0)
	<table class="table table-striped" id="organizationTable">
		<thead>
			<tr>
				<th>ID</th>
				<th>Ten</th>
				<th>Danh muc</th>
				<th>Hien thi</th>
				<th>Hanh dong</th>
			</tr>
		</thead>
		<tbody>
			@foreach($items as $key => $value)
			<tr>
				<td>{{ $key+1 }}</td>
				<td>{{ $value['name'] }}</td>
				<td>{{ $value['parent_category'] }}</td>
				<td>{{ $value['display'] }}</td>
				<td>
					<a href="{{route('category.edit',$value['id'])}}" class="edit btnEdit" data-toggle="modal" data-target="#editCategory" data-update="{{route('category.update',$value['id'])}}"><i class="material-icons">&#xE254;</i></a>
					<a href="{{route('category.delete',$value['id'])}}" class="delete btnDelete" data-toggle="modal" data-target="#deleteForm"><i class="material-icons">&#xE872;</i></a>
				</td>
			</tr> 
			@endforeach
			@include('backend.page.category.edit')
		</tbody>
	</table>
	@else
	<div class="alert alert-secondary" style="text-align: center;" role="alert">
		dang cap nhat du lieu
	</div>
	@endif
</div>