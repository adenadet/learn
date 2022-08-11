<?php

namespace App\Models\EMR;

use Illuminate\Database\Eloquent\Model;
use App\Models\Structure;

class Service extends Structure
{
    protected $primaryKey = 'id';
    protected $table = 'emr_services';
    protected $fillable = array('name', 'price', 'status', 'created_by', 'created_at', 'updated_at', 'deleted_by', 'deleted_at');

    public function creator(){
    	return $this->belongsTo('App\Models\User', 'created_by', 'id');
	}

    public function deleter(){
        return $this->belongsTo('App\Models\User', 'deleted_by', 'id');
    }
}