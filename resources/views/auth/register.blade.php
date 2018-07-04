@extends('layouts.app')

@section('content')
<div class="container">
    <br>
    <br>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class=" panel-default">
                <div class="text-center margin black-text"><h1> Register</h1></div>
                <div class="col-lg-offset-5 col-md-offset-5 col-sm-offset-5 col-xs-offset-5">
                        <img src="{{url('images/user.png')}}" class="img-thumbnail img-responsive center-block margin" style="display:inline; background:transparent;  margin:10pt;" width="100" alt="user"/>
                </div>
                <div class="black-text">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name&nbsp; &nbsp;<span class="glyphicon glyphicon-user"> </span></label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" placeholder="Enter Your Name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address&nbsp; &nbsp;<span class="glyphicon glyphicon-envelope"></span></label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" placeholder="example@example.com" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password&nbsp; &nbsp;<span class="glyphicon glyphicon-lock"></span></label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" placeholder="********" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password&nbsp; &nbsp;<span class="glyphicon glyphicon-lock"></span></label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="********" required>
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('selectBatch') ? ' has-error' : '' }}">
                            <label for="selectBatch" class="col-md-4 control-label">Select Batch&nbsp; &nbsp;<span class="glyphicon glyphicon-calendar"></span></label>
                            <div class="col-md-6 " style="margin-top:5px;">
                               <select id="selectBatch" name ="selectBatch" class="form-control">
                                   <option value=""></option>
                                   @for($i=2010;$i<=date('Y');$i++)
                                    <option value="{{$i}}">{{$i}}</option>
                                    @endfor
                                </select>
                                @if ($errors->has('selectBatch'))
                                    <span class="help-block"><strong>{{ $errors->first('selectBatch') }}</strong></span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <span class="glyphicon glyphicon-log-in"></span> &nbsp; Register
                                </button>
                            </div>
                            
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <a href="{{ url('auth/google') }}" class="btn btn-md  btn-social btn-google">
                                    <span class="fa fa-google"></span>  <strong>Login With Google</strong>
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
