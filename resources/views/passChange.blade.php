@extends('layouts.app')

@section('content')
<div class="row container-fluid">
  <div class="row container-fluid ">
    <br>
  </div>
    <div class="col-md-10">
            <div class="row jumbotron panel opag black-text">
              <br>
                <div class=" text-center margin black-text" >
                  <h3>Change Password</h3>
                </div>
                  <form id="form-change-password" class="black-text form-horizontal" role="form" method="POST" action="{{ url('/password/update') }}" novalidate class="form-horizontal">
                    {{ csrf_field() }}
                    <div class="form-group">   
                      <label for="password" class="col-md-4 control-label">New Password &nbsp;<span class="glyphicon glyphicon-lock"> </span></label>
                      <div class="col-md-6">
                        <input type="password" class="form-control" id="password" name="password" placeholder="********">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="password_confirmation" class="col-md-4 control-label">Re-enter Password &nbsp;<span class="glyphicon glyphicon-lock"></span></label>
                      <div class="col-md-6">
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="********">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-offset-5 col-sm-6">
                        <button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-log-in"> </span> &nbsp;Submit</button>
                      </div>
                    </div>
                  </form>
            </div>
        </div>
  </div>
@endsection