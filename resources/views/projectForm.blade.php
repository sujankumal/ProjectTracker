
@if(Auth::user()->email != config('app.adminEmail') )
    <script> window.location.href = "{{ route('home', ['error' => 1]) }}";</script>
    
@endif
@extends ('layouts.dashboard')
@section('page_heading','Project Form')

@section('section')
<div class="container">
    <div class="row">
        <div panel-body bg-info>
            <form id="projectForm" class="form-horizontal" method="POST" action="/projectCreate">
                {{ csrf_field() }}
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif
                <div class="form-group{{ $errors->has('projName') ? ' has-error' : '' }}">
                    <label for="projName" class="col-md-4 control-label">Project Name</label>
                    <div class="col-md-6">
                        <input id="projName" type="text" class="form-control" name="projName" value="{{ old('projName') }}" required autofocus>
                        @if ($errors->has('projName'))
                            <span class="help-block"><strong>{{ $errors->first('projName') }}</strong></span>
                        @endif
                    </div>
                </div>
                <div class="form-group{{ $errors->has('year') ? ' has-error' : '' }}">
                    <label for="year" class="col-md-4 control-label">Project Year</label>
                    <div class="col-md-6">
                        <select id="year" name ="year" class="form-control" required>
                            <option value=""></option>
                            @for($i=2010;$i<=date('Y');$i++)
                                <option value="{{$i}}">{{$i}}</option>
                            @endfor
                        </select>
                        @if ($errors->has('year'))
                            <span class="help-block"><strong>{{ $errors->first('year') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                    <label for="type" class="col-md-4 control-label">Project Type</label>
                    <div class="col-md-6">
                        <select id="type" name ="type" class="form-control" required>
                            <option value=""></option>
                            <option value="0">Minor project I</option>
                            <option value="1">Minor project II</option>
                            <option value="2">Major project</option>
                        </select>
                        @if ($errors->has('type'))
                            <span class="help-block"><strong>{{ $errors->first('type') }}</strong></span>
                        @endif
                    </div>
                </div>
                <div class="form-group{{ $errors->has('projectHead') ? ' has-error' : '' }}">
                    <label for="projectHead" class="col-md-4 control-label">Project Head</label>
                    <div class="col-md-6">
                        <select id="projectHead" name ="projectHead" class="form-control" required>
                            <option value=""></option>
                            @foreach(App\User::all() as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('projectHead'))
                            <span class="help-block"><strong>{{ $errors->first('projectHead') }}</strong></span>
                        @endif
                    </div>
                </div>
                <div class="form-group{{ $errors->has('projectSupervisor') ? ' has-error' : '' }}">
                    <label for="projectSupervisor" class="col-md-4 control-label">Project Supervisor</label>
                    <div class="col-md-6">
                        <select id="projectSupervisor" name ="projectSupervisor" class="form-control" required>
                            <option value=""></option>
                            @foreach(App\User::all() as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                        </select>@if ($errors->has('projectSupervisor'))
                            <span class="help-block"><strong>{{ $errors->first('projectSupervisor') }}</strong></span>
                        @endif
                    </div>
                </div>
                <div class="form-group{{ $errors->has('projectLeader') ? ' has-error' : '' }}">
                    <label for="projectLeader" class="col-md-4 control-label">Project Leader</label>
                    <div class="col-md-6">
                        <select id="projectLeader" name ="projectLeader" class="form-control" required>
                            <option value=""></option>
                            @foreach(App\User::all() as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                        </select>@if ($errors->has('projectLeader'))
                            <span class="help-block"><strong>{{ $errors->first('projectLeader') }}</strong></span>
                        @endif
                    </div>
                </div>
                <div class="form-group{{ $errors->has('projectMember1') ? ' has-error' : '' }}">
                    <label for="projectMember1" class="col-md-4 control-label">Project Member 1st</label>
                    <div class="col-md-6">
                        <select id="projectMember1" name ="projectMember1" class="form-control">
                            <option value=""></option>
                            @foreach(App\User::all() as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('projectMember1'))
                            <span class="help-block"><strong>{{ $errors->first('projectMember1') }}</strong></span>
                        @endif
                    </div>
                </div>
                <div class="form-group{{ $errors->has('projectMember2') ? ' has-error' : '' }}">
                    <label for="projectMember2" class="col-md-4 control-label">Project Member 2nd</label>
                    <div class="col-md-6">
                        <select id="projectMember2" name ="projectMember2" class="form-control">
                            <option value=""></option>
                            @foreach(App\User::all() as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('projectMember2'))
                            <span class="help-block"><strong>{{ $errors->first('projectMember2') }}</strong></span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-md btn-success" form="projectForm">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>



@stop