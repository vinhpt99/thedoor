@extends('admin.layouts.master')
@section('category', 'Khách hàng');
@section('title', 'Sửa');
@section('content')
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <form action="/admin/customer/{{$customer->id}}" method="POST" enctype="multipart/form-data">
                @csrf
                {{ method_field('PATCH') }}
                <div class="form-group">
                    <label for="exampleInputEmail1">Tên khách hàng :  </label>
                    <input type="text" name="name" value="{{$customer->customer_name}}" class="form-control" placeholder="Tên nhân viên">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Số điện thoại : </label>
                    <input type="text" name="phone" value="{{$customer->phone}}" class="form-control" placeholder="Vd:0326885446">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Email : </label>
                    <input type="email" name="email" value="{{$customer->email}}" class="form-control" placeholder="Điền địa chỉ email">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Địa chỉ : </label>
                    <input type="text" name="address" value="{{$customer->address}}" class="form-control" placeholder="vd : Hà Nội">
                </div>
                <div class="row">
                    <div class="col">
                        <img width="300" src="{{asset('storage/img/'.$customer->image)}}" alt="">
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Ảnh : </label>
                            <input type="file" name="img" class="form-control">
                        </div>
                    </div>
                </div>
                <hr>
                <div class="form-group text-center mt-2">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-sync pr-1"></i>Cập nhật</button>
                </div>
            </form>
        </div>
    </div>
@stop

