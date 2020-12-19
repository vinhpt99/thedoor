@extends('admin.layouts.master')
@section('category', 'Tài khoản')
@section('title', 'Thông tin')
@section('content')
   <div class="container">
       <div class="row">
           <div class="col-lg-8 offset-lg-2">
            <div class="jumbotron text-center">
            <h1 class="display-4">Tên : {{Auth::user()->name}}</h1>
            <p class="lead">Email : {{Auth::user()->email}}</p>
                <hr class="my-4">
                <p class="lead">
                <a class="btn btn-primary" href="/admin/user/{{Auth::user()->id}}/edit" role="button"><i
                    class="fas fa-pencil-alt pr-1"></i>Sửa</a>
                </p>
              </div>
           </div>
       </div>
   </div>
@stop

