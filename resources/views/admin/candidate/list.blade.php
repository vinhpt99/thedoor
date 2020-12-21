@extends('admin.layouts.master');
@section('category', 'Cộng tác');
@section('title', 'Danh sách');
@section('content')
<div class="row">
        <div class="col-lg-6 offset-lg-3 mb-2">
            <form method="post" class="d-flex justify-content-start">
                @csrf
            </form>
        </div>
        <div class="col-lg-12">
            <form method="post">
                @csrf
            <div class="show-delete pb-2">
                <button class="btn btn-danger btn-sm" formaction="{{url('/admin/cn/delete')}}"><i class="fa fa-trash mr-1"></i>Xóa mục đã chọn</button>
            </div>
            <table class="table">
                <thead>
                <tr>    
                    <th scope="col"><input type="checkbox" id="checkAll">
                    <th scope="col">#</td>
                        <th scope="col">Tên người ứng tuyển</th>
                        <th scope="col">Email</th>
                        <th scope="col">Tên dự án</th>
                        <th scope="col">Mô tả dự án</th>
                        <th scope="col">Tên bộ phận</th>
                        <th scope="col">Profile</th>
                        <th scope="col">Thời gian tạo</th>
                </tr>
                </thead>
                <tbody>
                @foreach($candidate as $key => $c)
                        <tr>
                            <td>
                                <input type="checkbox" class="sub_chk" name="id[]" value="{{$c->id}}">
                            </td>
                            <th scope="row">{{$key + 1}}</th>
                            <td>{{$c->name}}</td>
                            <td>{{$c->email}}</td>
                            <td>{{$c->project_name}}</td>
                            <td>{{$c->introduce}}</td>
                            <td>{{$c->dept_id}}</td>
                            <td>{{$c->profile}}</td>
                            <td>{{$c->created_at}}</td>
                        </tr>
                @endforeach
                <tr class="col-lg-12 text-center">
                    {{$candidate->links()}} 
                </tr>
                </tbody>
            </table>
        </form>
        </div>

    </div>
                        
                   
@stop
