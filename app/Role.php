<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
	protected $table = 'roles';
	protected $primaryKey='id';
	public $timestamps = false;
	
	public $fillable = ['role','description','status','created_at','updated_at','deleted_at'];
	
	//protected $hidden = [];
}
