<?php

namespace App\Http\Controllers;

use App\minute;
use App\image;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App;

class MinuteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
         // $request_data = $request->All();
         // $this->validator($request_data);
         // $success;
        // $success = minute::create([
        //     'project_id'=> $request_data['project_id'],
        //     'progress_percentage'=> $request_data['progress_percentage'],
        //     'agenda'=> $request_data['agenda'],
        //     'discussion'=> $request_data['discussion'],
        //     'leader_acheivement'=> $request_data['leader_acheivement'],
        //     'member_i_acheivement'=> $request_data['member_i_acheivement'],
        //     'member_ii_acheivement'=> $request_data['member_ii_acheivement'],
        //     'leader_responsibility'=> $request_data['leader_responsibility'],
        //     'member_i_responsibility'=> $request_data['member_i_responsibility'],
        //     'member_ii_responsibility'=> $request_data['member_ii_responsibility'],
        // ]);
       //  $success->id;
        // image table update + image store
            $request_data = $request->All();
            $this->validator($request_data);
            
        $transaction = DB::transaction(function() use ($request, $request_data)
        {
            $file = $request->file('imageInput');
            $destination = 'uploads/';
            $file_name = str_random(10).'_'.$file->getClientOriginalName();
            $file->move($destination,$file_name);
            
            $minute = minute::create([
                'project_id'=> $request_data['project_id'],
                'progress_percentage'=> $request_data['progress_percentage'],
                'agenda'=> $request_data['agenda'],
                'discussion'=> $request_data['discussion'],
                'leader_acheivement'=> $request_data['leader_acheivement'],
                'member_i_acheivement'=> $request_data['member_i_acheivement'],
                'member_ii_acheivement'=> $request_data['member_ii_acheivement'],
                'leader_responsibility'=> $request_data['leader_responsibility'],
                'member_i_responsibility'=> $request_data['member_i_responsibility'],
                'member_ii_responsibility'=> $request_data['member_ii_responsibility'],
            ]);
            
           $image = image::create([
                'minute_id'=>$minute->id,
                'image'=>$file_name,
              ]);
        });
         return Redirect::back()->with('messageMinuteCreate','Minute Added!!');
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
            'project_id.required' => 'Project not Specified',
            'progress_percentage.required' => 'Please enter Project Progress',
            'agenda.required'=>'Please enter Agenda',
            'discussion.required'=>'Please enter Discussion',
            'leader_acheivement.required'=>'Please enter Leader\'s acheivement ',
            'leader_responsibility.required'=>'Please enter Leader\'s responsibility',
            'imageInput.required'=>'Please select Image of meeting',

        ];
        return Validator::make($data, [
            'project_id' => 'required|numeric|max:255',
            'progress_percentage' => 'required|numeric',
            'agenda' => 'required|string',
            'discussion' => 'required|string',
            'leader_acheivement' => 'required|string',
            'member_i_acheivement' => 'nullable|string',
            'member_ii_acheivement' => 'nullable|string',
            'leader_responsibility' => 'required|string',
            'member_i_responsibility' => 'nullable|string',
            'member_ii_responsibility' => 'nullable|string',
            'imageInput'=>'required|image',
        ],$messages)->validate();
    }
}
