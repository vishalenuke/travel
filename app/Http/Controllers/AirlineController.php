<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Request;
use Session;
use Validator;
use Illuminate\Support\Facades\Input;
use Redirect;
use View, Auth, App\Airline;
class AirlineController extends Controller {

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
		return array("0"=>"company_name","1"=>"status","2"=>"id","controller"=>"Airline","image"=>"logo_url","search"=>$search);
	}



	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$data=array();
		$user='';
		$keys='';
		try{
			$search=isset($_GET['value'])?$_GET['value']:'';
			$keys=self::keys($search);
			$data=Airline::where('company_name','LIKE',"%{$search}%")->paginate(10);
			//$user=User::join('agency', 'users.id', '=', 'agency.user_id')->join('documents', 'agency.id', '=', 'documents.agent_id')->find(1);

		}catch(\Exception $e){

		}
		//,$elements=array()
		//print_r($keys);die();
		return view('airline',['data'=>$data,'user'=>$user,'keys'=>$keys]);
		
	}
public function search(){
		$data=array();
		$user='';
		$keys='';
		try{
			$search=$_GET['value'];
			$keys=self::keys($search);
			$data=Airline::where('company_name','LIKE',"%{$search}%")->paginate(10);

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
			$data=Airline::paginate(10);
			

		}catch(\Exception $e){

		}
		
		//print_r($user);die();
		return view('flight',['data'=>$data,'user'=>$user,'keys'=>$keys]);
		
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
			$modal = new Airline;
			if($url=self::uploadImage($input))
				$input['logo_url']=$url;
			$modal=$modal->create($input);
			$modal->save();
			Session::flash('message','Airline added successfully.');
		}catch(\Exception $e){
			Session::flash('error','Airline not added.');
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
	public function show()
	{
	
		
		
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
			$user=Airline::find($id);
			//print_r($user);die();
		}catch(\Exception $e){
		}
		
		return view('forms.flight',['data'=>$data,'user'=>$user,'keys'=>$keys]);
		
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

			$modal = Airline::find($id);
			//print_r($id);die();
			if($url=self::uploadImage($input,$modal))
				$input['logo_url']=$url;

			$array=arrayFromObject($modal,$input);
			$modal=$modal->update($array)?true:$modal->create($array);	
			Session::flash('message','Airline updated successfully.');
		}catch(\Exception $e){
			Session::flash('error','Airline not updated.');
		}	
		return Redirect::to('/airline'.($search?'?value='.$search:''));
		
	}
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
		try{
			//$input = Request::all();			
			$modal = Airline::find($id);
			$modal->delete();
			Session::flash('message','Airline deleted successfully.');
		}catch(\Exception $e){
			Session::flash('error','Airline not deleted.');
		}	
		return Redirect::back();
		
	}

}
