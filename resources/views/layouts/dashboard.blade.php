
<!-- section('body') -->
@extends('layouts.app')

@section('sidebar')
<br>
<nav class="" role="navigation">
     <div class="navbar-default sidebar opag" role="navigation">
               <div class=" sidebar-nav collapse navbar-collapse opag" id="side-menu">
                    <ul class="nav list-group" id="side-menu">
                       
                        <div class="profile-userpic">
                                <?php $a =App\ProfileImage::select('pimage')->where('user_id',Auth::id())->orderBy('created_at', 'desc')->first()?>
                                @if($a!=null)
                                <img src="{{url('uploads/'.$a->pimage)}}" class="img-responsive" style="margin:5px;" alt="{{$a}}"/>
                                @else
                                <img src="{{url('images/user.png')}}" class="img-responsive" style="margin:5px;" alt="{{$a}}"/>
                                @endif
                        </div>

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
                         <li class="{{(Request::is('*profile') ? 'active' : '') }}">
                            
                            <a href="{{ route('profile', ['user' => Auth::user()->name,'value' => Auth::id()]) }}">
                                <i class="fa fa-user fa-fw"></i>
                                {{ Auth::user()->name }} 
                            </a>
                        </li>
                        <li class="{{ (Request::is('*home') ? 'active' : '') }}">
                            <a href="{{ ('/home') }}"><i class="fa fa-home fa-fw"></i> Home</a>
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
                                        <a href="{{ ('tasks') }}"><i class="fa fa-edit fa-fw"></i>Add Project tasks</a>
                                </li>
                                <li class="{{(Request::is('*QR') ? 'active' : '') }}">
                                    <a href="{{ ('QR') }}"><i class="glyphicon glyphicon-qrcode"></i> Generate QR Code</a>
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
                                    <a href="{{ ('QR') }}"><i class="glyphicon glyphicon-qrcode"></i> Generate QR Code</a>
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
                                        <a href="{{ ('tasks') }}"><i class="fa fa-edit fa-fw"></i>Add Project tasks</a>
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
                                        <a href="{{ ('tasks') }}"><i class="fa fa-edit fa-fw"></i>Add Project tasks</a>
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
                                <a href="{{ ('QRScan') }}"><i class="fa fa-scanner"></i><i class="glyphicon glyphicon-search"></i> Scan QR code</a>
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

            <div>
                <h3 class="container-fluid opag text-center black-text" id="dashboardHeading">
                @yield('page_heading')
                </h3>
            </div>
            <div id="dashboardSection">
            @yield('section')
            </div>
     
@stop




