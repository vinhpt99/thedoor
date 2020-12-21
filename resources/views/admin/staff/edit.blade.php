@extends('admin.layouts.master')
@section('category', 'Nhân viên')
@section('title', 'Sửa')
@section('content')
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <form action="{{url('admin/staff/edit/'.$staff->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Tên nhân viên : </label>
                    <input type="text" value="{{$staff->staff_name}}" name="name" class="form-control"
                           placeholder="Tên nhân viên">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Số điện thoại : </label>
                    <input type="text" value="{{$staff->phone}}" name="phone" class="form-control"
                           placeholder="Vd:0326885446">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Địa chỉ : </label>
                    <input type="text" value="{{$staff->address}}" name="address" class="form-control"
                           placeholder="vd : Hà Nội">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Bộ phận : </label>
                    <select class="form-control" name="id_dept" id="exampleFormControlSelect1">
                        @if($dept)
                            @foreach($dept as $d)
                                @if($d->id == $staff->id_dept)
                                    <option value="{{$d->id}}" selected>{{$d->dept_name}}</option>
                                @else
                                    <option value="{{$d->id}}">{{$d->dept_name}}</option>
                                @endif
                            @endforeach
                        @endif
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Email : </label>
                    <input type="email" value="{{$staff->email}}" name="email" class="form-control"
                           placeholder="Điền địa chỉ email">
                </div>
                <div class="row">
                    <div class="col">
                        <img width="300" src="{{asset('upload/'.$staff->photo)}}" alt="">
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Ảnh : </label>
                            <input type="file" name="img" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Câu chuyện : </label>
                    <textarea name="editorStaff" id="editorStaff" cols="30" rows="10">{{$staff->story}}</textarea>
                      
                </div>
                <div class="form-group text-center mt-2">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-sync pr-1"></i>Cập nhật</button>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('script')
<script>
    CKEDITOR.replace('editorStaff');
        $('body').on('hidden.bs.modal', '.modal', function() {
            $(".text-danger").html("");
        });
</script>
@endsection

