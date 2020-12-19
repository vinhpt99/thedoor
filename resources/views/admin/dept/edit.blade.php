@extends('admin.layouts.master')
@section('category', 'Bộ phận nhân sự');
@section('title', 'Sửa thông tin');
@section('content')
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <form action="/admin/dept/{{$dept->id}}" method="POST" enctype="multipart/form-data">
                @csrf
                {{ method_field('PATCH') }}
                <div class="form-group">
                    <label for="exampleInputEmail1">Tên phòng ban : </label>
                    <input type="text" value="{{$dept->dept_name}}" name="name" class="form-control" placeholder="Nhập tên phòng ban">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Số điện thoại : </label>
                    <input type="text" value="{{$dept->phone}}" name="phone" class="form-control" placeholder="Vd:0326885446">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Trưởng nhóm : </label>
                    <select class="form-control" name="leader" id="exampleFormControlSelect1">
                        @if($staff)
                            @foreach($staff as $s)
                                @if($s->id == $dept->leader_id)
                                    <option value="{{$s->id}}" selected>{{$s->staff_name}}</option>
                                @else
                                    <option value="{{$s->id}}">{{$s->staff_name}}</option>
                                @endif
                            @endforeach
                        @endif
                    </select>
                </div>
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-sync pr-1"></i>Cập nhật</button>
                </div>
            </form>
        </div>
    </div>
@stop

