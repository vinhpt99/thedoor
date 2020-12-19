@extends('admin.layouts.master')
@section('category', 'Dịch vụ')
@section('title', 'Sửa')
@section('content')
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <form action="/admin/service/{{$service->id}}" method="POST" enctype="multipart/form-data">
                @csrf
                {{ method_field('PATCH') }}
                <div class="form-group">
                    <label for="exampleInputEmail1">Tên dịch vụ : </label>
                    <input type="text" value="{{$service->service_name}}" name="name" class="form-control" placeholder="Tên dịch vụ">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Mô tả :  </label>
                    <textarea name="describe" placeholder="Mô tả dịch vụ" class="form-control" id="" rows="10">{{$service->describe}}</textarea>
                </div>
                <div class="row">
                    <div class="col">
                        <img width="300" src="{{asset('storage/img/'.$service->logo)}}" alt="">
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Ảnh : </label>
                            <input type="file" name="img" class="form-control">
                        </div>
                    </div>
                </div>
                <hr>
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-sync pr-1"></i></i>Cập nhật</button>
                </div>
            </form>
        </div>
    </div>
@stop

