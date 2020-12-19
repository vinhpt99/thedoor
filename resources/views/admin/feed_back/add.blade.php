@extends('admin.layouts.master')
@section('category', 'Phản hồi');
@section('title', 'Thêm mới');
@section('content')
<div class="row">
    <div class="col-lg-8 offset-lg-2">
        <form action="/admin/dept" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Tên :</label>
                <input type="text" name="name" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email :</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Tin nhắn :</label>
                <textarea class="form-control" name="describe" id="exampleFormControlTextarea1" rows="12"
                    placeholder="Enter text here..."></textarea>
            </div>
            <div class="form-group text-center">
                <button type="submit" class="btn btn-primary"><i class="fas fa-plus-circle pr-1"></i>Thêm mới</button>
            </div>
    </div>
</div>
@stop