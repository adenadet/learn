<?php

namespace App\Models\Coop;

use Illuminate\Database\Eloquent\Model;

class Withdrawal extends Structure {
    protected $primaryKey = 'id';
    protected $table = 'withdrawals';
    protected $fillable = array('user_id', 'saving_id', 'amount', 'user_comment', 'branch_id', 'requested_by', 'request_date', 'bh_id', 'bh_approval_date', 'bh_comment', 'admin_id', 'admin_approval_date', 'admin_comment', 'status', 'bank_id', 'acct_name', 'acct_number', 'admin_bank_id');


    public function admin(){
        return $this->belongsTo('App\Models\User', 'admin_id', 'id');
    }    

    public function bank_paid(){
        return $this->belongsTo('App\Models\AllBank', 'bank_id', 'id');
    }
    
    public function bank_paid_from(){
        return $this->belongsTo('App\Models\Bank', 'admin_bank_id', 'id');
    }

    public function branch_admin(){
        return $this->belongsTo('App\Models\User', 'bh_id', 'id');
    }

	public function branch()
    {
        return $this->hasOneThrough('App\Models\Branch', 'App\Models\User', 'branch_id', 'user_id', 'id', 'id');
    }
    
    public function finance(){
        return $this->belongsTo('App\Models\User', 'admin_id', 'id');
    }

    public function savings(){
        return $this->belongsTo('App\Models\Saving', 'saving_id', 'id');
    }

    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }
    
}

