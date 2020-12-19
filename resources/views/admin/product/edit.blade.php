@extends('admin.layouts.master')
@section('category', 'Sản phẩm')
@section('title', 'Sửa')
@section('content')
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <form action="/admin/product/{{$product->id}}" method="POST" enctype="multipart/form-data">
                {{ method_field('PATCH') }}
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Tên sản phẩm : </label>
                    <input type="text" name="name" value="{{$product->name}}" class="form-control"
                           placeholder="Tên sản phẩm">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Khách hàng : </label>
                    <select class="form-control" name="id_customer" id="exampleFormControlSelect1">
                        @if($customer->count() > 0)
                            @foreach($customer as $c)
                                @if($product->id_customer == $c->id)
                                    <option selected value="{{$c->id}}">{{$c->customer_name}}</option>
                                @else
                                    <option value="{{$c->id}}">{{$c->customer_name}}</option>
                                @endif
                            @endforeach
                        @endif

                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Dịch vụ : </label>
                    <select class="form-control" name="id_service" id="exampleFormControlSelect1">
                        @if($service->count() > 0)
                            @foreach($service as $s)
                                @if($product->id_service == $s->id)
                                    <option selected value="{{$s->id}}">{{$s->service_name}}</option>
                                @else
                                    <option value="{{$s->id}}">{{$s->service_name}}</option>
                                @endif
                            @endforeach
                        @endif
                    </select>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="exampleInputEmail1">Ngày bắt đầu : </label>
                        <input type="date" value="{{$product->begin_day}}" name="start" class="form-control"
                               placeholder="First name">
                    </div>
                    <div class="col">
                        <label for="exampleInputEmail1">Ngày kết thúc : </label>
                        <input type="date" value="{{$product->finish_date}}" name="end" class="form-control"
                               placeholder="Last name">
                    </div>
                </div>
                <div class="form-group mt-2">
                    <label for="exampleInputPassword1">Thành viên : </label>
                    <input type="number" name="mem" value="{{$product->members}}" placeholder="Thành viên tham gia"
                           class="form-control">
                </div>
                <div class="form-group text-center mt-2">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-sync pr-1"></i>Cập nhật
                    </button>
                </div>
            </form>
        </div>
    </div>
@stop

