@extends('admin.layouts.master');
@section('category', 'Phản hồi');
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
                <button class="btn btn-danger btn-sm" formaction="{{url('/admin/fb/delete')}}"><i class="fa fa-trash mr-1"></i>Xóa mục đã chọn</button>
            </div>
            <table class="table">
                <thead>
                <tr>    
                    <th scope="col"><input type="checkbox" id="checkAll">
                    <td>#</td>
                        <th scope="col">Tên người phản hồi</th>
                        <th scope="col">Email</th>
                        <th scope="col">Nội dung</th>
                        <th scope="col">Ngày bắt đầu</th>
                        <th scope="col">Ngày cập nhật</th>
                </tr>
                </thead>
                <tbody>
                <?php $i = 1; ?>
                @foreach($feed_back as $d)
                    @if($d->delete_status==1)
                        <tr>
                            <td>
                                <input type="checkbox" class="sub_chk" name="id[]" value="{{$d->id}}">
                            </td>
                            <th scope="row">{{$i}}</th>
                            <td>{{$d->sender_name}}</td>
                            <td>{{$d->email}}</td>
                            <td>{{$d->content_fb}}</td>
                            <td>{{$d->created_at}}</td>
                            <td>{{$d->updated_at}}</td>
                            @method('delete')
                                    @csrf
                        </tr>
                        
                        <?php $i++; ?>
                    @endif
                @endforeach
                <tr class="col-lg-12 text-center">
                    {{$feed_back->links()}} 
                </tr>
                </tbody>
            </table>
        </form>
        </div>

    </div>
                        
                   
@stop
