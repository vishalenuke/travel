<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminSetting extends Model
{
	protected $table = 'admin_setting';
	protected $primaryKey='setting_id';
	public $timestamps = false;
	
	public $fillable = [  'admin_id', 'plb_in', 'plb_out', 'commission_in', 'commission_out'];
	
	//protected $hidden = [];
}
