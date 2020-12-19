<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Login</title>
        <script src="{{asset('js/jquery-3.5.1.min.js')}}"></script>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <link rel="stylesheet" href="{{asset('css/login.css')}}">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.js" defer></script>
  </head>
     <body class="font-sans antialiased">
        <div class="container login_page_main__body">
            <h3>The door</h3>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="login_form form_group col-md-4">
                  <form id = "form-login" method = "post" action="" >
                    @csrf
                    <input class="form-control" name = "email" type="text" placeholder="Email">
                    <input class="form-control" name = "password" type="password" placeholder="Password">
                    <button type="submit" class="btn btn-primary">Login</button>
                  </form>
                    @if ($errors->any())
                            @foreach ($errors->all() as  $error)
                            <p class = "text-danger">{{$error}}</p>     
                            @endforeach    
                    @endif
                </div>
                <div class="col-md-4"></div>
            </div>
        </div>
        <script type="text/javascript">
               $("#form-login input").change(function() {
                        $(".text-danger").text("");
                    });
        </script>
    </body>
</html>

