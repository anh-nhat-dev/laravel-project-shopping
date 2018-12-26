<tr>
<td>#{{$product->id}}</td>
    <td>{{$product->name}}</td>
    <td>
    <img src="{{asset($product->thumbnail)}}" width="50" alt="">
    </td>
    <td>@money($product->sale_price, 'VND')</td>
    <td>{{$product->categories->name}}</td>
    <td>{{$product->created_at}}</td>
    <td><span class="label @if ($product->status == 'public') label-success @else label-warning @endif label-rounded">
        @if ($product->status == 'public') PUBLIC @else DRAFF @endif</span>
    </td>
    <td>
    <a href="{{route('admin.products.edit', ['product' => $product->id])}}" class="btn btn-info "><i class="icon-pencil"></i>
</a>
<form method="POST" class="d-inline" action="{{route('admin.products.destroy', ['product' => $product->id])}}">
        <input type="hidden" value="DELETE" name="_method" >
        @csrf
        <button class="btn btn-danger"><i
            class="icon-trash"></i>
        </button>
    </form>
    </td>

</tr>