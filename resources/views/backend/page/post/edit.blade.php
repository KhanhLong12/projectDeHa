<div class="modal fade" id="editPost" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 900px !important;">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalCenterTitle">tạo truyện</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="alert alert-danger print-error-msg-edit" style="display:none">
		        <ul></ul>
		    </div>
			<div class="modal-body">
				<form id="editFormPostID" method="post" action="" enctype="multipart/form-data">
					@csrf
					<div class="form-group">
						<label for="exampleInputName">Tên truyện</label>
						<input type="text" name="name" class="form-control ftname" placeholder="Nhap ten danh muc">
					</div>

					<div class="form-group">
						<label>Danh muc</label>
						<select class="custom-select ftCategory_id" name="category_id">
							<option value="Chọn danh mục">--Chọn danh mục--</option>
							@foreach($categories as $category)
							<option value="{{ $category->id }}">{{ $category->name }}</option>
							@endforeach
						</select>
					</div>

					<div class="form-group">
						<label>Tac gia</label>
						<select class="custom-select ftAuthor_id" name="author_id">
							<option value="Chon tac gia">--Chọn tác giả--</option>
							@foreach($authors as $author)
							<option value="{{ $author->id }}">{{ $author->name }}</option>
							@endforeach
						</select>
					</div>

					<div class="form-group">
						<label for="exampleInputDes">Mô tả</label>
						<input type="text" name="description" class="form-control ftDescription" placeholder="Nhap mo ta">
					</div>

					<div class="form-group">
						<label for="exampleInputDes">Nội dung</label>
						<textarea class="textarea ftContent" name="content" id="contentEdit" placeholder="Place some text here"
						style="width: 100%; height: 500px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
					</div>

					<div class="form-group">
						<label for="exampleInputFile">Hình ảnh:</label>
						<div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="images[]" multiple>
                                <label class="custom-file-label" for="exampleInputFile">chọn file</label>
                            </div>
                        </div>
                        <br>
                        <label for="exampleInputThumbnail"> <span style="color: #dc3545;">*</span>Ảnh đã có:</label>
                        <div class="thubnail form-group">
                        </div>
					</div>

					<div class="form-group">
						<label for="exampleInputStatus">Trạng thái</label>
						<select class="custom-select ftstatus" name="status">
							<option selected>---Chọn trạng thái---</option>
							<option value="hoạt động">hoạt động</option>
							<option value="không hoạt động">không hoạt động</option>
						</select>
					</div>

					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">hủy</button>
						<button type="button" class="btn btn-primary update-new-post">Đồng ý</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
