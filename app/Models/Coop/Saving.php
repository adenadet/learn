<?php
namespace App\Models\Coop;

use Illuminate\Database\Eloquent\Model;



class Saving extends Structure {

    protected $primaryKey = 'id';

    protected $table = 'savings';

    protected $fillable = array('type_id', 'user_id', 'balance', 'fixed', 'requested_date', 'requested_by', 'status', 'status_date', 'target', 'name', 'unconfirmed');



    public function type(){

    return $this->belongsTo('App\Models\SavingType', 'type_id', 'id');

	}



	public function user(){

        return $this->belongsTo('App\Models\User', 'user_id', 'id');

	}



    public function contributions(){

        return $this->hasMany('App\Models\Contribution', 'saving_id', 'id');

    }



	public function branch()

    {

        return $this->hasOneThrough('App\Models\Branch', 'App\Models\User', 'id', 'id', 'user_id', 'branch_id');

    }

    

    public function unconfirmedSum(){

    return $this->hasMany('App\Models\Payment', 'ref_id', 'id');

    }

}