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
                        <!--<li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                        </li>
                    -->
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
                                <a href="{{ ('tasks') }}"><i class="fa fa-edit fa-fw"></i>Project tasks</a>
                            </li>
                        <li {{ (Request::is('*charts') ? 'class="active"' : '') }}>
                            <a href="{{ ('charts') }}"><i class="fa fa-bar-chart-o fa-fw"></i> Charts</a>
                            <!-- /.nav-second-level -->
                        </li>
                        <li {{ (Request::is('*tables') ? 'class="active"' : '') }}>
                            <a href="{{ ('tables') }}"><i class="fa fa-table fa-fw"></i> Tables</a>
                        </li>

                        <li >
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> UI Elements<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li {{ (Request::is('*panels') ? 'class="active"' : '') }}>
                                    <a href="{{ ('panels') }}">Panels and Collapsibles</a>
                                </li>
                                <li {{ (Request::is('*buttons') ? 'class="active"' : '') }}>
                                    <a href="{{ ('buttons') }}">Buttons</a>
                                </li>
                                <li {{ (Request::is('*notifications') ? 'class="active"' : '') }}>
                                    <a href="{{ ('notifications') }}">Alerts</a>
                                </li>
                                <li {{ (Request::is('*typography') ? 'class="active"' : '') }}>
                                    <a href="{{ ('typography') }}">Typography</a>
                                </li>
                                <li {{ (Request::is('*icons') ? 'class="active"' : '') }}>
                                    <a href="{{ ('icons') }}"> Icons</a>
                                </li>
                                <li {{ (Request::is('*grid') ? 'class="active"' : '') }}>
                                    <a href="{{ ('grid') }}">Grid</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-sitemap fa-fw"></i> Multi-Level Dropdown<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#">Second Level Item</a>
                                </li>
                                <li>
                                    <a href="#">Second Level Item</a>
                                </li>
                                <li>
                                    <a href="#">Third Level <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        
                        <li {{ (Request::is('*documentation') ? 'class="active"' : '') }}>
                            <a href="{{ ('documentation') }}"><i class="fa fa-file-word-o fa-fw"></i> Documentation</a>
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

