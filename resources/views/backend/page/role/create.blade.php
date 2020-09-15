<div class="modal fade" id="addRole" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 800px !important;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Thêm mới người dùng</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="alert alert-danger print-error-msg" style="display:none">
                <ul></ul>
            </div>
            <div class="modal-body">
                <form id="createFormID" method="post" action="{{route('roles.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputName">Nhập vai trò</label>
                        <input type="text" name="name" class="form-control" placeholder="Nhập tên vai trò">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputDescription">Nhập mô tả</label>
                        <input type="text" name="description" class="form-control" placeholder="Nhập mô tả">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail">Chọn quyền</label>
                        <select class="form-control select2_init" id="permission_role" name="permission_role[]" multiple style="width: 100%;height: 150px">
                            @foreach($permissions as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">hủy</button>
                        <button type="button" id="create-new-role" class="btn btn-primary">thêm mới</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
