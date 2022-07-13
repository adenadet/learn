<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AllBank extends Structure {
    protected $primaryKey = 'id';
    protected $table = 'all_banks';
    protected $fillable = array('bank_name', 'status');
}
