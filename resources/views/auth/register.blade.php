<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>VITAMINS | Registration Page</title>

        <!-- Google Font: Source Sans Pro -->
        <link
            rel="stylesheet"
            href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"
        />
        <!-- Font Awesome -->
        <link
            rel="stylesheet"
            href="{{asset('/plugins/fontawesome-free/css/all.min.css')}}"
        />
        <!-- icheck bootstrap -->
        <link
            rel="stylesheet"
            href="{{asset('/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}"
        />
        <!-- Theme style -->
        <link rel="stylesheet" href="{{asset('/dist/css/adminlte.min.css')}}" />
    </head>
    <body class="hold-transition register-page" style="color:blue">
        <div class="register-box">
            <div class="card card-outline card-primary">
                <div class="card-header text-center" style="background-color:blue;color:white">
                    <b>VITAMINS</b>
                </div>
                <div class="card-body">
                    <p class="login-box-msg" style="color:blue">Registration</p>

                    <form action="{{ route('register') }}" method="post">
                        @csrf
                        <div class="input-group mb-3">
                            <input
                                type="text"
                                class="form-control @error('name') is-invalid @enderror"
                                placeholder="Full Name"
                                name="name"
                                value="{{ old('name') }}" 
                                required autocomplete="name" 
                                autofocus
                            />
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="input-group mb-3">
                            <input
                                type="email"
                                class="form-control @error('email') is-invalid @enderror"
                                placeholder="Email"
                                name="email"
                                required autocomplete="email"
                                value="{{ old('email') }}"
                                
                            />
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                        <div class="input-group mb-3">
                            <input
                                type="password"
                                class="form-control @error('password') is-invalid @enderror"
                                placeholder="Password"
                                name="password"
                                required autocomplete="new-password"
                            />
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                        <div class="input-group mb-3">
                            <input
                                type="password"
                                class="form-control"
                                placeholder="Confirm Password"
                                name="password_confirmation"
                                required autocomplete="new-password"
                            />
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            
                            <!-- /.col -->
                            <div class="col-6">
                                <button
                                    type="submit"
                                    class="btn btn-primary btn-block"
                                >
                                    Register
                                </button>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>


                    <a href="login" class="text-center"
                        >Already have an Account?</a
                    >
                </div>
                <!-- /.form-box -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.register-box -->

        <!-- jQuery -->
        <script src="{{asset('/plugins/jquery/jquery.min.js')}}"></script>
        <!-- Bootstrap 4 -->
        <script src="{{asset('/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <!-- AdminLTE App -->
        <script src="{{asset('/dist/js/adminlte.min.js')}}"></script>
    </body>
</html>
