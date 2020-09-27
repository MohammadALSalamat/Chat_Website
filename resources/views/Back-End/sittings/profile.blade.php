@extends('layouts.back-layout.main_desgin')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Profile</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">User Profile</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Display the logout masseges from AdminController -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">

                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle"
                                        src="{{ asset('admin-style/admin-images/' . $userdetalies->avatar) }}"
                                        alt="User profile picture">
                                </div>

                                <h3 class="profile-username text-center">{{ $userdetalies->name }}</h3>

                                <p class="text-muted text-center">
                                    {{ $userdetalies->postion }}
                                </p>

                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>Email : </b> <a class="float-right text-xs p-1">{{ $userdetalies->email }}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Status : </b> <a class="float-right">
                                            @if ($userdetalies->status === 1)
                                                <span style="color: green">Active</span>
                                            @endif
                                        </a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>phone Number : </b> <a class="float-right">
                                            <td>{{ $userdetalies->Phone_Number }}</td>
                                        </a>
                                    </li>
                                </ul>

                                <p>
                                    {!! Illuminate\Support\Str::limit(strip_tags($userdetalies->Description), 100) !!}
                                    @if (strlen(strip_tags($userdetalies->Description)) > 100)
                                        <a href="#" class="btn btn-info btn-sm">Read More</a>
                                    @endif
                                </p>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">
                                    <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Edit
                                            Profile</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Edit
                                            Password</a>
                                    </li>
                                    <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a>
                                    </li>
                                </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="active tab-pane" id="activity">
                                        <form id="quickForm" action="{{ route('update_profile') }}" method="post"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="id" class="form-control"
                                                value=" {{ $userdetalies->id }}">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label for="exampleInputUsername">User Name</label>
                                                    <input type="text" name="username" class="form-control"
                                                        id="exampleInputUsername" placeholder="Enter Your Name"
                                                        value="{{ $userdetalies->name }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Email address</label>
                                                    <input type="email" name="email" class="form-control"
                                                        id="exampleInputEmail1" placeholder="Enter email"
                                                        value="{{ $userdetalies->email }}">
                                                </div>
                                                <!-- phone mask -->
                                                <div class="form-group">
                                                    <label>phone Number:</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i
                                                                    class="fas fa-phone"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control" name="phone"
                                                            data-inputmask="'mask': ['999-999-9999 [x99999]', '+099 99 99 9999[9]-9999']"
                                                            data-mask value="{{ $userdetalies->Phone_Number }}">
                                                    </div>
                                                    <!-- /.input group -->
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputtextarea">Description</label>
                                                    <textarea id="summer" name="description"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputavater">Avater</label>
                                                    <input type="hidden" name="currnt_image"
                                                        value="{{ $userdetalies->avatar }}">
                                                    <input type="file" name="avatar" class="form-control"
                                                        id="exampleInputavatar">

                                                </div>
                                            </div>
                                            <!-- /.card-body -->
                                            <div class="card-footer">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /.tab-pane -->
                                    <div class="tab-pane" id="timeline">
                                        <form class="form-horizontal" method="post" action="{{ route('update_password') }}"
                                            name="password_validate" id="password_validate" novalidate="novalidate">
                                            @csrf
                                            @method('patch')
                                            <div class="form-group">
                                                <label class="control-label">Current Password</label>
                                                <div class="controls">
                                                    <input type="password" name="current_pass" id="current_pass"
                                                        class="form-control" />
                                                    <span id="changPass"></span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">New Password</label>
                                                <div class="controls">
                                                    <input type="password" class="form-control" name="new_pwd"
                                                        id="new_pwd" />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Confirm password</label>
                                                <div class="controls">
                                                    <input type="password" class="form-control" name="con_pwd"
                                                        id="con_pwd" />
                                                </div>
                                            </div>
                                            <div class="form-actions">

                                                <button type="submit" class=" password btn btn-primary hvr-sweep-right">
                                                    Update Password</button> </div>
                                        </form>
                                    </div>
                                    <!-- /.tab-pane -->

                                    <div class="tab-pane" id="settings">

                                    </div>
                                    <!-- /.tab-pane -->
                                </div>
                                <!-- /.tab-content -->
                            </div><!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection

@section('script')
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.4.1/js/bootstrap.min.js">
    </script>
    <!-- jquery-validation -->
    <script src="{{ url('admin-style/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ url('admin-style/plugins/jquery-validation/additional-methods.min.js') }}"></script>
    <!-- Summernote -->
    <script src="{{ url('admin-style/plugins/summernote/summernote-bs4.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#summer').summernote();
        });
        // prifile validate
        $(function() {
            $('#quickForm').validate({
                rules: {
                    username: {
                        required: true,
                        minlength: 5
                    },
                    email: {
                        required: true,
                        email: true,
                    },
                    phone: {
                        required: true,
                    }
                },
                messages: {
                    email: {
                        required: "Please enter a email address",
                        email: "Please enter a vaild email address"
                    },
                    password: {
                        required: "Please provide a password",
                        minlength: "Your password must be at least 5 characters long"
                    },
                    terms: "Please accept our terms"
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });

    </script>
    <script>
        // create valdiate for current password where the
        //ajax will check if the current password is correct or not
        $('#current_pass').keyup(function() {
            var current_pass = $('#current_pass').val();
            $.ajax({
                type: 'get',
                url: '/admin/check-pwd',
                data: {
                    current_pass: current_pass
                },
                success: function(resp) {
                    if (resp == 'false') {
                        $('#changPass').html(
                            '<font color="red"> current password is not correct Please try again</font>'
                        );
                    } else {
                        $('#changPass').html(
                            '<font color="green"> current password Is correct </font>');
                    }
                },
                error: function() {
                    alert("error");
                }

            });
        });

        $("#password_validate").validate({
            rules: {
                current_pass: {
                    required: true,
                },
                new_pwd: {
                    required: true,
                    minlength: 6,
                    maxlength: 20
                },
                con_pwd: {
                    required: true,
                    minlength: 6,
                    maxlength: 20,
                    equalTo: "#new_pwd"
                }
            },
            errorClass: "help-inline",
            errorElement: "span",
            highlight: function(element) {
                $(element).parents('.form-group').addClass('error');
            },
            unhighlight: function(element) {
                $(element).parents('.form-group').removeClass('error');
                $(element).parents('.form-group').addClass('success');
            }
        });

    </script>
@stop
