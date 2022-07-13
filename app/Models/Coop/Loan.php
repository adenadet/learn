<?php

namespace App\Models\Coop;

use Illuminate\Database\Eloquent\Model;

class Loan extends Structure {
    protected $primaryKey = 'id';
    protected $table = 'loans';
    protected $fillable = array('type_id', 'user_id', 'name', 'acct_name', 'acct_number', 'bank_id', 'amount', 'balance', 'duration', 'requested_date', 'requested_by', 'status', 'admin_id', 'admin_date', 'status_date', 'disbursement_date', 'guaranteed');

    public function type(){
    	return $this->belongsTo('App\Models\LoanType', 'type_id', 'id');
	}

	public function user(){
    	return $this->belongsTo('App\Models\User', 'user_id', 'id');
	}

    public function repayments(){
        return $this->hasMany('App\Models\Repayment', 'loan_id', 'id');
    }

    public function loan_guarantors(){
        return $this->hasMany('App\Models\LoanGuarantor', 'loan_id', 'id');
    }

    public function branch()
    {
        return $this->hasOneThrough('App\Models\Branch', 'App\Models\User', 'id', 'id', 'user_id', 'branch_id');
    }
    
    public function bank()
    {
        return $this->hasOneThrough('App\Models\Bank', 'App\Models\Repayment', 'id', 'id', 'repayment_id', 'bank_id');
    }

    public function payment_bank()
    {
        return $this->belongsTo('App\Models\AllBank', 'bank_id', 'id');
    }
}