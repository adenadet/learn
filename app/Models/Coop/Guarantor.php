<?php

namespace App\Models\Coop;

use Illuminate\Database\Eloquent\Model;

class Guarantor extends Structure {
    protected $primaryKey = 'id';
    protected $table = 'guarantors';
    protected $fillable = array('loan_id', 'guarantor_id', 'amount', 'status');

	public function user(){
    	return $this->belongsTo('App\Models\User', 'guarantor_id', 'id');
		}

	public function loan(){
    	return $this->belongsTo('App\Models\Loan', 'loan_id', 'id');
		}
	}