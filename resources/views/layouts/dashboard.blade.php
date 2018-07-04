<!-- extends('layouts.plane') -->

<!-- section('body') -->
@extends('layouts.app')

@section('sidebar')
<br>
<br>
<nav class="" role="navigation">
     <div class="navbar-default sidebar opag" role="navigation">
               <div class=" sidebar-nav collapse navbar-collapse opag" id="side-menu">
                    <ul class="nav list-group" id="side-menu">
                        <li class="{{(Request::is('*profile') ? 'active' : '') }}">
                            <div class="profile-userpic">
                                <img src="{{url('images/project tracker.png')}}" class="img-responsive" alt=" sujan">
                            </div>
                            <a href="{{ route('profile', ['user' => Auth::user()->name,'value' => Auth::id()]) }}">
                                <i class="fa fa-user fa-fw"></i>
                                {{ Auth::user()->name }} 
                            </a>
                        </li>
                        
                        <!-- show current selected project here -->
                        <li>
                        @if(session()->has('sidebarProjectSelectedResponseCP'))
                            <div class="alert alert-success">
                               Current Selected Project: {{ session()->get('sidebarProjectSelectedResponseCP') }}
                            </div>
                        @endif
                        </li>
                        <!-- selection of project -->
                        <li>
                            <div class="form-group{{ $errors->has('side_project_id') ? ' has-error' : '' }}">
                                <select id="side_project_id" name ="side_project_id" class="form-control" onchange="sidebarProjectSelect();">
                                    <option value="" disabled selected>Please Select a Project</option>
                                    @foreach(App\project_detail::all() as $project)
                                        <option value="{{$project->id}}">{{$project->name}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('side_project_id'))
                                    <span class="help-block"><strong>{{ $errors->first('side_project_id') }}</strong></span>
                                @endif
                            </div>
                        </li>
                        <li class="{{ (Request::is('*home') ? 'active' : '') }}">
                            <a href="{{ ('/home') }}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        @if(Auth::user()->email == config('app.adminEmail') )
                        <li class="{{(Request::is('*projectForm') ? 'active' : '') }}">
                            <a href="{{ ('projectForm') }}"><i class="fa fa-edit fa-fw"></i>Project Forms</a>
                        </li>
                        @endif
                        @if(session()->has('sidebarProjectSelectedResponse'))
                            @if( session()->get('sidebarProjectSelectedResponse') == 1 )
                            <!-- head and Supervisor Both -->
                                <li class="{{(Request::is('*minuteForm') ? 'active' : '') }}">
                                <a href="{{ ('minuteForm') }}"><i class="fa fa-edit fa-fw"></i> Minute Form</a>
                                </li>
                                <li class="{{(Request::is('*tasks') ? 'active' : '') }}">
                                        <a href="{{ ('tasks') }}"><i class="fa fa-edit fa-fw"></i>Project tasks Add</a>
                                </li>
                                <li class="{{(Request::is('*QR') ? 'active' : '') }}">
                                    <a href="{{ ('QR') }}"><i class="glyphicon glyphicon-qrcode"></i> QR Generate</a>
                                </li>
                                <li class="{{(Request::is('*uploadppt') ? 'active' : '') }}">
                                    <a href="{{ ('uploadppt') }}"><i class="fa fa-upload" aria-hidden="true"></i> Upload Presentaion file</a>
                                </li>
                                <li class="{{(Request::is('*notifications') ? 'active' : '') }}">
                                    <a href="{{ ('notifications') }}"><i class="fa fa-bell" aria-hidden="true"></i> Create Notice </a>
                                </li>    
                            @elseif(session()->get('sidebarProjectSelectedResponse') == 2)
                            <!-- head -->
                                <li class="{{(Request::is('*QR') ? 'active' : '') }}">
                                    <a href="{{ ('QR') }}"><i class="glyphicon glyphicon-qrcode"></i> QR Generate</a>
                                    <!-- /.nav-second-level -->
                                </li>
                                <li class="{{(Request::is('*notifications') ? 'active' : '') }}">
                                    <a href="{{ ('notifications') }}"><i class="fa fa-bell" aria-hidden="true"></i> Create Notice </a>
                                </li>
                            @elseif(session()->get('sidebarProjectSelectedResponse') == 3)
                            <!-- supervisor -->
                                <li class="{{(Request::is('*minuteForm') ? 'active' : '') }}">
                                <a href="{{ ('minuteForm') }}"><i class="fa fa-edit fa-fw"></i> Minute Form</a>
                                </li>
                                <li class="{{(Request::is('*tasks') ? 'active' : '') }}">
                                        <a href="{{ ('tasks') }}"><i class="fa fa-edit fa-fw"></i>Project tasks Add</a>
                                </li>
                                <li class="{{(Request::is('*uploadppt') ? 'active' : '') }}">
                                    <a href="{{ ('uploadppt') }}"><i class="fa fa-upload" aria-hidden="true"></i> Upload Presentaion file</a>
                                </li>
                                <li class="{{(Request::is('*notifications') ? 'active' : '') }}">
                                    <a href="{{ ('notifications') }}"><i class="fa fa-bell" aria-hidden="true"></i> Create Notice </a>
                                </li>
                                
                            @elseif(session()->get('sidebarProjectSelectedResponse') == 4)
                            <!-- leader -->
                                <li class="{{(Request::is('*minuteForm') ? 'active' : '') }}">
                                <a href="{{ ('minuteForm') }}"><i class="fa fa-edit fa-fw"></i> Minute Form</a>
                                </li>
                                <li class="{{(Request::is('*tasks') ? 'active' : '') }}">
                                        <a href="{{ ('tasks') }}"><i class="fa fa-edit fa-fw"></i>Project tasks Add</a>
                                </li>
                                <li class="{{(Request::is('*uploadppt') ? 'active' : '') }}">
                                    <a href="{{ ('uploadppt') }}"><i class="fa fa-upload" aria-hidden="true"></i> Upload Presentaion file</a>
                                </li>
                                <li class="{{(Request::is('*notifications') ? 'active' : '') }}">
                                    <a href="{{ ('notifications') }}"><i class="fa fa-bell" aria-hidden="true"></i> Create Notice </a>
                                </li>
                            @elseif(session()->get('sidebarProjectSelectedResponse') == 0)
                            <!-- //error! not head supervisor or leader -->
                            @endif
                            <li class="{{(Request::is('*QRScan') ? 'active' : '') }}">
                                <a href="{{ ('QRScan') }}"><i class="fa fa-scanner"></i><i class="glyphicon glyphicon-search"></i> Scan QR</a>
                            </li>    
                        @endif
                        <li class="{{(Request::is('*about') ? 'active' : '') }}">
                                <a href="{{ ('about') }}"><i class="fa fa-file-word-o fa-fw"></i> About</a>
                        </li>
                        
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
@stop


@section('content')
<!--  <div id="wrapper">
        <nav class="navbar navbar-default navbar-fixed-top black-text" >
            <div class="container">
                <div class="navbar-header ">
                    <button type="button" class=" navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false" aria-controls="app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class=" navbar-brand black-text" href="{{ url('/') }}"  id="brand-name">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>
                    <ul class="nav navbar-nav navbar-right" id="nav-login">
                        @guest
                            <li><a href="{{ route('login') }}" class="black-text">Login</a></li>
                            <li><a href="{{ route('register') }}" class="black-text">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle black-text"  data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu btn btn-small" id="logoutUl" style="width: 20px;">
                                    <li id="ulogoutl"  >
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="black-text text-center">
                                            Logout
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}
                                    </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
</div> -->

        
<div class="container jumbotron">
        <div id="page-wrapper" >
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header black-text">@yield('page_heading')</h1>
                </div>
            </div>
            <div class="" id = "dashboardSection">  
                @yield('section')

            </div>
        </div>
    </div>

@stop
