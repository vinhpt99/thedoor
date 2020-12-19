@extends('admin.layouts.master')
@section('category', 'Người dùng')
@section('title', 'Thêm mới')
@section('content')
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <form action="/admin/user" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Tên người dùng : </label>
                    <input type="text" name="name" class="form-control" placeholder="Nhập tên người dùng">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Email : </label>
                    <input type="email" name="email" class="form-control" placeholder="exam@gmail.com">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Mật khẩu :  </label>
                    <input id="password" class="form-control" type="password" name="password" placeholder="Điền mật khẩu" required autocomplete="new-password" />
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Nhập lại mật khẩu :  </label>
                    <input id="password_confirmation" class="form-control" placeholder="Nhập lại mật khẩu" type="password" name="password_confirmation" required autocomplete="new-password" />
                </div>
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-plus-circle pr-1"></i>Thêm mới</button>
                </div>
            </form>
        </div>
    </div>
@stop

