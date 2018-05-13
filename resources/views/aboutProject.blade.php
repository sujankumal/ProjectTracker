@extends('layouts.dashboard')
@section('page_heading','Detail of Project')
@section('section')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <div class="col-sm-12">
        <div class="">
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
                    <div class="container jumbotron">
                        <div class="col-lg-8 panel panel-default">
                             <p>Name: {{$result->name}}</p>
                             <p>Year: {{$result->year}}</p>
                             <p>Project Head: {{$headName}}</p>
                             <p>Project Supervisor: {{$SupervisorName}}</p>
                             <p>Project Leader: {{$leaderName}}</p>
                             <p>Project Member: {{$memberIName}}</p>
                             <p>Project Member: {{$memberIIName}}</p>
                        </div>
                         <div class="col-lg-4 panel panel-default" >
                            <p>Project Task List</p>
                            <ul style="height:250px;  overflow:hidden; overflow-y:scroll;">
                            <?php $totalNumOftask = null;?>
                            @foreach(App\project_task::select('task')->where('project_id', app('request')->input('param'))->get() as $taskResult)
                                <li>{{$taskResult->task}}</li>
                                <?php $totalNumOftask++; ?>
                            @endforeach
                            </ul>
                         </div>
                     </div>
                     <div class="panel panel-default">
                       
                         <div id="piechart"></div>
                            <script type="text/javascript">
                            // Load google charts
                            google.charts.load('current', {'packages':['corechart']});
                            google.charts.setOnLoadCallback(drawChart);
                            // Draw the chart and set the chart values
                            function drawChart() {
                              var data = google.visualization.arrayToDataTable([
                              ['Member', 'percentage'],
                              ['Incomplete',7],
                              ['Leader', 8],
                              ['Member 1st', 2],
                              ['Member 2nd', 4]
                              
                            ]);

                              // Optional; add a title and set the width and height of the chart
                              var options = {
                                'title':'{{$result->name}} progress',
                                'width':500,
                                'height':400,
                                is3D:true,
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
                    @endforeach
                @endif
            
        </div>

    </div>
        
@stop
