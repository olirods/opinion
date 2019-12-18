<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function user()

    {
        return $this->belongsTo('App\User');
    }

    public function comments()

    {
        return $this->hasMany('App\Comment');
    }

    public function categories()

    {
        return $this->belongsToMany('App\Category');
    }

}





