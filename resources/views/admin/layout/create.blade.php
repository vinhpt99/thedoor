@extends('admin.layouts.master')
@section('category', 'Giao diện')
@section('title', 'Thêm mới')
@section('content')
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <form action="{{url('admin/layout/create')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Giao diện</label>
                    <select name="offset" id="" class="form-control">
                        <option value="2">Our Story</option>
                        <option value="3">Clients</option>
                        <option value="4">What Are You Doing</option>
                        <option value="5">Human</option>
                        <option value="6">Article</option>
                        <option value="7">Contact</option>
                        <option value="8">Footer</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Chọn nền : </label>
                    <input type="file" name="image" class="form-control" placeholder="Vd:0326885446">
                </div>
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-plus-circle pr-1"></i>Thêm mới</button>
                </div>
            </form>
        </div>
    </div>
@endsection

