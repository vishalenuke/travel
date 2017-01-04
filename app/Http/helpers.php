<?php
function arrayFromObject($object,$input){
		$array=array();
		foreach ($object->fillable as $key => $value) {
      			$array[$value]=isset($input[$value])?$input[$value]:'';
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
function generateUrl($fileToBeUploaded){
	$url=implode('_',explode(' ',time().$fileToBeUploaded->getClientOriginalName()));
	$fileToBeUploaded->move('images',$url );
	return $url;
}
?>