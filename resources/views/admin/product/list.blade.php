@extends('admin.layouts.master')
@section('category', 'Sản phẩm')
@section('title','Danh sách')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <form method="post" id="show-list-products">
                @method('delete')
                @csrf
                <div class="show-delete pb-2">
                    <button class="btn btn-danger btn-sm" onclick="deleteProductMultiple()"><i
                                class="fa fa-trash mr-1"></i>Xóa mục đã chọn
                    </button>
                </div>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col"><input type="checkbox" id="checkAll">
                        </th>
                        <td>#</td>
                        <th scope="col">Tên sản phẩm</th>
                        <th scope="col">Tên khách hàng</th>
                        <th scope="col">Tên dịch vụ</th>
                        <th scope="col">Ngày bắt đầu</th>
                        <th scope="col">Ngày kết thúc</th>
                        <th scope="col">Thành viên</th>
                        <th scope="col">Sửa</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1; ?>
                    @foreach($product as $key => $p)
                        <tr>
                            <td>
                                <input type="checkbox" class="sub_chk" name="id[]" value="{{$p->id}}">
                            </td>
                            <td scope="row">{{$key + 1}}</td>
                            <td><a href="/admin/view-product/{{$p->id}}">{{$p->name}}</a></td>
                            <td>
                                {{$p->customer_name}}
                            </td>
                            <td>{{$p->service_name}}</td>

                            <td>{{$p->begin_day}}</td>
                            <td>{{$p->finish_date}}</td>
                            <td>{{$p->members}}</td>
                            <td><a href="{{url('admin/product/edit/'.$p->id)}}" class="ml-2"><i
                                            class="fas fa-pencil-alt"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    <tr class="col-lg-12 text-center">
                        {{$product->links()}}
                    </tr>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
@endsection
@section('script')
    <script>
        function deleteProductMultiple() {
            event.preventDefault();
            if (confirm("Bạn chắc chắn muốn xóa các product đã chọn?")) {
                var checkboxArrDeleteMul = [];
                var listCheckbox = $('#show-list-products tbody input[type=checkbox]');
                listCheckbox.each(function () {
                    if ($(this).is(":checked")) {
                        checkboxArrDeleteMul.push($(this).val());
                    }
                });
                if (checkboxArrDeleteMul.length != 0) {
                    $.ajax({
                        type: 'GET',
                        url: "{{url('admin/product/delete/multiple')}}",
                        data: {checkboxArr: checkboxArrDeleteMul},
                        success: function (data) {
                            console.log(data);
                            toastr.error('Bạn đã xóa!')
                            window.location.reload().delay(500);
                        },
                        error: function (error) {
                            console.log(error);
                        }
                    });
                } else {
                    toastr.error('Bạn chưa chọn mục nào');
                }
            }
        }
    </script>
@endsection