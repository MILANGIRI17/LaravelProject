<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Login</title>
    <link href="{{url('backend/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{url('backend/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
</head>
<body>
    <div class="row">
        <div class="col-md-12">
            <h1>Login to Dashboard</h1>
            <form action="" method="post">
                @csrf
                <div class="form-group">
                    <label for="username">Username: </label>
                    <input type="text" name="username" id="username" class="form-control form-control-sm">
                </div>
                <div class="form-group">
                    <label for="password">Password: </label>
                    <input type="text" id="password" name="password" class="form-control form-control-sm">
                </div>
                <div class="form-group">
                    <button class="btn btn-success">Login</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
