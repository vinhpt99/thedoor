@extends('admin.layouts.master')
@section('category', 'Bộ phận nhân sự')
@section('title','Danh sách')
@section('content')
    <div class="row">
        <div class="col-lg-6 offset-lg-3 mb-2">
        </div>
        <div class="col-lg-12">
            <div class="show-delete pb-2">
                <button class="btn btn-danger btn-sm" onclick="deleteLayoutMultiple()"><i class="fa fa-trash mr-1"></i>Xóa
                    mục đã chọn
                </button>
            </div>
            <form method="post" id="show-list-layouts">
                @csrf
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col"><input type="checkbox" id="checkAll">
                        </th>
                        <th scope="col">STT</th>
                        <th scope="col">Trang</th>
                        <th scope="col">Ảnh nền</th>
                        <th scope="col">Sửa</th>
                        <th scope="col">Xóa</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($layouts)
                        @foreach($layouts as $key => $layout)
                            <tr>
                                <th>
                                    <input type="checkbox" class="sub_chk" name="id[]" value="{{$layout->id}}">
                                </th>
                                <th>
                                    {{$key+1}}
                                </th>
                                <td>
                                    @if($layout->offset == 2)
                                        <option value="2">Our Story</option>
                                    @elseif($layout->offset == 3)
                                        <option value="3">Clients</option>
                                    @elseif($layout->offset == 4)
                                        <option value="4">What Are You Doing</option>
                                    @elseif($layout->offset == 5)
                                        <option value="5">Human</option>
                                    @elseif($layout->offset == 6)
                                        <option value="6">Article</option>
                                    @elseif($layout->offset == 7)
                                        <option value="6">Contact</option>
                                    @elseif($layout->offset == 8)
                                        <option value="8">Footer</option>
                                    @endif
                                </td>
                                <td>
                                    <img width="150" src="{{asset('upload/'.$layout->link)}}" alt="">
                                </td>
                                <td>
                                    <a href="#" onclick="editLayout({{$layout->id}})" class="ml-2"><i
                                                class="fas fa-pencil-alt"></i></a>
                                </td>
                                <td>
                                    <a href="#" onclick="deleteLayout({{$layout->id}})" class="ml-2"><i
                                                class="fa fa-times"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </form>
        </div>
    </div>
    <!-- Modal edit layout-->
    <div class="modal fade" id="modalEditLayout">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h6 class="modal-title">Chi tiết Layout</h6>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input hidden type="text" id="idLayout" name="idLayout">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Giao diện</label>
                                    <select name="offset" id="offset" class="form-control">

                                    </select>
                                </div>
                                <div class="row md-12">
                                    <div class="col-md-12">
                                        <img id="imgLayout" width="300" src="" alt="">
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Ảnh : </label>
                                            <input type="file" name="image" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group text-center">
                                    <button onclick="submitEditLayout()" type="submit" class="btn btn-primary"><i
                                                class="fas fa-sync pr-1"></i>Cập nhật
                                    </button>
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
        function editLayout(id) {
            event.preventDefault();
            $.ajax({
                type: 'GET',
                url: "{{route('editLayout')}}",
                data: {id: id},
                success: function (data) {
                    console.log(data);
                    $('#idLayout').val(data.data.layout.id);
                    $("#imgLayout").attr('src', '{{ url("") }}/upload/' + data.data.layout.image);
                    $('#offset').html(data.data.output);
                    $("#modalEditLayout").modal('show');
                },
                error: function (error) {
                    console.log(error);
                }
            });
        }

        function submitEditLayout() {
            event.preventDefault();
            var data = new FormData($("#modalEditLayout form")[0]);
            $.ajax({
                url: "{{ route('posteditLayout')}}",
                method: 'post',
                data: data,
                success: function (data) {
                    $("#modalEditLayout").modal('hide');
                    toastr.success('Sửa thành công!')
                    window.location.reload().delay(500);
                },
                contentType: false,
                processData: false,
                error: function (error) {
                    console.log(error);

                }
            });
        }

        function deleteLayout(id) {
            if (confirm("Bạn chắc muốn xóa layout này ?")) {
                $.ajax({
                    type: 'GET',
                    url: "{{route('deleteLayout')}}",
                    data: {id: id},
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
        }

        function deleteLayoutMultiple() {
            if (confirm("Bạn chắc chắn muốn xóa các layout đã chọn?")) {
                var checkboxArrDeleteMul = [];
                var listCheckbox = $('#showListLayouts tbody input[type=checkbox]');
                listCheckbox.each(function () {
                    if ($(this).is(":checked")) {
                        checkboxArrDeleteMul.push($(this).val());
                    }
                });
                if (checkboxArrDeleteMul.length != 0) {
                    $.ajax({
                        type: 'GET',
                        url: "{{url('admin/layout/delete/multiple')}}",
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
