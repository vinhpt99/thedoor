@extends('admin.layouts.master');
@section('category', 'Cộng tác');
@section('title', 'Danh sách');
@section('content')
<div class="row">
        <div class="col-lg-6 offset-lg-3 mb-2">
            <form method="post" class="d-flex justify-content-start">
                @csrf
            </form>
        </div>
        <div class="col-lg-12">
            <form id="check" method="post">
                @csrf
            <div class="show-delete pb-2">
                <button  onclick="deleteFeedbackMultiple()" class="btn btn-danger btn-sm" ><i class="fa fa-trash mr-1"></i>Xóa mục đã chọn</button>
            </div>
            <table class="table">
                <thead>
                <tr>    
                    <th scope="col"><input type="checkbox" id="checkAll">
                    <th scope="col">#</td>
                        <th scope="col">Tên người ứng tuyển</th>
                        <th scope="col">Email</th>
                        <th scope="col">Tên bộ phận</th>
                        <th scope="col">Profile</th>
                        <th scope="col">Thời gian tạo</th>
                </tr>
                </thead>
                <tbody>
                @foreach($candidate as $key => $c)
                        <tr>
                            <td>
                                <input type="checkbox" class="sub_chk" name="id[]" value="{{$c->id}}">
                            </td>
                            <th scope="row">{{$key + 1}}</th>
                            <td>{{$c->name}}</td>
                            <td>{{$c->email}}</td>
                            <td>{{$c->dept_name}}</td>
                            <td>
                                <img style="width:8em" alt="Image Blog" src=" {{asset('upload/'.$c->profile)}}">
                            </td>
                            <td>{{date('F d Y', strtotime($c->created_at))}}</td>
                        </tr>
                @endforeach
                <tr class="col-lg-12 text-center">
                    {{$candidate->links()}} 
                </tr>
                </tbody>
            </table>
        </form>
        </div>
    </div>
@endsection
@section('script')
    <script>
           function deleteFeedbackMultiple() {
            event.preventDefault();
            if (confirm("Bạn chắc chắn muốn xóa các feedback đã chọn?")) {
                var checkboxArrDeleteMul = [];
                var listCheckbox = $('#check tbody input[type=checkbox]');
                listCheckbox.each(function () {
                    if ($(this).is(":checked")) {
                        checkboxArrDeleteMul.push($(this).val());
                    }
                });
                if (checkboxArrDeleteMul.length != 0) {
                    $.ajax({
                        type: 'GET',
                        url: "{{url('admin/candidate/delete/multiple')}}",
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
