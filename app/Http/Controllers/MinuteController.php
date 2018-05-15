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
            $request_data = $request->All();
            $this->validator($request_data);
            $leaderID = App\project_detail::select('leader_id')->where('id',$request_data['project_id'])->first()->leader_id;
            $member1ID = App\project_detail::select('member_idi')->where('id',$request_data['project_id'])->first()->member_idi;
            $member2ID = App\project_detail::select('member_idii')->where('id',$request_data['project_id'])->first()->member_idii;
        //     dd($leaderID,$member1ID,$member2ID,
        //         $request_data['leadername'],
        //        isset($request_data['m1name']) ,
        //        isset( $request_data['m2name']),
        //         $request_data['lrname'],
        //        isset( $request_data['m1rname']),
        //        isset($request_data['m2rname'])
        // );
        $transaction = DB::transaction(function() use ($request, $request_data, $leaderID, $member1ID, $member2ID)
        {
            $file = $request->file('imageInput');
            $destination = 'uploads/';
            $file_name = str_random(10).'_'.$file->getClientOriginalName();
            $file->move($destination,$file_name);
            
            $minute = minute::create([
                'project_id'=> $request_data['project_id'],
                'agenda'=> $request_data['agenda'],
                'discussion'=> $request_data['discussion'],
                'qr_id'=> App\qr::select('id')->where('project_id',$request_data['project_id'])->orderBy('created_at', 'desc')->first()->id,
            ]);
            
            $image = image::create([
                'minute_id'=>$minute->id,
                'image'=>$file_name,
              ]);
            foreach ($request_data['leadername'] as $leaderTaskAch) {
                        // make modal for acheivement tasks and add leader id for  task id
                    $acheivement = App\Acheivement::create([
                        'member_id'=>$leaderID,
                        'minute_id'=>$minute->id,
                        'acheivement'=>$leaderTaskAch
                    ]); 
                    $acheivement = DB::table('project_tasks')->where('id', $leaderTaskAch)->update(['task_complete' => $leaderID]);
            }
                if(isset($request_data['m1name'])){
                    foreach ($request_data['m1name'] as $mem1TaskAch) {
                        // make modal for acheivement tasks and add leader id for  task id
                        if ($member1ID == null) {
                            break;
                        }
                    $acheivement = App\Acheivement::create([
                        'member_id'=>$member1ID,
                        'minute_id'=>$minute->id,
                        'acheivement'=>$mem1TaskAch
                    ]); 
                    $acheivement = DB::table('project_tasks')->where('id', $mem1TaskAch)->update(['task_complete' => $member1ID]);
                    }    
                }
                if (isset( $request_data['m2name'])) {
                    foreach ($request_data['m2name'] as $mem2TaskAch) {
                            // make modal for acheivement tasks and add leader id for  task id
                        if ($member2ID == null) {
                            break;
                        }
                        $acheivement = App\Acheivement::create([
                            'member_id'=>$member2ID,
                            'minute_id'=>$minute->id,
                            'acheivement'=>$mem2TaskAch
                        ]);
                        $acheivement = DB::table('project_tasks')->where('id', $mem2TaskAch)->update(['task_complete' => $member2ID]);
                    } 
                }
                // responsibility
                foreach ($request_data['lrname'] as $leaderTaskResp) {
                    $responsibility = App\Responsibility::create([
                        'member_id'=>$leaderID,
                        'minute_id'=>$minute->id,
                        'responsibility'=>$leaderTaskResp
                    ]);
                }
                if(isset($request_data['m1rname'])){
                    foreach ($request_data['m1rname'] as $mem1TaskResp) {
                        if ($member1ID == null) {
                            break;
                        }
                        $responsibility = App\Responsibility::create([
                            'member_id'=>$member1ID,
                            'minute_id'=>$minute->id,
                            'responsibility'=>$mem1TaskResp
                        ]);
                    }    
                }
                if (isset( $request_data['m2rname'])) {
                    foreach ($request_data['m2rname'] as $mem2TaskResp) {
                        if ($member2ID == null) {
                            break;
                        }
                        $responsibility = App\Responsibility::create([
                            'member_id'=>$member2ID,
                            'minute_id'=>$minute->id,
                            'responsibility'=>$mem2TaskResp
                        ]);
                    } 
                }
                //
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
            'agenda.required'=>'Please enter Agenda',
            'discussion.required'=>'Please enter Discussion',
            'leadername.required'=>'Please enter Leader\'s acheivement ',
            'lrname.required'=>'Please enter Leader\'s responsibility',
            'imageInput.required'=>'Please select Image of meeting',

        ];
        return Validator::make($data, [
            'project_id' => 'required|numeric|max:255',
            'agenda' => 'required|string',
            'discussion' => 'required|string',
            'leadername' => 'required',
            'm1name' => 'nullable',
            'm2name' => 'nullable',
            'lrname' => 'required',
            'm1rname' => 'nullable',
            'm2rname' => 'nullable',
            'imageInput'=>'required|image',
        ],$messages)->validate();
    }
}
