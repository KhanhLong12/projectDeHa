<div class="modal-body" id="abc">
    <form id="editFormID" method="post" action="" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="exampleInputName">Tên người dùng</label>
            <input type="text" value="{{ $user->name }}" name="name" class="form-control"
                   placeholder="Nhap ten người dùng">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail">Nhập email</label>
            <input type="email" value="{{ $user->email }}" name="email" class="form-control" placeholder="Nhap email">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail">Chọn quyền</label>
            <select class="form-control select2_init" id="user_role" name="user_role[]" multiple style="width: 100%;height: 150px">
                @foreach($roles as $item)
                    <option
                        value="{{$item->id}}" {{$userHasRole->contains('id',$item->id)?'selected':''}}>{{$item->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">hủy</button>
            <button type="button" class="btn btn-primary update-new-user">Đồng ý</button>
        </div>
    </form>
</div>
