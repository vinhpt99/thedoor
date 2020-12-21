@extends('admin.layouts.master')
@section('category', 'Blog')
@section('title','Duyệt bài viết')
@section('content')
    <div class="row">
    
        <div class="col-lg-12">
            <form method="post">
                @csrf
            <div class="show-delete pb-2">
                <button class="btn btn-success btn-sm" formaction="{{url('/admin/bls/multi')}}"><i class="fa fa-check mr-1"></i>Duyệt mục đã chọn</button>
            </div>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col"><input type="checkbox" id="checkAll">
                    </th>
                    <th scope="col">#</th>
                    <th scope="col">Tên</th>
                    <th scope="col">Ảnh</th>
                    <th scope="col">Người đăng</th>
                    <th scope="col">Trạng thái</th>
                    <th scope="col">Xem chi tiết</th>
                </tr>
                </thead>
                <tbody>
                <?php $i = 1; ?>
                @if($blogs)
                    @foreach($blogs as $key => $b)
                            <tr>
                                <td>
                                    <input type="checkbox" class="sub_chk" name="id[]" value="{{$b->id}}">
                                </td>
                                <th scope="row">{{$key + 1}}</th>
                                <td>{{$b->title}}</td>
                                <td>
                                    <img width="150" src="{{asset('/storage/img/'.$b->thumbnail)}}" alt="">
                                </td>
                                <td>
                                    {{$b->name}}
                                </td>
                                <td><span class="badge badge-warning">Chờ xét duyệt</span></a>
                                </td>
                                <td>
                                   <a onclick="event.preventDefault()" href="#"><i class="fa fa-eye"></i></a>
                                </td>
                            </tr>    
                    @endforeach
                @endif
                <tr class="col-lg-12 text-center">
                    {{$blogs->links()}}
                </tr>
                </tbody>
            </table>
        </form>
        </div>

    </div>
@stop

