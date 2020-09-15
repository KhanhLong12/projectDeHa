<div class="form-group" id="parent_category">
	<label>Danh muc</label>
	<select class="custom-select ftparent_category" name="parent_id">
		<option value="0">danh muc cha</option>
		@foreach($parentCategory as $item)
			<option value="{{ $item->id }}">{{ $item->name }}</option>
		@endforeach
	</select>
</div>
