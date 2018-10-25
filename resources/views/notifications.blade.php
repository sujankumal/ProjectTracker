
@extends('layouts.main')

@section('page_heading','Notice')

@section('section')

<div class="col-md-6">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Enter the Notice</h3>
            </div>
            <div class="box-body">
            <form id="projectNotice" class="form-horizontal" method="POST" action="/sendNotice" enctype="multipart/form-data">
              {{ csrf_field() }}
                @if(session()->has('messageNoticeCreate'))
                    <div class="alert alert-success">
                        {{ session()->get('messageNoticeCreate') }}
                    </div>
                @endif
                  <div class="form-group{{ $errors->has('projID') ? ' has-error' : '' }}">
                    <label for="projID" class="col-md-4 control-label">Project</label>
                    <div class="col-md-6">
                       <select id="projID" name ="projID[]" multiple  class="form-control" required>
                            <option value="" disabled></option>
                            <hr/>
                            @foreach(App\project_detail::all() as $project)
                                <option value="{{$project->id}}" class="btn-sm">{{$project->name}}</option>
                                <hr/>
                            @endforeach
                        </select>
                    @if ($errors->has('projID'))
                            <span class="help-block"><strong>{{ $errors->first('projID') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('enteredNotice') ? ' has-error' : '' }}">
                    <label for="enteredNotice" class="col-md-4 control-label">Enter Notice</label>
                    <div class="col-md-6">
                        <textarea id="enteredNotice" type="text" class="form-control" name="enteredNotice" value="{{ old('enteredNotice') }}" required ></textarea>

                   		 @if ($errors->has('enteredNotice'))
                            <span class="help-block"><strong>{{ $errors->first('enteredNotice') }}</strong></span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="Submit" class="btn btn-md btn-success" form="projectNotice" >Submit</button>
                    </div>
                </div>
                
            </form>
        </div>
    </div>
</div>
@stop