<div class="col-md-9">
                <div class="nav-tabs-custom">
                  <ul class="nav nav-tabs">
                    <li class="active"><a href="#activity" data-toggle="tab">Activity</a></li>
                    <li><a href="#timeline" data-toggle="tab">Timeline</a></li>
                    <li><a href="#settings" data-toggle="tab">Settings</a></li>
                  </ul>
                  <div class="tab-content">
                    <div class="active tab-pane" id="activity">
                      <!-- Post -->
                      <div class="post">
                        <div class="user-block">
                          <img class="img-circle img-bordered-sm" src="../../dist/img/user1-128x128.jpg" alt="user image">
                              <span class="username">
                                <a href="#">Jonathan Burke Jr.</a>
                                <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                              </span>
                          <span class="description">Shared publicly - 7:30 PM today</span>
                        </div>
                        <!-- /.user-block -->
                        <p>
                          Lorem ipsum represents a long-held tradition for designers,
                          typographers and the like. Some people hate it and argue for
                          its demise, but others ignore the hate as they create awesome
                          tools to help create filler text for everyone from bacon lovers
                          to Charlie Sheen fans.
                        </p>
                        <ul class="list-inline">
                          <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>
                          <li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>
                          </li>
                          <li class="pull-right">
                            <a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments
                              (5)</a></li>
                        </ul>

                        <input class="form-control input-sm" type="text" placeholder="Type a comment">
                      </div>
                      <!-- /.post -->

                      <!-- Post -->
                      <div class="post clearfix">
                        <div class="user-block">
                          <img class="img-circle img-bordered-sm" src="../../dist/img/user7-128x128.jpg" alt="User Image">
                              <span class="username">
                                <a href="#">Sarah Ross</a>
                                <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                              </span>
                          <span class="description">Sent you a message - 3 days ago</span>
                        </div>
                        <!-- /.user-block -->
                        <p>
                          Lorem ipsum represents a long-held tradition for designers,
                          typographers and the like. Some people hate it and argue for
                          its demise, but others ignore the hate as they create awesome
                          tools to help create filler text for everyone from bacon lovers
                          to Charlie Sheen fans.
                        </p>

                        <form class="form-horizontal">
                          <div class="form-group margin-bottom-none">
                            <div class="col-sm-9">
                              <input class="form-control input-sm" placeholder="Response">
                            </div>
                            <div class="col-sm-3">
                              <button type="submit" class="btn btn-danger pull-right btn-block btn-sm">Send</button>
                            </div>
                          </div>
                        </form>
                      </div>
                      <!-- /.post -->

                      <!-- Post -->
                      <div class="post">
                        <div class="user-block">
                          <img class="img-circle img-bordered-sm" src="../../dist/img/user6-128x128.jpg" alt="User Image">
                              <span class="username">
                                <a href="#">Adam Jones</a>
                                <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                              </span>
                          <span class="description">Posted 5 photos - 5 days ago</span>
                        </div>
                        <!-- /.user-block -->
                        <div class="row margin-bottom">
                          <div class="col-sm-6">
                            <img class="img-responsive" src="../../dist/img/photo1.png" alt="Photo">
                          </div>
                          <!-- /.col -->
                          <div class="col-sm-6">
                            <div class="row">
                              <div class="col-sm-6">
                                <img class="img-responsive" src="../../dist/img/photo2.png" alt="Photo">
                                <br>
                                <img class="img-responsive" src="../../dist/img/photo3.jpg" alt="Photo">
                              </div>
                              <!-- /.col -->
                              <div class="col-sm-6">
                                <img class="img-responsive" src="../../dist/img/photo4.jpg" alt="Photo">
                                <br>
                                <img class="img-responsive" src="../../dist/img/photo1.png" alt="Photo">
                              </div>
                              <!-- /.col -->
                            </div>
                            <!-- /.row -->
                          </div>
                          <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <ul class="list-inline">
                          <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>
                          <li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>
                          </li>
                          <li class="pull-right">
                            <a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments
                              (5)</a></li>
                        </ul>

                        <input class="form-control input-sm" type="text" placeholder="Type a comment">
                      </div>
                      <!-- /.post -->
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="timeline">
                      <!-- The timeline -->
                      <ul class="timeline timeline-inverse">
                        <!-- timeline time label -->
                        <li class="time-label">
                              <span class="bg-red">
                                10 Feb. 2014
                              </span>
                        </li>
                        <!-- /.timeline-label -->
                        <!-- timeline item -->
                        <li>
                          <i class="fa fa-envelope bg-blue"></i>

                          <div class="timeline-item">
                            <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

                            <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                            <div class="timeline-body">
                              Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                              weebly ning heekya handango imeem plugg dopplr jibjab, movity
                              jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                              quora plaxo ideeli hulu weebly balihoo...
                            </div>
                            <div class="timeline-footer">
                              <a class="btn btn-primary btn-xs">Read more</a>
                              <a class="btn btn-danger btn-xs">Delete</a>
                            </div>
                          </div>
                        </li>
                        <!-- END timeline item -->
                        <!-- timeline item -->
                        <li>
                          <i class="fa fa-user bg-aqua"></i>

                          <div class="timeline-item">
                            <span class="time"><i class="fa fa-clock-o"></i> 5 mins ago</span>

                            <h3 class="timeline-header no-border"><a href="#">Sarah Young</a> accepted your friend request
                            </h3>
                          </div>
                        </li>
                        <!-- END timeline item -->
                        <!-- timeline item -->
                        <li>
                          <i class="fa fa-comments bg-yellow"></i>

                          <div class="timeline-item">
                            <span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span>

                            <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                            <div class="timeline-body">
                              Take me to your leader!
                              Switzerland is small and neutral!
                              We are more like Germany, ambitious and misunderstood!
                            </div>
                            <div class="timeline-footer">
                              <a class="btn btn-warning btn-flat btn-xs">View comment</a>
                            </div>
                          </div>
                        </li>
                        <!-- END timeline item -->
                        <!-- timeline time label -->
                        <li class="time-label">
                              <span class="bg-green">
                                3 Jan. 2014
                              </span>
                        </li>
                        <!-- /.timeline-label -->
                        <!-- timeline item -->
                        <li>
                          <i class="fa fa-camera bg-purple"></i>

                          <div class="timeline-item">
                            <span class="time"><i class="fa fa-clock-o"></i> 2 days ago</span>

                            <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                            <div class="timeline-body">
                              <img src="http://placehold.it/150x100" alt="..." class="margin">
                              <img src="http://placehold.it/150x100" alt="..." class="margin">
                              <img src="http://placehold.it/150x100" alt="..." class="margin">
                              <img src="http://placehold.it/150x100" alt="..." class="margin">
                            </div>
                          </div>
                        </li>
                        <!-- END timeline item -->
                        <li>
                          <i class="fa fa-clock-o bg-gray"></i>
                        </li>
                      </ul>
                    </div>
                    <!-- /.tab-pane -->

                    <div class="tab-pane" id="settings">
                      <form class="form-horizontal">
                        <div class="form-group">
                          <label for="inputName" class="col-sm-2 control-label">Name</label>

                          <div class="col-sm-10">
                            <input type="email" class="form-control" id="inputName" placeholder="Name">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                          <div class="col-sm-10">
                            <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputName" class="col-sm-2 control-label">Name</label>

                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputName" placeholder="Name">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputExperience" class="col-sm-2 control-label">Experience</label>

                          <div class="col-sm-10">
                            <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputSkills" class="col-sm-2 control-label">Skills</label>

                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-sm-offset-2 col-sm-10">
                            <div class="checkbox">
                              <label>
                                <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                              </label>
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-danger">Submit</button>
                          </div>
                        </div>
                      </form>
                    </div>
                    <!-- /.tab-pane -->
                  </div>
                  <!-- /.tab-content -->
                </div>
                <!-- /.nav-tabs-custom -->
</div>

<div class="col-md-3">
              <!-- About Me Box -->
                <div class="box box-primary">
                  <div class="box-header with-border">
                    <h3 class="box-title">About Me</h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body">
                    Body
                  </div>
                  <!-- /.box-body -->
</div>
                <!-- /.box -->
</div>
              