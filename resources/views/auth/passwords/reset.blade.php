<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>VITAMINS | Recover Password (v2)</title>

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
            href="{asset('/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}"
        />
        <!-- Theme style -->
        <link rel="stylesheet" href="{{asset('/dist/css/adminlte.min.css')}}" />
    </head>
    <body class="hold-transition login-page" style="color:blue">
        <div class="login-box">
            <div class="card card-outline card-primary">
                <div class="card-header text-center">
                   <b>THE VITAMINS </b>
                </div>
                <div class="card-body">
                    <p class="login-box-msg">
                        You are only one step a way from your new password,
                        recover your password now.
                    </p>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="{{ route('password.update') }}" method="post">

                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                    <div class="input-group mb-3">
                            <input
                                type="email"
                                class="form-control @error('email') is-invalid @enderror"
                                placeholder="Email"
                                name="email"
                                value="{{ $email ?? old('email') }}" required autocomplete="email" 
                                autofocus
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
                                placeholder="New Password"
                                required autocomplete="new-password"
                                name="password"
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
                                placeholder="Confirm New Password"
                                required autocomplete="new-password"
                                name="password_confirmation"
                            />
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <button
                                    type="submit"
                                    class="btn btn-primary btn-block"
                                >
                                    Change password
                                </button>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>

                    
                </div>
                <!-- /.login-card-body -->
            </div>
        </div>
        <!-- /.login-box -->

        <!-- jQuery -->
        <script src="{{asset('/plugins/jquery/jquery.min.js')}}"></script>
        <!-- Bootstrap 4 -->
        <script src="{{asset('/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <!-- AdminLTE App -->
        <script src="{{asset('/dist/js/adminlte.min.js')}}"></script>
    </body>
</html>
