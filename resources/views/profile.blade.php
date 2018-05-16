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

@stop