@extends('admin.layouts.master')
@section('category', 'Dịch vụ')
@section('title', 'Thêm mới')
@section('content')
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <form action="{{url('admin/service/create')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Tên dịch vụ : </label>
                    <input type="text" name="service_name" class="form-control" placeholder="Tên dịch vụ">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Mô tả :  </label>
                    <textarea id="describe" name="describe" placeholder="Mô tả dịch vụ" class="form-control" id="" rows="10"></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Ảnh : </label>
                    <input type="file" name="img" class="form-control" placeholder="Nhập tên phòng ban">
                </div>
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-plus-circle pr-1"></i>Thêm mới</button>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('script')
<script>
    CKEDITOR.replace('describe');
</script>
@endsection

