<?php
function arrayFromObject($object,$input){
		$array=array();
		foreach ($object->fillable as $key => $value) {
      			$array[$value]=isset($input[$value])?$input[$value]:'';
  		}
  		return $array;
	}
	function arrayFromResult($object,$input){
		$array=array();
		$countries=countries();
		$states=states();
		$cities=cities();
		foreach ($object as $key => $value) {
			if($value=='contact_person'){
	  			$array["owner's_name"]=isset($input[$value])?$input[$value]:'';
	  			
	  		}elseif($value=='is_verified'){
	  			$array['verification_status']=isset($input[$value]) && $input[$value]?"verified":"not verified";
	  			
	  		}elseif($value=='pan_copy_url'){
	  			$array['pan_card_copy']="<a href='".url('images/'.$input['pan_copy_url'])."' target='_blank'>Pan Card</a>";
	  			
	  		}elseif($value=='image_url'){
	  			$array['photo']="<a href='".url('images/'.$input['image_url'])."' target='_blank'>Photo</a>";
	  			
	  		}else
      			$array[$value]=isset($input[$value])?$input[$value]:'';
  		}
  		
  		if(isset($array['country']))
  		$array['country']=$countries[$array['country']];
  		if(isset($array['state']))
  		$array['state']=$states[$array['state']];
  		if(isset($array['city']))
  		$array['city']=$cities[$array['city']];
  		if(isset($array['user_status'])){
  			$array['status']=$array['user_status']?"Approved":"Blocked";
  		}elseif(isset($array['status'])){
  			$array['status']=$array['status']?"Approved":"Not Approve";
  		}
  		
  		
  			 


  		return $array;
	}
	function imageUrl($value='',$keys=''){
		$url=url('/img/list_user_icon.png');
		if(!(empty($value) && empty($keys))){
			if(isset($keys['image']) && isset($value[$keys['image']]) && !empty($value[$keys['image']]))
				$url=url('/images/'.$value[$keys['image']]);
		}
		return $url;
	}
	function headerImageUrl($url=''){
		$url=empty($url)?url('/img/list_user_icon.png'):url('/images/'.$url);
		return $url;
	}
	function isAdmin($user=''){
		$user=Auth::user();
		return $user && isset($user->role) and ($user->role=="admin")?true:false;

	}
	function hasPermission(){
		$user=Auth::user();
		return $user && isset($user->status) and ($user->status==1)?true:false;

	}
	function verificationEmail( $email ){
	try{
		if( !empty($email))
		return Mail::send('emails.verification', ['email'=>$email,'token'=> base64_encode($email)], function ($m) use($email)   {
								
					            $m->from('contact@travels.com', 'Travel Portal');

					            $m->to($email)->subject('Verfiy Your Email Account');
					            
				        	});
	}catch(\Exception $e){

	}
	

}
function user_Email( $email,$password='',$message='Your account is created with following details.' ){

	try{
		if( !empty($email))
		return Mail::send('emails.notification', ['email'=>$email,'password'=>$password,'token'=> base64_encode($email),'details'=>$message], function ($m) use($email)   {
								
					            $m->from('contact@travels.com', 'Travel Portal');

					            $m->to($email)->subject('Verfiy Your Email Account');
					            
				        	});
	}catch(\Exception $e){

	}
	

}
function countries(){
	return array('1' =>'India' ,'2'=>'China','3'=>'Other' );
}
function states(){
	return array('1' =>'Delhi','2'=>'Haryana' ,'3'=>'Madhya Pradesh','4' =>'Uttar Pradesh','5'=>'Other' );
}
function cities(){
	return array('1' =>'Delhi' ,'2'=>'Gurgaon','3'=>'Other' );
}
function years(){
	return array('1' =>'1' ,'2'=>'2','3'=>'3','4'=>'4','5'=>'5','6'=>'6','7'=>'7','8'=>'8','9'=>'9','10'=>'10','11'=>'More' );
}
function generateUrl($fileToBeUploaded){
	$url=implode('_',explode(' ',time().$fileToBeUploaded->getClientOriginalName()));
	$fileToBeUploaded->move('images',$url );
	return $url;
}
?>