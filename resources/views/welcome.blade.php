@extends('layouts.app')

@section('content')
<div class="container ">
  <div class="container-fluid bg-1 text-center " >
    <a href="{{url('home')}}" id="welcomeHeader" style="text-decoration: none;"><h3 class="margin white-text" >WELCOME</h3></a>
    <img src="{{url('images/project tracker.png')}}" class="img img-responsive img-thumbnail margin" style="display:inline; background:transparent; border:none;" alt="Project Tracker" width="350" height="350">
    
  </div>

  <div class="container-fluid bg-2 text-center white-text">
    <h3 class="margin ">List of Projects</h3>
    <div class="col-lg-4 col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3 col-xs-offset-2">
      <ol class="list-group">
      @foreach(App\project_detail::all() as $project)
        <li >{{$project->name}}</li>
      @endforeach
      </ol>
    </div>
  </div>

  <!-- Third Container (Grid) -->
  <div class="container-fluid bg-3 text-center">    
    
    <div class="row">
      <div class="col-sm-4">
      
      </div>
      <div class="col-sm-4"> 
        
      </div>
      <div class="col-sm-4"> 
      
      </div>
    </div>
  </div>

</div>
@endsection