<html>
    <head>
        <title>Register</title>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" media="screen" href="css/register.css" />
        <link rel="stylesheet" type="text/css" media="screen" href="toastr/toastr.css" />
    </head>
    <body>
        <div class="container">
            <div class="register-div">
                <form action="/register" method="POST">
                    {{ csrf_field() }}
                    <h3>Register</h3>
                    <div class="form-group">
                        <input placeholder="Firstname" name="firstname" type="text" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <input placeholder="Lastname" name="lastname" type="text" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <input placeholder="Username" name="username" type="text" oninput="duplicateUsername(this)" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <input placeholder="Email" oninput="duplicateEmail(this)" name="email" type="email" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <input placeholder="Password" name="password" type="password" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="gender" required="">
                            <option value="">Choose Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn-green">Register</button>
                    </div>
                </form>
                <h4><a href="/login" class="forgot">Already Have An Account?</a></h4>
            </div>
        </div>
    </body>
    <script src="js/jquery.js"></script>
    <script src="toastr/toastr.js"></script>
    @if(count($errors))
        <script type="text/javascript">
                @foreach ($errors->all() as $error)
                    toastr.error("{{$error}}");
                @endforeach
        </script>
    @endif
    <script type="text/javascript">
        // Username
        function duplicateUsername(element){
            var username = $(element).val();
            $.ajax({
                type: "POST",
                url: '{{url('checkusername')}}',
                data: {username:username},
                dataType: "json",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(res) {
                    if(res.exists){
                        $('#Username').html('Username Exist');
                        document.getElementById("regBtn").disabled = true;
                    }else{
                        $('#Username').html('');
                        document.getElementById("regBtn").disabled = false;
                    }
                },
                error: function (jqXHR, exception) {

                }
            });
        }
        // Email
        function duplicateEmail(element){
            var email = $(element).val();
            $.ajax({
                type: "POST",
                url: '{{url('checkemail')}}',
                data: {email:email},
                dataType: "json",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(res) {
                    if(res.exists){
                        $('#Email').html('Email Exist');
                        document.getElementById("regBtn").disabled = true;
                    }else{
                        $('#Email').html('');
                        document.getElementById("regBtn").disabled = false;
                    }
                },
                error: function (jqXHR, exception) {

                }
            });
        }
    </script>
</html>