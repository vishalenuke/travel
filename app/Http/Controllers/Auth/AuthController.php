<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator, Redirect;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Request,Auth,Session;
use Illuminate\Contracts\Auth\Guard;


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
        }else{
            return redirect('dashboard');
        }
        
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
//print_r($auth);die();
                if( $auth ){
                         
                               // return view('user');
                    return Redirect::to('pending/applications');
                           
                    
                    
                }else {
                    
                    Session::flash('error', 'Invalid username or password!');
                }       
                
            }else{
            
                Session::flash('error', 'Fields can not be empty!');    
                
            }
        }
        
        
        return redirect('/');

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
