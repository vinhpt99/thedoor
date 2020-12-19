@extends('admin.layouts.master')
@section('category', 'Bộ phận nhân sự')
@section('title','Danh sách')
@section('content')
    <div class="row">
        <div class="col-lg-6 offset-lg-3 mb-2">
            <form method="post" class="d-flex justify-content-start">
                @csrf
                <input class="form-control mr-sm-2" type="text" name="key" placeholder="Tìm kiếm" aria-label="Search">
                <button formaction="/admin/dept/search" class="btn btn-outline-success my-2 my-sm-0" type="submit">
                    <i class="fa fa-search"></i>
                </button>
            </form>
        </div>
        <div class="col-lg-12">
            <form method="post">
                @csrf
            <div class="show-delete pb-2">
                <button class="btn btn-danger btn-sm" formaction="{{url('/admin/dt/delete')}}"><i class="fa fa-trash mr-1"></i>Xóa mục đã chọn</button>
            </div>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col"><input type="checkbox" id="checkAll">
                    </th>
                    <th scope="col">#</th>
                    <th scope="col">Tên</th>
                    <th scope="col">Số điện thoại</th>
                    <th scope="col">Trưởng nhóm</th>
                    <th scope="col">Sửa</th>
                    <th scope="col">Xóa</th>
                </tr>
                </thead>
                <tbody>
                <?php $i = 1; ?>
                @foreach($dept as $d)
                    @if($d->delete_status==1)
                        <tr>
                            <td>
                                <input type="checkbox" class="sub_chk" name="id[]" value="{{$d->id}}">
                            </td>
                            <th scope="row">{{$i}}</th>
                            <td>{{$d->dept_name}}</td>
                            <td>{{$d->phone}}</td>
                            <td>
                                {{-- @if(!empty($d->leader))
                                    {{$d->leader->staff_name}}
                                @endif --}}

                            </td>
                            <td><a href="/admin/dept/{{$d->id}}/edit" class="ml-2"><i class="fas fa-pencil-alt"></i></a>
                            </td>
                            <td>
                                <form method="post">
                                    <button type="submit" class="btn btn-danger btn-sm"
                                            formaction="{{ url('/admin/dept', ['id'=>$d->id]) }}"
                                            onclick="return confirm('Xoá bộ phận nhân sự ? ');"><i
                                            class="fa fa-times"></i></button>
                                    @method('delete')
                                    @csrf
                                </form>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    @endif
                @endforeach
                <tr class="col-lg-12 text-center">
                    {{$dept->links()}}
                </tr>
                </tbody>
            </table>
        </form>
        </div>

    </div>
@stop

