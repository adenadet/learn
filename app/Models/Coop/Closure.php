<?php

namespace App\Models\Coop;

use Illuminate\Database\Eloquent\Model;

class Closure extends Structure {
    protected $primaryKey = 'id';
    protected $table = 'closures';
    protected $fillable = array('user_id', 'bank_id', 'amount', 'acct_name', 'acct_number', 'comment', 'request_date', 'saving_id', 'loan_id', 'finance_id', 'finance_date', 'admin_id', 'admin_date', 'status');


    public function admin(){
        return $this->belongsTo('App\Models\User', 'admin_id', 'id');
    }    

    public function bank(){
        return $this->belongsTo('App\Models\AllBank', 'bank_id', 'id');
    }

    public function bank_paid(){
        return $this->belongsTo('App\Models\AllBank', 'bank_id', 'id');
    }

    public function branch(){
        return $this->hasOneThrough('App\Models\Branch', 'App\Models\User', 'branch_id', 'user_id', 'id', 'id');
    }
    
    public function finance(){
        return $this->belongsTo('App\Models\User', 'finance_id', 'id');
    }

    public function saving_dtl(){
        return $this->belongsTo('App\Models\Saving', 'saving_id', 'id');
    }

    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }   
}