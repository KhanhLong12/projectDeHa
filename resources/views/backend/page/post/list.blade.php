<div id="list" data-action="{{route('posts.list')}}">
    @if($posts->count() > 0)
        <table class="table table-striped" id="organizationTable">
            <thead>
            <tr>
                <th>#</th>
                <th>Tên truyện</th>
                <th>Danh mục</th>
                <th>Tác giả</th>
                <th style="width: 25%;">Mô tả</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
            </tr>
            </thead>
            <tbody>
            <?php $key = 0 ?>
            @foreach($posts as $value)
                <tr>
                    <td>{{ $key = $key+1 }}</td>
                    <td>{{ $value->name }}</td>
                    <td>{{ $value->category->name }}</td>
                    <td>{{ $value->author->name }}</td>
                    <td>{!! substr($value->description,0,-40) !!}...</td>
                    <td>{{ $value->status }}</td>
                    <td>
                        <a href="{{ route('posts.edit',$value->id) }}" class="edit btnEdit" data-toggle="modal"
                           data-target="#editPost" data-update="{{ route('posts.update',$value->id) }}"><i
                                class="material-icons">&#xE254;</i></a>
                        <a href="{{route('posts.delete',$value['id'])}}" class="delete btnDelete" data-toggle="modal"
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
