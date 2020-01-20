<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $guarded = [];

    public function publications()
    {
        return $this->hasMany('App\Publication');
    }

    public function likes()
    {
        return $this->hasMany('App\Likes');
    }    

    public function author()
    {
        return $this->belongsTo('App\User');
    }
}
