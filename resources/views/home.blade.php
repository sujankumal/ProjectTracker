@extends('layouts.dashboard')
@section('page_heading','Dashboard')

@section('section')
           
      @if(app('request')->input('error')==1)
        <div class="alert alert-danger">
        <p>Sorry!! only access to admin.</p> 
         </div>
    @endif      <!-- /.row -->
    <div class="col-sm-12">
            
                <div class="col-lg-8">
                    <div class="container-fluid panel white-text opag col-lg-5">
                            <div class="heading">
                                <h4 class="title">List of Projects</h4>
                            </div>
                            <div class="container-fluid bg-2 text-center">
                                    <ol>
                                        @foreach(App\project_detail::select('id','name')->get() as $project)
                                            <!-- <a href="{{url('/aboutProject')}}"> -->
                                                <a href="{{ route('aboutProject', ['project' => $project->name,
                                                    'param' => $project->id]) }}">
                                                <li >{{$project->name}}</li>
                                            </a>
                                        @endforeach
                                         </ol>
                                      
                            </div>
                          </div>
                    <div class="container-fluid panel white-text opag col-lg-5 col-lg-offset-1">     
                            <div class="heading">
                                    <h4 class="title">List of Users</h4>
                            </div>
                            <div class="container-fluid bg-2 ">
                                     <ol>
                                        @foreach(App\User::all() as $user)
                                         <li> 
                                            <i class="fa fa-user fa-fw "></i>
                                            <a href="{{ route('profile', ['user' => $user->name,'value' => $user->id]) }}" class="text-center">
                                            
                                            {{ $user->name }} </a>
                                        </li>
                                        @endforeach
                                         </ol>
                                   
                                </div>
                    </div>
             </div>
         <div class="container-fluid panel white-text opag col-lg-4">
              <div class="heading"><h3 class="title">Notification</h3>
            </div>
                <ol>
                            @foreach(App\notice::all() as $notice)
                                <li> 
                                    <i class="fa fa-bell "></i>&nbsp&nbsp&nbsp
                                        {{ $notice->notice }} <br>
                                         By:&nbsp {{App\User::select('name')->where('id',$notice->u_id)->get()->first()->name}} 
                                            <br>
                                            Project: &nbsp {{App\project_detail::select('name')->where('id',$notice->project_id)->get()->first()->name}}
                                </li>
                            @endforeach
                         </ol>
         </div>
        
    </div>            
                <!-- /.col-lg-4 -->     
@stop
