@extends ('layouts.dashboard')
@section('page_heading','Tasks')

@section('section')
<div class="container">
    <div class="row">
        <div panel-body bg-info>
            <form id="projectTask" class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
              {{ csrf_field() }}
                @if(session()->has('messageProjectTaskCreate'))
                    <div class="alert alert-success">
                        {{ session()->get('messageProjectTaskCreate') }}
                    </div>
                @endif
                <div class="container-fluid bg-2 text-center">
                    <ol id="taskList">
                      
                    </ol>
                  </div>
                
                  <div class="form-group{{ $errors->has('projID') ? ' has-error' : '' }}">
                    <label for="enteredTask" class="col-md-4 control-label">Project</label>
                    <div class="col-md-6">
                       <select id="projID" name ="projID" onchange="selectionChange()" class="form-control" required >
                            <option value=""></option>
                            @foreach(App\project_detail::all() as $project)
                                <option value="{{$project->id}}">{{$project->name}}</option>
                            @endforeach
                        </select>
                    @if ($errors->has('projID'))
                            <span class="help-block"><strong>{{ $errors->first('projID') }}</strong></span>
                        @endif
                    </div>
                </div>

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
                    <div class="col-md-6 col-md-offset-4">
                        <button type="button" class="btn btn-md btn-success" form="projectTask" onclick="submitClicked();">Submit</button>
                        <span id="messageDisp" class="help-block"></span>
                    </div>
                </div>
                
            </form>
        </div>
    </div>
</div>
@stop