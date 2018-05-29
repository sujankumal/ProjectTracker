@extends('layouts.app')

@section('content')
<div class="container container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class=" panel-default ">
                <div class=" text-center margin white-text" ><h1>Login</h1></div>
                <div class="col-lg-offset-5 col-md-offset-5 col-sm-offset-5 col-xs-offset-5">
                    <img src="{{url('images/user.png')}}" class="img-thumbnail img-responsive center-block margin" style="display:inline; background:transparent; border:none; margin:10pt;" width="100" alt="user"/>
                </div>
                <div class="white-text ">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (session('warning'))
                        <div class="alert alert-warning">
                            {{ session('warning') }}
                        </div>
                    @endif
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address &nbsp; &nbsp;<span class="glyphicon glyphicon-envelope"> </span> </label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder="example@example.com">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password &nbsp; &nbsp;<span class="glyphicon glyphicon-lock"> </span></label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                        <span class="glyphicon glyphicon-log-in"> </span>&nbsp; Login
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                   <p class="white-text"> Forgot Your Password?</p>
                                </a>
                                    
                            </div>
                        </div>
                        <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                        
                                        <a href="{{ url('auth/google') }}" class="btn btn-md  btn-social btn-google">
                                            <span class="fa fa-google"></span><strong>Login With Google</strong>
                                        </a>     
                                </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
