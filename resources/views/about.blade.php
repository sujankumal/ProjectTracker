@extends('layouts.main')

@section('page_heading','About')

@section('section')
<div class="col-md-12" >
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">About Me</h3>
        </div>
        <div class="box-body">
         <P>   Project Tracker (PT) provide information to various people or stakeholders and used to measure & justify the level of effort required to complete the project(s). Project tracker tools implemented as web software, typically multi-user applications used by the project manager or another subject matter expert, supervisor, students. Project management software has the capacity to help plan, organize, and manage resource tools and develop resource estimates.
         </P>
<p>We had designed the project in such way that user may not have any difficulty in using this application without much effort. This application can be really used by end user who have internet access. The language that we use to develop this system is PHP, Javascript.</p>
<p>PT's include:
<li>   Track the projects held in our college.</li>
<li>	Monitor the projects progress </li>
<li>	Meetings via QR code/ Bar code.</li>
<li>	Provide the notification about the events via the email. </li>
<li>	Provide information to stakeholders that justify the level of effort required to complete the project(s).</li>
</p>
<p>Team Guide:  Er.Nishal Gurung</p>

<p>Developers: 
	<li>Bishowraj Lamichhane</li>
            <li>Hari Krishna Bhandari </li>
            <li>Sujan Kumal </li></p>
        </div>
    </div>
</div>

                   <div class="col-md-4" >
    <div class="box box-primary">
        <div class="box-header with-border">
                      
                        <div class="mx-auto text-center">
                            <img src="{{url('images/bso1.png')}}" id="image1" class="img-fluid img-circle" width="150" height="150" style="display:inline; background:transparent; border:none; margin:10pt; ">
                        </div>
                        <div class="form-group{{ $errors->has('profile_image') ? ' has-error' : '' }}  ">
                          <div class="container-fluid" style="margin-top:5px;">
                          <label for="profile_image" class="control-label">Name:Bishowraj Lamichhane</label>
                          </br>
                          <label for="profile_image" class="control-label">Batch:2014</label>
                            
                          </div>
                      </div>
                        
                  </div>
              </div>
          </div>
           <div class="col-md-4" >
    <div class="box box-primary">
        <div class="box-header with-border">
                      
                        <div class="mx-auto text-center">
                            <img src="{{url('images/hari.png')}}" id="image1" class="img-fluid img-circle" width="150" height="150" style="display:inline; background:transparent; border:none; margin:10pt; ">
                        </div>
                        <div class="form-group{{ $errors->has('profile_image') ? ' has-error' : '' }}  ">
                          <div class="container-fluid" style="margin-top:5px;">
                          <label for="profile_image" class="control-label">Name:Hari Krishna Bhandari</label>
                          </br>
                          <label for="profile_image" class="control-label">Batch:2014</label>
                            
                          </div>
                      </div>
                        
                  </div>
              </div>
          </div>
           <div class="col-md-4" >
    <div class="box box-primary">
        <div class="box-header with-border">
                      
                        <div class="mx-auto text-center">
                            <img src="{{url('images/sujan.png')}}" id="image1" class="img-fluid img-circle" width="150" height="150" style="display:inline; background:transparent; border:none; margin:10pt; ">
                        </div>
                        <div class="form-group{{ $errors->has('profile_image') ? ' has-error' : '' }}  ">
                          <div class="container-fluid" style="margin-top:5px;">
                          <label for="profile_image" class="control-label">Name:Sujan Kumal</label>
                      </br>
                          <label for="profile_image" class="control-label">Batch:2014</label>
                            
                          </div>
                      </div>
                        
                  </div>
              </div>
          </div>
@stop