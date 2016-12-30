<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class WhiteLabel extends Model
{
	protected $table = 'white_label';
	protected $primaryKey='id';
	public $timestamps = false;
	
	public $fillable = ['user_id', 'domain', 'description', 'site_name', 'mobile', 'file_url', 'email', 'facebook_url', 'instagram_url', 'twitter_url', 'google_plus_url', 'status', 'created_at', 'updated_at', 'deleted_at'];
	
	//protected $hidden = [];
}
