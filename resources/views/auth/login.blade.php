<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Bootstrap Styles-->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/loginstyle.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/owl.carousel.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('fonts/icomoon/style.css') }}" rel="stylesheet" />
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>
    <body>
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <img src="{{ asset('img/undraw_remotely_2j6y.svg') }}" alt="Image" class="img-fluid">
                    </div>
                    <div class="col-md-6 contents login-form">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="mb-4">
                                    <h3>Sign In</h3>
                                    <p class="mb-4">Lorem ipsum dolor sit amet elit. Sapiente sit aut eos consectetur adipisicing.</p>
                                </div>
                                <form action="{{ route('login') }}" method="POST">
                                    @csrf
                                    @if ($errors->has('email'))
                                        <span class="invalid-feeback text-danger mb-2">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                    <div class="form-group first">
                                        <input type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus id="username" placeholder="Username">
                                    </div>
                                    @if ($errors->has('password'))
                                        <span class="invalid-feeback text-danger mb-2">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                    <div class="form-group last mb-4">
                                        <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" id="password" placeholder="Password" required>
                                    </div>

                                    <div class="d-flex mb-5 align-items-center">
                                        <label class="control control--checkbox mb-0"><span class="caption">Remember me</span>
                                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }} />
                                            <div class="control__indicator"></div>
                                        </label>
                                    </div>

                                    <input type="submit" value="Log In" class="btn btn-block btn-primary">

                                </form>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
        <!-- jQuery Js -->
        <script src="{{ asset('js/jquery-1.10.2.js') }}"></script>

        <!-- Bootstrap Js -->
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/popper.min.js') }}"></script>

        <script src="https://kit.fontawesome.com/407724819d.js" crossorigin="anonymous"></script>
    </body>
</html>
