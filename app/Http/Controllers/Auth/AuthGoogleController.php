<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Socialite;
use Auth;

class AuthGoogleController extends Controller
{
    //
    use RegistersUsers;

    protected $redirectTo = '/home';
    
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function redirectToGoogle(){
        return Socialite::driver('google')->redirect();
    }
    
    public function handleGoogleCallback(Request $request )
    {
        try {
            $user = Socialite::driver('google')->user();
            if (Auth::attempt(['email' => $user->getEmail(), 'password' => $user->getEmail()]))
             {
                 //successful login
                   return redirect()->intended('home');
             }
             User::create([
                'name' => $user->getName(),
                'email' => $user->getEmail(),
                'password' => bcrypt($user->getEmail()),
                'confirmed'=>'1', //
            ]);
            //Auth::loginUsingId($user->id);
            Auth::attempt(['email' => $user->getEmail(), 'password' => $user->getEmail()]);
            return redirect()->route('home');
        } catch (Exception $e) {
            return redirect('auth/facebook');
        }
    }
}
