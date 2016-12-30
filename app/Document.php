<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
	protected $table = 'documents';
	protected $primaryKey='id';
	public $timestamps = false;
	
	public $fillable = ['agent_id', 'name_of_authority', 'document_name', 'document_no', 'valid_from', 'valid_till', 'status', 'created_at', 'updated_at', 'deleted_at'];
	
	//protected $hidden = [];
}
