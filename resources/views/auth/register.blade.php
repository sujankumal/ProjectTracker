@extends('layouts.app')

@section('section')
<div class="col-md-6 col-md-offset-3">
        <div class="box box-primary ">
            <div class="box-body">
            <div class=" panel-default">
                <div class="text-center margin black-text"><h1> Register</h1></div>
                <div class="mx-auto text-center">
                        <img src="{{url('images/user.png')}}" class="img-thumbnail img-responsive center-block margin" style="display:inline; background:transparent;  margin:10pt;" width="100" alt="user"/>
                </div>
                <div class="black-text">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name&nbsp; &nbsp;<i class="fa fa-user"> </i></label>

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
                            <label for="email" class="col-md-4 control-label">E-Mail Address&nbsp; &nbsp;<span class="fa fa-envelope"></span></label>

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
                            <label for="password" class="col-md-4 control-label">Password&nbsp; &nbsp;<span class="fa fa-lock"></span></label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" placeholder="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password&nbsp; &nbsp;<span class="fa fa-lock"></span></label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="password" required>
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('selectBatch') ? ' has-error' : '' }}">
                            <label for="selectBatch" class="col-md-4 control-label">Select Batch&nbsp; &nbsp;<span class="fa fa-calendar"></span></label>
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
                                    <span class="fa fa-sign-in"></span> &nbsp; Register
                                </button>
                            </div>
                            
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <a href="{{ url('auth/google') }}" class="btn btn-md  btn-social btn-google">
                                    <span class="fa fa-google white-text"></span>  <strong class="white-text">Login With Google</strong>
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
