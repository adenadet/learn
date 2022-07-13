<?php

namespace App\Models\Chats;

use App\Models\Structure;

class Message extends Structure {
    protected $primaryKey = 'id';
    protected $table = 'chat_messages';
    protected $fillable = array('room_id', 'content', 'user_id', 'deleted_by');

    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }
}
