<?php

namespace App\Models\Coop;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contribution extends Structure {
    
    protected $primaryKey = 'id';
    protected $table = 'contributions';
    protected $fillable = array('user_id', 'bank_id',  'trans_type', 'payment_channel', 'amount', 'status', 'logged_by', 'logged_date',  'confirmed_by', 'confirmed_date', 'payment_date', 'description', 'saving_id', 'bank_id', 'admin_id');

    public function admin(){
        return $this->belongsTo('App\Models\User', 'admin_id', 'id');
        }
        
    public function user(){
    	return $this->belongsTo('App\Models\User', 'user_id', 'id');
		}

	public function savings(){
    	return $this->belongsTo('App\Models\Saving', 'saving_id', 'id');
		}

    public function bank(){
        return $this->belongsTo('App\Models\Bank', 'bank_id', 'id');
        }

    public function branch(){
        return $this->belongsTo('App\Models\Branch', 'branch_id', 'id');
        }

    public function confirm(){
        return $this->belongsTo('App\Models\User', 'confirmed_by', 'id');
        }
	}