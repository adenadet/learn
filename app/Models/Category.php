<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Structure {
    protected $primaryKey = 'id';
    protected $table = 'categories';
    protected $fillable = array('name', 'description', 'status', 'pry_category_id', 'grouping');
}
