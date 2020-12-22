@extends('admin.layouts.master')
@section('category', 'Bộ phận nhân sự')
@section('title','Danh sách')
@section('content')
    <div class="row">
        <div class="col-lg-6 offset-lg-3 mb-2">
            <form method="post" class="d-flex justify-content-start">
                @csrf
                <input class="form-control mr-sm-2" type="text" name="key" placeholder="Tìm kiếm" aria-label="Search">
                <button formaction="/admin/dept/search" class="btn btn-outline-success my-2 my-sm-0" type="submit">
                    <i class="fa fa-search"></i>
                </button>
            </form>
        </div>
        <div class="col-lg-12">
            <form method="post" id="show-list-depts">
                @csrf
            <div class="show-delete pb-2">
                <button class="btn btn-danger btn-sm" onclick="deleteDeptMultiple()"><i class="fa fa-trash mr-1"></i>Xóa mục đã chọn</button>
            </div>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col"><input type="checkbox" id="checkAll">
                    </th>
                    <th scope="col">#</th>
                    <th scope="col">Tên</th>
                    <th scope="col">Số điện thoại</th>
                    <th scope="col">Trưởng nhóm</th>
                    <th scope="col">Sửa</th>
                    <th scope="col">Xóa</th>
                </tr>
                </thead>
                <tbody>
                @foreach($dept as $key => $d)
                        <tr>
                            <td>
                                <input type="checkbox" class="sub_chk" name="id[]" value="{{$d->id}}">
                            </td>
                            <th scope="row">{{$key + 1}}</th>
                            <td>{{$d->dept_name}}</td>
                            <td>{{$d->phone}}</td>
                            <td>{{$d->staff_name}}</td>
                            <td>
                                <a href="#" onclick="editDept({{$d->id}})" class="ml-2"><i class="fas fa-pencil-alt"></i></a>
                            </td>
                            <td> 
                                <button onclick="deleteDept({{$d->id}})" type="submit" class="btn btn-danger btn-sm"><i class="fa fa-times"></i></button>    
                            </td>
                        </tr>
                @endforeach
                <tr class="col-lg-12 text-center">
                    {{$dept->links()}}
                </tr>
                </tbody>
            </table>
        </form>
        </div>
    </div>
    <!-- Modal edit dept-->
<div class="modal fade" id="modalEditDept">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h6 class="modal-title">Chi tiết Bộ phận</h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <form action="" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input name="idDept" type="text" hidden id="idDept">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên phòng ban : </label>
                                <input type="text" value="" name="name" class="form-control" placeholder="Nhập tên phòng ban">
                                <small class="error form-text text-danger"></small>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Số điện thoại : </label>
                                <input type="text" value="" name="phone" class="form-control" placeholder="Vd:0326885446">
                                <small class="error form-text text-danger"></small>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Trưởng nhóm : </label>
                                <select class="form-control" name="leader" id="selectLeader">
                                   
                                </select>
                                <small class="error form-text text-danger"></small>
                            </div>
                            <div class="form-group text-center">
                                <button onclick="editDeptSubmit()" type="submit" class="btn btn-primary"><i class="fas fa-sync pr-1"></i>Cập nhật</button>
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
    $('body').on('hidden.bs.modal', '.modal', function() {
        $(".text-danger").html("");
        });
        function editDept(id)
        {
            event.preventDefault();
            console.log(id);
            $.ajax({
               type: 'GET',
               url: "{{route('editDept')}}",
               data:{id:id},
               success: function(data) {
                   console.log(data);
                    $('#idDept').val(data.data.dept[0].id);
                    $("#modalEditDept input[name=name]").val(data.data.dept[0].dept_name);
                    $("#modalEditDept input[name=phone]").val(data.data.dept[0].phone);
                    $('#selectLeader').html(data.data.output);
                    $("#modalEditDept").modal('show');
               },
               error: function(error) {
                   console.log(error);
               }
          });
        }
        function deleteDept(id)
        {
           
            event.preventDefault();
            var r = confirm("Bạn chắc chắn muốn xóa bộ phận này !");
            if(r == true)
            {
                $.ajax({
               type: 'GET',
               url: "{{route('deleteDept')}}",
               data:{id:id},
               success: function(data) {
                  console.log(data);
                  toastr.error('Bạn đã xóa bộ phận !', { timeOut: 20000 })
                  window.location.reload().delay(500);
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            }
           
        }
        function editDeptSubmit()
        {
            event.preventDefault();
            var data = new FormData($("#modalEditDept form")[0]);
            $.ajax({
                url: "{{route('posteditDept')}}",
                method: 'post',
                data: data,
                success: function(data) {
                    console.log(data);
                    $('#modalEditDept').modal('hide');
                    toastr.success('Sửa thành công!')
                    window.location.reload().delay(500);
                
                },
                contentType: false,
                processData: false,
                error: function(error) {
                    var errors = error.responseJSON;
                    console.log(errors.errors);
                    $.each(errors.errors, function(i, val) {
                        $("#modalEditDept input[name=" + i + "]").siblings('.error').text(val[0]);
                    })
                }
            });
        }

    function deleteDeptMultiple() {
        event.preventDefault();
        if (confirm("Bạn chắc chắn muốn xóa các dept đã chọn?")) {
            var checkboxArrDeleteMul = [];
            var listCheckbox = $('#show-list-depts tbody input[type=checkbox]');
            listCheckbox.each(function () {
                if ($(this).is(":checked")) {
                    checkboxArrDeleteMul.push($(this).val());
                }
            });
            if (checkboxArrDeleteMul.length != 0) {
                $.ajax({
                    type: 'GET',
                    url: "{{url('admin/dept/delete/multiple')}}",
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

