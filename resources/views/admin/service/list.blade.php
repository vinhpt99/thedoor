@extends('admin.layouts.master')
@section('category', 'Dịch vụ')
@section('title','Danh sách')
@section('content')
    <div class="row">
        <div class="col-lg-6 offset-lg-3 mb-2">
            <form method="post" action="/admin/dept/search" class="d-flex justify-content-start">
                @csrf
                <input class="form-control mr-sm-2" type="text" name="key" placeholder="Tìm kiếm" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">
                    <i class="fa fa-search"></i>
                </button>
            </form>
        </div>
        <div class="col-lg-12">
            <form method="post" id="show-list-services">
            <div class="show-delete pb-2">
                <button class="btn btn-danger btn-sm" onclick="deleteServiceMultiple()"><i class="fa fa-trash mr-1"></i>Xóa mục đã chọn</button>
            </div>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col"><input type="checkbox" id="checkAll"></th>
                    <th scope="col">#</th>
                    <th scope="col">Tên</th>
                    <th scope="col">Hình ảnh</th>
                    <th scope="col">Mô tả</th>
                    <th scope="col">Sửa</th>
                    <th scope="col">Xóa</th>
                </tr>
                </thead>
                <tbody>
                @foreach($service as $key => $s)
                        <tr>
                            <td>
                                <input type="checkbox" class="sub_chk" name="id[]" value="{{$s->id}}">
                            </td>
                            <th scope="row">{{$key + 1}}</th>
                            <td>{{$s->service_name}}</td>
                            <td>
                                <img width="150" src="{{asset('upload/'.$s->logo)}}" alt="">
                            </td>
                            <td>
                                {!!$s->describe!!}
                            </td>
                            <td><a href="{{url('admin/service/edit/'.$s->id)}}" class="ml-2"><i class="fas fa-pencil-alt"></i></a></td>
                            <td>  
                               <button onclick="deleteService({{$s->id}})" type="submit" class="btn btn-danger btn-sm" onclick=""><i class="fa fa-times"></i></button>
                            </td>
                        </tr>
                @endforeach
                <tr class="col-lg-12 text-center">
                    {{$service->links()}}
                </tr>
                </tbody>
            </table>
            </form>
        </div>
    </div>
@endsection
@section('script')
   <script>
        function deleteService(id)
        {  
            event.preventDefault();
           confirm("Bạn chắc chắn muốn xóa !");
           $.ajax({
               type: 'GET',
               url: "{{route('deleteService')}}",
               data:{id:id},
               success: function(data) {
                  console.log(data);
                  toastr.error('Bạn đã xóa!')
                  window.location.reload().delay(500);
               },
               error: function(error) {
                   console.log(error);
               }
          });
        }
        function deleteServiceMultiple() {
            if (confirm("Bạn chắc chắn muốn xóa các service đã chọn?")) {
                var checkboxArrDeleteMul = [];
                var listCheckbox = $('#show-list-services tbody input[type=checkbox]');
                listCheckbox.each(function () {
                    if ($(this).is(":checked")) {
                        checkboxArrDeleteMul.push($(this).val());
                    }
                });
                if (checkboxArrDeleteMul.length != 0) {
                    $.ajax({
                        type: 'GET',
                        url: "{{url('admin/service/delete/multiple')}}",
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
                }
                else{
                    toastr.error('Bạn chưa chọn mục nào');
                }
            }
        }
   </script>
@endsection

