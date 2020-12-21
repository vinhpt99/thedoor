@extends('admin.layouts.master')
@section('category', 'Bộ phận nhân sự')
@section('title', 'Thêm mới')
@section('content')
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <form action="{{url('admin/dept/create')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Tên phòng ban : </label>
                    <input type="text" name="dept_name" class="form-control" placeholder="Nhập tên phòng ban">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Số điện thoại : </label>
                    <input type="text" name="phone" class="form-control" placeholder="Vd:0326885446">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Trưởng nhóm : </label>
                    <select class="form-control" name="leader" id="exampleFormControlSelect1">
                        @if($staff->count() > 0)
                            @foreach($staff as $s)
                                <option value="{{$s->id}}">{{$s->staff_name}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-plus-circle pr-1"></i>Thêm mới</button>
                </div>
            </form>
        </div>
    </div>
@stop

