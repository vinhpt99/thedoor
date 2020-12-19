@extends('admin.layouts.master');
@section('category', 'Liên hệ');
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
                <button class="btn btn-danger btn-sm" formaction="{{url('/admin/hp/delete')}}"><i class="fa fa-trash mr-1"></i>Xóa mục đã chọn</button>
            </div>
            <table class="table">
                <thead>
                <tr>    
                    <th scope="col"><input type="checkbox" id="checkAll">
                        <th scope="col">#</th>
                        <th scope="col">Tên</th>
                        <th scope="col">Email</th>
                        <th scope="col">Điện thoại</th>
                        <th scope="col">Dịch vụ</th>
                        <th scope="col">Giá tiền</th>
                        <th scope="col">Ngày gửi</th>
                </tr>
                </thead>
                <tbody>
                <?php $i = 1; ?>
                @foreach($hire_page as $h)
                    @if($h->delete_status==1)
                        <tr>
                            <td>
                                <input type="checkbox" class="sub_chk" name="id[]" value="{{$h->id}}">
                            </td>
                            <th scope="row">{{$i}}</th>
                            <td>{{$h->partner_name}}</td>
                            <td>{{$h->email}}</td>
                            <td>{{$h->phone}}</td>
                            
                            <td>{{$h->service->service_name}}</td>
                            <td>{{number_format($h->budget)}} VNĐ</td>
                            <td>{{$h->created_at->format('d/m/yy')}}</td>
                            @method('delete')
                                    @csrf
                        </tr>
                        
                        <?php $i++; ?>
                    @endif
                @endforeach
                <tr class="col-lg-12 text-center">
                    {{$hire_page->links()}} 
                </tr>
                </tbody>
            </table>
        </form>
        </div>

    </div>
                        
                   
@stop
