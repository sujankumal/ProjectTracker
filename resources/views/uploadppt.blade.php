@extends ('layouts.dashboard')
@section('page_heading','PPT file Upload')
@section('section')
<div class="container">
    <div class="row">
        <div panel-body bg-info>
            <form id="minuteForm" class="form-horizontal" method="POST" action="/pptUpload" enctype="multipart/form-data">
              {{ csrf_field() }}
                @if(session()->has('pptUpload'))
                    <div class="alert alert-success">
                        {{ session()->get('pptUpload') }}
                    </div>
                @endif
               <script src="{{ asset("js/autho.js")}}" type="text/javascript"></script>
                 <div class="form-group{{ $errors->has('project_id') ? ' has-error' : '' }}">
                    <label for="project_id" class="col-md-4 control-label">Project Name</label>
                    <div class="col-md-6">
                        <select id="project_id" name ="project_id" class="form-control" onchange="pptUploadProjectSelected();authoPptPS();" required>
                            <option value=""></option>
                            @foreach(App\project_detail::all() as $project)
                                <option value="{{$project->id}}">{{$project->name}}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('project_id'))
                            <span class="help-block"><strong>{{ $errors->first('project_id') }}</strong></span>
                        @endif
                    </div>
                </div>
                
                <div class="form-group{{ $errors->has('pptInput') ? ' has-error' : '' }}">
                    <label for="pptInput" class="col-md-4 control-label">Enter PPT File</label>
                    <div class="col-md-6">
                    	<input type="file" name="pptInput" id="pptInput" required="">
                        @if ($errors->has('pptInput'))
                            <span class="help-block"><strong>{{ $errors->first('pptInput') }}</strong></span>
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
</div>

@stop