<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Request;
use Session;
use Validator;
use Illuminate\Support\Facades\Input;
use Redirect;
use View, Auth;
use App\WhiteLabel;
class WhiteLabelController extends Controller {

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
		return array("0"=>"site_name","1"=>"status","2"=>"id","controller"=>"WhiteLabel","image"=>"file_url","search"=>$search);
	}



	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	// public function index()
	// {
	// 	$data=WhiteLabel::select(['site_name','status'])->paginate(10);
	// 	//print_r($data[0]->status);die();
	// 	return view('white-label',['data'=>$data]);
		
	// }
	public function index()
	{
		$data=array();
		$user='';
		$keys='';
		try{
			$search=isset($_GET['value'])?$_GET['value']:'';
			$keys=self::keys($search);
			$data=WhiteLabel::where($keys[0],'LIKE',"%{$search}%")->paginate(10);
			//$user=User::join('agency', 'users.id', '=', 'agency.user_id')->join('documents', 'agency.id', '=', 'documents.agent_id')->find(1);

		}catch(\Exception $e){

		}
		//,$elements=array()
		//print_r($keys);die();
		return view('white-label',['data'=>$data,'user'=>$user,'keys'=>$keys]);
		
	}
	public function search(){
		$data=array();
		$user='';
		$keys='';
		try{
			$search=$_GET['value'];
			$keys=self::keys($search);
			$data=WhiteLabel::where($keys[0],'LIKE',"%{$search}%")->paginate(10);
			//$user=User::join('agency', 'users.id', '=', 'agency.user_id')->join('documents', 'agency.id', '=', 'documents.agent_id')->find(1);

		}catch(\Exception $e){

		}
		//,$elements=array()
		//echo "data";
		return view('includes.result',['data'=>$data,'user'=>$user,'keys'=>$keys]);
	}
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$data=array();
		$user='';
		$keys=self::keys();
		try{
			$data=WhiteLabel::paginate(10);
			

		}catch(\Exception $e){

		}
		
		//print_r($user);die();
		return view('white-domain',['data'=>$data,'user'=>$user,'keys'=>$keys]);
		
	}

	public function arrayFromObject($object,$input){
		$array=array();
		foreach ($object as $key => $value) {
      			$array[$key]=isset($input[$key])?$input[$key]:'';
  		}
  		return $array;
	}
	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		try{
			$input = Request::all();
			$user=new WhiteLabel;
			if($url=self::uploadImage($input))
				$input['file_url']=$url;
			$userArray=arrayFromObject($user,$input);
			$user=$user->create($userArray);
		
			Session::flash('message','White label detail added successfully.');
		}catch(\Exception $e){
			Session::flash('error','White label detail not added.');
		}
		
		return Redirect::back();		
	}
	public function uploadImage($input,$user=''){
		$url='';
		if((!empty($user))&& $user->file_url){
			$url=$user->file_url;
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
				if((!empty($user))&& $user->file_url && file_exists($already='images/'.$user->file_url)){
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
	public function show()
	{
	
		
		
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	// public function edit($id)
	// {
	// 	try{
	// 		$user=WhiteLabel::find($id);
	// 		$userArray=arrayFromObject($user,$input);

	// 	}catch(\Exception $e){
	// 	}	
	// 	return view('white-label',['data'=>$data]);
		
	// }
	public function edit($id)
	{
		$data=array();
		$user='';
		$search='';
		$keys=array();
		
		try{
			 $search=isset($_GET['value'])?$_GET['value']:'';
			 $keys=self::keys($search);
			//$data=User::paginate(10);
			$user=WhiteLabel::find($id);
			//print_r($user);die();
		}catch(\Exception $e){
		}
		
		return view('forms.white-domain',['data'=>$data,'user'=>$user,'keys'=>$keys]);
		
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
			//print_r($id);die();
			$search=$input['_search'];
			//print_r($search);die();
			$keys=self::keys($search);
			$user=WhiteLabel::find($id);
			if($url=self::uploadImage($input,$user))
				$input['file_url']=$url;
			$userArray=arrayFromObject($user,$input);

			

			$user=$user->update($userArray)?true:$user->create($userArray);
			
		
			Session::flash('message','White label detail updated successfully.');
		}catch(\Exception $e){
			Session::flash('error','White label detail not updated.');
		}	
		return Redirect::back();
		//return Redirect::to('/whitelabel'.($search?'?value='.$search:''));
		
	}
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		try{			
			$user=WhiteLabel::find($id);

			$user->delete();
			Session::flash('message','White label detail deleted successfully.');
		}catch(\Exception $e){
			Session::flash('error','White label detail not deleted.');
		}	
		return array('success'=>true);
		
	}

}
