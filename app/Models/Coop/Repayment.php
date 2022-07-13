<?php

namespace App\Models\Coop;

use Illuminate\Database\Eloquent\Model;

class Repayment  extends Structure {
    protected $primaryKey = 'id';
    protected $table = 'repayments';
    protected $fillable = array('user_id', 'loan_id', 'amount', 'status', 'logged_by', 'logged_date', 'confirmed_by', 'confirmed_date', 'payment_date', 'payment_channel', 'description', 'admin_id', 'bank_id');
    public function user(){
    	return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

	public function loan(){
    	return $this->belongsTo('App\Models\Loan', 'loan_id', 'id');
		}

	public function bank(){
    	return $this->belongsTo('App\Models\Saving', 'bank_id', 'id');
		}
}