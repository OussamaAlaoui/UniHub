<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{protected function asJson($value){
    return json_encode($value, JSON_UNESCAPED_UNICODE);
}
    public $incrementing = false;
    protected $primaryKey = 'student_id';
    protected $fillable = [
        'student_id', 'user_id', 'class','guardian_email'
    ];
}
