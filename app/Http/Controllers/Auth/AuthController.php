<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator, Redirect;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Request,Auth,Session;
use Illuminate\Contracts\Auth\Guard;
use App\Application;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    // }
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
        
        $this->middleware('guest', ['except' => 'getLogout']);
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }
    public function getLogin()
    {   
        
        if( !Auth::Check() ){
            return view('auth.login');
        }

        return Redirect::to('agency');
        
    }
    public function verification($id)
    {
        if($id && $user=Application::where(['email'=>base64_decode($id),'is_verified'=>0])->first()){
            $user->is_verified=1;
            $user->save();
             if(!Session::has('message')) Session::flash('message','Email verification is successful.');
            //print_r("successfully varified.");
             //return View::make('user.verification_success');
        }else{
            Session::flash('error','Email verification link has been expired.');
            //return View::make('user.verification',['expired'=>true]);
        }           
                
        return redirect('auth/login');
        
    }
    public function getRegister()
    {
        
        // //$countries = Country::all(['country_id', 'country_name']);
        // $states=array();
        // $cities=array();
        return view('auth.register');//->with(['countries' => $countries,'states'=>$states,'cities'=>$cities]);
        
    }

    public function postRegister()
    {
        
        if (Request::isMethod('post')) {
            
            $input = Request::all(); 
            $user = new Application;
            $email='';
            if( isset($input['email']) ) {
                $email=$input['email'];
            }
            if($input){
                $rulesWeb = array(
                    'email' => 'required|email|unique:applications,email',                    
                    'first_name' => 'required',
                    'last_name' => 'required',
                    'company_name' => 'required'
                );
                $messages = array(
                    'email.required' => 'Please enter email address',
                    'email.email' => 'Please enter valid email',
                    'email.unique' => 'Email already exist',                   
                    'first_name.required' => 'Please enter first name',
                    'last_name.required' => 'Please enter last name',
                    'company_name.required' => 'Please enter company name',
                    
                );
                $validator = Validator::make($input, $rulesWeb, $messages);
                if(!empty($application=Application::where(['email'=>$email,'is_verified'=>0])->first())){
                    //Your email is registered on BizBricks. We have sent a verification email to abc@gmail.com. Please verify your email address to activate your account.
                        //Session::flash('error', 'Your email is registered on Travel Portal. We have sent a verification email to '.$email.'. Please <a href="'.url('auth/verification/'.base64_encode($email)).'">verify</a> your email address to activate your account.');
                    verificationEmail( $application->email );
                    Session::flash('error', 'Your email is already registered on Travel Portal. We have sent a verification email to '.$email.'. Please verify your email address.');
             
                }elseif($validator->fails()) {                   
                    Session::flash('error', $this->getError($validator));
                }else {
                    
                    if($url=$user->uploadImage($input))
                        $input['image_url']=$url;
                    if($pan_url=$user->uploadPAN($input))
                        $input['pan_copy_url']=$pan_url;
                    $user = $user->create($input);
                    
                    
                
                        if($user->email && verificationEmail( $user->email )){                          
                                
                            Session::flash('message', 'Verification link has been sent to your registered email. Please check your inbox and verify email.');                            
                        }else{
                            Session::flash('message',  'Registration successfully.');
                        }
                       
                        
                               
                        return view('auth.login');          
                }
            }else{
                
                Session::flash('error', 'Fields cannot be empty');
                
            }
        }
        
       
        return view('auth.register');
    }

/**
     * post login function for POST REQUEST.
     */
     
    public function postLogin()
    {

        if (Request::isMethod('post')) {
            
            $input = Request::all();
            if( $input )
            {                   
                $credential = array(
                    'email' => $input['email'], 
                    'password' => $input['password']
                );
                
                //$remember = isset($input['remember']) ? true : false;
                
                $auth = Auth::attempt( $credential );

                if( $auth ){
                         
                               // return view('user');
                    if(isAdmin())
                        return redirect('pending/applications');
                    else
                        return redirect('agency');
                    
                    
                }else{
                    
                    Session::flash('error', 'Invalid username or password!');
                    //print_r("error");die();
                }       
                
            }else{
            
                Session::flash('error', 'Fields can not be empty!');    
                
            }
        }
        
        
        return redirect('auth/login');

    }

    public function getLogout()
    {
        Session::flush();
        Auth::logout();     
        return redirect('auth/login');
        
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
