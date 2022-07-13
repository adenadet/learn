<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    protected $table = 'model_has_roles';
    protected $fillable = array('role_id', 'model_type', 'model_id');

    public function role(){
    	return $this->belongsTo('App\Models\Role', 'role_id', 'id');
	}
	
	public function user(){
    	return $this->belongsTo('App\Models\User', 'model_id', 'id');
	}
}