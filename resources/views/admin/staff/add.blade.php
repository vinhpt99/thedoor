@extends('admin.layouts.master')
@section('category', 'Nhân viên')
@section('title', 'Thêm mới')
@section('content')
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <form action="{{url('admin/staff/create')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Tên nhân viên : </label>
                    <input type="text" name="name" class="form-control" placeholder="Tên nhân viên">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Số điện thoại : </label>
                    <input type="text" name="phone" class="form-control" placeholder="Vd:0326885446">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Địa chỉ : </label>
                    <input type="text" name="address" class="form-control" placeholder="vd : Hà Nội">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Bộ phận : </label>
                    <select class="form-control" name="id_dept" id="exampleFormControlSelect1">
                        @foreach($dept as $d)
                                <option value="{{$d->id}}">{{$d->dept_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Email : </label>
                    <input type="email" name="email" class="form-control" placeholder="Điền địa chỉ email">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Ảnh : </label>
                    <input type="file" name="img" class="form-control">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Câu chuyện : </label>
                    <textarea name="editorStory" id="editorStory" cols="30" rows="10"></textarea>
                </div>
                <div class="form-group text-center mt-2">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-plus-circle pr-1"></i>Thêm mới</button>
                </div>
            </form>
        </div>
    </div>
@endsection 
@section('script')
    <script>
            CKEDITOR.replace('editorStory');
    </script>
@endsection

