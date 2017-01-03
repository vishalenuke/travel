<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;


use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\PasswordBroker;

Use App\User;

use Redirect;
use Hash;
use Session;
use DB;
use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
class PasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Create a new password controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('guest');
    // }
    public function __construct(Guard $auth, PasswordBroker $passwords)
    {
        $this->auth = $auth;
        $this->passwords = $passwords;
        $this->subject="Password Change Request";
        $this->middleware('guest');
    }
    public function postEmail(Request $request)
   {
        $email=$request->only('email')['email'];
        
        $user='';
       
            $user = User::where(['email'=>$request->only('email')])->first();  
        
        //print_r($user);die();
     
        if(!empty($user)){
            if(!empty($user->email)){
                $response = Password::sendResetLink($request->only('email'), function (Message $message) {
                    $message->subject($this->getEmailSubject());

                   });

                   switch ($response) {
                       case Password::RESET_LINK_SENT: 
                           Session::flash('message',trans($response));
                           break;
                       case Password::INVALID_USER: 
                            Session::flash('error',trans($response));
                           
                   }
            }
           
        }else{
            Session::flash('error','User not found');
                
        }
        return redirect('auth/login');
   }
    public function postReset(Request $request)
        {
    
            $email=DB::table('password_resets')->where('token',$request->only('token')['token'])->first();
            
            if(empty($email) || strcmp($email->email,$request->only('email')['email'])){
                Session::flash('error','User not found');
                return redirect('auth/login');
            }
            $new_email=$request->only('email')['email'];
            
            
                $user = User::where(['email'=>$request->only('email')])->first();  
            
            
            if((!empty($user)) && $request->only('password')['password']==$request->only('password_confirmation')['password_confirmation'])
            {
                    $user->password=Hash::make($request->only('password')['password']);
                    Session::flash('message','Password reset successfuly');
            $user->save();
               
            }
            
         return redirect('/auth/login');
    }

}
