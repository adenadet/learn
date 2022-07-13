<?php

namespace App\Models\Coop;

use Illuminate\Database\Eloquent\Model;

class SavingType extends Structure {
    public function savings()
    {
        return $this->hasMany('App\Models\Saving', 'savings_type_id_foreign', 'type_id');
    }

    protected $primaryKey = 'id';
    protected $table = 'saving_types';
    protected $fillable = array('name', 'rate', 'lower_limit', 'upper_limit', 'compounding', 'duration', 'status');
}
