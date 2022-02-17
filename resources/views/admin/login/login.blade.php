<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>Admincast bootstrap 4 &amp; angular 5 admin template, Шаблон админки | Login</title>
    <!-- GLOBAL MAINLY STYLES-->
    <link href="{{ asset('/admin-assets') }}/assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="{{ asset('/admin-assets') }}/assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="{{ asset('/admin-assets') }}/assets/vendors/themify-icons/css/themify-icons.css" rel="stylesheet" />
    <!-- THEME STYLES-->
    <link href="{{ asset('/admin-assets') }}/assets/css/main.css" rel="stylesheet" />
    <!-- PAGE LEVEL STYLES-->
    <link href="{{ asset('/admin-assets') }}/assets/css/pages/auth-light.css" rel="stylesheet" />
</head>

<body class="bg-silver-300">
<div class="content">
    <div class="brand">
        <a class="link" href="{{ route('/') }}">URDAN</a>
    </div>
    <form  action="{{ route('login') }}" method="post">
        @csrf
        <h2 class="login-title">Log in</h2>
        <div class="form-group">
            <div class="input-group-icon right">
                <div class="input-icon"><i class="fa fa-envelope"></i></div>
                <input class="form-control" type="email" name="email" placeholder="Email" autocomplete="off">
            </div>
        </div>
        <div class="form-group">
            <div class="input-group-icon right">
                <div class="input-icon"><i class="fa fa-lock font-16"></i></div>
                <input class="form-control" type="password" name="password" placeholder="Password">
            </div>
        </div>
        <div class="form-group">
            <button class="btn btn-info btn-block" type="submit">Login</button>
        </div>
        <div class="text-center">Not a member?
            <a class="color-blue" href="{{ route('register') }}">Create accaunt</a>
        </div>
    </form>
</div>
<!-- BEGIN PAGA BACKDROPS-->

<!-- END PAGA BACKDROPS-->
<!-- CORE PLUGINS -->
<script src="{{ asset('/admin-assets') }}/assets/vendors/jquery/dist/jquery.min.js" type="text/javascript"></script>
<script src="{{ asset('/admin-assets') }}/assets/vendors/popper.js/dist/umd/popper.min.js" type="text/javascript"></script>
<script src="{{ asset('/admin-assets') }}/assets/vendors/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
<!-- PAGE LEVEL PLUGINS -->
<!-- CORE SCRIPTS-->
<script src="{{ asset('/admin-assets') }}/assets/js/app.js" type="text/javascript"></script>
<script src="{{ asset('/admin-assets') }}/assets/vendors/jquery-validation/dist/jquery.validate.min.js" type="text/javascript"></script>

<!-- PAGE LEVEL SCRIPTS-->

</body>

</html>
