<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>تسجيل الدخول للوحة تحكم سوق الورد</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{asset('admin/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- not use this in ltr -->
    <link href="{{asset('admin/css/bootstrap.rtl.css')}}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{asset('admin/css/sb-admin-2.css')}}" rel="stylesheet">
    <link href="{{asset('style.css')}}" rel="stylesheet">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body class="admin-login-body hero-bkg-animated">

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4 login-table">
            <img style="height: 100px;width: 250px;margin-top: 7vh;border-radius: 3px;opacity: 0.7" src="{{asset('admin/images/logo.png')}}" alt="user_auth" class="user-auth-img"/>
            <div class="login-panel panel panel-default">

                <div class="panel-heading">
                    @include('includes.messages')
                    <h4>تسجيل الدخول</h4>
                </div>
                <div class="panel-body">
                    <form action="{{ route('adminlogin') }}" method="post">
                        @csrf

                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="البريد الشخصي" name="email" type="email" autofocus required>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="كلمة السر" name="password" type="password" value="" required>
                            </div>
                            <button style="margin-top: 50px" type="submit" class="btn btn-lg btn-primary btn-block">تسجيل الدخول</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

</html>
