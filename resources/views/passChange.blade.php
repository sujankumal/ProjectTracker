
@extends('layouts.main')

@section('page_heading','')

@section('section')
       
<div class="col-md-6">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Change Password</h3>
            </div>
            <div class="box-body">
   
                  <form id="form-change-password" class="black-text form-horizontal" role="form" method="POST" action="{{ url('/password/update') }}" novalidate class="form-horizontal">
                    {{ csrf_field() }}
                    <div class="form-group">   
                      <label for="password" class="col-md-4 control-label">New Password &nbsp;<i class="fa fa-lock" aria-hidden="true"></i></label>
                      <div class="col-md-6">
                        <input type="password" class="form-control" id="password" name="password" placeholder="password">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="password_confirmation" class="col-md-4 control-label">Re-enter Password &nbsp;<i class="fa fa-lock" aria-hidden="true"></i></label>
                      <div class="col-md-6">
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="password">
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