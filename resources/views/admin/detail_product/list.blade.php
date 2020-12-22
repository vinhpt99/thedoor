@extends('admin.layouts.master')
@section('category', 'Bài viết chi tiết')
@section('title','Danh sách')
@section('content')
    <div class="row">
        <div class="col-lg-6 offset-lg-3 mb-2">
            <form method="post" class="d-flex justify-content-start">
                @csrf
                <input class="form-control mr-sm-2" type="text" name="key" placeholder="Tìm kiếm" aria-label="Search">
                <button formaction="/admin/detail/search" class="btn btn-outline-success my-2 my-sm-0" type="submit">
                    <i class="fa fa-search"></i>
                </button>
            </form>
        </div>
        <div class="col-lg-12">
            <form method="post" id="show-list-details">
                @csrf
                <div class="show-delete pb-2">
                    <button class="btn btn-danger btn-sm" onclick="deleteDetailMultiple()"><i
                            class="fa fa-trash mr-1"></i>Xóa mục đã chọn
                    </button>
                </div>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col"><input type="checkbox" id="checkAll">
                        </th>
                        <th scope="col">Mô tả</th>
                        <th scope="col">Sản phẩm</th>
                        <th scope="col">Ngày tạo</th>
                        <th scope="col">Sửa</th>
                        <th scope="col">Xóa</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($details as $key => $d)
                            <tr>
                                <td>
                                    <input type="checkbox" class="sub_chk" name="id[]" value="{{$d->id}}">
                                </td>
                                <th scope="row">{{$key + 1}}</th>
                                <td>{{$d->describe}}</td>
                                <td>
                                    {{date('d-m-yy', strtotime($d->created_at))}}
                                </td>
                                <td><a href="{{url('admin/detail/edit/'.$d->id)}}" class="ml-2"><i class="fas fa-pencil-alt"></i></a></td>
                                <td>
                                    <button onclick = "deleteDetail({{$d->id}})" type="submit" class="btn btn-danger btn-sm"><i class="fa fa-times"></i></button>
                                </td>
                            </tr>
                        @endforeach
                    <tr class="col-lg-12 text-center">
                        {{$details->links()}}
                    </tr>
                    </tbody>
                </table>
            </form>
        </div>

    </div>
@endsection
@section('script')
    <script>
       function deleteDetail(id)
       {
           event.preventDefault();
           var r = confirm("Bạn chắc chắn muốn xóa !");
            if(r == true)
            {
            $.ajax({
                type: 'GET',
                url: "{{route('deleteDetail')}}",
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
       }

       function deleteDetailMultiple() {
        event.preventDefault();
           if (confirm("Bạn chắc chắn muốn xóa các detail đã chọn?")) {
               var checkboxArrDeleteMul = [];
               var listCheckbox = $('#show-list-details tbody input[type=checkbox]');
               listCheckbox.each(function () {
                   if ($(this).is(":checked")) {
                       checkboxArrDeleteMul.push($(this).val());
                   }
               });
               if (checkboxArrDeleteMul.length != 0) {
                   $.ajax({
                       type: 'GET',
                       url: "{{url('admin/detail/delete/multiple')}}",
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

