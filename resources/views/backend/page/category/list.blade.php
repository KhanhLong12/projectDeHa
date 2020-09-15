<div id="list" data-action="{{route('categories.list')}}">
    @if($categories->count() > 0)
        <table class="table table-striped" id="organizationTable">
            <thead>
            <tr>
                <th>ID</th>
                <th>Ten</th>
                <th>Danh muc</th>
                <th>Hien thi</th>
                <th>Hanh dong</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $key => $value)
                <tr>
                    <td>{{ $value['id'] }}</td>
                    <td>{{ $value['name'] }}</td>
                    @if($value['parent_id'] == 0)
                        <td>danh mục cha</td>
                    @else
                        <td>{{$value->categoryParent['name'] }}</td>
                    @endif
                    <td>{{ $value['display'] }}</td>
                    <td>
                        <a href="{{route('categories.edit',$value['id'])}}" class="edit btnEdit" data-toggle="modal"
                           data-target="#editCategory" data-update="{{route('categories.update',$value['id'])}}"><i
                                class="material-icons">&#xE254;</i></a>
                        <a href="{{route('categories.delete',$value['id'])}}" class="delete btnDelete"
                           data-toggle="modal" data-target="#deleteForm"><i class="material-icons">&#xE872;</i></a>
                    </td>
                </tr>
            @endforeach
            @include('backend.page.category.edit')
            </tbody>
        </table>
        {{ $categories->links() }}
    @else
        <div class="alert alert-secondary" style="text-align: center;" role="alert">
            dang cap nhat du lieu
        </div>
    @endif
</div>
