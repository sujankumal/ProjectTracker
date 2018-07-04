<?php

namespace App\Http\Controllers;

use App\Powerpoint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App;
use DB;
use App\project_detail;
use Auth;
class PowerpointController extends Controller
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
    public function checkPermisionProjectPPT(Request $request)
    {
        # code...
        $request_data = $request->All();
        $project_id = $request_data['pid'];
        $data = App\project_detail::select('leader_id','supervisor_id')->where('id',$project_id)->first();

         if (Auth::user()->id == $data->leader_id) {
             # leader
            return response()->json(['checkPermisionProjectPPT' => 0]);    
         }elseif (Auth::user()->id == $data->supervisor_id) {
             # code...
            return response()->json(['checkPermisionProjectPPT' => 1]);
         }
        return response()->json(['checkPermisionProjectPPT' => 2]);
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
        
        $transaction = DB::transaction(function() use ($request, $request_data)
        {
            $file = $request->file('pptInput');
            $destination = 'uploads/';
            $file_name = str_random(10).'_'.$file->getClientOriginalName();
            $file->move($destination,$file_name);
            $powerpoint = Powerpoint::create([
                'project_id'=> $request_data['project_id'],
                'powerpoint'=> $file_name,
                
            ]);
            
        });
         return Redirect::back()->with('pptUpload','PPT File Added!!');
        // return redirect()->route('home');
    }
    
    protected function validator(array $data){
        $messages = [
            'project_id.required' => 'Project not Specified',
            'pptInput.required'=>'Please select Image of meeting',
            'pptInput:mimes' => 'Please input documents type like pptx,pptm,ppt,pdf,odp,odt,docx,doc'
        ];
        return Validator::make($data, [
            'project_id' => 'required|numeric|max:255',
            'pptInput'=>'required|file|mimes:pptx,pptm,ppt,pdf,odp,odt,docx,doc',
        ],$messages)->validate();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Powerpoint  $powerpoint
     * @return \Illuminate\Http\Response
     */
    public function show(Powerpoint $powerpoint)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Powerpoint  $powerpoint
     * @return \Illuminate\Http\Response
     */
    public function edit(Powerpoint $powerpoint)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Powerpoint  $powerpoint
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Powerpoint $powerpoint)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Powerpoint  $powerpoint
     * @return \Illuminate\Http\Response
     */
    public function destroy(Powerpoint $powerpoint)
    {
        //
    }
}
