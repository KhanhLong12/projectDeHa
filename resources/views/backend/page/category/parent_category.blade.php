<div class="form-group" id="parent_category">
	<label>Danh muc</label>
	<select class="custom-select ftparent_category" name="parent_category">
		<option value="danh muc cha">danh muc cha</option>
		@foreach($parent_category as $item)
			<option value="{{ $item->name }}">{{ $item->name }}</option>
		@endforeach
	</select>
</div>