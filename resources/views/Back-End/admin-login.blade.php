<!DOCTYPE html>
<html lang="en">

<head>
    <title>Fall Star Login Admin page</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/backend_css/bootstrap.min.css" />

    <link rel="stylesheet" href="{{ url('css/backend_css/bootstrap-responsive.min.css ') }}" />
    <link rel="stylesheet" href="{{ url('css/backend_css/matrix-login.css') }} " />
    <link rel="stylesheet" href="{{ url('css/backend_css/theme.css ') }}" />
    <link rel="stylesheet" href="{{ url('css/backend_css/animation.css ') }}" />
    <link href="{{ url('fonts/backend_fornts/css/font-awesome.css ') }}" rel="stylesheet" />
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,700,800" rel="stylesheet" type="text/css" />
</head>

<body>
    <!--Stars fall-->
    <div id="stars"></div>
    <div id="stars2"></div>
    <div id="stars3"></div>
    <!--End star fall-->

    <!--Start the admin panel -->
    <div id="loginbox">
        <form id="loginform" class="form-vertical" action="{{ route('login_page') }}" method="POST">
            @csrf
            <div class="control-group normal_text text-center">
                <h3 style="color: silver; font-size: 50px">
                    <strong style="color: rgb(38, 104, 38)">Admin</strong>Panel
                </h3>
            </div>
            <hr style="width: 100px; margin: auto; margin-bottom: 20px" />
            @if ($message = Session::get('error'))
                <div class="alert alert-danger alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif
            <div class="control-group">
                <div class="controls">
                    <div class="main_input_box1">
                        <span class="add-on bg_lg"><i class="icon-user"></i></span><input type="text" name="username"
                            placeholder="Enter Your Name" autocomplete="off" class="login" />
                    </div>
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <div class="main_input_box2">
                        <span class="add-on bg_ly" style="margin-right: 5%"><i class="icon-lock"></i></span><input
                            type="password" name="pass" placeholder="Enter Your Password" class="pass"
                            autocomplete="off" />
                    </div>
                </div>
            </div>
            <div class="form-actions">
                <span class="login"><button type="submit" class="btn btn-success hvr-sweep-right" style="
                padding: 6px 70px;
                display: block;
                width: 100%;
                margin-bottom: 20px;
              ">
                        Login
                    </button>
                </span>
                <span>
                    <a href="#" class="flip-link"><button type="button" class="btn btn-light hvr-sweep-left" style="
                  padding: 6px 70px;
                  display: block;
                  width: 100%;
                  margin-bottom: 20px;
                ">
                            Lost password ?
                        </button></a></span>
            </div>
        </form>
        </p>
    </div>

    <script src="{{ url('js/backend_js/jquery.min.js') }}"></script>
    <script src="{{ url('js/backend_js/matrix.login.js') }}"></script>
</body>

</html>
