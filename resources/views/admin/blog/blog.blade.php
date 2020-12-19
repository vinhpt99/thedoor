@extends('admin.layouts.master')
@section('category', 'Blog')
@section('title','Danh sách')
@section('content')
<div class="row">
    <div class="col-lg-6 offset-lg-3 mb-2">
        <form method="post" class="d-flex justify-content-start">
            @csrf
            <input class="form-control mr-sm-2" type="text" name="key" placeholder="Tìm kiếm" aria-label="Search">
            <button formaction="/admin/blog/search" class="btn btn-outline-success my-2 my-sm-0" type="submit">
                <i class="fa fa-search"></i>
            </button>
        </form>
    </div>
    <div class="col-lg-12">
        <form method="post">
            @csrf
            <div class="show-delete pb-2">
                <button onclick="lishBlog()" class="btn btn-primary btn-sm"><i class="fa fa-list"></i>Danh sách</button>
                <button class="btn btn-danger btn-sm"><i class="fa fa-trash mr-1"></i>Xóa mục đã chọn</button>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col"><input type="checkbox" id="checkAll">
                        </th>
                        <th scope="col">STT</th>
                        <th scope="col">Tên</th>
                        <th scope="col">Ảnh</th>
                        <th scope="col">Tác giả</th>
                        <th scope="col">Ngày đăng</th>
                        <th scope="col">Sửa</th>
                        <th scope="col">Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($blogs as $key => $blog)
                        <tr>
                            <td>
                                <input type="checkbox" class="sub_chk" name="id[]" value="{{$blog->id}}">
                            </td>
                            <th scope="row">{{$key+1}}</th>
                            <td>{{$blog->title}}</td>
                            <td>
                                <img style="width:8em" alt="Image Blog" src=" {{asset('upload/'.$blog->thumbnail)}}"></td>
                            <td>{{$blog->name}}</td>
                            <td>{{date('F d Y', strtotime($blog->created_at))}}</td>
                            <td>
                                <a href="#" class="ml-2" onclick="editBlog({{$blog->id}},{{$blog->status}})"><i class="fas fa-pencil-alt"></i></a>
                            <td>           
                               <a  href="#" class="ml-2" onclick="deleteBlog({{$blog->id}})"><i class="fas fa-trash-alt"></i></a>                          
                            </td>
                        </tr>
                    @endforeach
                    <tr class="col-lg-12 text-center">
                        {{$blogs->links()}}
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
</div>
 <!-- Modal edit blog-->
 <div class="modal fade" id="modalEditBlog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h6 class="modal-title">Chi tiết Blog</h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <form action="" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input name="idBlog" id="idBlog" type="text">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên Blog </label>
                                <input type="text" name="title" class="form-control" value="" placeholder="Nhập tiêu đề blog">
                                <small class="error form-text text-danger"></small>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mô tả </label>
                                <input type="text" name="describle" class="form-control" value="" placeholder="Nhập mô tả cho blog">
                                <small class="error form-text text-danger"></small>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Upload ảnh : </label>
                                <input type="file" name="image" class="form-control">
                                <img style="width:80px" id="imageBlog" src="" alt="">
                                <small class="error form-text text-danger"></small>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nội dung</label>
                                <textarea id="editorBlog" name="editorBlog"  type="text" rows="5" class="form-control"></textarea>        
                                <small class="error form-text text-danger"></small>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Trạng thái</label>
                                <select class="form-control" name="status" id="selectBlog">
                                </select>
                                <small class="error form-text text-danger"></small>
                            </div>
                            <div class="form-group text-center">
                                <button onclick="submitEditBlog()" class="btn btn-primary"><i class="fas fa-sync pr-1"></i>Cập nhật</button>
                            </div>
                        </form>
                    </div>
                </div>       
            </div>
        </form>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script>
         CKEDITOR.replace('editorBlog');
        function lishBlog()
        {
            event.preventDefault();
            window.location.reload().delay(500);
        }
        function editBlog(id, status)
        {
            event.preventDefault();
            console.log(id);
            $.ajax({
               type: 'GET',
               url: "{{route('editBlog')}}",
               data:{id:id},
               success: function(data) {
                   console.log(data);
                    $('#idBlog').val(data.data.id);
                    $("#modalEditBlog input[name=title]").val(data.data.title);
                    $("#modalEditBlog input[name=describle]").val(data.data.describe);
                    $("#imageBlog").attr('src', '{{ url("") }}/upload/' + data.data.thumbnail);
                    CKEDITOR.instances['editorBlog'].setData(data.data.content);
                    if(status == 1)
                    {
                        $("#selectBlog").append('<option value=1>Hiển thị</option><option value=0>Chưa hiển thị</option>');
                    }
                    if(status == 0)
                    {
                        $("#selectBlog").append('<option value=0>Chưa hiển thị</option><option value=1>Hiển thị</option>');
                    }
                  $("#modalEditBlog").modal('show');
               },
               error: function(error) {
                   console.log(error);
               }
          });
            
        }
        function submitEditBlog()
        {   
            event.preventDefault();
            var data = new FormData($("#modalEditBlog form")[0]);
            data.append('editorBlog', CKEDITOR.instances['editorBlog'].getData());
            $.ajax({
                url: "{{route('posteditBlog')}}",
                method: 'post',
                data: data,
                success: function(data) {
                    console.log(data);
                    $('#modalEditBlog').modal('hide');
                    toastr.success('Sửa thành công!')
                    window.location.reload().delay(500);
                
                },
                contentType: false,
                processData: false,
                error: function(error) {
                    var errors = error.responseJSON;
                    console.log(errors.errors);
                    $.each(errors.errors, function(i, val) {
                        $("#modalEditBlog input[name=" + i + "]").siblings('.error').text(val[0]);
    
                    })
                    // if (errors.errors.res_hour_open)
                    //     $("#res_hour_open_edit").text(errors.errors.res_hour_open[0]);
                    // if (errors.errors.res_hour_close)
                    //     $("#res_hour_close_edit").text(errors.errors.res_hour_close[0]);
                }
            });
        }
        function deleteBlog(id)
        {
           event.preventDefault();
           confirm("Bạn chắc chắn muốn xóa blog này ?"); 
          $.ajax({
               type: 'GET',
               url: "{{route('deleteBlog')}}",
               data:{id:id},
               success: function(data) {
                  console.log(data);
                  toastr.error('Bạn đã xóa!', { timeOut: 20000 })
                  window.location.reload().delay(500);
               },
               error: function(error) {
                   console.log(error);
               }
          });
        }
    </script>
@endsection