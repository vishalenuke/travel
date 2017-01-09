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
use App\Application;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Password;
class AgencyController extends Controller {


	public function __construct()
    {
    	
    	$method=$_SERVER['REQUEST_METHOD'];
    	if(!(Auth::check() || $method=="POST")){
    		Auth::logout();

    	}
    	
        
    }
	public function keys($search='')
	{
		return array("0"=>"first_name","1"=>"user_status","2"=>"id","3"=>"created_at","image"=>"image_url","controller"=>"Agency","search"=>$search);
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if(!isAdmin()){
			return Redirect::to('subagents');
		}
		$data=array();
		$user='';
		$keys='';
		try{
			$search=isset($_GET['value'])?$_GET['value']:'';
			$keys=self::keys($search);
			$data=User::selectRaw('agency.id as id,users.status as user_status')->selectRaw('documents.*,users.*')->join('agency', 'users.id', '=', 'agency.user_id')->join('documents', 'agency.id', '=', 'documents.agent_id')->where('users.first_name','LIKE',"%{$search}%")->where('users.parent_id','=',null)->where('users.id','<>',Auth::user()->id)->paginate(10);
			//$user=selectRaw('agency.id as id,users.status as user_status')->selectRaw('documents.*,users.*')->join('agency', 'users.id', '=', 'agency.user_id')->join('documents', 'agency.id', '=', 'documents.agent_id')->find(1);

		}catch(\Exception $e){

		}
		//,$elements=array()
		//dd($data);die();
		return view('agent',['data'=>$data,'user'=>$user,'keys'=>$keys]);
		
	}
	public function subAgents($id){
		$data=array();
		$user='';
		$search='';
		$keys=array();
		
		try{
			 $search=isset($_GET['value'])?$_GET['value']:'';
			 $keys=self::keys($search);

			$data=User::selectRaw('users.id as id,users.status as user_status,users.*')->where('users.parent_id','<>',null)->where('users.parent_id','=',$id)->paginate(10);
			$user=Agency::join('users', 'users.id', '=', 'agency.user_id')->join('documents', 'agency.id', '=', 'documents.agent_id')->leftjoin('address', 'users.id', '=', 'address.user_id')->find($id);
			
		}catch(\Exception $e){
		}
		
		 return view('tables.sub-agents',['data'=>$data,'user'=>$user,'keys'=>$keys]);
	}
	public function pendingApplications()
	{
		$data=array();
		$user='';
		$keys='';
		try{
			$search=isset($_GET['value'])?$_GET['value']:'';
			$keys=self::keys($search);

			$data=Application::where(['status'=>0])->paginate(10);
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
			$data=User::selectRaw('agency.id as id,users.status as user_status')->selectRaw('documents.*,users.*')->join('agency', 'users.id', '=', 'agency.user_id')->join('documents', 'agency.id', '=', 'documents.agent_id')->where('users.parent_id','=',null)->where('users.first_name','LIKE',"%{$search}%")->where('users.id','<>',Auth::user()->id)->paginate(10);
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
			$data=User::selectRaw('agency.id as id,users.status as user_status')->selectRaw('documents.*,users.*')->join('agency', 'users.id', '=', 'agency.user_id')->join('documents', 'agency.id', '=', 'documents.agent_id')->where('users.parent_id','=',null)->where('users.id','<>',Auth::user()->id)->paginate(10);
			

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
			$agency=new Agency;
			$document=new Document;
			$address=new Address;
			if($url=self::uploadImage($input))
				$input['image_url']=$url;
			$userArray=arrayFromObject($user,$input);
			$agencyArray=arrayFromObject($agency,$input);
			$documentArray=arrayFromObject($document,$input);
			$addressArray=arrayFromObject($address,$input);
			if($userArray['password'])
				$userArray['password'] = Hash::make($userArray['password']);

			if(isset($userArray['role']) && empty($userArray['role']))
				$userArray['role']="agent";
			
				$userArray['status']=(!empty($login))?($login->role=="admin"?1:0):0;
	    	//user create here.








			$user=$user->create($userArray);
			$agencyArray['user_id']=$user->id;
			
			$agency=$agency->create($agencyArray);
			$documentArray['agent_id']=$agency->id;
			$document=$document->create($documentArray);
			$addressArray['user_id']=$user->id;
			$address=$address->create($addressArray);
			


			$user->save();
			$agency->save();
			$document->save();
			$address->save();
			
			if($user->email &&(empty($login) || isset($input['send_email']) && $input['send_email']=="on") && verificationEmail( $user->email )){
				if(empty($login)){
					Session::flash('message', 'Verification link has been sent to your registered email. Please check your inbox and verify email.');
					//Session::flash('message','Agency register successfully.');
				}
				else
					Session::flash('message','Agency added successfully.');
			}else{
				Session::flash('message','Agency added successfully.');
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
		$login=Auth::user();
		//$id='';
		try{
			$settings = Request::all();
			//return $id;die();
			// $agency=Agency::find($id);
			// $user=User::find($agency->user_id);
			// $user->status=$user->status?0:1;
			// $user->save();



			$input=Application::find($id);
			
			
			if(User::where(['email'=>$input->email])->count()){
				Session::flash('message','This email is already register for other user.');
			}elseif(!$input->status){
				$user=new User;
				$agency=new Agency;
				$document=new Document;
				$address=new Address;

				if($url=self::uploadImage($input))
					$input['image_url']=$url;
				$userArray=arrayFromObject($user,$input);

				$userArray=array_merge($userArray,$settings);
				//print_r($userArray);die();
				// if(isset($userArray['_token']))
				// 	unset($userArray['_token']);
				$agencyArray=arrayFromObject($agency,$input);

				$documentArray=arrayFromObject($document,$input);
				$addressArray=arrayFromObject($address,$input);
				if($userArray['password'])
					$userArray['password'] = Hash::make($userArray['password']);

				if(isset($userArray['role']) && empty($userArray['role']))
					$userArray['role']="agent";
				
					$userArray['status']=(!empty($login))?($login->role=="admin"?1:0):0;
		    	//user create here.








				$user=$user->create($userArray);
				$user->remember_token=$userArray['_token'];
                $user->save();
				$agencyArray['user_id']=$user->id;
				
				$agency=$agency->create($agencyArray);
				$documentArray['agent_id']=$agency->id;
				$document=$document->create($documentArray);
				$addressArray['user_id']=$user->id;
				$address=$address->create($addressArray);
				


				$user->save();
				$agency->save();
				$document->save();
				$address->save();
				$input->status=1;
				$input->save();
				if(self::postEmail($user->email))
					Session::flash('message','Email has been sent to the user.');
				else
					Session::flash('error','Email has not been sent to the user.');
			}else{
				Session::flash('message','Already approved.');
			}
				

		}catch(\Exception $e){
			Session::flash('error',$e->getMessage());
		}
			
	return Redirect::back();
		
	}
	public function postEmail($email)
   {
       
       $result=false;
            $user = User::where(['email'=>$email])->first();  
        
        //print_r($user);die();
     
        if(!empty($user)){
            if(!empty($user->email)){
                $response = Password::sendResetLink(['email'=>$email], function (Message $message) {
                    $message->subject($this->getEmailSubject());

                   });

                   switch ($response) {
                       case Password::RESET_LINK_SENT: 
                           $result=true;
                           break;
                       case Password::INVALID_USER: 
                            $result=true;
                           
                   }
            }
           
        }
        return $result;
   }
	public function block($id){
		$agency='';
		$user='';
		$login=Auth::user();
		//$id='';
		try{
			//$settings = Request::all();
			//return $id;die();
			
			$user=User::find($id);
			if((!empty($user))){

				$user->status=$user->status?0:1;
				$user->save();
				//return $user->status;
				$message=$user->status?"User has been enabled.":"User has been blocked.";
				Session::flash('message',$message);
			}else{
				Session::flash('error','User not found.');
			}
			
		}catch(\Exception $e){
			Session::flash('error',$e->getMessage());
		}

	}
	public function pendingShow($id)
	{
		$data=array();
		$user='';
		$search='';
		$keys=array();
		
		try{
			 $search=isset($_GET['value'])?$_GET['value']:'';
			 $keys=self::keys($search);
			//$data=User::selectRaw('agency.id as id,users.status as user_status')->selectRaw('documents.*,users.*')->join('agency', 'users.id', '=', 'agency.user_id')->join('documents', 'agency.id', '=', 'documents.agent_id')->where('users.parent_id','=',null)->paginate(10);
			$result=Application::find($id);
			$keysShow=self::keysShow();
			$user=arrayFromResult($keysShow,$result);
			
			//print_r($user)
			
		}catch(\Exception $e){
		}
		
		return view('profiles.pending-profile',['user'=>$user,'keys'=>$keys,'id'=>$id]);
		//return $id;
		
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
			 $search=isset($_GET['value'])?$_GET['value']:'';
			 $keys=self::keys($search);
			//$data=User::selectRaw('agency.id as id,users.status as user_status')->selectRaw('documents.*,users.*')->join('agency', 'users.id', '=', 'agency.user_id')->join('documents', 'agency.id', '=', 'documents.agent_id')->where('users.parent_id','=',null)->paginate(10);
			//$result=Application::find($id);
			 $result=User::selectRaw('users.status as user_status,users.*,agency.*,documents.*,address.*')->join('agency', 'users.id', '=', 'agency.user_id')->join('documents', 'agency.id', '=', 'documents.agent_id')->leftjoin('address', 'users.id', '=', 'address.user_id')->find($id);
			$keysShow=self::keysShow(['user_status'=>'user_status','plb_in'=>'plb_in','plb_out'=>'plb_out','commission_in'=>'commission_in','commission_out'=>'commission_out']);
			$user=arrayFromResult($keysShow,$result);
			//if(isset($user['user_status']) && isset($user['status']))
			//print_r($user)
			
		}catch(\Exception $e){
		}
		
		return view('profiles.agent-profile',['user'=>$user,'keys'=>$keys,'id'=>$id]);
		//return $id;
		
	}
public function keysShow($additional_values=''){
	$array=array('first_name', 'last_name', 'email', 'image_url', 'phone', 'address_line1', 'address_line2', 'city', 'state', 'country', 'zip_code', 'status', 'is_verified', 'company_name', 'company_pan','pan_copy_url', 'date_of_incorporation', 'company_type', 'past_experience', 'credit_limit', 'contact_person', 'iata_no', 'valid_from', 'valid_till', 'created_at', 'updated_at');
	if((!empty($additional_values)) && is_array($additional_values)){
		$array=array_merge($additional_values,$array);
	}
	return $array;

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
			$data=User::selectRaw('agency.id as id,users.status as user_status')->selectRaw('documents.*,users.*')->join('agency', 'users.id', '=', 'agency.user_id')->join('documents', 'agency.id', '=', 'documents.agent_id')->where('users.parent_id','=',null)->paginate(10);
			$user=User::join('agency', 'users.id', '=', 'agency.user_id')->join('documents', 'agency.id', '=', 'documents.agent_id')->leftjoin('address', 'users.id', '=', 'address.user_id')->find($id);
			
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
			
			$url=generateUrl($fileToBeUploaded);
			
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
			$agency=Agency::find($id);
			$user=User::find($agency->user_id);
			$document=Document::where(['agent_id'=>$id])->first();
			$address=Address::where(['user_id'=>$agency->user_id])->first();

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
			$agencyArray=arrayFromObject($agency,$input);
			//print_r($document);die();
			if(isset($userArray['role']) && empty($userArray['role']))
				unset($userArray['role']);
			$documentArray=arrayFromObject($document,$input);

			$addressArray=arrayFromObject($address,$input);

			$documentArray['agent_id']=$agency->id;
			$agencyArray['user_id']=$agency->user_id;
			$addressArray['user_id']=$agency->user_id;

			if(!(isset($userArray['password']) and $userArray['password'])){
				$password='';
				unset($userArray['password']);
			}
			$userArray['status']=(Auth::user()->role=="admin")?1:0;
			
			$user1=$user->update($userArray)?true:$user->create($userArray);
			$agency=$agency->update($agencyArray)?true:$agency->create($agencyArray);
			$document=$document->update($documentArray)?true:$document->create($documentArray);
			$address=$address->update($addressArray)?true:$address->create($addressArray);
			
			if($user->email && isset($input['send_email']) && $input['send_email']=="on" && user_Email( $user->email, $password,"Your profile details has been updated." )){
				if(empty($login)){
					Session::flash('message', 'Agency updated successfully.Email has been send to user.');
					//Session::flash('message','Agency register successfully.');
				}
				else
					Session::flash('message','Agency updated successfully.');
			}else{
				Session::flash('message','Agency updated successfully.');
			}
			//Session::flash('message','Agency updated successfully.');
		}catch(\Exception $e){
			//print_r($e->getMessage());die();
			Session::flash('error',$e->getMessage());

		}	
		
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
			$st=0;
			$user=User::find($id);
			$agency=Agency::where(['user_id'=>$id])->first();
			
			$address=Address::where(['user_id'=>$id])->first();
			$document='';
			$application='';
			if(!empty($user)){
				$application=Application::where(['email'=>$user->email])->first();
				$user->delete();
				$st=1;
			}else{
				$st=0;
			}
			if(!empty($application)){
				$application->delete();
			}
			if(!empty($agency)){
				$document=Document::where(['agent_id'=>$agency->id])->first();
				$agency->delete();
				$st=1;
			}else{
				$st=0;
			}
			if(!empty($document)){
				$document->delete();
				$st=1;
			}else{
				$st=0;
			}
			
			
			
			if(!empty($address)){
				$address->delete();
				$st=1;
			}else{
				$st=0;
			}
			if($st)
			Session::flash('message','Agent deleted successfully.');
			else
			Session::flash('error','Agent deleted successfully.');
		}catch(\Exception $e){
			Session::flash('error',$e->getMessage());
			
		}	
		return array('success'=>true);
		
	}

}
