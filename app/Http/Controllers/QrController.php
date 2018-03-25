<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\LabelAlignment;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Response\QrCodeResponse;
use Auth;
use App\qr;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
