<tr>
<td>#{{$cate->id}}</td>
    <td>{{$cate->name}}</td>
    <td>{{$cate->updated_at}}</td>
    <td>{{$cate->created_at}}</td>
    <td>
    <a href="{{route('admin.categories.edit', ['category' => $cate->id])}}" class="btn btn-info "><i
                class="icon-pencil"></i>
        </a>
        <a href="http://localhost:8000/admin/categories/1/delete" class="btn btn-danger"><i
                class="icon-trash"></i>
        </a>
    </td>
</tr>