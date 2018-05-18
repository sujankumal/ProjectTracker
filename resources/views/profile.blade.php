@extends('layouts.dashboard')
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
  <div>
    <div class="col-lg-offset-5 col-md-offset-5 col-sm-offset-5 col-xs-offset-5">
      <?php $a =App\ProfileImage::select('pimage')->where('user_id',$id)->orderBy('created_at', 'desc')->first()?>
        @if($a!=null)
        <img src="{{url('uploads/'.$a->pimage)}}" class="img-thumbnail img-responsive center-block margin" style="display:inline; background:transparent; border:none; margin:10pt;" width="100" alt="{{$a}}"/>
        @else
        <img src="{{url('images/user.png')}}" class="img-thumbnail img-responsive center-block margin" style="display:inline; background:transparent; border:none; margin:10pt;" width="100" alt="{{$a}}"/>
        @endif
        
      </div>
  </div>
 	<div>
 		<p>Name: {{app('request')->input('user')}}</p>
 		<p>Email: {{$result->email}}</p>
 		@if($result->batch!=null)
 		<p>Batch: {{$result->batch}}</p>
 		@endif
 		@if($project_head_result->first()!=null)
 		<div>
 			As a Project Head In:
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
 		@endif
 		@if($project_supervisor_result->first()!=null)
 		<div>
 			As a Project Supervisor In:
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
 		@endif

 		@if($project_leader_result->first()!=null)
 		<div>
 			As a Project leader In:
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
 		@endif
 		
 		@if($project_member1_result->first()!=null)
 		<div>
 			As a Project 1st Member In:
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
 		@endif

 		@if($project_member2_result->first()!=null)
 		<div>
 			As a Project 2nd member In:
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
                       )</li>
                </a>
 				@endforeach
 			</ol>
 		</div>
 		@endif
	</div>
  
  @if(Auth::user()->id == $id)

      <div id="row ">
        <div class="panel">
          
            <h4>
              Do you want to change password?
            </h4>
          <a href="/passwordchange"> Change Password!!</a>
        </div>
          <div class="container">
            <div class="panel ">
                <h4>
                  Do you want to change Profile Photo?
                </h4>
            
            <form id="profileimg" method="POST" action="/profilePhotoUpload" enctype="multipart/form-data">
              {{ csrf_field() }}
              @if(session()->has('messageprofilephotochange'))
                        <div class="alert alert-success">
                            {{ session()->get('messageprofilephotochange') }}
                        </div>
              @endif
              <div>
                  <img src="" id="image1" class="image" >
              </div>
              <div class="form-group{{ $errors->has('profile_image') ? ' has-error' : '' }}">
                 <label for="profile_image" class="col-md-4 control-label">Enter photo</label>
                    <div class="col-md-6">
                      <input data-preview="#preview" name="profile_image" type="file" id="profile_image"/>
                      <img class="col-sm-6" id="preview"  src="" ></img>
                      @if ($errors->has('profile_image'))
                        <span class="help-block"><strong>{{ $errors->first('profile_image') }}</strong></span>
                      @endif
                    </div>
              </div>
              <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" id="imageChange" class="btn btn-md btn-success" form="profileimg">Change Photo</button>
                        </div>
              </div>
             </form>
             </div>
          </div>

            <script type="text/javascript">
                $(function(){
                  $('#profile_image').change( function(e) {
                    var img1 = URL.createObjectURL(e.target.files[0]);
                    $('#image1').attr('width', '200px');
                    $('#image1').attr('src', img1);
                    });
                  
                });
          </script>
      </div>
    @endif
@stop