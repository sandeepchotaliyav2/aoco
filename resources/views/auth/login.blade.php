@extends('layouts.login') @section('content')

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="../../index2.html"><b>AOCO</b>Login</a>
        </div>
        <div class="login-box-body">
            <p class="login-box-msg">Sign in to start your session</p>

            <form method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} has-feedback">
                    <!-- <label for="email" class="col-md-4 control-label">E-Mail Address</label> -->

                    <input id="email" type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}" required autofocus>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span> @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span> @endif

                </div>
`
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} has-feedback">
                    <!-- <label for="password" class="col-md-4 control-label">Password</label> -->

                    <input id="password" type="password" class="form-control" placeholder="Password" name="password" required>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span> @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span> @endif

                </div>

                <div class="row">
                    <div class="col-xs-8">
                        <!-- <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Remember Me
            </label>
          </div> -->
                    </div>
                    <!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Login</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
        </div>
    </div>
</body>
@endsection