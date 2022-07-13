<?php

namespace App\Models\Network;

use App\Models\Structure;

class Check extends Structure {
    protected $primaryKey = 'id';
    protected $table = 'network_checks';
    protected $fillable = array('name', 'ip_address', 'description', 'last_active_time', 'last_check_time', 'created_by', 'created_at', 'updated_at', 'deleted_at', 'deleted_by', 'status');
    
    public function creator(){
    	return $this->belongsTo('App\Models\User', 'created_by', 'id'); 
	}

    public function deleted_by(){
    	return $this->belongsTo('App\Models\User', 'deleted_by', 'id'); 
	}
}