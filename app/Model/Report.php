<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
      protected $fillable = [
        'user_id', 'post_id'
    ];

   
}
