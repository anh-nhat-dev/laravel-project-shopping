<tr>
    <td>{{$user->id}}</td>
    <td>{{$user->fullname}}</td>
    <td>
        <img src="../plugins/images/assets/studio14.jpg" width="50" alt="">
    </td>
<td><a href="{{route('admin.users.edit', ['id' => $user->id])}}">{{$user->email}}</a></td>
    <td>{{$user->created_at}}</td>
    <td>
        <a href="{{route('admin.users.edit', ['id' => $user->id])}}" class="btn btn-info "><i
                class="icon-pencil"></i>
        </a>
        <form method="POST" class="d-inline" action="{{route('admin.users.destroy', ['id' => $user->id])}}">
            <input type="hidden" value="DELETE" name="_method" >
            @csrf
            <button class="btn btn-danger"><i
                class="icon-trash"></i>
            </button>
        </form>
        
    </td>
</tr>