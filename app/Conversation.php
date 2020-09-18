<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    protected $fillable = [
        'message', 'group_id', 'user_id','is_read'
    ];
}
