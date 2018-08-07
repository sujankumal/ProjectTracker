@extends ('layouts.main')
@section('page_heading','Tasks')

@section('section')

            <form id="projectTask" class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class="col-md-6">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Task List</h3>
                        </div>
                        <div class="box-body">
                        @if(session()->has('messageProjectTaskCreate'))
                            <div class="alert alert-success">
                                {{ session()->get('messageProjectTaskCreate') }}
                            </div>
                        @endif
                            <div id="ptscr">
                                <br>
                                <ol id="taskList">
                                </ol>
                            </div>
                        </div>
                    </div>
            </div>
                <script src="{{ asset("js/autho.js")}}" type="text/javascript"></script>
                <div class="col-md-6">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Task add</h3>
                        </div>
                        <div class="box-body">
                            @if(session()->has('sidebarProjectSelectedResponsePID'))
                    
                            <div class="form-group{{ $errors->has('projID') ? ' has-error' : '' }}">
                            <label for="enteredTask" class="col-md-4 control-label">Project Name</label>
                            <div class="col-md-6">
                                <select id="projID" name ="projID" class="form-control" onchange="tselectionChange(); authoPTaskSC();">
                                   <script type="text/javascript"> 
                                    $(document).ready(function() {
                                            tselectionChange(); 
                                            authoPTaskSC();
                                        });
                                   </script>
                                    <option value=" {{ session()->get('sidebarProjectSelectedResponsePID') }} ">{{session()->get('sidebarProjectSelectedResponseCP')}}</option>
                                   
                                </select>
                                @if ($errors->has('projID'))
                                    <span class="help-block"><strong>{{ $errors->first('projID') }}</strong></span>
                                @endif
                            </div>
                            </div>
                         @endif
                

                        <div class="form-group{{ $errors->has('enteredTask') ? ' has-error' : '' }}">
                            <label for="enteredTask" class="col-md-4 control-label">Enter Task</label>
                            <div class="col-md-6">
                                <input id="enteredTask" type="text" class="form-control" name="enteredTask" value="{{ old('enteredTask') }}" required >

                            @if ($errors->has('enteredTask'))
                                    <span class="help-block"><strong>{{ $errors->first('enteredTask') }}</strong></span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-4 col-md-offset-4">
                                <button type="button" class="btn btn-md btn-success" form="projectTask" onclick="submitClicked();">Submit</button>
                                <div  class="help-block ">
                                    <br>
                                    <span id="messageDisp"></span>
                                    <br>
                                </div>
                                
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@stop