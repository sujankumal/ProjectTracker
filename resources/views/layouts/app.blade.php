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

<body class="hold-transition skin-blue sidebar-collapse">
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
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li>
                @guest
                        <a href="{{ route('login') }}" class="pull-left">Login</a>
                      
                        <a href="{{ route('register') }}" class="pull-right">Register</a>
                      
                @else
                  <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="black-text text-center">Logout</a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
                @endguest
            
          </li>
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
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

            <div class="row ">
               @yield('section')

            </div>
            <!-- /.row -->

          </section>
          <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer mx-auto text-center" >
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0
    </div>
    <strong >Copyright &copy; 2018 <a href="#">ProjectTracker</a>.</strong> All rights
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
