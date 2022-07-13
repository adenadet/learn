<?php

namespace App\Models\Coop;

use Illuminate\Database\Eloquent\Model;

class LoanType extends Structure {
    protected $primaryKey = 'id';
    protected $table = 'loan_types';
    protected $fillable = array('name', 'rate', 'lower_limit', 'upper_limit', 'compounding', 'duration', 'guarantor', 'percentage', 'status');
	}