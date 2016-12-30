<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
	protected $table = 'country';
	protected $primaryKey='id';
	public $timestamps = false;
	
	public $fillable = ['country_name', 'country_code', 'status', 'created_at', 'updated_at', 'deleted_at'];
	
	//protected $hidden = [];
}
