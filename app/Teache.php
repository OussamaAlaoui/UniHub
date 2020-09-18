<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teache extends Model
{
    protected $fillable = [
        'prof_id','class_id','subject_id'
    ];
}
