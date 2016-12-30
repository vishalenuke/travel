<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';
    protected $primaryKey='id';
    public $timestamps = false;
    
    public $fillable = ['first_name','password', 'last_name', 'email','image_url', 'role', 'phone', 'fax', 'address', 'city', 'state', 'country', 'zip_code', 'status', 'last_login_at', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
