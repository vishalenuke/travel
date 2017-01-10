<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Request;
use Session;
use Validator;
use Illuminate\Support\Facades\Input;
use Redirect;
use View, Auth;
use App\WhiteLabel,App\WhiteLabelPage;
class WhiteLabelPageController extends Controller {

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
		return array("0"=>"title","1"=>"status","2"=>"page_id","controller"=>"WhiteLabelpage","search"=>$search);
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
		$id=0;
		try{
			$search=isset($_GET['value'])?$_GET['value']:'';
			$keys=self::keys($search);
			//if(isAdmin())
				
			if(isAdmin())
			$data=WhiteLabel::where($keys[0],'LIKE',"%{$search}%")->paginate(10);
			else{
				// $keys=self::pageKeys($search);
				$data=WhiteLabelPage::where('title','LIKE',"%{$search}%")->paginate(10);
				$result=WhiteLabel::where(['user_id'=>Auth::user()->id])->first();
				$keysShow=self::keysShow();
				$id=empty($result)?0:$result->id;
			$user=arrayFromResult($keysShow,$result);
			//print_r($user);die();
			}
			

			//$user=User::join('agency', 'users.id', '=', 'agency.user_id')->join('documents', 'agency.id', '=', 'documents.agent_id')->find(1);

		}catch(\Exception $e){

		}
		//,$elements=array()
		//print_r($keys);die();
		return view('white-label',['data'=>$data,'user'=>$user,'keys'=>$keys,'id'=>$id]);
		
	}
	public function keysShow($additional_values=''){
		$array=array('domain', 'site_name', 'email', 'mobile', 'file_url', 'description', 'facebook_url', 'instagram_url', 'twitter_url', 'google_plus_url');
		if((!empty($additional_values)) && is_array($additional_values)){
			$array=array_merge($additional_values,$array);
		}
		return $array;

	}
	public function search(){
		$data=array();
		$user='';
		$keys='';
		try{
			$search=$_GET['value'];
			$keys=self::keys($search);
			if(isAdmin())
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
		$status='';
		$id='';
		try{
			if(isAdmin())
				$data=WhiteLabel::paginate(10);
			else{
				$user=WhiteLabel::where(['user_id'=>Auth::user()->id])->first();
				
				if(empty($user)){
					$status="whitelabel";
				}else{
					$data=WhiteLabelPage::paginate(10);
					$id=$user->user_id;
					$user=array();
					//$user=WhiteLabelPage::where(['user_id'=>Auth::user()->id])->first();
				}
				//print_r("expression");die();
			}
			

			

		}catch(\Exception $e){

		}
		if($status=="whitelabel")
			return view('white-domain',['data'=>$data,'user'=>$user,'keys'=>$keys,'empty'=>'empty']);
		else
			return view('white-domain',['data'=>$data,'user'=>$user,'keys'=>$keys,'id'=>$id]);
		
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
			$user=new WhiteLabelPage;
			
			$userArray=arrayFromObject($user,$input);
			if(!isAdmin()){
				$userArray['user_id']=Auth::user()->id;
			}
			$user=$user->create($userArray);
		
			Session::flash('message','White label page added successfully.');
		}catch(\Exception $e){
			Session::flash('error','White label page not added.');
		}
		
		return Redirect::back();		
	}
	public function addPage($id)
	{
		try{
			$input = Request::all();
			$user=new WhiteLabelPage;
			
			$userArray=arrayFromObject($user,$input);
			if(!isAdmin()){
				$userArray['user_id']=$id;
			}
			$user=$user->create($userArray);
		
			Session::flash('message','White label page added successfully.');
		}catch(\Exception $e){
			Session::flash('error',$e->getMessage());
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
			$user=WhiteLabelPage::find($id);
			//print_r($user);die();
		}catch(\Exception $e){
		}
		
		return view('forms.add-pages',['data'=>$data,'user'=>$user,'keys'=>$keys]);
		
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
			$user=WhiteLabelPage::find($id);
			
			$userArray=arrayFromObject($user,$input);
			if(isset($userArray['user_id'])){
				unset($userArray['user_id']);
			}
			

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
			$user=WhiteLabelPage::find($id);

			$user->delete();
			Session::flash('message','White label page deleted successfully.');
		}catch(\Exception $e){
			Session::flash('error','White label page not deleted.');
		}	
		return array('success'=>true);
		
	}

}
