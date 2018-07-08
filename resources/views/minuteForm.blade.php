@extends ('layouts.dashboard')
@section('page_heading','Minute Form')

@section('section')
<div class="row container-fluid">
    <div class=" jumbotron panel">
            <form id="minuteForm" class="form-horizontal" method="POST" action="/minuteCreate" enctype="multipart/form-data">
              {{ csrf_field() }}
                @if(session()->has('messageMinuteCreate'))
                    <div class="alert alert-success">
                        {{ session()->get('messageMinuteCreate') }}
                    </div>
                @endif
                <script src="{{ asset("js/autho.js")}}" type="text/javascript"></script>
                
                @if(session()->has('sidebarProjectSelectedResponsePID'))
                <div class="form-group{{ $errors->has('project_id') ? ' has-error' : '' }}">
                    <label for="project_id" class="col-md-4 control-label">Project Name</label>
                    <div class="col-md-6">
                        <select id="project_id" name ="project_id" class="form-control" onchange="projectSelected();authoMFPS();">
                           <script type="text/javascript"> 
                            $(document).ready(function() {
                                    projectSelected();
                                    authoMFPS();
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
                
                <div class="form-group{{ $errors->has('agenda') ? ' has-error' : '' }}">
                    <label for="agenda" class="col-md-4 control-label">Agenda</label>
                    <div class="col-md-6">
                        <textarea  id="agenda" type="textarea" class="form-control" name="agenda" value="{{ old('agenda') }}" required ></textarea>
                    @if ($errors->has('agenda'))
                            <span class="help-block"><strong>{{ $errors->first('agenda') }}</strong></span>
                        @endif
                    </div>
                </div>
                <div class="form-group{{ $errors->has('discussion') ? ' has-error' : '' }}">
                    <label for="discussion" class="col-md-4 control-label">Discussion</label>
                    <div class="col-md-6">
                        <textarea id="discussion" type="text" class="form-control" name="discussion" value="{{ old('discussion') }}" required></textarea>
                    @if ($errors->has('discussion'))
                            <span class="help-block"><strong>{{ $errors->first('discussion') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('leader_acheivement') ? ' has-error' : '' }}">
                    <label for="leader_acheivement" class="col-md-4 control-label">Acheivement of Leader</label>
                    <div class="col-md-6" id="mfs">
                        
                        <div id="leader_acheivement" name ="leader_acheivement" class="minuteFormDispTask" >
                                
                        </div>
                        
                        @if ($errors->has('leadername'))
                            <span class="help-block"><strong>{{ $errors->first('leadername') }}</strong></span>
                        @endif
                    </div>
                </div>
                <div class="form-group{{ $errors->has('member_i_acheivement') ? ' has-error' : '' }}">
                    <label for="member_i_acheivement" class="col-md-4 control-label">Acheivement of Member 1st</label>
                    <div class="col-md-6" id="mfs">
                       
                        <div id="member_i_acheivement" name ="member_i_acheivement" class="minuteFormDispTask" >
                            
                        </div>
                        @if ($errors->has('m1name'))
                            <span class="help-block"><strong>{{ $errors->first('m1name') }}</strong></span>
                        @endif
                    </div>
                </div>
                <div class="form-group{{ $errors->has('member_ii_acheivement') ? ' has-error' : '' }}">
                    <label for="member_ii_acheivement" class="col-md-4 control-label">Acheivement of Member 2nd</label>
                    <div class="col-md-6" id="mfs">
                        
                        <div id="member_ii_acheivement" name ="member_ii_acheivement" class="minuteFormDispTask" >
                            
                        </div>
                    @if ($errors->has('m2name'))
                            <span class="help-block"><strong>{{ $errors->first('m2name') }}</strong></span>
                        @endif
                    </div>
                </div>
                <div class="form-group{{ $errors->has('leader_responsibility') ? ' has-error' : '' }}">
                    <label for="leader_responsibility" class="col-md-4 control-label">Responsibility of Leader</label>
                    <div class="col-md-6" id="mfs">
                        
                        <div id="leader_responsibility" name ="leader_responsibility" class="minuteFormDispTask" >
                            
                        </div>
                    @if ($errors->has('lrname'))
                            <span class="help-block"><strong>{{ $errors->first('lrname') }}</strong></span>
                        @endif
                    </div>
                </div>
                <div class="form-group{{ $errors->has('member_i_responsibility') ? ' has-error' : '' }}">
                    <label for="member_i_responsibility" class="col-md-4 control-label">Responsibility of Member 1st</label>
                    <div class="col-md-6" id="mfs">
                        
                        <div id="member_i_responsibility" name ="member_i_responsibility" class="minuteFormDispTask" >
                            
                        </div>
                    @if ($errors->has('m1rname'))
                            <span class="help-block"><strong>{{ $errors->first('m1rname') }}</strong></span>
                        @endif
                    </div>
                </div>
                <div class="form-group{{ $errors->has('member_ii_responsibility') ? ' has-error' : '' }}">
                    <label for="member_ii_responsibility" class="col-md-4 control-label">Responsibility of Member 2nd</label>
                    <div class="col-md-6" id="mfs">
                        
                        <div id="member_ii_responsibility" name ="member_ii_responsibility" class="minuteFormDispTask" >
                            
                        </div>
                    @if ($errors->has('m2rname'))
                            <span class="help-block"><strong>{{ $errors->first('m2rname') }}</strong></span>
                        @endif
                    </div>
                </div>
                <div class="form-group{{ $errors->has('imageInput') ? ' has-error' : '' }}">
                    <label for="imageInput" class="col-md-4 control-label">Enter photo</label>
                    <div class="col-md-6">
                        
                        <input data-preview="#preview" name="imageInput" type="file" id="imageInput">
                        <img class="col-sm-6" id="preview"  src="" >
                        @if ($errors->has('imageInput'))
                            <span class="help-block"><strong>{{ $errors->first('imageInput') }}</strong></span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-md btn-success" form="minuteForm">Submit</button>
                    </div>
                </div>
            </form>
        </div>
</div>
@stop