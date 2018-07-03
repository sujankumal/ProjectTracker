@extends('layouts.plane')

@section('body')
 <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-static-top blue-color white-text" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#side-menu">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" id="brand-name" href="{{ ('/') }}" style="color:#fff;">{{ config('app.name', 'Laravel') }}</a>
                <span id="nav-login" class="nav navbar navbar-toggle navbar-right" >
                        <a class="dropdown-toggle white-text" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw" ></i>  <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user" >
                            @guest
                                <li><a href="{{ route('login') }}" style="color:#fff;">Login</a></li>
                                <li><a href="{{ route('register') }}" style="color:#fff;">Register</a></li>
                            @else
                                <li><a href="#"><i class="fa fa-user fa-fw"></i>{{ Auth::user()->name }} </a>
                                </li>
                                <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a></li>
                                <li class="divider"></li>
                                <li>
                                    <a href="{{ route('logout') }}"
                                                    onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                                    Logout
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    {{ csrf_field() }}
                                    </form>
                                </li>
                            @endguest
                        </ul>
                       
                </span>

              </div>
            <div class="collapse navbar-collapse" id="app-navbar-collapse">
            </div>
            <div class="navbar-default sidebar opag" role="navigation">
               <div class=" sidebar-nav navbar-collapse opag" id="side-menu">
                    <ul class="jumbotron nav list-group" id="side-menu">
                        <li class="{{(Request::is('*profile') ? 'active' : '') }}">
                            <a href="{{ route('profile', ['user' => Auth::user()->name,'value' => Auth::id()]) }}">
                                <i class="fa fa-user fa-fw"></i>
                                {{ Auth::user()->name }} </a>
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
                                <li class="{{(Request::is('*minuteForm') ? 'active' : '') }}">
                                <a href="{{ ('minuteForm') }}"><i class="fa fa-edit fa-fw"></i> Minute Form</a>
                                </li>
                                <li class="{{(Request::is('*tasks') ? 'active' : '') }}">
                                        <a href="{{ ('tasks') }}"><i class="fa fa-edit fa-fw"></i>Project tasks Add</a>
                                </li>
                                <li class="{{(Request::is('*QR') ? 'active' : '') }}">
                                    <a href="{{ ('QR') }}"><i class="glyphicon glyphicon-qrcode"></i> QR Generate</a>
                                    <!-- /.nav-second-level -->
                                </li>
                                <li class="{{(Request::is('*uploadppt') ? 'active' : '') }}">
                                    <a href="{{ ('uploadppt') }}"><i class="fa fa-upload" aria-hidden="true"></i> Upload Presentaion file</a>
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

        <div id="page-wrapper"  style="background-color: transparent;  border: none;">
			<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header white-text">@yield('page_heading')</h1>
                </div>
            </div>
			<div class="" id = "dashboardSection">  
				@yield('section')

            </div>
        </div>
    
</div>
@stop

