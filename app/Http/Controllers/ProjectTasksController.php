<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\project_task;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use App;
use Illuminate\View\View;
use function PHPSTORM_META\type;

class ProjectTasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = $request->all();
        $project_id = $data['pid'];
        $tasks = App\project_task::all()->where('project_id',$project_id);
        return response()->json(['taskJSDyViewDatamessage' =>  $tasks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request_data = $request->All();
        $project_id = $request_data['pid'];
        $task = $request_data['enteredTask'];
        if (is_null($project_id)) {
            return response()->json(['taskAddMessage' => 0]); // message 0 = project not selected 
        }
        if (is_null($task)) {
            return response()->json(['taskAddMessage' => 1]); // message 1 = task empty 
        }
        $success = project_task::create([
                'project_id'=> $project_id,
                'task'=>$task,
            ]);
            return response()->json(['taskAddMessage' => 2]); // message 1 = task empty
        return Redirect::back()->with('messageProjectTaskCreate','Task Added!!');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
