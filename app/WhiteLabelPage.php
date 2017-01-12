<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class WhiteLabelPage extends Model
{
	protected $table = 'white_label_pages';
	protected $primaryKey='page_id';
	public $timestamps = false;
	
	public $fillable = ['user_id','title', 'code', 'description'];
	
	//protected $hidden = [];
}
