@extends('admin.layouts.master');
@section('category', 'Khách hàng');
@section('title','Danh sách');
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <form method="post">
                <div class="show-delete pb-2">
                    <button class="btn btn-danger btn-sm" formaction="{{url('/admin/cu/delete')}}"><i class="fa fa-trash mr-1"></i>Xóa mục đã chọn</button>
                </div>
                <table class="table">
                <thead>
                <tr>
                    <th scope="col"><input type="checkbox" id="checkAll"></th>
                    <th scope="col">#</th>
                    <th scope="col">Tên</th>
                    <th scope="col">Ảnh</th>
                    <th scope="col">Sản phẩm</th>
                    <th scope="col">Số điện thoại</th>
                    <th scope="col">Email</th>
                    <th scope="col">Sửa</th>
                    <th scope="col">Xóa</th>
                </tr>
                </thead>
                <tbody>

                <?php $i = 1; ?>
                @foreach($customer as $c)

                    @if($c->delete_status==1)
                        <tr>
                            <td>
                                <input type="checkbox" class="sub_chk" name="id[]" value="{{$c->id}}">
                            </td>
                            <th scope="row">{{$i}}</th>
                            <td>{{$c->customer_name}}</td>
                            <td>
                                <img width="150" src="{{asset('storage/img/'.$c->image)}}" alt="">
                            </td>
                            <td>
                                <a href="{{url('/admin/list-products/'.$c->id)}}">
                                    {{$c->pds->where('delete_status',1)->count()}}
                                </a>
                            </td>
                            <td>{{$c->phone}}</td>
                            <td>{{$c->email}}</td>
                            <td><a href="/admin/customer/{{$c->id}}/edit" class="ml-2"><i
                                        class="fas fa-pencil-alt"></i></a></td>
                            <td>
                                <form method="post">
                                    <button type="submit" class="btn btn-danger btn-sm"
                                            formaction="{{ url('/admin/customer', ['id'=>$c->id]) }}"
                                            onclick="return confirm('Xoá khách hàng ? ');"><i
                                            class="fa fa-times"></i></button>
                                    @method('delete')
                                    @csrf
                                </form>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    @endif
                @endforeach
                <tr class="col-lg-12 text-center">
                    {{$customer->links()}}
                </tr>
                </tbody>
            </table>
            </form>
        </div>
    </div>
@stop
