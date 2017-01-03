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
								//$swiftMessage = $m->getSwiftMessage();
								//$headers = $swiftMessage->getHeaders();
								//$headers->addTextHeader('Return-Path', 'mayank.pratap@enukesoftware.com');
					            $m->from('contact@travels.com', 'Travel Portal');

					            $m->to($email)->subject('Verfiy Your Email Account');
					            
				        	});
	}catch(\Exception $e){

	}
	

}
?>