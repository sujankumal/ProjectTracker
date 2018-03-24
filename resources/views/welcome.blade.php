@extends('layouts.app')

@section('content')
<div class="container-fluid bg-1 text-center">
  <a href="{{url('home')}}"><h3 class="margin">WELCOME</h3></a>
  <img src="{{url('images/image.jpg')}}" class="img-responsive img-circle margin" style="display:inline" alt="Project Tracker" width="350" height="350">
  
</div>

<div class="container-fluid bg-2 text-center">
  <h3 class="margin">List of Projects</h3>
  <div>
    <ol>
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
    <h3 class="margin">Problem Statement</h3><br>
      <p>We have been involved in many software projects as a part in partial fulfillment of the requirements for the Degree of Bachelor of Engineering in Software Engineering. The main problem we are facing in this process is proper tracking of the project. Sometimes supervisors are not available and when they are available students are not available. Mostly when deadline is near students somehow manage to complete the project but, supervisor has no knowledge who did what and how much tasks.</p>
     
    </div>
    <div class="col-sm-4"> 
    <h3 class="margin">Objectives</h3><br>
      <p>Monitors the projects progress, records about events , meetings via QR code/ Bar code, individual tasks (task division), provide the notification about the events via the email, information to stakeholders that justify the level of effort required to complete the project(s).
</p>
      
    </div>
    <div class="col-sm-4"> 
      <h3 class="margin">Implication</h3><br>
      <p>Project management nowadays is regarded as a very priority as all companies or organizations, whether small or large, are at one time or another involved in implementing new undertakings, innovation and changes on project. So, on completion and success of this project we will be able to see competitive creative outputs.</p>
  
    </div>
  </div>
</div>

<!-- Footer -->
<footer class="container-fluid bg-4 text-center">
  <p>ProjectTracker © 2018</p> 
</footer>

@endsection