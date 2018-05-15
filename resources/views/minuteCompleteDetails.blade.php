@extends('layouts.dashboard')
@section('page_heading','Minute Complete Detail')
@section('section')

<div class="container">
	<div class="jumbotron">
		<?php 
		$minute_id = app('request')->input('param');
		$minuteResult = App\minute::all()->where('id',$minute_id);
		$projectResult = App\project_detail::all()->where('id',$minuteResult->first()->project_id)->first();
		 $minuteImage = App\image::select('image')->where('minute_id',$minute_id)->get()->first()->image;
		?>
		
		<div>
			<p>Project Name: {{$projectResult->name}}</p>
			<p>Agenda: {{$minuteResult->first()->agenda}}</p>
			<p>Discussion: {{$minuteResult->first()->discussion}}</p>
			<p>Acheivements: </p>
			<span>
				@foreach(App\Acheivement::select('member_id','acheivement')->where('minute_id', $minute_id)->get() as $acheivementResult)
				Task:
				{{App\project_task::select('task')->where('id',$acheivementResult->acheivement)->get()->first()->task}} &nbsp by &nbsp
				{{App\User::select('name')->where('id',$acheivementResult->member_id)->get()->first()->name}}
				
				<br/>
				@endforeach
			</span>
			<p>Responsibilities:</p>
			<span>
				@foreach(App\Responsibility::select('member_id','responsibility')->where('minute_id', $minute_id)->get() as $responsibilityResult)
				Responsibility:
				{{App\project_task::select('task')->where('id',$responsibilityResult->responsibility)->get()->first()->task}} &nbsp by &nbsp
				{{App\User::select('name')->where('id',$responsibilityResult->member_id)->get()->first()->name}}
				
				<br/>
				@endforeach
			</span>
			<div>
				<p>Attendees: </p>
				<ul>
					@foreach(App\qr::all()->where('id',$minuteResult->first()->qr_id) as $attendees)
						@if($attendees->supervisor_check == 1)
							<li>Supervisor: 
							@if($projectResult->supervisor_id!=null)
								{{App\User::select('name')->where('id',$projectResult->supervisor_id)->get()->first()->name}}
							@endif
							</li>
						@endif
						@if($attendees->leader_check == 1)
							<li>Leader:
							@if($projectResult->leader_id!=null)
								{{App\User::select('name')->where('id',$projectResult->leader_id)->get()->first()->name}}
							@endif
							 </li>
						@endif
						@if($attendees->member_i_check == 1)
							<li>Member 1st:
							@if($projectResult->member_idi!=null)
								{{App\User::select('name')->where('id',$projectResult->member_idi)->get()->first()->name}}
							@endif
							</li>
						@endif
						@if($attendees->member_ii_check == 1)
							<li>Member 2nd:
							@if($projectResult->member_idii!=null)
								{{App\User::select('name')->where('id',$projectResult->member_idii)->get()->first()->name}}
							 @endif
							 </li>
						@endif
						
					@endforeach
				</ul>
			</div>
			<div>
				
				<img class="img img-responsive" src="{{asset('uploads\\'.$minuteImage)}}">
				<figcaption>Image of Meeting</figcaption>
			</div>
		</div>
	</div>
</div>

@stop