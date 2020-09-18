<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','user_id', 'photo_video', 'document','description',
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function reportPost()
    {
        return $this->belongsTo('App\Model\Report', 'id','post_id');
    }
}
