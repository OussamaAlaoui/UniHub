<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class report extends Model
{
       protected $fillable = [
        'user_id','post_id',
    ];
}
