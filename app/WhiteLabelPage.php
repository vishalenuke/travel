<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class WhiteLabelPage extends Model
{
	protected $table = 'white_label_pages';
	protected $primaryKey='page_id';
	public $timestamps = true;
	
	public $fillable = ['user_id','title', 'code', 'description'];
	
	//protected $hidden = [];
}
