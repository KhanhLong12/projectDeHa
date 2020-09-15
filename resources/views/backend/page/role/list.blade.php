<div id="list" data-action="{{route('roles.list')}}">
    @if($roles->count() > 0)
        <table class="table table-striped" id="organizationTable">
            <thead>
            <tr>
                <th>#</th>
                <th>Vai trò</th>
                <th>Mô tả</th>
                <th>Hành động</th>
            </tr>
            </thead>
            <tbody>
            <?php $key = 0 ?>
            @foreach($roles as $value)
                <tr>
                    <td>{{ $key = $key+1 }}</td>
                    <td>{{ $value->name }}</td>
                    <td>
                        {{ $value->description }}
                    </td>
                    <td>
                        <a href="{{ route('roles.edit',$value->id) }}" class="edit btnEditRole" data-toggle="modal"
                           data-target="#editRole" data-update="{{route('roles.update',$value['id'])}}"><i
                                class="material-icons">&#xE254;</i></a>
                        <a href="{{ route('roles.delete',$value->id) }}" class="delete btnDelete" data-toggle="modal"
                           data-target="#deleteForm"><i class="material-icons">&#xE872;</i></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $roles->links() }}
    @else
        <div class="alert alert-secondary" style="text-align: center;" role="alert">
            đang cập nhật dữ liệu
        </div>
    @endif
</div>
