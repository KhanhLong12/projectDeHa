<div class="modal fade" id="addPost" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 900px !important;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Tạo truyện</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="alert alert-danger print-error-msg" style="display:none">
                <ul></ul>
            </div>
            <div class="modal-body">
                <form id="createFormPostID" method="post" action="{{ route('posts.store') }}"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputName">Tên truyện</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Nhap ten danh muc">
                    </div>

                    <div class="form-group">
                        <label>Danh muc</label>
                        <select class="custom-select" name="category_id">
                            <option value="Chọn danh mục">--Chọn danh mục--</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Tac gia</label>
                        <select class="custom-select" name="author_id">
                            <option value="Chọn tác giả">--Chọn tác giả--</option>
                            @foreach($authors as $author)
                                <option value="{{ $author->id }}">{{ $author->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputDes">Mô tả</label>
                        <input type="text" name="description" class="form-control" id="description"
                               placeholder="Nhap mo ta">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputDes">Nội dung</label>
                        <textarea class="textarea" name="content" id="content" placeholder="Place some text here"
                                  style="width: 100%; height: 500px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputFile">Hình ảnh</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="exampleInputFile" name="images[]"
                                       multiple>
                                <label class="custom-file-label" for="exampleInputFile">Chọn file</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text" id="">Upload</span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputStatus">Trạng thái</label>
                        <select class="custom-select" id="status" name="status">
                            <option selected>---Chọn trạng thái---</option>
                            <option value="hoạt động">hoạt động</option>
                            <option value="không hoạt động">không hoạt động</option>
                        </select>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">hủy</button>
                        <button type="button" id="create-new-post" class="btn btn-primary">thêm mới</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
