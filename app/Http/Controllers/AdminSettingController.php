<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Request;
use Session;
use Validator;
use Illuminate\Support\Facades\Input;
use Redirect;
use View, Auth, App\Airline,App\AdminSetting,App\User;
class AdminSettingController extends Controller {

	public function __construct()
    {
    	if(!Auth::check()){
    		Redirect::to('auth/logout')->send();

    	}
    	
        //$this->auth = $auth;
        
        //$this->middleware('guest', ['except' => 'getLogout']);
    }
	public function keys($search='')
	{
		return array("0"=>"company_name","1"=>"status","2"=>"id","controller"=>"adminsetting","image"=>"logo_url","search"=>$search);
	}



	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		// $data=array();
		// $user='';
		// $keys='';
		// try{
		// 	$search=isset($_GET['value'])?$_GET['value']:'';
		// 	$keys=self::keys($search);
		// 	$data=Airline::where('company_name','LIKE',"%{$search}%")->paginate(10);
		// 	//$user=User::join('agency', 'users.id', '=', 'agency.user_id')->join('documents', 'agency.id', '=', 'documents.agent_id')->find(1);

		// }catch(\Exception $e){

		// }
		// //,$elements=array()
		// //print_r($keys);die();
		// return view('airline',['data'=>$data,'user'=>$user,'keys'=>$keys]);
		
	}
public function search(){
		// $data=array();
		// $user='';
		// $keys='';
		// try{
		// 	$search=$_GET['value'];
		// 	$keys=self::keys($search);
		// 	$data=Airline::where('company_name','LIKE',"%{$search}%")->paginate(10);

		// }catch(\Exception $e){

		// }
		// //,$elements=array()
		// //echo "data";
		// return view('includes.result',['data'=>$data,'user'=>$user,'keys'=>$keys]);
	}
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		// $data=array();
		// $user='';
		// $keys=self::keys();
		// try{
		// 	$data=Airline::paginate(10);
			

		// }catch(\Exception $e){

		// }
		
		// //print_r($user);die();
		// return view('flight',['data'=>$data,'user'=>$user,'keys'=>$keys]);
		
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		try{
			if(Auth::user()){
				$input = Request::all();			
				$modal = new AdminSetting;
				$input['admin_id']=Auth::user()->id;
				$modal=$modal->create($input);
				$modal->save();
				Session::flash('message','Settings added successfully.');
			}else{
				Session::flash('error','Settings not added.');
			}
			
		}catch(\Exception $e){
			Session::flash('error','Settings not added.');
		}
		
		return Redirect::back();		
	}
	public function uploadImage($input,$user=''){
		$url='';
		if((!empty($user))&& $user->logo_url){
			$url=$user->logo_url;
		}
		if( isset($input['image']) && $input['image'] != null ){
									
			$file = array('image' => Input::file('image'));
			$rules = array('image' => 'required|mimes:png,jpg,jpeg,gif');
			$fileToBeUploaded = Input::file('image');				
			//Validate image
			$validator = Validator::make($file, $rules);

			//Store validated image
			if( !$validator->fails() && $fileToBeUploaded->isValid() ){				
				
				$url=generateUrl($fileToBeUploaded);
				if((!empty($user))&& $user->logo_url && file_exists($already='images/'.$user->logo_url)){
					unlink($already);		
				}								
			}	

		}
		return $url;
	}
	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$data=array();
		$user='';
		$search='';
		$keys=array();
		
		try{
			 // $search=isset($_GET['value'])?$_GET['value']:'';
			 // $keys=self::keys($search);
			//$data=User::selectRaw('agency.id as id,users.status as user_status')->selectRaw('documents.*,users.*')->join('agency', 'users.id', '=', 'agency.user_id')->join('documents', 'agency.id', '=', 'documents.agent_id')->where('users.parent_id','=',null)->paginate(10);
			//$result=Application::find($id);

			 $result=User::find($id);

			$keysShow=self::keysShow();

			$user=arrayFromResult($keysShow,$result);

			//if(isset($user['user_status']) && isset($user['status']))
			
			
		}catch(\Exception $e){
			//return $e->getMessage();
		}
		
		return view('profiles.agent-profile',['user'=>$user,'keys'=>$keysShow,'id'=>$id,'admin'=>'admin']);
		
		
	}
	public function keysShow($additional_values=''){
		$array=array(0=>'first_name','image'=>'image_url', 'last_name'=>'last_name', 'email'=>'email', 'phone'=>'phone');
		if((!empty($additional_values)) && is_array($additional_values)){
			$array=array_merge($additional_values,$array);
		}
		return $array;

	}
public function getSetting($id='')
	{
		if(empty($id))
			$id=Auth::user()?Auth::user()->id:'';
		return AdminSetting::where(['admin_id'=>$id])->first();
		
	}
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$data=array();
		$user='';
		$search='';
		$keys=array();
		
		try{
			 $search=isset($_GET['value'])?$_GET['value']:'';
			 $keys=self::keys($search);
			$data=Airline::where('company_name','LIKE',"%{$search}%")->paginate(10);
			$user=AdminSetting::where(['admin_id'=>$id])->first();
			//return $user;

		}catch(\Exception $e){
		}
		
		return view('forms.admin-setting',['data'=>$data,'user'=>$user,'keys'=>$keys]);
		
	}

/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$search='';
		$keys=array();
		try{
			$input = Request::all();

			//$search=$input['_search'];

			//$keys=self::keys($search);

			$modal = AdminSetting::find($id);
			$admin_id=(!empty($modal))?$modal->admin_id:(Auth::user()?Auth::user()->user_id:0);
			

			$array=arrayFromObject($modal,$input);
			$array['admin_id']=$admin_id;
			$modal=$modal->update($array);	
			Session::flash('message','Admin Settings updated successfully.');
		}catch(\Exception $e){
			Session::flash('error','Admin Settings not updated.');
		}	
		return Redirect::back();
		
	}
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		// //
		// try{
		// 	//$input = Request::all();			
		// 	$modal = Airline::find($id);
		// 	$modal->delete();
		// 	Session::flash('message','Airline deleted successfully.');
		// }catch(\Exception $e){
		// 	Session::flash('error','Airline not deleted.');
		// }	
		// return array('success'=>true);
		
	}

}
