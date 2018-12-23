<tr>
<td>#{{$cate->id}}</td>
    <td>{{$cate->name}}</td>
    <td>{{$cate->updated_at}}</td>
    <td>{{$cate->created_at}}</td>
    <td>
    <a href="{{route('admin.categories.edit', ['category' => $cate->id])}}" class="btn btn-info "><i
                class="icon-pencil"></i>
        </a>
        <form method="POST" class="d-inline" action="{{route('admin.categories.destroy', ['id' => $cate->id])}}">
                <input type="hidden" value="DELETE" name="_method" >
                @csrf
                <button class="btn btn-danger"><i
                    class="icon-trash"></i>
                </button>
            </form>
    </td>
</tr>