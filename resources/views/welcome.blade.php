@extends('layouts.app')

@section('section')
<div class="col-md-6 col-md-offset-3">
        <div class="box box-primary ">
            <div class="box-body  mx-auto text-center">
    
            <a href="{{url('home')}}" id="welcomeHeader" style="text-decoration: none;" >
              <img src="{{url('images/project tracker.png')}}" class="img img-responsive img-thumbnail margin" style="display:inline; background:transparent; border:none;" alt="Project Tracker" width="250" height="250">
            </a>
    
          <h3 ><b>List of Projects</b></h3>
          <div class="col-md-6 col-md-offset-3">
            <ol >
            @foreach(App\project_detail::all() as $project)
              <li ><b>{{$project->name}}</b></li>
            @endforeach
            </ol>
          
          </div>
          
</div>
</div>
@endsection