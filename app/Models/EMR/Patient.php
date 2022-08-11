<?php

namespace App\Models\EMR;

use Illuminate\Database\Eloquent\Model;
use App\Models\Structure;

class Patient extends Structure
{
    protected $primaryKey = 'id';
    protected $table = 'emr_patients';
    protected $fillable = array('id', 'last_name', 'first_name', 'other_name', 'image', 'nationality_id', 'passport_no', 'sex', 'phone', 'dob', 'email', 'unique_id', 'password', 'created_by', 'created_at', 'updated_at', 'deleted_by', 'deleted_at');

    public function creator(){
    	return $this->belongsTo('App\Models\User', 'created_by', 'id');
	}

    public function deleter(){
        return $this->belongsTo('App\Models\User', 'deleted_by', 'id');
    }
        
    public function nationality(){
        return $this->belongsTo('App\Models\Nation', 'nationality_id', 'id');
    }
}