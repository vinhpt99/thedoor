<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <title>@yield('title')</title>
    <link href="{{asset('css/admin/styles.css')}}" rel="stylesheet"/>
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet"
          crossorigin="anonymous"/>
    <script src="{{asset('ckeditor_4.15.1_full/ckeditor/ckeditor.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js"
            crossorigin="anonymous"></script>
            <link href="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
            <script src="{{asset('js/jquery-3.5.1.min.js')}}"></script>
</head>

<body class="sb-nav-fixed">
<!-- Navbar -->
@include('admin.layouts.navbar')
<!-- Navbar -->
<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <!-- Sidebar -->
    @include('admin.layouts.sidebar')
    <!-- End Sidebar -->
    </div>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid mt-3">
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="#">@yield('category')</a></li>
                    <li class="breadcrumb-item active">@yield('title')</li>
                </ol>
                <div class="main-content">

                    <div class="message-admin">
                        @if ($errors->any())

                            @foreach ($errors->all() as $error)
                                <p class="alert alert-danger">
                                    {{ $error }}
                                </p>
                            @endforeach

                        @endif
                        @if (session('success'))
                            <p class="alert alert-success">{{session('success')}}</p>
                        @endif
                    </div>

                    @yield('content')
                </div>
            </div>
        </main>
        <!-- Footer -->
    @include('admin.layouts.footer')
    <!--End Footer -->
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/scripts.js')}}"></script>
<script scr="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.2/js/toastr.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="{{asset('js/admin.js')}}"></script>
@yield('script')
</body>
</html>
