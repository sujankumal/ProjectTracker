@extends('layouts.app')

@section('content')
<div class="container container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class=" panel-default ">
                <div class=" text-center margin white-text" ><h1>Change Password</h1></div>
                  <form id="form-change-password" class="white-text form-horizontal" role="form" method="POST" action="{{ url('/password/update') }}" novalidate class="form-horizontal">
                    {{ csrf_field() }}
                  <div class="form-group">   
                    <label for="password" class="col-md-4 control-label">New Password &nbsp; &nbsp;<span class="glyphicon glyphicon-lock"> </span></label>
                    <div class="col-md-6">
                      <div class="form-group">
                        <input type="password" class="form-control" id="password" name="password" placeholder="********">
                      </div>
                    </div>
                    <label for="password_confirmation" class="col-md-4 control-label">Re-enter Password &nbsp;<span class="glyphicon glyphicon-lock"></span></label>
                    <div class="col-md-6">
                      <div class="form-group">
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="********">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-5 col-sm-6">
                      <button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-log-in"> </span> &nbsp; &nbsp;Submit</button>
                    </div>
                  </div>
                  </form>
            </div>
        </div>
    </div>
  </div>
@endsection