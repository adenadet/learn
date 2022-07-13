<?php

namespace App\Models\Coop;

use Illuminate\Database\Eloquent\Model;

class SavingsAccount extends Structure {
    protected $primaryKey = 'id';
    protected $table = 'savings_accounts';
    protected $fillable = array('saving_id', 'user_id', 'amount', 'status', 'fixed');

	public function user(){
    	return $this->belongsTo('App\Models\User', 'user_id', 'id');
		}

	public function savings(){
    	return $this->belongsTo('App\Models\Saving', 'saving_id', 'id');
		}
	}