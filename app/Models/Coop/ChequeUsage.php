<?php

namespace App\Models\Coop;

use Illuminate\Database\Eloquent\Model;

class ChequeUsage extends Structure {
    protected $primaryKey = 'id';
    protected $table = 'cheque_usages';
    protected $fillable = array('bank_id', 'number', 'usage', 'status', 'disbursement_id', 'specific');
}
