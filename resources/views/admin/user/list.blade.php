@extends('admin.layouts.master')
@section('category', 'Bộ phận nhân sự')
@section('title','Danh sách')
@section('content')
    <div class="row">
        <div class="col-lg-6 offset-lg-3 mb-2">
            <form method="post" class="d-flex justify-content-start">
                @csrf
                <input class="form-control mr-sm-2" type="text" name="key" placeholder="Tìm kiếm" aria-label="Search">
                <button formaction="/admin/user/search" class="btn btn-outline-success my-2 my-sm-0" type="submit">
                    <i class="fa fa-search"></i>
                </button>
            </form>
        </div>
        <div class="col-lg-12">
            <form method="post">
                @csrf
            <div class="show-delete pb-2">
                <button class="btn btn-danger btn-sm" formaction="{{url('/admin/usrs/delete')}}"><i class="fa fa-trash mr-1"></i>Xóa mục đã chọn</button>
            </div>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col"><input type="checkbox" id="checkAll">
                    </th>
                    <th scope="col">#</th>
                    <th scope="col">Tên nhân viên</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Vai trò</th>
                    <th scope="col">Sửa</th>
                    <th scope="col">Xóa</th>
                </tr>
                </thead>
                <tbody>
                @if($users)
                @foreach($users as $key => $u)
                        <tr>
                            <th>
                                <input type="checkbox" disabled class="sub_chk" name="id[]" value="{{$u->id}}">
                            </th>
                            <th scope="row">{{$key + 1}}</th>
                            <td>{{$u->staff_name}}</td>
                            <td>{{$u->name}}</td>
                            <td>{{$u->email}}</td>
                            <td>
                                @if($u->type ==1)
                                    <span class="badge badge-warning">Admin</span>
                                @else 
                                    <span class="badge badge-success">Nhân viên</span>
                                @endif
                                
                            </td>     
                             <td>        
                                <a href="{{url('admin/user/edit/'.$u->id)}}"   class="ml-2"><i class="fas fa-pencil-alt"></i></a></td>    
                            </td>
                            <td>
                                <button  class="btn btn-danger btn-sm" onclick="deleteUser({{$u->id}})"><i class="fa fa-times"></i></button>       
                            </td>
                        </tr>
              @endforeach
                @endif
                <tr class="col-lg-12 text-center">
                    {{$users->links()}}
                </tr>
                </tbody>
            </table>
        </form>
        </div> 

    </div>
@endsection
@section('script')
<script>
    function deleteUser(id)
    {   event.preventDefault();
        confirm("Bạn chắc muốn xóa user này ?");      
          $.ajax({
               type: 'GET',
               url: "{{route('deleteUser')}}",
               data:{id:id},
               success: function(data) {
                  console.log(data);
                //   toastr.error('Bạn đã xóa!')
                //   window.location.reload().delay(500);
               },
               error: function(error) {
                   console.log(error);
               }
          });
    }
</script>
@endsection

