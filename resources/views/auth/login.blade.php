<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Login</title>
        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <!-- Styles -->
        <!-- <link rel="stylesheet" href="{{asset('css/app.css')}}"> -->
        <link rel="stylesheet" href="{{asset('css/login.css')}}">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.js" defer></script>
  </head>
     <body class="font-sans antialiased">
        <div class="container login_page_main__body">
            <h3>The door</h3>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="login_form form_group col-md-4">
                    <input class="form-control" type="text" placeholder="Email">
                    <input class="form-control" type="password" placeholder="Password">
                    <button class="btn btn-primary">Login</button>
                </div>
                <div class="col-md-4"></div>
            </div>
        </div>
    </body>
</html>
