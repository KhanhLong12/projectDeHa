<div class="modal fade" id="addAuthor" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 800px !important;">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalCenterTitle">Them moi tac gia</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="alert alert-danger print-error-msg" style="display:none">
		        <ul></ul>
		    </div>
			<div class="modal-body">
				<form id="createFormID" method="post" action="{{ route('author.store') }}" enctype="multipart/form-data">
					@csrf
					<div class="form-group">
						<label for="exampleInputName">Ten tac gia</label>
						<input type="text" name="name" class="form-control" id="name" placeholder="Nhap ten tac gia">
					</div>

					<div class="form-group">
						<label for="exampleInputFile">Ảnh: <span style="color: #dc3545;">*</span></label>
						<div class="custom-file">
							<input type="file" class="form-control" id="exampleInputFile" id="thumb" name="thumb">
						</div>
					</div>

					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">huy</button>
						<button type="button" id="create-new-author" class="btn btn-primary">them moi</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>