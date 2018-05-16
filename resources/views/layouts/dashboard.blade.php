@extends('layouts.plane')

@section('body')
 <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-static-top orange-color white-text" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" id="brand-name" href="{{ ('/') }}" style="color:#fff;">{{ config('app.name', 'Laravel') }}</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right" id="nav-login">
                <li class="dropdown">
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
                                <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                                </li>
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
                </li>
            </ul>
            <!-- /.navbar-top-links -->
       
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li {{ (Request::is('/home') ? 'class="active"' : '') }}>
                            <a href="userprofile"><i class="fa fa-user fa-fw"></i>{{ Auth::user()->name }} </a>
                        </li>
                        <li {{ (Request::is('/home') ? 'class="active"' : '') }}>
                            <a href="{{ ('/home') }}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        
                        <li {{ (Request::is('*projectform') ? 'class="active"' : '') }}>
                            <a href="{{ ('projectForm') }}"><i class="fa fa-edit fa-fw"></i>Project Forms</a>
                        </li>
                        <li {{ (Request::is('*minute') ? 'class="active"' : '') }}>
                            <a href="{{ ('minuteForm') }}"><i class="fa fa-edit fa-fw"></i> Minute Form</a>
                        </li>
                        <li {{ (Request::is('*tasks') ? 'class="active"' : '') }}>
                                <a href="{{ ('tasks') }}"><i class="fa fa-edit fa-fw"></i>Project tasks Add</a>
                            </li>
                        <li {{ (Request::is('*QR') ? 'class="active"' : '') }}>
                            <a href="{{ ('QR') }}"><i class="glyphicon glyphicon-qrcode"></i> QR Generate</a>
                            <!-- /.nav-second-level -->
                        </li>
                        <li {{ (Request::is('*QRScan') ? 'class="active"' : '') }}>
                            <a href="{{ ('QRScan') }}"><i class="fa fa-scanner"></i><i class="glyphicon glyphicon-search"></i> Scan QR</a>
                        </li>
                        <li {{ (Request::is('*uploadppt') ? 'class="active"' : '') }}>
                            <a href="{{ ('uploadppt') }}"><i class="fa fa-upload" aria-hidden="true"></i> Upload Presentaion file</a>
                        </li>
                        
                        
                        
                        <li {{ (Request::is('*documentation') ? 'class="active"' : '') }}>
                            <a href="{{ ('') }}"><i class="fa fa-file-word-o fa-fw"></i> About</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
			 <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">@yield('page_heading')</h1>
                </div>
                <!-- /.col-lg-12 -->
        </div>

			<div class="jumbotron row">  
				@yield('section')

            </div>
            <!-- /#page-wrapper -->
        </div>
    
</div>
@stop

