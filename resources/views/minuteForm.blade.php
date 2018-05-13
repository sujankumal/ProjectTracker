@extends ('layouts.dashboard')
@section('page_heading','Minute Form')

@section('section')
<div class="container">
    <div class="row">
        <div panel-body bg-info>
            <form id="minuteForm" class="form-horizontal" method="POST" action="/minuteCreate" enctype="multipart/form-data">
              {{ csrf_field() }}
                @if(session()->has('messageMinuteCreate'))
                    <div class="alert alert-success">
                        {{ session()->get('messageMinuteCreate') }}
                    </div>
                @endif
                <div class="form-group{{ $errors->has('project_id') ? ' has-error' : '' }}">
                    <label for="project_id" class="col-md-4 control-label">Project Name</label>
                    <div class="col-md-6">
                        <select id="project_id" name ="project_id" class="form-control" onchange="projectSelected()">
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
                <div class="form-group{{ $errors->has('progress_percentage') ? ' has-error' : '' }}">
                    <label for="progress_percentage" class="col-md-4 control-label">Progress %</label>
                    <div class="col-md-6">
                        <select id="progress_percentage" name ="progress_percentage" class="form-control" required>
                            <option value=""></option>
                            @for($i=5;$i<=100;$i=$i+5)
                                <option value="{{$i}}">{{$i}}</option>
                            @endfor
                        </select>
                        @if ($errors->has('progress_percentage'))
                            <span class="help-block"><strong>{{ $errors->first('progress_percentage') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('agenda') ? ' has-error' : '' }}">
                    <label for="agenda" class="col-md-4 control-label">Agenda</label>
                    <div class="col-md-6">
                        <input id="agenda" type="text" class="form-control" name="agenda" value="{{ old('agenda') }}" required >

                    @if ($errors->has('agenda'))
                            <span class="help-block"><strong>{{ $errors->first('agenda') }}</strong></span>
                        @endif
                    </div>
                </div>
                <div class="form-group{{ $errors->has('discussion') ? ' has-error' : '' }}">
                    <label for="discussion" class="col-md-4 control-label">Discussion</label>
                    <div class="col-md-6">
                        <input id="discussion" type="text" class="form-control" name="discussion" value="{{ old('discussion') }}" required >

                    @if ($errors->has('discussion'))
                            <span class="help-block"><strong>{{ $errors->first('discussion') }}</strong></span>
                        @endif
                    </div>
                </div>
                <div class="form-group{{ $errors->has('leader_acheivement') ? ' has-error' : '' }}">
                    <label for="leader_acheivement" class="col-md-4 control-label">Acheivement of Leader</label>
                    <div class="col-md-6">
                        
                        <div id="leader_acheivement" name ="leader_acheivement" class="" >
                            
                        </div>
                        @if ($errors->has('leader_acheivement'))
                            <span class="help-block"><strong>{{ $errors->first('leader_acheivement') }}</strong></span>
                        @endif
                    </div>
                </div>
                <div class="form-group{{ $errors->has('member_i_acheivement') ? ' has-error' : '' }}">
                    <label for="member_i_acheivement" class="col-md-4 control-label">Acheivement of Member 1st</label>
                    <div class="col-md-6">
                       
                        <div id="member_i_acheivement" name ="member_i_acheivement" class="" >
                            
                        </div>
                        @if ($errors->has('member_i_acheivement'))
                            <span class="help-block"><strong>{{ $errors->first('member_i_acheivement') }}</strong></span>
                        @endif
                    </div>
                </div>
                <div class="form-group{{ $errors->has('member_ii_acheivement') ? ' has-error' : '' }}">
                    <label for="member_ii_acheivement" class="col-md-4 control-label">Acheivement of Member 2nd</label>
                    <div class="col-md-6">
                        
                        <div id="member_ii_acheivement" name ="member_ii_acheivement" class="" >
                            
                        </div>
                    @if ($errors->has('member_ii_acheivement'))
                            <span class="help-block"><strong>{{ $errors->first('member_ii_acheivement') }}</strong></span>
                        @endif
                    </div>
                </div>
                <div class="form-group{{ $errors->has('leader_responsibility') ? ' has-error' : '' }}">
                    <label for="leader_responsibility" class="col-md-4 control-label">Responsibility of Leader</label>
                    <div class="col-md-6">
                        
                        <div id="leader_responsibility" name ="leader_responsibility" class="" >
                            
                        </div>
                    @if ($errors->has('leader_responsibility'))
                            <span class="help-block"><strong>{{ $errors->first('leader_responsibility') }}</strong></span>
                        @endif
                    </div>
                </div>
                <div class="form-group{{ $errors->has('member_i_responsibility') ? ' has-error' : '' }}">
                    <label for="member_i_responsibility" class="col-md-4 control-label">Responsibility of Member 1st</label>
                    <div class="col-md-6">
                        
                        <div id="member_i_responsibility" name ="member_i_responsibility" class="" >
                            
                        </div>
                    @if ($errors->has('member_i_responsibility'))
                            <span class="help-block"><strong>{{ $errors->first('member_i_responsibility') }}</strong></span>
                        @endif
                    </div>
                </div>
                <div class="form-group{{ $errors->has('member_ii_responsibility') ? ' has-error' : '' }}">
                    <label for="member_ii_responsibility" class="col-md-4 control-label">Responsibility of Member 2nd</label>
                    <div class="col-md-6">
                        
                        <div id="member_ii_responsibility" name ="member_ii_responsibility" class="" >
                            
                        </div>
                    @if ($errors->has('member_ii_responsibility'))
                            <span class="help-block"><strong>{{ $errors->first('member_ii_responsibility') }}</strong></span>
                        @endif
                    </div>
                </div>
                <div class="form-group{{ $errors->has('imageInput') ? ' has-error' : '' }}">
                    <label for="imageInput" class="col-md-4 control-label">Enter photo</label>
                    <div class="col-md-6">
                        
                        <input data-preview="#preview" name="imageInput" type="file" id="imageInput">
                        <img class="col-sm-6" id="preview"  src="" ></img>
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
</div>
@stop