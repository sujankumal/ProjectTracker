<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class PasswordChangeController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    protected function admin_credential_rules(array $data)
    { 
        $messages = [
            'current-password.required' => 'Please enter current password',
            'password.required' => 'Please enter password',
        ];
        return Validator::make($data, [
             'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required|same:password',
        ],$messages);
    }
    protected function postCredentials(Request $request){
        $request_data = $request->All();
        $validator = $this->admin_credential_rules($request_data);
        if($validator->fails())
        {
            return Redirect::back()->with('msg', $validator->getMessageBag()->toArray());
//           return redirect()->route('/password/change');
        }else{
            $user_id 	= Auth::user()->id;
            $obj_user = User::find($user_id);
            $obj_user->password =  bcrypt($request_data['password']);
            $obj_user->save(); 
            return redirect()->route('home');
        }
       }
    
}
