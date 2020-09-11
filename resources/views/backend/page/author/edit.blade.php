<div class="modal fade" id="editAuthor" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 800px !important;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">chỉnh sửa tác giả</h5>
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
                        <label for="exampleInputName">Tên tác giả</label>
                        <input type="text" name="name" class="form-control ftname" placeholder="Nhap ten tac gia">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputFile">Ảnh: <span style="color: #dc3545;">*</span></label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="exampleInputFile" name="thumbnail"
                                   multiple>
                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                        <img style="width: 20%" class="ftThumbnail" src="">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">hủy</button>
                        <button type="button" class="btn btn-primary update-new-author">Đồng ý</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
