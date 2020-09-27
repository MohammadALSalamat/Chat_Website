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
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link href="{{ url('fonts/backend_fornts/css/font-awesome.css ') }}" rel="stylesheet" />
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,700,800" rel="stylesheet" type="text/css" />
    <!-- Toastr -->
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />

</head>

<body>
    <!--Stars fall-->
    <div id="stars"></div>
    <div id="stars2"></div>
    <div id="stars3"></div>
    <!--End star fall-->

    <!--Start the admin panel -->
    <div id="loginbox">
        <form id="loginform" class="form-vertical" action="{{ route('Login_page') }}" method="POST">
            @csrf
            <div class="text-center control-group normal_text">
                <h3 style="color: silver; font-size: 50px">
                    <strong style="color: rgb(38, 104, 38)">Login</strong>Panel
                </h3>
            </div>
            <hr style="width: 100px; margin: auto; margin-bottom: 20px" />
            <div class="control-group">
                <div class="controls">
                    <div class="main_input_box1">
                        <span class="add-on bg_lg"><i class="icon-user"></i></span><input type="email" name="email"
                            placeholder="Enter Your Name" autocomplete="off" class="login" style="padding: 25px;"
                            required />
                    </div>
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <div class="main_input_box2">
                        <span class="add-on bg_ly" style="margin-right: 5%"><i class="icon-lock"></i></span>
                        <input type="password" name="pass" placeholder="Enter Your Password" class="pass"
                            autocomplete="off" required style="padding: 25px;" />
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
            <p class="px-5 font-semibold text-white"> Dont You have Account ? <a href="{{ route('register_page') }}"
                    class="text-green-400">
                    Register here</a></p>
        </form>
    </div>
    <!-- Toastr -->
    <script src="{{ url('admin-style/plugins/toastr/toastr.min.js') }}"></script>
    <script src="{{ url('admin-style/plugins/toastr/extra_toastr.js') }}"></script>
    <!-- sweet alert -validation -->
    <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    /*escaped*/
    {!! Toastr::message() !!}
    <script src="{{ url('js/backend_js/jquery.min.js') }}"></script>
    <script src="{{ url('js/backend_js/matrix.login.js') }}"></script>
</body>

</html>
