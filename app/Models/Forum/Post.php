<?php

namespace App\Models\Forum;

use App\Models\Structure;

class Post extends Structure {
    protected $primaryKey = 'id';
    protected $table = 'posts';
    protected $fillable = array('name', 'description', 'status');
    public function sub_categories(){
    	return $this->hasMany('App\Models\Lms\SubCategory', 'category_id', 'id'); 
		}
	}