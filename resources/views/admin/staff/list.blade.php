@extends('admin.layouts.master')
@section('category', 'Bộ phận nhân sự')
@section('title','Danh sách')
@section('content')

    <div class="row">
        <div class="col-lg-6 offset-lg-3 mb-2">
            <form method="post" action="/admin/staff/search" class="d-flex justify-content-start">
                @csrf
                <input class="form-control mr-sm-2" type="text" name="key" placeholder="Tìm kiếm" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">
                    <i class="fa fa-search"></i>
                </button>
            </form>
        </div>

        <div class="col-lg-12">
            <form method="post">
                <div class="show-delete pb-2">
                    <button class="btn btn-danger btn-sm" formaction="{{url('/admin/sa/delete')}}"><i
                            class="fa fa-trash mr-1"></i>Xóa mục đã chọn
                    </button>
                </div>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col"><input type="checkbox" id="checkAll">
                        </th>
                        <th scope="col">#</th>
                        <th scope="col">Tên</th>
                        <th scope="col">Ảnh</th>
                        <th scope="col">Số điện thoại</th>
                        <th scope="col">Email</th>
                        <th scope="col">Bộ phận</th>
                        <th scope="col">Sửa</th>
                        <th scope="col">Xóa</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($staff as $key => $s)
                            <tr>
                                <td>
                                    <input type="checkbox" class="sub_chk" name="id[]" value="{{$s->id}}">
                                </td>
                                <th scope="row">{{$key + 1}}</th>
                                <td>{{$s->staff_name}}</td>
                                <td>
                                    <img width="150" src="{{asset('upload/'.$s->photo)}}" alt="">
                                </td>
                                <td>{{$s->phone}}</td>
                                <td>{{$s->email}}</td>
                                <td>
                                    {{$s->dept_name}}
                                </td>
                                <td>
                                    <a href="{{url('admin/staff/edit/'.$s->id)}}"  class="ml-2"><i class="fas fa-pencil-alt"></i></a></td>
                                <td>
                                   <button onclick="deleteStaff({{$s->id}})"  class="btn btn-danger btn-sm"><i class="fa fa-times"></i></button>                                  
                                </td>
                            </tr>
                    @endforeach
                    <tr class="col-lg-12 text-center">
                        {{$staff->links()}}
                    </tr>
                    </tbody>
                </table>
            </form>
        </div>

    </div>
@endsection 
@section('script')
    <script>
       function deleteStaff(id)
       {
          event.preventDefault();
          confirm("Bạn chắc chắn muốn xóa nhân viên này ?")
          $.ajax({
               type: 'GET',
               url: "{{route('deleteStaff')}}",
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
    </script>
@endsection
