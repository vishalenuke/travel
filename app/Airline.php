<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Airline extends Model
{
	protected $table = 'airlines';
	protected $primaryKey='id';
	public $timestamps = false;
	
	public $fillable = ['company_name','logo_url','country','mfd_by','mfd_on','description','status','created_at','updated_at','deleted_at'];
	
	//protected $hidden = [];
}
