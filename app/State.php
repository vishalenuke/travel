<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
	protected $table = 'state';
	protected $primaryKey='id';
	public $timestamps = false;
	
	public $fillable = ['state_name', 'country_id', 'status', 'created_at', 'updated_at', 'deleted_at'];
	
	//protected $hidden = [];
}
