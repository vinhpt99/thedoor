@extends('admin.layouts.master')
@section('category', 'Dịch vụ')
@section('title','Danh sách')
@section('content')
    <div class="row">
        <div class="col-lg-6 offset-lg-3 mb-2">
            <form method="post" action="/admin/dept/search" class="d-flex justify-content-start">
                @csrf
                <input class="form-control mr-sm-2" type="text" name="key" placeholder="Tìm kiếm" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">
                    <i class="fa fa-search"></i>
                </button>
            </form>
        </div>
        <div class="col-lg-12">
            <form method="post">
            <div class="show-delete pb-2">
                <button class="btn btn-danger btn-sm" formaction="{{url('/admin/se/delete')}}"><i class="fa fa-trash mr-1"></i>Xóa mục đã chọn</button>
            </div>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col"><input type="checkbox" id="checkAll"></th>
                    <th scope="col">#</th>
                    <th scope="col">Tên</th>
                    <th scope="col">Số điện thoại</th>
                    <th scope="col">Trưởng nhóm</th>
                    <th scope="col">Sửa</th>
                    <th scope="col">Xóa</th>
                </tr>
                </thead>
                <tbody>
                <?php $i=1; ?>

                @foreach($service as $s)
                    @if($s->delete_status==1)
                        <tr>
                            <td>
                                <input type="checkbox" class="sub_chk" name="id[]" value="{{$s->id}}">
                            </td>
                            <th scope="row">{{$i}}</th>
                            <td>{{$s->service_name}}</td>
                            <td>
                                <img width="150" src="{{asset('storage/img/'.$s->logo)}}" alt="">
                            </td>
                            <td>
                                {{$s->describe}}
                            </td>
                            <td><a href="/admin/service/{{$s->id}}/edit" class="ml-2"><i class="fas fa-pencil-alt"></i></a></td>
                            <td>
                                <form method="post">
                                    <button type="submit" class="btn btn-danger btn-sm"
                                            formaction="{{ url('/admin/service', ['id'=>$s->id]) }}"
                                            onclick="return confirm('Xoá bộ phận nhân sự ? ');"><i class="fa fa-times"></i></button>
                                    @method('delete')
                                    @csrf
                                </form>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    @endif
                @endforeach
                <tr class="col-lg-12 text-center">
                    {{$service->links()}}
                </tr>
                </tbody>
            </table>
            </form>
        </div>
    </div>
@stop
