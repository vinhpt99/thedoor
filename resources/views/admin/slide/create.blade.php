@section('title', 'Thêm mới')
@section('category', 'Slide')
@extends('admin.layouts.master')
@section('content')
<div class="row">
        <div class="col-lg-12">
            <form action="{{url('admin/slide/create')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Tiêu đề slide : </label>
                    <input type="text" name="title" class="form-control" placeholder="Nhập tiêu đề slide">
                    <span class="error-form"></span>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Link : </label>
                    <input type="text" name="link" class="form-control" placeholder="Nhập liên kết cho slide">
                    <span class="error-form"></span>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Upload ảnh : </label>
                    <input type="file" name="image" class="form-control">
                    <span class="error-form"></span>
                </div>
                <div class="form-group">
                    <label for="description">Mô tả : </label>
                    <textarea type="text" name="description" rows="5" class="form-control" placeholder="Mô tả cho slide"></textarea>
                    <span class="error-form"></span>
                </div>
                <div class="form-group text-center">
                    <button type="submit" id="add-slide" class="btn btn-primary"><i class="fas fa-plus-circle pr-1"></i>Thêm mới</button>
                </div>
            </form>
        </div>
</div>
@endsection
@section('script')
   
@endsection
