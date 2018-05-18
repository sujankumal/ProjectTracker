<?php

namespace App\Http\Controllers;

use App\ProfileImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App;
use DB;
use Auth;
class ProfileImageController extends Controller
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
        $this->validator($request_data);
        $transaction = DB::transaction(function() use ($request, $request_data)
        {
            $file = $request->file('profile_image');
            $destination = 'uploads/';
            $file_name = str_random(10).'_'.$file->getClientOriginalName();
            $file->move($destination,$file_name);
            $image = ProfileImage::create([
                'user_id'=> Auth::user()->id,
                'pimage'=>$file_name,
              ]);
            
        });
         return Redirect::back()->with('messageprofilephotochange','Profile Photo Changed!!');
    }
    protected function validator(array $data){
        $messages = [
            
            'profile_image.required'=>'Please select Image of meeting',
            'profile_image:mimes' => 'Please input image file like jpeg, jpg, png'
        ];
        return Validator::make($data, [
            'profile_image'=>'required|file|mimes:jpeg,jpg,png',
        ],$messages)->validate();
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\ProfileImage  $profileImage
     * @return \Illuminate\Http\Response
     */
    public function show(ProfileImage $profileImage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProfileImage  $profileImage
     * @return \Illuminate\Http\Response
     */
    public function edit(ProfileImage $profileImage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProfileImage  $profileImage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProfileImage $profileImage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProfileImage  $profileImage
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProfileImage $profileImage)
    {
        //
    }
}
