@extends('admin.layouts.master')
@section('category', 'Khách hàng');
@section('title', 'Thêm mới');
@section('content')
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <form action="/admin/customer" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Tên khách hàng :  </label>
                    <input type="text" name="name" class="form-control" placeholder="Tên khách hàng">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Số điện thoại : </label>
                    <input type="text" name="phone" class="form-control" placeholder="Vd:0326885446">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Email : </label>
                    <input type="email" name="email" class="form-control" placeholder="Điền địa chỉ email">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Địa chỉ : </label>
                    <input type="text" name="address" class="form-control" placeholder="vd : Hà Nội">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Ảnh : </label>
                    <input type="file" name="img" class="form-control">
                </div>
                <div class="form-group text-center mt-2">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-plus-circle pr-1"></i>Thêm mới</button>
                </div>
            </form>
        </div>
    </div>
@stop

