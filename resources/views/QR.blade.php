@extends('layouts.dashboard')
@section('page_heading','Dashboard')

@section('section')
<div id="qrform">
	<form id = "QRForm" class="form-horizontal" method="POST" action="/QRCreate">
		<div class="row container-fluid jumbotron panel opag">   
        {{ csrf_field() }}
		 @if(session()->has('qrfilename'))
                <div class="alert alert-success">
                   	<a href="qrs/{{session()->get('qrfilename')}}">
                      <img src="qrs/{{session()->get('qrfilename')}}" id="qrimage">
                    </a>
                </div>
          @endif
            <script src="{{ asset("js/autho.js")}}" type="text/javascript"></script>
           
            @if(session()->has('sidebarProjectSelectedResponsePID'))
            
                <div class="form-group{{ $errors->has('project_id') ? ' has-error' : '' }}">
                    <label for="project_id" class="col-md-4 control-label">Project Name</label>
                    <div class="col-md-6">
                        <select id="project_id" name ="project_id" class="form-control" onchange="authoQRPS();">
                           <script type="text/javascript"> 
                            $(document).ready(function() {
                                    authoQRPS();
                                });
                           </script>
                            <option value=" {{ session()->get('sidebarProjectSelectedResponsePID') }} ">{{session()->get('sidebarProjectSelectedResponseCP')}}</option>
                        </select>
                        @if ($errors->has('project_id'))
                            <span class="help-block"><strong>{{ $errors->first('project_id') }}</strong></span>
                        @endif
                    </div>
                </div>
                @endif
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-md btn-success" form="QRForm">QR Create</button>
                    </div>
                </div>
		</div> 
	</form>

</div>
@stop