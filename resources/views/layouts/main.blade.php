<!DOCTYPE html>
<html>
<head>
 <meta charset="utf-8"/>
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta content="" name="description"/>
    <meta content="" name="author"/>
    <meta name="_token" content="{{ csrf_token() }}"/>
   
    <link rel="stylesheet" href="adminlte/ionicons.min.css">
    <link rel="stylesheet" href="adminlte/font-awesome.min.css">
    <link rel="stylesheet" href="adminlte/AdminLTE.min.css">
    <link rel="stylesheet" href="adminlte/_all-skins.min.css">
    <link rel="stylesheet" href="adminlte/bootstrap.min.css">
    <link rel="stylesheet" href="adminlte/bootstrap-social.min.css"/>
    <link rel="stylesheet" href="{{ asset('css/my.css') }}">    
    <!-- Google Font -->
  <link rel="stylesheet" href="adminlte/googleapis.css">
  <script src="adminlte/jquery.min.js"></script>    

</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="{{ url('/') }}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>PT</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>ProjectTracker</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <?php $a =App\ProfileImage::select('pimage')->where('user_id',Auth::id())->orderBy('created_at', 'desc')->first()?>
                  @if($a!=null)
                  <img src="{{url('uploads/'.$a->pimage)}}" class="user-image" alt="{{$a}}"/>
                  @else
                  <img src="{{url('images/user.png')}}" class="user-image" alt="{{$a}}"/>
                  @endif
              <span class="hidden-xs">{{ Auth::user()->name }}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                @if($a!=null)
                  <img src="{{url('uploads/'.$a->pimage)}}" class="img-circle" alt="{{$a}}"/>
                  @else
                  <img src="{{url('images/user.png')}}" class="img-circle"  alt="{{$a}}"/>
                @endif
                <p>
                  <a href="{{ route('profile', ['user' => Auth::user()->name,'value' => Auth::id()]) }}">
                  {{ Auth::user()->name }}
                  </a>  
                </p>
              </li>

              <li class="user-footer">
                @guest
                      <div class="pull-left">
                        <a href="{{ route('login') }}" class="btn btn-default btn-flat">Login</a>
                      </div>
                      <div class="pull-right">
                        <a href="{{ route('register') }}" class="btn btn-default btn-flat">Register</a>
                      </div>
                @else
                  <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="black-text text-center">Logout</a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
                @endguest
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      
      
                        
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        
        <!-- show current selected project here -->
        @if(session()->has('sidebarProjectSelectedResponseCP'))
          <li>
            <a><i class="fa fa-briefcase"></i><span>
              Current Selected Project:<br>
              <div  class="text-center">{{ session()->get('sidebarProjectSelectedResponseCP')}}</div>
            </span></a>
          </li>
          
        @endif
        
        <!-- selection of project -->
        <li class="treeview">
          <a class="form-group{{ $errors->has('side_project_id') ? ' has-error' : '' }}">
            <select id="side_project_id" name ="side_project_id" class="form-control" onchange="sidebarProjectSelect();" style="background-color: inherit; border: none; color: inherit; text-decoration-color: inherit;">
              <option value="" disabled selected> &nbsp; Please Select a Project</option>
                @foreach(App\project_detail::all() as $project)
                    <option value="{{$project->id}}" style="background-color: inherit; border: none; color: inherit; text-decoration-color: inherit;">{{$project->name}}</option>
                @endforeach
             </select>
                @if ($errors->has('side_project_id'))
                    <span class="help-block"><strong>{{ $errors->first('side_project_id') }}</strong></span>
                @endif
          </a>
        </li>
        
        <!-- -------------------------------------------------------------  -->
        <li class="{{ (Request::is('*home') ? 'active' : '') }}">
        <a href="{{ ('/home') }}"><i class="fa fa-home fa-fw"></i><span> Home</span></a>
        </li>
        @if(Auth::user()->email == config('app.adminEmail') )
                        <li class="{{(Request::is('*projectForm') ? 'active' : '') }}">
                            <a href="{{ ('projectForm') }}"><i class="fa fa-edit fa-fw"></i><span> Project Forms</span></a>
                        </li>
                        @endif
                        @if(session()->has('sidebarProjectSelectedResponse'))
                            @if( session()->get('sidebarProjectSelectedResponse') == 1 )
                            <!-- head and Supervisor Both -->
                                <li class="{{(Request::is('*minuteForm') ? 'active' : '') }}">
                                <a href="{{ ('minuteForm') }}"><i class="fa fa-edit fa-fw"></i><span> Minute Form</span></a>
                                </li>
                                <li class="{{(Request::is('*tasks') ? 'active' : '') }}">
                                        <a href="{{ ('tasks') }}"><i class="fa fa-edit fa-fw"></i><span> Add Project tasks</span></a>
                                </li>
                                <li class="{{(Request::is('*QR') ? 'active' : '') }}">
                                    <a href="{{ ('QR') }}"><i class="glyphicon glyphicon-qrcode"></i><span> Generate QR Code</span></a>
                                </li>
                                <li class="{{(Request::is('*uploadppt') ? 'active' : '') }}">
                                    <a href="{{ ('uploadppt') }}"><i class="fa fa-upload" aria-hidden="true"></i><span> Upload Presentaion file</span></a>
                                </li>
                                <li class="{{(Request::is('*notifications') ? 'active' : '') }}">
                                    <a href="{{ ('notifications') }}"><i class="fa fa-bell" aria-hidden="true"></i><span> Create Notice</span> </a>
                                </li>    
                            @elseif(session()->get('sidebarProjectSelectedResponse') == 2)
                            <!-- head -->
                                <li class="{{(Request::is('*QR') ? 'active' : '') }}">
                                    <a href="{{ ('QR') }}"><i class="fa fa-qrcode" aria-hidden="true"></i><span> Generate QR Code</span></a>
                                    <!-- /.nav-second-level -->
                                </li>
                                <li class="{{(Request::is('*notifications') ? 'active' : '') }}">
                                    <a href="{{ ('notifications') }}"><i class="fa fa-bell" aria-hidden="true"></i><span> Create Notice </span></a>
                                </li>
                            @elseif(session()->get('sidebarProjectSelectedResponse') == 3)
                            <!-- supervisor -->
                                <li class="{{(Request::is('*minuteForm') ? 'active' : '') }}">
                                <a href="{{ ('minuteForm') }}"><i class="fa fa-edit fa-fw"></i><span> Minute Form</span></a>
                                </li>
                                <li class="{{(Request::is('*tasks') ? 'active' : '') }}">
                                        <a href="{{ ('tasks') }}"><i class="fa fa-edit fa-fw"></i><span> Add Project tasks</span></a>
                                </li>
                                <li class="{{(Request::is('*uploadppt') ? 'active' : '') }}">
                                    <a href="{{ ('uploadppt') }}"><i class="fa fa-upload" aria-hidden="true"></i><span> Upload Presentaion file</span></a>
                                </li>
                                <li class="{{(Request::is('*notifications') ? 'active' : '') }}">
                                    <a href="{{ ('notifications') }}"><i class="fa fa-bell" aria-hidden="true"></i><span> Create Notice </span></a>
                                </li>
                                
                            @elseif(session()->get('sidebarProjectSelectedResponse') == 4)
                            <!-- leader -->
                                <li class="{{(Request::is('*minuteForm') ? 'active' : '') }}">
                                <a href="{{ ('minuteForm') }}"><i class="fa fa-edit fa-fw"></i><span> Minute Form</span></a>
                                </li>
                                <li class="{{(Request::is('*tasks') ? 'active' : '') }}">
                                        <a href="{{ ('tasks') }}"><i class="fa fa-edit fa-fw"></i><span> Add Project tasks</span></a>
                                </li>
                                <li class="{{(Request::is('*uploadppt') ? 'active' : '') }}">
                                    <a href="{{ ('uploadppt') }}"><i class="fa fa-upload" aria-hidden="true"></i><span> Upload Presentaion file</span></a>
                                </li>
                                <li class="{{(Request::is('*notifications') ? 'active' : '') }}">
                                    <a href="{{ ('notifications') }}"><i class="fa fa-bell" aria-hidden="true"></i><span> Create Notice </span></a>
                                </li>
                            @elseif(session()->get('sidebarProjectSelectedResponse') == 0)
                            <!-- //error! not head supervisor or leader -->
                            @endif
                            <li class="{{(Request::is('*QRScan') ? 'active' : '') }}">
                                <a href="{{ ('QRScan') }}"><i class="fa fa-search"></i><span> Scan QR code</span></a>
                            </li>    
                        @endif
                        <li class="{{(Request::is('*about') ? 'active' : '') }}">
                                <a href="{{ ('about') }}"><i class="fa fa-file-word-o fa-fw"></i><span> About</span></a>
                        </li>
                        
        <!-- ----------------------------------------------------------- -->
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
          <!-- Content Header (Page header) -->
          <section class="content-header   mx-auto text-center">
            <h1>
               @yield('page_heading')
            </h1>
          </section>

          <!-- Main content -->
          <section class="content">

            <div class="row">
               @yield('section')

            </div>
            <!-- /.row -->

          </section>
          <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer mx-auto text-center">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy; 2018 <a href="#">ProjectTracker</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        
      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <h3 class="control-sidebar-heading">General Settings</h3>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- Bootstrap 3.3.7 -->
<script src="adminlte/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="adminlte/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="adminlte/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="adminlte/demo.js"></script>
<script src="{{ asset("js/my.js")}}" type="text/javascript"></script>
</body>
</html>
