<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LaravelProject:Login</title>
    <link href="{{url('frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: sans-serif;
            background: linear-gradient(to right, #b92b27, #1565c0)
        }
        .box {
            width: 500px;
            padding: 40px;
            position: absolute;
            top: 50%;
            left: 50%;
            background: #191919;
            text-align: center;
            transition: 0.25s;
            margin-top: 100px
        }
        .box input[type="text"],
        .box input[type="password"] {
            border: 0;
            background: none;
            display: block;
            margin: 20px auto;
            text-align: center;
            border: 2px solid #3498db;
            padding: 10px 10px;
            width: 250px;
            outline: none;
            color: white;
            border-radius: 24px;
            transition: 0.25s
        }
        .box h1 {
            color: white;
            text-transform: uppercase;
            font-weight: 500
        }

        .box input[type="text"]:focus,
        .box input[type="password"]:focus {
            width: 300px;
            border-color: #2ecc71
        }
        .box input[type="submit"] {
            border: 0;
            background: none;
            display: block;
            margin: 20px auto;
            text-align: center;
            border: 2px solid #2ecc71;
            padding: 14px 40px;
            outline: none;
            color: white;
            border-radius: 24px;
            transition: 0.25s;
            cursor: pointer
        }
        .box input[type="submit"]:hover {
            background: #2ecc71
        }

        .forgot {
            text-decoration: underline
        }

        /*ul.social-network {*/
        /*    list-style: none;*/
        /*    display: inline;*/
        /*    margin-left: 0 !important;*/
        /*    padding: 0*/
        /*}*/
        /*ul.social-network li {*/
        /*    display: inline;*/
        /*    margin: 0 5px*/
        /*}*/

        /*.social-network a.icoFacebook:hover {*/
        /*    background-color: #3B5998*/
        /*}*/

        /*.social-network a.icoTwitter:hover {*/
        /*    background-color: #33ccff*/
        /*}*/
        /*.social-network a.icoGoogle:hover {*/
        /*    background-color: #BD3518*/
        /*}*/

        /*.social-network a.icoFacebook:hover i,*/
        /*.social-network a.icoTwitter:hover i,*/
        /*.social-network a.icoGoogle:hover i {*/
        /*    color: #fff*/
        /*}*/

        /*a.socialIcon:hover,*/
        /*.socialHoverClass {*/
        /*    color: #44BCDD*/
        /*}*/

        /*.social-circle li a {*/
        /*    display: inline-block;*/
        /*    position: relative;*/
        /*    margin: 0 auto 0 auto;*/
        /*    border-radius: 50%;*/
        /*    text-align: center;*/
        /*    width: 50px;*/
        /*    height: 50px;*/
        /*    font-size: 20px*/
        /*}*/

        /*.social-circle li i {*/
        /*    margin: 0;*/
        /*    line-height: 50px;*/
        /*    text-align: center*/
        /*}*/

        /*.social-circle li a:hover i,*/
        /*.triggeredHover {*/
        /*    transform: rotate(360deg);*/
        /*    transition: all 0.2s*/
        /*}*/

        /*.social-circle i {*/
        /*    color: #fff;*/
        /*    transition: all 0.8s;*/
        /*    transition: all 0.8s*/
        /*}*/
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <form action="{{route('admin-login')}}" method="post" class="box">
                    @csrf
                    <h1>Login to DashBoard</h1>
                    <p class="text-muted"> Please enter your login and password!</p>
                    <a style="color: red">{{$errors->first('username')}}</a>
                    <input type="text" name="username" id="username" placeholder="Username">
                    <a style="color: red">{{$errors->first('password')}}</a>
                    <input type="password" name="password" id="password" placeholder="Password">
                    <p>@include('backend.layouts.message')</p>
                    <input type="submit" name="login" value="Login">
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>

{{--<!doctype html>--}}
{{--<html lang="en">--}}
{{--<head>--}}
{{--    <meta charset="UTF-8">--}}
{{--    <meta name="viewport"--}}
{{--          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">--}}
{{--    <meta http-equiv="X-UA-Compatible" content="ie=edge">--}}
{{--    <title>Admin Login</title>--}}
{{--    <link href="{{url('backend/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">--}}
{{--    <link href="{{url('backend/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">--}}
{{--</head>--}}
{{--<body>--}}
{{--    <div class="row">--}}
{{--        <div class="col-md-12">--}}
{{--            <h1>Login to Dashboard</h1>--}}
{{--            <form action="" method="post">--}}
{{--                @csrf--}}
{{--                <div class="form-group">--}}
{{--                    <label for="username">Username: </label>--}}
{{--                    <input type="text" name="username" id="username" class="form-control form-control-sm">--}}
{{--                </div>--}}
{{--                <div class="form-group">--}}
{{--                    <label for="password">Password: </label>--}}
{{--                    <input type="text" id="password" name="password" class="form-control form-control-sm">--}}
{{--                </div>--}}
{{--                <div class="form-group">--}}
{{--                    <button class="btn btn-success">Login</button>--}}
{{--                </div>--}}
{{--            </form>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</body>--}}
{{--</html>--}}
