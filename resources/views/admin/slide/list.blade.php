@extends('admin.layouts.master')
@section('category', 'Slide')
@section('title', 'Danh sách')
@section('content')
    <div class="row">
        <div class="col-lg-6 offset-lg-3 mb-2">
            <form method="post" action="/admin/slide/search" class="d-flex justify-content-start">
                @csrf
                <input class="form-control mr-sm-2" type="text" name="key" placeholder="Tìm kiếm" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">
                    <i class="fa fa-search"></i>
                </button>
            </form>
        </div>
        <div class="col-lg-12">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tiêu đề slide</th>
                    <th scope="col">Ảnh</th>
                    <th scope="col">Liên kết</th>
                    <th scope="col">Trạng thái</th>
                    <th scope="col">Sửa</th>
                    <th scope="col">Xóa</th>
                </tr>
                </thead>
                <tbody>
                @foreach($slides as $key => $slide)
                        <tr>
                            <th scope="row">{{$key+1}}</th>
                            <td>{{$slide->title}}</td>
                            <td>
                                <img width="150" src="{{asset('upload/'.$slide->image)}}" alt="">
                            </td>
                              <td><a href="{{$slide->link}}" target="_blank">{{$slide->link}}</a></td>
                            <td>
                                @if($slide->active_status == 1)
                                    Hiển thị
                                @else
                                    Ẩn đi
                                @endif
                            </td>
                            <td><a onclick="editSlide({{$slide->id}})" href="#" class="ml-2"><i class="fas fa-pencil-alt"></i></a></td>
                            <td>
                               <button type="submit" class="btn btn-danger btn-sm" onclick="deleteSlide({{$slide->id}})"><i class="fa fa-times"></i></button>       
                            </td>
                        </tr>
                @endforeach
                <tr class="col-lg-12 text-center">
                    {{$slides->links()}}
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Modal edit slide-->
    <div class="modal fade" id="modalEditSlide">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h6 class="modal-title">Chi tiết Slide</h6>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input hidden name="idSlide" id="idSlide" type="text">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tiêu đề slide : </label>
                                    <input type="text" name="title" class="form-control" value="" placeholder="Nhập tiêu đề slide">
                                    <small class="error form-text text-danger"></small>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Link : </label>
                                    <input type="text" name="link" class="form-control" value="" placeholder="Nhập liên kết cho slide">
                                    <small class="error form-text text-danger"></small>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Upload ảnh : </label>
                                    <input type="file" name="image" class="form-control">
                                    <img style="width:80px" id="imageSlide" src="" alt="">
                                    <small id="error_slideImg" class="error form-text text-danger"></small>
                                </div>
                                <div class="form-group">
                                    <label for="description">Mô tả : </label>
                                    <textarea id="editorSlide" name="editorSlide"  type="text" rows="5" class="form-control"></textarea>
                                    <small id="error_slideDes" class="error form-text text-danger"></small>
                                </div>
                                <div class="form-group">
                                @if (Auth::user()->type == 1)
                                <label for="slide">Trạng thái slide : </label>
                                <select class="form-control" name="status" id="exampleFormControlSelect1">
                                      <option value="0">Ẩn đi</option>
                                      <option value="1" selected>Hiển thị</option>
                                </select>
                                <small class="error form-text text-danger"></small>
                                @endif
                                </div>
                                <div class="form-group text-center">
                                    <button onclick="submitEditSlide()" class="btn btn-primary"><i class="fas fa-sync pr-1"></i>Cập nhật</button>
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
       CKEDITOR.replace('editorSlide');
      function editSlide(id)
      {
          event.preventDefault();
        
          $.ajax({
               type: 'GET',
               url: "{{route('editSlide')}}",
               data:{id:id},
               success: function(data) {
                   $('#idSlide').val(data.data.slide.id);
                  console.log(data);
                  $("#modalEditSlide input[name=title]").val(data.data.slide.title);
                  $("#modalEditSlide input[name=link]").val(data.data.slide.link);
                  $("#imageSlide").attr('src', '{{ url("") }}/upload/' + data.data.slide.image);
                  CKEDITOR.instances['editorSlide'].setData(data.data.slide.describe);
                  $('#exampleFormControlSelect1').html(data.data.output);
                  $("#modalEditSlide").modal('show');
               },
               error: function(error) {
                   console.log(error);
               }
          });
      }
      function submitEditSlide()
      {   
          event.preventDefault();
          var id =  $('#idSlide').val();
          var data = new FormData($("#modalEditSlide form")[0]);
            data.append('editorSlide', CKEDITOR.instances['editorSlide'].getData());
            data.append('editorSlide', CKEDITOR.instances['editorSlide'].getData());
        $.ajax({
            url: "{{ route('posteditSlide')}}",
            method: 'post',
            data: data,
            success: function(data) {
                console.log(data);
                $('#modalEditSlide').modal('hide');
                toastr.success('Sửa thành công!')
                window.location.reload().delay(500);
              
            },
            contentType: false,
            processData: false,
            error: function(error) {
                var errors = error.responseJSON;
                console.log(error);
                $.each(errors.errors, function(i, val) {
                        $("#modalEditSlide input[name=" + i + "]").siblings('.error').text(val[0]);
                    })
                if (errors.errors.editorSlide)
                   $("#error_slideDes").text(errors.errors.editorSlide[0]);
                
            }
        });
      }
      function deleteSlide(id)
      {
          confirm("Bạn chắc muốn xóa slide này ?");      
          $.ajax({
               type: 'GET',
               url: "{{route('deleteSlide')}}",
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