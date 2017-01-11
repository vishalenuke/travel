<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;
use Illuminate\Support\Facades\Input;
class RejectedApplication extends Model
{
	protected $table = 'rejected_applications';
	protected $primaryKey='id';
	public $timestamps = false;
	
	public $fillable = [  'first_name', 'last_name', 'email', 'image_url', 'phone', 'address_line1', 'address_line2', 'city', 'state', 'country', 'zip_code', 'status', 'is_verified', 'company_name', 'company_pan','pan_copy_url', 'date_of_incorporation', 'company_type', 'past_experience', 'credit_limit', 'contact_person', 'iata_no', 'name_of_authority', 'document_name', 'document_no', 'valid_from', 'valid_till', 'created_at', 'updated_at', 'deleted_at'];

	protected $hidden = [
        'id','remember_token',
    ];

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

	public function uploadPAN($input,$user=''){
		$url='';
		if((!empty($user))&& $user->pan_copy_url){
			$url=$user->pan_copy_url;
		}
		if( isset($input['pan_image']) && $input['pan_image'] != null ){
									
			$file = array('image' => Input::file('pan_image'));
			$rules = array('image' => 'required|mimes:png,jpg,jpeg,gif');
			$fileToBeUploaded = Input::file('pan_image');				
			//Validate image
			$validator = Validator::make($file, $rules);

			//Store validated image
			if( !$validator->fails() && $fileToBeUploaded->isValid() ){				
				
				$url=generateUrl($fileToBeUploaded);
				
				if((!empty($user))&& $user->pan_copy_url && file_exists($already='images/'.$user->pan_copy_url)){
					unlink($already);		
				}								
			}	

		}
		return $url;
	}
	
	//protected $hidden = [];
}
