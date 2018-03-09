@extends('layouts.app')

@section('content')
<div class="container-fluid bg-1 text-center">
  <h3 class="margin">WELCOME</h3>
  <img src="{{}}" class="img-responsive img-circle margin" style="display:inline" alt="Project Tracker" width="350" height="350">
  
</div>

<!-- Second Container -->
<div class="container-fluid bg-2 text-center">
  <h3 class="margin">Project Tracker Info.</h3>
  <p>Project Tracker provides information to various people or stakeholders.
   It measures and justify the level of effort required to complete the project(s). 
   Project tracker tools implements as web software, typically multi-user applications used by the project
    manager or another subject matter expert, supervisor, students. Project management software have the capacity to plan,
     organize, and manage the projects.</p>
  <a href="#" class="btn btn-default btn-lg">
    <span class="glyphicon glyphicon-search"></span> Search
  </a>
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