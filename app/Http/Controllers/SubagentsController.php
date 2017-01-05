<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Request;
use Session;
use Validator;
//use Input;
use Illuminate\Support\Facades\Input;
use Redirect;
use View, Hash, Auth;
use App\Agency, App\User, App\Document, App\Address;

class SubagentsController extends Controller 
{
	public	$agent;
	
	public function __construct()
    {
		$this->agent ='';    	
    	
    	$method=$_SERVER['REQUEST_METHOD'];
    	if(!(Auth::check())){
    		Auth::logout();

    	}else{
    		$this->agent = Auth::user()->id;
    	}
    	
        
    }
	public function keys($search='')
	{
		return array("0"=>"first_name","1"=>"user_status","2"=>"agent_id","3"=>"created_at","image"=>"image_url","controller"=>"Subagents","search"=>$search);
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
			$data=User::where('users.parent_id','<>',null)->where('users.parent_id','=',$this->agent)->paginate(10);
			//$user=selectRaw('agency.id as id,users.status as user_status')->selectRaw('documents.*,users.*')->join('agency', 'users.id', '=', 'agency.user_id')->join('documents', 'agency.id', '=', 'documents.agent_id')->find(1);

		}catch(\Exception $e){

		}
		//,$elements=array()
		//dd($data);die();
		return view('agent',['data'=>$data,'user'=>$user,'keys'=>$keys]);
		
	}
	public function subAgents($id){
		// $data=array();
		// $user='';
		// $search='';
		// $keys=array();
		
		// try{
		// 	 $search=isset($_GET['value'])?$_GET['value']:'';
		// 	 $keys=self::keys($search);
		// 	$data=selectRaw('agency.id as id,users.status as user_status')->selectRaw('documents.*,users.*')->join('agency', 'users.id', '=', 'agency.user_id')->join('documents', 'agency.id', '=', 'documents.agent_id')->paginate(10);
		// 	$user=Agency::join('users', 'users.id', '=', 'agency.user_id')->join('documents', 'agency.id', '=', 'documents.agent_id')->leftjoin('address', 'users.id', '=', 'address.user_id')->find($id);
		// 	//print_r($user);die();
		// }catch(\Exception $e){
		// }
		
		 return view('tables.subagents',['data'=>$data,'user'=>$user,'keys'=>$keys]);
	}
	public function pendingApplications()
	{
		$data=array();
		$user='';
		$keys='';
		try{
			$search=isset($_GET['value'])?$_GET['value']:'';
			$keys=self::keys($search);
			$data=User::where('users.parent_id','<>',null)->where('users.agent_id','=',$this->sub_agent_id)->paginate(10);
			//$user=selectRaw('agency.id as id,users.status as user_status')->selectRaw('documents.*,users.*')->join('agency', 'users.id', '=', 'agency.user_id')->join('documents', 'agency.id', '=', 'documents.agent_id')->find(1);

		}catch(\Exception $e){

		}
		//,$elements=array()
		//print_r($data);die();
		return view('pending-applications',['data'=>$data,'user'=>$user,'keys'=>$keys,'pending'=>'pending']);
		
	}
	public function search(){
		$data=array();
		$user='';
		$keys='';
		try{
			$search=$_GET['value'];
			$keys=self::keys($search);
			$data=User::where('users.parent_id','<>',null)->where('users.parent_id','=',$this->agent)->paginate(10);
			//$user=selectRaw('agency.id as id,users.status as user_status')->selectRaw('documents.*,users.*')->join('agency', 'users.id', '=', 'agency.user_id')->join('documents', 'agency.id', '=', 'documents.agent_id')->find(1);

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
			$data=User::where('users.parent_id','<>',null)->where('users.parent_id','=',$this->agent)->paginate(10);
			

		}catch(\Exception $e){

		}
		
		//print_r($user);die();
		return view('user',['data'=>$data,'user'=>$user,'keys'=>$keys]);
		
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
		$login=Auth::user();
		try{
			//print_r("expression");die();
			$input = Request::all();

			$user=new User;
			
			$address=new Address;
			if($url=self::uploadImage($input))
				$input['image_url']=$url;
			$userArray=arrayFromObject($user,$input);
			
			$addressArray=arrayFromObject($address,$input);
			if($userArray['password'])
				$userArray['password'] = Hash::make($userArray['password']);

			if(isset($userArray['role']) && empty($userArray['role']))
				$userArray['role']="sub_agent";
			
				$userArray['status']=(!empty($login))?($login->role=="admin"?1:0):0;
	    	//user create here.








			$user=$user->create($userArray);
			
			
			
			$addressArray['user_id']=$user->id;
			$address=$address->create($addressArray);
			


			$user->save();
			
			$address->save();
			
			if($user->email &&(empty($login) || isset($input['send_email']) && $input['send_email']=="on") && verificationEmail( $user->email )){
				if(empty($login)){
					Session::flash('message', 'Verification link has been sent to your registered email. Please check your inbox and verify email.');
					//Session::flash('message','Agency register successfully.');
				}
				else
					Session::flash('message','Agency added successfully.');
			}else{
				Session::flash('error','Unable to send email.');
			}

			
			
		}catch(\Exception $e){
			if(empty($login))
				Session::flash('error','Agency not register.');
			else
				Session::flash('error','Agency not added.');
			//print_r($e->getMessage());die();
		}
		
		return Redirect::back();		
	}
