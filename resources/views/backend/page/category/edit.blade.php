<div class="modal fade" id="editCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 800px !important;">
    <div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalCenterTitle-1">Chỉnh sửa danh mục</h5>
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
					@include('backend.page.category.parent_category_edit')
					<div class="form-group">
						<label for="exampleInputStatus">Hiển thị</label>
						<select class="custom-select ftdisplay" name="display">
							<option selected>---Chọn hiển thị---</option>
							<option value="có">có</option>
							<option value="không">không</option>
						</select>
					</div>

					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">hủy</button>
						<button type="button" class="btn btn-primary update-new-category">Đồng ý</button>
					</div>
				</form>
			</div>
		</div>
  	</div>
</div>
