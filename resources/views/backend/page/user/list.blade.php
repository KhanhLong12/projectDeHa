<div id="list" data-action="{{route('users.list')}}">
    @if($users->count() > 0)
        <table class="table table-striped" id="organizationTable">
            <thead>
            <tr>
                <th>#</th>
                <th>Tên</th>
                <th>Email</th>
                <th>Quyền</th>
                <th>Hành động</th>
            </tr>
            </thead>
            <tbody>
            <?php $key = 0 ?>
            @foreach($users as $value)
                <tr>
                    <td>{{ $key = $key+1 }}</td>
                    <td>{{ $value->name }}</td>
                    <td>{{ $value->email }}</td>
                    <td>
                        @foreach($value->roles as $item)
                            <p>{{ $item->name }}</p>
                        @endforeach
                    </td>
                    <td>
                        <a href="{{ route('users.edit',$value->id) }}" class="edit btnEdit" data-toggle="modal"
                           data-target="#editUser" data-update="{{route('users.update',$value['id'])}}"><i
                                class="material-icons">&#xE254;</i></a>
                        <a href="{{route('users.delete',$value['id'])}}" class="delete btnDelete" data-toggle="modal"
                           data-target="#deleteForm"><i class="material-icons">&#xE872;</i></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <div class="alert alert-secondary" style="text-align: center;" role="alert">
            đang cập nhật dữ liệu
        </div>
    @endif
</div>
