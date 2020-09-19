<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    protected $fillable=["user_id","subject_id","posttype_id","text","image"];
}
