@extends('admin.layouts.master')
@section('category', 'Chi tiết sản phẩm');
@section('title', 'Sửa');
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <form action="{{url('admin/detail/edit/'.$detail->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Mục sản phẩm : </label>
                    <select id="" name="id_product" class="form-control">
                        @if($products)
                            @foreach($products as $p)
                                @if($p->id == $detail->id_product)
                                    <option selected value="{{$p->id}}">{{$p->name}}</option>
                                @else
                                    <option value="{{$p->id}}">{{$p->name}}</option>
                                    @endif

                            @endforeach
                        @endif
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Mô tả : </label>
                    <textarea class="form-control" name="describe" rows="3" placeholder="Mô tả cho bài viết">{{$detail->describe}}</textarea>
                </div>
                <div class="form-group">
                    <textarea name=text id="text" cols="30" rows="10">{{$detail->media}}</textarea>
                   
                </div>
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-sync pr-1"></i>Cập nhật</button>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('script')
    <script>
          CKEDITOR.replace('text');
    </script>
@endsection

