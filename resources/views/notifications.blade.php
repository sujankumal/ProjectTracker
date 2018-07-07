@extends ('layouts.dashboard')

@section ('page_heading','Notice')

@section('section')
<div class="row container-fluid jumbotron panel">
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
                       <select id="projID" name ="projID"  class="form-control" required>
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

                <div class="form-group{{ $errors->has('enteredNotice') ? ' has-error' : '' }}">
                    <label for="enteredNotice" class="col-md-4 control-label">Enter Notice</label>
                    <div class="col-md-6">
                        <input id="enteredNotice" type="text" class="form-control" name="enteredNotice" value="{{ old('enteredNotice') }}" required >

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
@stop
