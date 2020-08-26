<div class="modal fade" id="editCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 800px !important;">
    <div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalCenterTitle-1">Chinh sua danh muc</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="alert alert-danger print-error-msg" style="display:none">
		        <ul></ul>
		    </div>
			<div class="modal-body">
				<form id="editFormID" method="post" action="" enctype="multipart/form-data">
					@csrf
					<div class="form-group">
						<label for="exampleInputName"></label>
						<input type="text" name="name" class="form-control ftname" placeholder="Nhap ten danh muc">
					</div>

					<div class="form-group">
						<label>Danh muc</label>
						<select class="custom-select ftparent_category" name="parent_category">
							<option value="danh muc cha">danh muc cha</option>
							@foreach($parent_category as $item)
								<option value="{{ $item->name }}">{{ $item->name }}</option>
							@endforeach
						</select>
					</div>

					<div class="form-group">
						<label for="exampleInputStatus">Hien thi</label>
						<select class="custom-select ftdisplay" name="display">
							<option selected>---Chon hien thi---</option>
							<option value="co">co</option>
							<option value="khong">khong</option>
						</select>
					</div>

					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">huy</button>
						<button type="button" class="btn btn-primary edit-new-category">them moi</button>
					</div>
				</form>
			</div>
		</div>
  	</div>
</div>