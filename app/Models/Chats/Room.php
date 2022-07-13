<?php

namespace App\Models\Chats;

use App\Models\Structure;

class Room extends Structure {
    protected $primaryKey = 'id';
    protected $table = 'chat_rooms';
    protected $fillable = array('room_type', 'name', 'created_by', 'deleted_by');

    public function members(){
        return $this->hasMany('App\Models\Chats\Member', 'room_id', 'id');
    }
    
    public function messages(){
        return $this->hasMany('App\Models\Chats\Message', 'room_id', 'id');
    }

    public function messages_last(){
        return $this->messages()->last();
    }

}

