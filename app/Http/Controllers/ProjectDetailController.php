<?php

namespace App\Http\Controllers;

use App\project_detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use App;
use Illuminate\View\View;
use function PHPSTORM_META\type;

class ProjectDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = App\User::all();
        $project = App\project_detail::all();
        foreach ($user as $item)
        {
            echo $item;
            echo $project->get($item->id)->name."<br>";

        }

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
        $this->validator($request_data);
        $success = project_detail::create([
                'name'=> $request_data['projName'],
                'year'=> $request_data['year'],
                'type'=> $request_data['type'],
                'head_id'=> $request_data['projectHead'],
                'supervisor_id'=> $request_data['projectSupervisor'],
                'leader_id'=> $request_data['projectLeader'],
                'member_idi'=> $request_data['projectMember1'],
                'member_idii'=> $request_data['projectMember2'],
            ]);
        return Redirect::back()->with('message','Project Added!!');
         // return redirect()->route('home');
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

    protected function validator(array $data)
    {
        $messages = [
            'projName.required' => 'Please enter Project Name',
            'year.required' => 'Please enter Year',
            'type.required'=>'Please enter Project Type',
            'projectHead.required'=>'Please enter Project Head',
            'projectSupervisor.required'=>'Please enter Project Supervisor',
            'projectLeader.required'=>'Please enter Project Type',
            'projectMember1.numeric'=>'Please enter Valid input',
            'projectMember2.numeric'=>'Please enter Valid input',
        ];
        return Validator::make($data, [
            'projName' => 'required|string|max:255',
            'year' => 'required|numeric',
            'type' => 'required|numeric',
            'projectHead' => 'required|numeric|max:255',
            'projectSupervisor' => 'required|numeric|max:255',
            'projectLeader' => 'required|numeric|max:255',
            'projectMember1' => 'nullable|numeric|max:255',
            'projectMember2' => 'nullable|numeric|max:255',
        ],$messages)->validate();
    }
}
