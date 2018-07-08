@extends('layouts.dashboard')
@section('page_heading','Detail of Project')
@section('section')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<div class="row container-fluid">
                <?php $results = App\project_detail::all()->where('id', app('request')->input('param')); ?>
                @if($results->isEmpty())
                    <p>Sorry Empty! Error</p>
                @else
                    @foreach($results as $result)
                    <?php 
                    $headName = App\User::select('name')->where('id', $result->head_id)->first()->name;
                    $leaderName= App\User::select('name')->where('id', $result->leader_id)->first()->name;
                    $SupervisorName= App\User::select('name')->where('id', $result->supervisor_id)->first()->name;
                    
                    $a = App\User::select('name')->where('id', $result->member_idi);
                    $memberIName = null;
                    $memberIIName = null;
                    ($a->count())?$memberIName=$a->first()->name:"" ;
                    $b = App\User::select('name')->where('id', $result->member_idii);
                    ($b->count())?$memberIIName=$b->first()->name:"" ;
                    ?>
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="container-fluid panel opag black-text " id="aboutProjectNames">
                                <br>
                                 <li class="list-group-item">Name: {{$result->name}}</li>
                                 <li class="list-group-item">Type: 
                                    @if($result->type == 0)
                                      <span>Minor Project I</span>
                                    @elseif($result->type == 1)
                                      <span>Minor Project II</span>
                                    @elseif($result->type == 2)
                                      <span>Major Project</span>
                                    @endif
                                  </li>
                                 <li class="list-group-item">Year: {{$result->year}}</li>
                                 <li class="list-group-item">Project Head: {{$headName}}</li>
                                 <li class="list-group-item">Project Supervisor: {{$SupervisorName}}</li>
                                 <li class="list-group-item">Project Leader: {{$leaderName}}</li>
                                 <li class="list-group-item">Project Member: {{$memberIName}}</li>
                                 <li class="list-group-item">Project Member: {{$memberIIName}}</li>
                                  <br>
                            </div>
                        </div>
                        <div class="col-lg-6">
                          <div class="container-fluid panel opag black-text opag" >
                              <br>
                                <p class="text-center">Project Task List</p>
                                <ul id="aboutProjectTasksScroll">
                                <?php 
                                    $totalNumOftask = 0; 
                                    $totalNumOftaskIncomplete = 0;
                                    $totalNumOftaskLeader = 0;
                                    $totalNumOftaskMemberi = 0;
                                    $totalNumOftaskMemberii = 0;
                                ?>
                                
                                @foreach(App\project_task::select('task','task_complete')->where('project_id', app('request')->input('param'))->get() as $taskResult)
                                    <li>{{$taskResult->task}}</li>

                                    <?php 
                                        $totalNumOftask++;
                                        if ($taskResult->task_complete == null) {
                                            $totalNumOftaskIncomplete++;
                                        }elseif ($result->leader_id == $taskResult->task_complete) {
                                            $totalNumOftaskLeader++;
                                        }elseif ($result->member_idi == $taskResult->task_complete) {
                                            $totalNumOftaskMemberi++;
                                        }elseif ($result->member_idii == $taskResult->task_complete) {
                                            $totalNumOftaskMemberii++;
                                        }
                                    ?>
                                @endforeach

                                </ul>
                             </div>
                          </div>
                       </div>

                    <div class="row">
                      <div class="col-lg-6">
                        <div class="container-fluid panel opag black-text text-center" >
                          <br>
                            <span><b>Minutes</b></span>
                            <hr>
                            <div id="minuteDisplay">
                            <table id="minuteTable" class="table ">
                              <thead>
                                <tr>
                                  <th scope="col">#</th>
                                  <th scope="col">Agenda</th>
                                  <th scope="col">Discussion</th>
                                  <th scope="col">More Detail</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php $countData = 1;?>
                              @foreach(App\minute::all()->where('project_id', app('request')->input('param')) as $minuteResult)
                                  <tr>
                                    <th scope="row">{{$countData++}}</th>
                                    <td>{{$minuteResult->agenda}}</td>
                                    <td>{{$minuteResult->discussion}}</td>
                                    <td>
                                      <a href="{{ route('minuteCompleteDetails', ['project' => $result->name,
                                                        'param' => $minuteResult->id]) }}">
                                                   <li class="list-group-item">{{$minuteResult->id}}</li>
                                      </a>
                                    </td>
                                  </tr> 
                              @endforeach
                              </tbody>
                            </table>
                          </div>
                         </div>
                       </div>
                       <div class="col-lg-6">
                           <div id="pptdisplay" class="container-fluid panel black-text opag ">
                            <br>
                            <p>List of Presentation</p>
                            <br>
                            <div id="presentationDisplay">
                               <ol>
                                 @foreach(App\Powerpoint::select('id', 'powerpoint')->where('project_id',app('request')->input('param'))->get() as $res)
                                    <a href="{{asset('uploads/'.$res->powerpoint)}}" ><li>{{substr($res->powerpoint,11)}}</li></a>
                                 @endforeach
                               </ol>
                             </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-12">
                          <div class="container-fluid panel black-text opag ">
                              <div id="piechart" >
                              </div>
                              <script type="text/javascript">
                              // Load google charts
                              google.charts.load('current', {'packages':['corechart']});
                              google.charts.setOnLoadCallback(drawChart);
                              // Draw the chart and set the chart values
                              function drawChart() {
                                var data = google.visualization.arrayToDataTable([
                                ['Member', 'percentage'],
                                ['Incomplete',{{$totalNumOftaskIncomplete}}],
                                ['Leader', {{$totalNumOftaskLeader}}],
                                ['Member 1st', {{$totalNumOftaskMemberi}}],
                                ['Member 2nd', {{$totalNumOftaskMemberii}}]
                                
                              ]);

                                // Optional; add a title and set the width and height of the chart
                                var options = {
                                  'title':'{{$result->name}} progress',
                                  'width':500,
                                  'height':400,
                                  is3D:true,
                                  legend:{position: 'bottom',alignment:'center', textStyle: {color: 'blue', fontSize: 12}},
                                  backgroundColor:'transparent',
                                  slices: {
                                      0: { color: 'red' },
                                      1: { color: '#AABB12' },
                                      2: { color: '#9212CC' },
                                      3: { color: 'orange' },
                                      4: { color: 'purple' },
                                      5: { color: 'green' },
                                      6: { color: 'blue' },
                                      
                                    }
                                  };

                                // Display the chart inside the <div> element with id="piechart"
                                var chart = new google.visualization.PieChart(document.getElementById('piechart'));
                                chart.draw(data, options);
                              }
                              </script> 
                          </div>
                       </div>
                     </div>
                    @endforeach
                @endif
            
 </div>
@stop
