@extends('admin.layouts.master')
@section('category', 'Bài viết chi tiết')
@section('title','Danh sách')
@section('content')
    <div class="row">
        <div class="col-lg-6 offset-lg-3 mb-2">
            <form method="post" class="d-flex justify-content-start">
                @csrf
                <input class="form-control mr-sm-2" type="text" name="key" placeholder="Tìm kiếm" aria-label="Search">
                <button formaction="/admin/detail/search" class="btn btn-outline-success my-2 my-sm-0" type="submit">
                    <i class="fa fa-search"></i>
                </button>
            </form>
        </div>
        <div class="col-lg-12">
            <form method="post">
                @csrf
                <div class="show-delete pb-2">
                    <button class="btn btn-danger btn-sm" formaction="{{url('/admin/dts/delete')}}"><i
                            class="fa fa-trash mr-1"></i>Xóa mục đã chọn
                    </button>
                </div>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col"><input type="checkbox" id="checkAll">
                        </th>
                        <th scope="col">#</th>
                        <th scope="col">Mô tả</th>
                        <th scope="col">Sản phẩm</th>
                        <th scope="col">Ngày tạo</th>
                        <th scope="col">Sửa</th>
                        <th scope="col">Xóa</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1; ?>
                    @if($details)
                        @foreach($details as $d)
                            <tr>
                                <td>
                                    <input type="checkbox" class="sub_chk" name="id[]" value="{{$d->id}}">
                                </td>
                                <th scope="row">{{$i}}</th>
                                <td>{{$d->describe}}</td>
                                <td>
                                    @foreach($d->product()->where('delete_status',1)->get() as $dr)
                                      {{$dr->name}}
                                    @endforeach
                                </td>
                                <td>{{$d->created_at->format('d-m-yy')}}</td>
                                <td><a href="/admin/detail/{{$d->id}}/edit" class="ml-2"><i class="fas fa-pencil-alt"></i></a>
                                </td>
                                <td>
                                    <form method="post">
                                        <button type="submit" class="btn btn-danger btn-sm"
                                                formaction="{{ url('/admin/detail',['id'=>$d->id]) }}"
                                                onclick="return confirm('Xoá chi tiết bài viết ? ');"><i
                                                class="fa fa-times"></i></button>
                                        @method('delete')
                                        @csrf
                                    </form>
                                </td>
                            </tr>
                            <?php $i++; ?>
                        @endforeach
                    @endif
                    <tr class="col-lg-12 text-center">
                        {{$details->links()}}
                    </tr>
                    </tbody>
                </table>
            </form>
        </div>

    </div>
@stop

