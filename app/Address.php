<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
	protected $table = 'address';
	protected $primaryKey='id';
	public $timestamps = false;
	
	public $fillable = [ 'user_id', 'address', 'country', 'state', 'city', 'pin', 'status', 'created_at', 'updated_at', 'deleted_at'];
	
	//protected $hidden = [];
}
