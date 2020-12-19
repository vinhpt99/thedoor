@extends('admin.layouts.master');
@section('category', 'Sản phẩm');
@section('title','Danh sách');
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-12 text-center">
                    @foreach($title as $t)
                        <h3>Khách hàng : <u><b>{{$t->customer_name}}</b></u></h3>
                    @endforeach

                </div>
            </div>
            <form method="post">
                <div class="show-delete pb-2">
                    <button class="btn btn-danger btn-sm" formaction="{{url('/admin/cu/delete')}}"><i
                            class="fa fa-trash mr-1"></i>Xóa mục đã chọn
                    </button>
                </div>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col"><input type="checkbox" id="checkAll"></th>
                        <th scope="col">#</th>
                        <th scope="col">Tên</th>
                        <th scope="col">Thời gian bắt đầu</th>
                        <th scope="col">Thời gian kết thúc</th>
                        <th scope="col">Xem thêm</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1; ?>
                    @if($products)
                        @foreach($products as $p)
                            <tr>
                                <td>
                                    <input type="checkbox" class="sub_chk" name="id[]" value="">
                                </td>
                                <th scope="row">{{$i}}</th>
                                <td>

                                    {{$p->name}}

                                </td>
                                <td>{{$p->begin_day}}</td>
                                <td>{{$p->finish_date}}</td>
                                        <td><a href="/admin/view-product/{{$p->id}}">Xem chi tiết</a></td>
                            </tr>
                            <?php $i++; ?>
                        @endforeach
                    @endif
                    <tr class="col-lg-12 text-center">
                        {{$products->links()}}
                    </tr>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
@stop
