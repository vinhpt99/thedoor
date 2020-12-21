@extends('admin.layouts.master');
@section('category', 'Khách hàng');
@section('title','Danh sách');
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <form method="post" id="show-list-customers">
                <div class="show-delete pb-2">
                    <button class="btn btn-danger btn-sm" onclick="deleteCustomerMultiple()"><i class="fa fa-trash mr-1"></i>Xóa mục đã chọn</button>
                </div>
                <table class="table">
                <thead>
                <tr>
                    <th scope="col"><input type="checkbox" id="checkAll"></th>
                    <th scope="col">#</th>
                    <th scope="col">Tên</th>
                    <th scope="col">Ảnh</th>
                    <th scope="col">Số điện thoại</th>
                    <th scope="col">Địa chỉ</th>
                    <th scope="col">Email</th>
                    <th scope="col">Sửa</th>
                    <th scope="col">Xóa</th>
                </tr>
                </thead>
                <tbody>
                @foreach($customer as $key => $c)
                        <tr>
                            <td>
                                <input type="checkbox" class="sub_chk" name="id[]" value="{{$c->id}}">
                            </td>
                            <th scope="row">{{$key + 1}}</th>
                            <td>{{$c->customer_name}}</td>
                            <td>
                                <img width="150" src="{{asset('upload/'.$c->image)}}" alt="">
                            </td>
                            <td>{{$c->phone}}</td>
                            <td>{{$c->address}}</td>
                            <td>{{$c->email}}</td>
                            <td><a href="{{url('admin/customer/edit/'.$c->id)}}" class="ml-2"><i class="fas fa-pencil-alt"></i></a></td>
                            <td>
                                    <button onclick="deleteCustomer({{$c->id}})" type="submit" class="btn btn-danger btn-sm"><i class="fa fa-times"></i></button>
                            </td>
                        </tr>
                @endforeach
                <tr class="col-lg-12 text-center">
                    {{$customer->links()}}
                </tr>
                </tbody>
            </table>
            </form>
        </div>
    </div>
@endsection
@section('script')
    <script>
      function deleteCustomer(id)
      {
        event.preventDefault();
          confirm("Bạn chắc chắn muốn xóa khách hàng này ?")
          $.ajax({
               type: 'GET',
               url: "{{route('deleteCustomer')}}",
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
      
      function deleteCustomerMultiple() {
          if (confirm("Bạn chắc chắn muốn xóa các customer đã chọn?")) {
              var checkboxArrDeleteMul = [];
              var listCheckbox = $('#show-list-customers tbody input[type=checkbox]');
              listCheckbox.each(function () {
                  if ($(this).is(":checked")) {
                      checkboxArrDeleteMul.push($(this).val());
                  }
              });
              if (checkboxArrDeleteMul.length != 0) {
                  $.ajax({
                      type: 'GET',
                      url: "{{url('admin/customer/delete/multiple')}}",
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
