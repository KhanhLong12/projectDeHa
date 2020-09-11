<div id="list" data-action="{{route('authors.list')}}">
    @if($authors->count() > 0)
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Tên tác giả</th>
                <th>Hình ảnh</th>
                <th>hành động</th>
            </tr>
            </thead>
            <tbody>
            @foreach($authors as $key => $value)
                <tr>
                    <td>{{ $value['id'] }}</td>
                    <td>{{ $value['name'] }}</td>
                    @if($value['thumbnail'])
                        <td><img src="{{ asset('images/author/'.$value['thumbnail']) }}" style="width: 20%;"></td>
                    @else
                        <td><img src="{{ asset('backend/assets/img/unnamed.png') }}" style="width: 20%;"></td>
                    @endif
                    <td>
                        <a href="{{route('authors.detail',$value['id'])}}" class="show" title="Show"
                           data-toggle="tooltip" style="color: blue"><i class="fas fa-eye"></i></a>
                        <a href="{{route('authors.edit',$value['id'])}}" class="edit btnEdit" data-toggle="modal"
                           data-target="#editAuthor" data-update="{{route('authors.update',$value['id'])}}"><i
                                class="material-icons">&#xE254;</i></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $authors->links() }}
    @else
        <div class="alert alert-secondary" style="text-align: center;" role="alert">
            đang cập nhật dữ liệu
        </div>
    @endif
</div>
