<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Agency extends Model
{
	protected $table = 'agency';
	protected $primaryKey='id';
	public $timestamps = false;
	
	public $fillable = ['user_id','membership_type','membership_name','company_name','company_pan','pan_copy_url','date_of_incorporation','company_type','past_experience','credit_limit','contact_person','iata_no','created_at','updated_at','deleted_at'];
	
	//protected $hidden = [];
}
