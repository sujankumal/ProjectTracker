<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App;
use App\notice;
use DB;
use Auth;
use Mail;
use App\Mail\MailToUser;
class NoticeController extends Controller
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
        $request_data = $request->All();
        $notice = $request_data['enteredNotice'];
        $this->validator($request_data);
        $emails = array();
        foreach ($request_data['projID'] as $project_id) {
            # code...
             foreach (App\project_detail::all()->where('id',$project_id) as $result) {
                if ($result->head_id!= null) {
                    $value = App\User::select('email')->where('id',$result->head_id)->first()->email;
                    if(!in_array($value, $emails, true)){
                        array_push($emails, $value);
                    }
               }if ($result->supervisor_id!= null&&$result->supervisor_id!=$result->head_id) {
                    $value = App\User::select('email')->where('id',$result->supervisor_id)->first()->email;
                    if(!in_array($value, $emails, true)){
                        array_push($emails, $value);
                    }
               }
               if ($result->leader_id!= null&&$result->leader_id!=$result->supervisor_id&&$result->leader_id!=$result->head_id) {
                     $value = App\User::select('email')->where('id',$result->leader_id)->first()->email;
                    if(!in_array($value, $emails, true)){
                        array_push($emails, $value);
                    }
               }
               if ($result->member_idi!= null&&$result->member_idi!=$result->supervisor_id&&$result->member_idi!=$result->head_id&&$result->member_idi!=$result->leader_id) {
                     $value = App\User::select('email')->where('id',$result->member_idi)->first()->email;
                    if(!in_array($value, $emails, true)){
                        array_push($emails, $value);
                    }
               }
               if ($result->member_idii!= null&&$result->member_idii!=$result->supervisor_id&&$result->member_idii!=$result->head_id&&$result->member_idii!=$result->leader_id&&$result->member_idii!=$result->member_idi) {
                     $value = App\User::select('email')->where('id',$result->member_idii)->first()->email;
                    if(!in_array($value, $emails, true)){
                        array_push($emails, $value);
                    }
               }
            }
        }
        // dd($emails);
        $transaction = DB::transaction(function() use ($request, $request_data, $emails, $notice)
        {
            foreach ($request_data['projID'] as $project_id) {
                $notIce = notice::create([
                'u_id'=> Auth::user()->id,
                'project_id'=> $project_id,
                'notice'=>$request_data['enteredNotice'],
                ]);
            }
            
            
            foreach ($emails as $email) {
               Mail::to($email)->send(new MailToUser($notice));
            }
            
        });
         return Redirect::back()->with('messageNoticeCreate','Notice Sent!!');
        
    }
    protected function validator(array $data){
        $messages = [
            'projID.required' => 'Project not Specified',
            'enteredNotice.required'=>'Please enter notice',
            
        ];
        return Validator::make($data, [
            'projID.[*]' => 'required|numeric|max:255',
            'enteredNotice'=>'required',
        ],$messages)->validate();
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
