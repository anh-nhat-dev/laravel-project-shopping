<tr>
    <td>{{$user->id}}</td>
    <td>{{$user->fullname}}</td>
    <td>
        <img src="../plugins/images/assets/studio14.jpg" width="50" alt="">
    </td>
<td><a href="{{route('admin.users.edit', ['id' => $user->id])}}">{{$user->email}}</a></td>
    <td>{{$user->created_at->format('d/m/Y')}}</td>
    <td>
        <a href="{{route('admin.users.edit', ['id' => $user->id])}}" class="btn btn-info "><i
                class="icon-pencil"></i>
        </a>
        <a href="{{route('admin.users.destroy', ['id' => $user->id])}}" class="btn btn-danger"><i
                class="icon-trash"></i>
        </a>
    </td>
</tr>