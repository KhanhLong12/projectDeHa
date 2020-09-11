<div class="modal fade" id="addCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 800px !important;">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalCenterTitle">Tạo danh mục</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="alert alert-danger print-error-msg" style="display:none">
		        <ul></ul>
		    </div>
			<div class="modal-body">
				<form id="createFormID" method="post" action="{{ route('categories.store') }}" enctype="multipart/form-data">
					@csrf
					<div class="form-group">
						<label for="exampleInputName">Tên danh mục</label>
						<input type="text" name="name" class="form-control" id="name" placeholder="Nhap ten danh muc">
					</div>
						@include('backend.page.category.parent_category')
					<div class="form-group">
						<label for="exampleInputStatus">hiển thị</label>
						<select class="custom-select" id="display" name="display">
							<option selected>---Chọn hiển thị---</option>
							<option value="có">có</option>
							<option value="không">không</option>
						</select>
					</div>

					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">hủy</button>
						<button type="button" id="create-new-category" class="btn btn-primary">thêm mới</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
