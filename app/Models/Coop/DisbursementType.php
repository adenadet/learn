<?php

namespace App\Models\Coop;

use Illuminate\Database\Eloquent\Model;

class DisbursementType extends Structure {
    protected $primaryKey = 'id';
    protected $table = 'disbursement_types';
    protected $fillable = array('name', 'payment_mode');
}
