<div class="modal-body" id="listRole">
    <form id="editFormID" method="post" action="" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="exampleInputName">Tên vai trò</label>
            <input type="text" value="{{ $role->name }}" name="name" class="form-control"
                   placeholder="Nhập tên vai trò">
        </div>

        <div class="form-group">
            <label for="exampleInputDescription">Nhập mô tả</label>
            <input type="text" value="{{ $role->description }}" name="description" class="form-control"
                   placeholder="Nhập mô tả">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail">Chọn quyền</label>
            <select class="form-control select2_init" id="permission_role" name="permission_role[]" multiple style="width: 100%;height: 150px">
                @foreach($permissions as $item)
                    <option
                        value="{{$item->id}}" {{$roleHasPermission->contains('id',$item->id)?'selected':''}}>{{$item->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">hủy</button>
            <button type="button" class="btn btn-primary update-new-role">Đồng ý</button>
        </div>
    </form>
</div>
