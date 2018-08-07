
@extends('layouts.main')

@section('page_heading','User detail')

@section('section')
 <?php 
 	$id = app('request')->input('value');
 	$result = App\User::select('batch','email')->where('id', $id)->get()->first(); 
 	$project_head_result = App\project_detail::all()->where('head_id',$id);
 	$project_supervisor_result = App\project_detail::all()->where('supervisor_id',$id);
 	$project_leader_result = App\project_detail::all()->where('leader_id',$id);
 	$project_member1_result = App\project_detail::all()->where('member_idi',$id);
 	$project_member2_result = App\project_detail::all()->where('member_idii',$id);
 ?>
<?php $a =App\ProfileImage::select('pimage')->where('user_id',$id)->orderBy('created_at', 'desc')->first()?>


  <div class="col-lg-6">
      
      <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Details</h3>
            </div>
            <div class="box-body  mx-auto text-center">
              @if($a!=null)
              <img src="{{url('uploads/'.$a->pimage)}}" class="img-fluid img-circle" style="display:inline; background:transparent; border:none; margin:10pt; " width="150" height="150" alt="{{$a}}"/>
              @else
              <img src="{{url('images/user.png')}}" class="img-fluid img-circle" style="display:inline; background:transparent; border:none; margin:10pt; " width="150" height="150" alt="{{$a}}"/>
              @endif
        
           		<p>Name: {{app('request')->input('user')}}</p>
           		<p>Email: {{$result->email}}</p>
           		@if($result->batch!=null)
           		<p>Batch: {{$result->batch}}</p>
           		@endif
          </div>
    </div>
       	@if($project_head_result->first()!=null)
       <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">As a Project Head In:</h3>
            </div>
            <div class="box-body">
              <ol>
       				@foreach($project_head_result as $rs)
       				<a href="{{ route('aboutProject', ['project' => $rs->name,'param' => $rs->id]) }}">
                           <li >{{$rs->name}} 
                           	( @if($rs->type == 0)
                                        <span>Minor Project I</span>
                                      @elseif($rs->type == 1)
                                        <span>Minor Project II</span>
                                      @elseif($rs->type == 2)
                                        <span>Major Project</span>
                                      @endif 
                             )</li>
                      </a>
       				@endforeach
       			</ol>
   		   </div>
      </div>
   		@endif
   		@if($project_supervisor_result->first()!=null)
   		<div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">As a Project Supervisor In:</h3>
            </div>
            <div class="box-body">
       			  <ol>
       				@foreach($project_supervisor_result as $rs)
       				<a href="{{ route('aboutProject', ['project' => $rs->name,'param' => $rs->id]) }}">
                           <li >{{$rs->name}} ( @if($rs->type == 0)
                                        <span>Minor Project I</span>
                                      @elseif($rs->type == 1)
                                        <span>Minor Project II</span>
                                      @elseif($rs->type == 2)
                                        <span>Major Project</span>
                                      @endif 
                             )</li>
                      </a>
       				@endforeach
       			</ol>
   		   </div>
      </div>
   		@endif
   		@if($project_leader_result->first()!=null)
   	  <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">As a Project leader In:</h3>
            </div>
            <div class="box-body">
         			<ol>
         				@foreach($project_leader_result as $rs)
         				<a href="{{ route('aboutProject', ['project' => $rs->name,'param' => $rs->id]) }}">
                             <li >{{$rs->name}} ( @if($rs->type == 0)
                                          <span>Minor Project I</span>
                                        @elseif($rs->type == 1)
                                          <span>Minor Project II</span>
                                        @elseif($rs->type == 2)
                                          <span>Major Project</span>
                                        @endif 
                               )</li>
                        </a>
         				@endforeach
         			</ol>
   		     </div>
      </div>
   		@endif
   		
   		@if($project_member1_result->first()!=null)
   		<div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">As a Project 1st Member In:</h3>
            </div>
            <div class="box-body">
   			<ol>
   				@foreach($project_member1_result as $rs)
   				<a href="{{ route('aboutProject', ['project' => $rs->name,'param' => $rs->id]) }}">
                       <li >{{$rs->name}} ( @if($rs->type == 0)
                                    <span>Minor Project I</span>
                                  @elseif($rs->type == 1)
                                    <span>Minor Project II</span>
                                  @elseif($rs->type == 2)
                                    <span>Major Project</span>
                                  @endif 
                         )</li>
                  </a>
   				@endforeach
   			</ol>
   		</div>
    </div>
   		@endif

   		@if($project_member2_result->first()!=null)
   		<div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">As a Project 2nd member In:</h3>
            </div>
            <div class="box-body">
         			<ol>
         				@foreach($project_member2_result as $rs)
         				<a href="{{ route('aboutProject', ['project' => $rs->name,'param' => $rs->id]) }}">
                             <li >{{$rs->name}} ( @if($rs->type == 0)
                                          <span>Minor Project I</span>
                                        @elseif($rs->type == 1)
                                          <span>Minor Project II</span>
                                        @elseif($rs->type == 2)
                                          <span>Major Project</span>
                                        @endif 
                               </li>
                </a>
         				@endforeach
         			</ol>
   		</div>
    </div>
   		@endif
	</div>
  
  @if(Auth::user()->id == $id)
    <div class="col-lg-4 ">
            <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Do you want to change password?</h3>
            </div>
              <div class="box-body">
                <a href="/passwordchange" id="passwordchange"><span> Change Password!! </span></a>
              </div> 
            </div>
    </div>
            

              @if(session()->has('changeBatch'))
                <div class="col-lg-4 ">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Batch Changed</h3>
                    </div>
                    <div class="box-body">
          
                      <div class="alert alert-success">
                                {{ session()->get('changeBatch') }}
                      </div>
                    </div>
                </div>
              </div>
              @endif
              
            @if(Auth::user()->batch == null && Auth::user()->email != config('app.adminEmail'))
             <div class="col-lg-4 ">
                <div class="box box-primary">
                  <div class="box-header with-border">
                      <h3 class="box-title">  Your Batch is not set. Please Select your Batch!
                      </h3>
                  </div>
                  <div class="box-body">
                      <form id="changeBatch" class="form-horizontal" method="POST" action="/changeBatch">
                              {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('changeBatch') ? ' has-error' : '' }}">
                             <div class="container-fluid" style="margin-top:5px;">
                              <label for="changeBatch" class="control-label">Select <i class="glyphicon glyphicon-calendar"></i></label>
                              
                                <select id="changeBatch" name ="changeBatch" >
                                  <option value="" disabled selected>Year</option>
                                  @for($i=2010;$i<=date('Y');$i++)
                                    <option value="{{$i}}">{{$i}}</option>
                                  @endfor
                                </select>   
                            </div>
                            <br>
                            <div class="col-md-4">
                              <button type="submit" id="changeBatch" class="btn btn-md btn-success" form="changeBatch">Submit</button>
                            </div>
                          </div>
                      </form>
              </div>
            </div>
          </div>
            @endif

            <div class="col-lg-4 ">
                <div class="box box-primary">
                  <div class="box-header with-border">
                      <h3 class="box-title">Do you want to change profile photo?
                      </h3>
                  </div>
                  <div class="box-body">
                    <form id="profileimg" method="POST" action="/profilePhotoUpload" enctype="multipart/form-data">
                      {{ csrf_field() }}
                      @if(session()->has('messageprofilephotochange'))
                         <div class="alert alert-success">
                             {{ session()->get('messageprofilephotochange') }}
                         </div>
                      @endif
                        <div class="mx-auto text-center">
                            <img src="{{url('images/user.png')}}" id="image1" class="img-fluid img-circle" width="150" height="150" style="display:inline; background:transparent; border:none; margin:10pt; ">
                        </div>
                        <div class="form-group{{ $errors->has('profile_image') ? ' has-error' : '' }}  ">
                          <div class="container-fluid" style="margin-top:5px;">
                           <label for="profile_image" class="control-label">Enter photo:</label>
                              <input data-preview="#preview" name="profile_image" type="file" id="profile_image"/>
                              <img  id="preview" >
                              @if ($errors->has('profile_image'))
                                <span class="help-block"><strong>{{ $errors->first('profile_image') }}</strong></span>
                              @endif
                          </div>
                      </div>
                         <button type="submit" id="imageChange" class="btn btn-md btn-success" form="profileimg">Change Photo</button>
                    </form>
                  </div>
                </div>
              </div>
            <script type="text/javascript">
                $(function(){
                  $('#profile_image').change( function(e) {
                    var img1 = URL.createObjectURL(e.target.files[0]);
                    $('#image1').attr('src', img1);
                    });
                  
                });
 
          </script>
   </div>
  @endif


@stop