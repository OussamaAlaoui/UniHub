<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Groupusers extends Model
{
    protected $fillable = ['group_id','user_id'];
    
}
