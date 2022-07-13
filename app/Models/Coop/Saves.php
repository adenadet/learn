<?php

namespace App\Models\Coop;

use Illuminate\Database\Eloquent\Model;

class Saves extends Structure {
    protected $primaryKey = 'id';
    protected $table = 'saves';
    protected $fillable = array('user_id', 'payment_channel', 'amount', 'status', 'logged_by', 'logged_date',  'confirmed_by', 'confirmed_date', 'payment_date', 'description', 'saving_id', 'bank_id', 'admin_id');

    public function user(){
    	return $this->belongsTo('App\Models\User', 'user_id', 'id');
		}

	public function savings(){
    	return $this->belongsTo('App\Models\Saving', 'saving_id', 'id');
		}
	}