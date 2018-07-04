@extends('layouts.app')

@section('contentWelcome')
<div class="container jumbotron">
  <div class="container-fluid bg-1 text-center" >
    <br>
    <a href="{{url('home')}}" id="welcomeHeader" style="text-decoration: none;" >
      <img src="{{url('images/project tracker.png')}}" class="img img-responsive img-thumbnail margin" style="display:inline; background:transparent; border:none;" alt="Project Tracker" width="250" height="250">
    </a>
    
  </div>

  <div class="container-fluid bg-2  black-text">
    <h3 class="col-lg-3 col-md-3 col-sm-5 col-md-offset-5 col-sm-offset-4 col-xs-offset-3"><b>List of Projects</b></h3>
    <div class="col-lg-3 col-md-3 col-sm-5 col-md-offset-5 col-sm-offset-4 col-xs-offset-3">
      <ol class="list-group">
      @foreach(App\project_detail::all() as $project)
        <li ><b>{{$project->name}}</b></li>
      @endforeach
      </ol>
    </div>
  </div>

</div>
@endsection