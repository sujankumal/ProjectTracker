<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\LabelAlignment;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Response\QrCodeResponse;
use Auth;
use App;
use App\qr;
use App\project_detail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
class QrController extends Controller
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
    public function create(Request $request)
    {
        //
        // Create a basic QR code
            $request_data = $request->All();
            Validator::make($request_data, [
                'project_id' => 'required|numeric',
            ],['project_id.required' => 'Please enter Project'])->validate();
            
            $qrdata = 'QrCode generated! Have a nice Day!!'.str_random(15).'_'.Auth::user()->id;
            try{
                $success = qr::create([
                'project_id'=> $request_data['project_id'],
                'QR_Generate' => $qrdata,
            ]);    
            }catch(Exception $e){
                return Redirect::back()->with('qrfilename', 'Sorry Error!');
            }
            
            $qrCode = new QrCode($qrdata);
            $qrCode->setSize(300);
            // Set advanced options
            $qrCode->setWriterByName('png');
            $qrCode->setMargin(10);
            $qrCode->setEncoding('UTF-8');
            $qrCode->setErrorCorrectionLevel(ErrorCorrectionLevel::HIGH);
            $qrCode->setForegroundColor(['r' => 0, 'g' => 0, 'b' => 0, 'a' => 0]);
            $qrCode->setBackgroundColor(['r' => 255, 'g' => 255, 'b' => 255, 'a' => 0]);
            $qrCode->setLabel('Scan the code', 16);
            $qrCode->setLogoWidth(150);
           // $qrCode->setRoundBlockSize(true);
            $qrCode->setValidateResult(false);

            // Directly output the QR code
            // header('Content-Type: '.$qrCode->getContentType());
            //echo $qrCode->writeString();

            // Save it to a file
            $file_name = str_random(10).'.png';
            $qrCode->writeFile(__DIR__.'/../../../public/qrs/'.$file_name);

            // Create a response object
           // $response = new QrCodeResponse($qrCode);
           // dd($response);
            return Redirect::back()->with('qrfilename', $file_name);
     }

     public function checkPermisionProjectQRGen(Request $request)
     {
         # code...
        $request_data = $request->All();
        $project_id = $request_data['pid'];
        $data = App\project_detail::select('head_id')->where('id',$project_id)->first();

         if (Auth::user()->id == $data->head_id) {
             # head
            return response()->json(['checkPermisionProjectQRGen' => 1]);    
         }
        return response()->json(['checkPermisionProjectQRGen' => 2]);
     }

     public function checkPermisionProjectQRScan(Request $request)
     {
         # code...
        $request_data = $request->All();
        $project_id = $request_data['pid'];
        $data = App\project_detail::select('leader_id','supervisor_id','member_idi','member_idii')->where('id',$project_id)->first();

         if (Auth::user()->id == $data->leader_id) {
             # leader
            return response()->json(['checkPermisionProjectQRScan' => 0]);    
         }elseif (Auth::user()->id == $data->supervisor_id) {
             # code...
            return response()->json(['checkPermisionProjectQRScan' => 1]);
         }elseif (Auth::user()->id == $data->member_idi) {
             # code...
            return response()->json(['checkPermisionProjectQRScan' => 0]);
         }elseif (Auth::user()->id == $data->member_idii) {
             # code...
            return response()->json(['checkPermisionProjectQRScan' => 1]);
         }
        return response()->json(['checkPermisionProjectQRScan' => 2]);
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
        $data = $request->all();
        $project_id = $data['project_id'];
        $qrdata = $data['qrdata'];
        //check if project is selected
        if (is_null($project_id)) {
            return response()->json(['qrdatamessage' => 0]); // message 0 = project not selected 
        }
        // get qrs generated for the project
        $qrvalues = DB::table('qrs')->where('project_id', $project_id)->get();
        $checkIfFound = 0; 

        foreach ($qrvalues as $value) {
             // if qr matched get inside and change database value that is signature  
             if ($value->QR_Generate == $qrdata) {
                //get current user
                $u_id = \Auth::user()->id;
                // get  supervisor leader etc detail for the project
                $project_details = DB::table('project_details')->where('id', $project_id)->get();
               // $project_details = project_detail::where('id', $project_id);
               
                //get supervisor and update supervisor field
                
                $supervisor = $project_details->first()->supervisor_id;
                if ($supervisor == $u_id) {
                    
                     DB::table('qrs')->where('id', $value->id)->update(['supervisor_check' => 1]);
                     $checkIfFound =1;
                     break;
                }

                $leader_id = $project_details->first()->leader_id;
                if ($leader_id == $u_id) {
                    
                     DB::table('qrs')->where('id', $value->id)->update(['leader_check' => 1]);
                     $checkIfFound =1;
                     break;
                }
                $member_idi = $project_details->first()->member_idi;
                if ($member_idi == $u_id) {
                    
                     DB::table('qrs')->where('id', $value->id)->update(['member_i_check' => 1]);
                     $checkIfFound =1;
                     break;
                }
                $member_idii = $project_details->first()->member_idii;
                if ($member_idii == $u_id) {
                    
                     DB::table('qrs')->where('id', $value->id)->update(['member_ii_check' => 1]);
                     $checkIfFound =1;
                     break;
                }
            }
        }
        if ($checkIfFound == 0) {
            # code...
            return response()->json(['qrdatamessage' =>  2]); 
        }elseif ($checkIfFound == 1) {
            # code...
            return response()->json(['qrdatamessage' =>  1]);
        }
       // return response()->json(['qrdatamessage' => $data['qrdata']]);
       
    
       // message 0 = project not selected 
       // message 1 = qr matched 
       // message 2 = qr not matched
       
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
