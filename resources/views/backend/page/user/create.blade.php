<div class="modal fade" id="addUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                <form id="createFormID" method="post" action="{{route('users.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputName">Tên Người dùng</label>
                        <input type="text" name="name" class="form-control" placeholder="Nhap ten người dùng">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail">Nhập email</label>
                        <input type="email" name="email" class="form-control" placeholder="Nhap email">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail">Nhập mật khẩu</label>
                        <input type="password" name="password" class="form-control" placeholder="Nhap mật khẩu">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail">Chọn quyền</label>
                        <select class="form-control select2_init" id="user_role" name="user_role[]" multiple style="width: 100%">
                            @foreach($roles as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">hủy</button>
                        <button type="button" id="create-new-user" class="btn btn-primary">thêm mới</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
