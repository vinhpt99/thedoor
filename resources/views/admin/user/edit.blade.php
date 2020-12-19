@extends('admin.layouts.master')
@section('category', 'Người dùng')
@section('title', 'Sửa')
@section('content')
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
        <form action="/admin/user/{{$user->id}}" method="POST" enctype="multipart/form-data">
                {{ method_field('PATCH') }}
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Tên người dùng : </label>
                <input type="text" value="{{$user->name}}" name="name" class="form-control" placeholder="Nhập tên người dùng">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Email : </label>
                <input type="email" name="email" value="{{$user->email}}" class="form-control" placeholder="exam@gmail.com">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Mật khẩu mới (không bắt buộc) :  </label>
                    <input id="password" class="form-control" type="password" name="password" placeholder="Nhập mật khẩu mới" autocomplete="new-password" />
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Nhập lại mật khẩu :  </label>
                    <input id="password_confirmation" class="form-control" placeholder="Nhập lại mật khẩu" type="password" name="password_confirmation" autocomplete="new-password" />
                </div>
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-sync pr-1"></i>Cập nhật</button>
                </div>
            </form>
        </div>
    </div>
@stop

