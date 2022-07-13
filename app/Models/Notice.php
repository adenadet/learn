<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Structure;

class Notice extends Structure
{
    protected $primaryKey = 'id';
    protected $table = 'notices';
    protected $fillable = array('topic', 'content', 'user_id', 'start_date', 'end_date',  'created_at',  'updated_at','deleted_by', 'deleted_at');
	
    public function pictures(){
    	return $this->hasMany('App\Models\NoticePicture', 'notice_id', 'id');	
	}
	public function creator(){
		return $this->belongsTo('App\Models\User', 'user_id', 'id');
	}
	    
}