public function verification($id)
	{
		if($id && $user=User::where(['email'=>base64_decode($id),'is_verified'=>0])->first()){
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
	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function approve($id)
	{
		$agency='';
		$user='';
		try{
			$agency=Agency::find($id);
			$user=User::find($agency->user_id);
			$user->status=$user->status?0:1;
			$user->save();
		}catch(\Exception $e){
			//Session::flash('error','Not approve.');
		}
		
		
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
			$data=User::where('users.parent_id','<>',null)->where('users.parent_id','=',$this->agent)->paginate(10);
			$user=User::selectRaw('users.id as agent_id,users.*,address.*')->leftjoin('address', 'users.id', '=', 'address.user_id')->find($id);
			//$user=Agency::join('users', 'users.id', '=', 'agency.user_id')->join('documents', 'agency.id', '=', 'documents.agent_id')->leftjoin('address', 'users.id', '=', 'address.user_id')->find($id);
			//print_r($user);die();
		}catch(\Exception $e){
		}
		
		return view('forms.user',['data'=>$data,'user'=>$user,'keys'=>$keys]);
		
	}
public function uploadImage($input,$user=''){
	$url='';
	if((!empty($user))&& $user->image_url){
		$url=$user->image_url;
	}
	if( isset($input['image']) && $input['image'] != null ){
								
		$file = array('image' => Input::file('image'));
		$rules = array('image' => 'required|mimes:png,jpg,jpeg,gif');
		$fileToBeUploaded = Input::file('image');				
		//Validate image
		$validator = Validator::make($file, $rules);

		//Store validated image
		if( !$validator->fails() && $fileToBeUploaded->isValid() ){				
			
			$url=implode('_',explode(' ',$fileToBeUploaded->getClientOriginalName()));
			$fileToBeUploaded->move('images',$url );
			if((!empty($user))&& $user->image_url && file_exists($already='images/'.$user->image_url)){
				unlink($already);		
			}								
		}	

	}
	return $url;
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
		$password='';
		try{
			$input = Request::all();
			//print_r($id);die();
			$search=$input['_search'];
			//print_r($search);die();
			$keys=self::keys($search);
			
			$user=User::find($id);
			
			$address=Address::where(['user_id'=>$id])->first();

			if(empty($address))
			{
				$address=new Address;
			}
			
			if($url=self::uploadImage($input,$user))
				$input['image_url']=$url;
//print_r($input['image_url']);die();
			$userArray=arrayFromObject($user,$input);
			
			if($userArray['password']){
				$password=$userArray['password'];
				$userArray['password'] = Hash::make($userArray['password']);
			}
			
			//print_r($document);die();
			if(isset($userArray['role']) && empty($userArray['role']))
				unset($userArray['role']);
			

			$addressArray=arrayFromObject($address,$input);

			
			
			$addressArray['user_id']=$id;

			if(!(isset($userArray['password']) and $userArray['password'])){
				$password='';
				unset($userArray['password']);
			}
			$userArray['status']=(Auth::user()->role=="admin")?1:0;
			
			$user1=$user->update($userArray)?true:$user->create($userArray);
			
			$address=$address->update($addressArray)?true:$address->create($addressArray);
			
			if($user->email && isset($input['send_email']) && $input['send_email']=="on" && user_Email( $user->email, $password,"Your profile details has been updated." )){
				if(empty($login)){
					Session::flash('message', 'Sub agent updated successfully.Email has been send to user.');
					//Session::flash('message','Agency register successfully.');
				}
				else
					Session::flash('message','Sub agent updated successfully.');
			}else{
				Session::flash('message','Sub agent updated successfully.');
			}
			//Session::flash('message','Agency updated successfully.');
		}catch(\Exception $e){
			//print_r($e->getMessage());die();
			Session::flash('error',$e->getMessage());

		}	
		//print_r($keys);die();
		//return redirect()->route('agency.index', ['keys' => $keys]);
		//return Redirect::to('/agency')->with('keys',$keys);//Redirect::back()->with('keys',$keys);
		return Redirect::to('/agency'.($search?'?value='.$search:''));
		
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
			$agency=Agency::find($id);
			$user=User::find($agency->user_id);
			$document=Document::where(['agent_id'=>$id])->first();
			$address=Address::where(['user_id'=>$agency->user_id])->first();

			$agency->delete();
			$user->delete();
			$document->delete();
			$address->delete();
			Session::flash('message','Agency deleted successfully.');
		}catch(\Exception $e){
			Session::flash('error',$e->getMessage());
			
		}	
		//return Redirect::back();
		
	}

}
