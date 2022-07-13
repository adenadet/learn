<?php

namespace App\Models\Coop;

use Illuminate\Database\Eloquent\Model;

class LoanGuarantor extends Structure {
    protected $primaryKey = 'id';
    protected $table = 'loan_guarantors';
    protected $fillable = array('loan_id', 'guarantor_id', 'requester_id', 'amount', 'status', 'status_date');


    public function loan(){
    	return $this->belongsTo('App\Models\Loan', 'loan_id', 'id');
	}

	public function guarantor(){
    	return $this->belongsTo('App\Models\User', 'guarantor_id', 'id');
    }
    
    public function requested_by(){
    	return $this->belongsTo('App\Models\User', 'requester_id', 'id');
	}

}
