<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
	protected $table = 'country';
	protected $primaryKey='id';
	public $timestamps = false;
	
	public $fillable = ['city_name', 'city_code', 'state_id', 'status', 'created_at', 'updated_at', 'deleted_at'];
	
	//protected $hidden = [];
}
