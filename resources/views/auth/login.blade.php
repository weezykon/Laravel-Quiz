<html>
    <head>
        <title>Login</title>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" media="screen" href="css/login.css" />
        <link rel="stylesheet" type="text/css" media="screen" href="toastr/toastr.css" />
    </head>
    <body>
        <div class="container">
            <div class="login-div">
                <form action="/login" method="POST">
                    {{ csrf_field() }}
                    <h3>Great to see you again!</h3>
                    <div class="form-group">
                        <input placeholder="Username" type="text" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <input placeholder="Password" type="password" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn-green">Login</button>
                    </div>
                </form>
                <h4><a href="/register" class="forgot">Create Account?</a></h4>
            </div>
        </div>
    </body>
    <script src="js/jquery.js"></script>
    <script src="toastr/toastr.js"></script>
    <script type="text/javascript">
        @if ($flash = session('message'))
            toastr.error("{{$flash}}");
        @endif
    </script>
</html>