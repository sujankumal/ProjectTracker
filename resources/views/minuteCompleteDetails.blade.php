@extends('layouts.dashboard')
@section('page_heading','Minute Complete Detail')
@section('section')

<div class="row container-fluid">
	<?php 
		$minute_id = app('request')->input('param');
		$minuteResult = App\minute::all()->where('id',$minute_id);
		$projectResult = App\project_detail::all()->where('id',$minuteResult->first()->project_id)->first();
		 $minuteImage = App\image::select('image')->where('minute_id',$minute_id)->get()->first()->image;
		?>
			<div class="row container-fluid">
				<div class=" jumbotron panel opag">
					<span><b>Project Name: </b> {{$projectResult->name}}</span>
					<br>
					<span><b> Agenda: </b>{{$minuteResult->first()->agenda}}</span><br>
					<span><b>Discussion: </b>{{$minuteResult->first()->discussion}}</span>
					
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6 col-md-6">
					<div class="container-fluid panel opag">
						<div class="text-center"><p>Acheivements</p></div>
						<ol id="minuteDetAchScroll">
							@foreach(App\Acheivement::select('member_id','acheivement')->where('minute_id', $minute_id)->get() as $acheivementResult)
							<li>
							"{{App\project_task::select('task')->where('id',$acheivementResult->acheivement)->get()->first()->task}}" &nbsp by &nbsp
							"{{App\User::select('name')->where('id',$acheivementResult->member_id)->get()->first()->name}}"
							</li>
							<br/>
							@endforeach
						</ol>
					</div>
				</div>
				<div class="col-lg-6 col-md-6">
					<div class="container-fluid panel opag ">
						<div class="text-center"><p>Responsibilities</p></div>
						<ol id="minuteDetResScroll">
							@foreach(App\Responsibility::select('member_id','responsibility')->where('minute_id', $minute_id)->get() as $responsibilityResult)
							<li>
							"{{App\project_task::select('task')->where('id',$responsibilityResult->responsibility)->get()->first()->task}}" &nbsp by &nbsp
							"{{App\User::select('name')->where('id',$responsibilityResult->member_id)->get()->first()->name}}"
							</li>
							<br/>
							@endforeach
						</ol>
					</div>
				</div>
			</div>
			<div class="row container-fluid">
				<div class=" panel opag">
					<div class="text-center"><p>Attendees</p> </div>
					<ol id="minuteDetAtteScroll">
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
					</ol>
				</div>
			</div>
			<div class="row container-fluid">
				<div class="jumbotron panel opag mx-auto text-center">
					<img class=" img-fluid" src="{{asset('uploads\\'.$minuteImage)}}" id="minuteDetailsImage">
					<figcaption>Figure: <i>Image of Meeting</i></figcaption>
				</div>
			</div>
</div>

@stop