<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    protected $guarded = [];

    public function post()
    {
        return $this->belongsTo('App\Post');
    }


    public function user()
    {
        return $this->belongsTo('App\Post');
    }    

    public function getUser($id)
    {   
        $user = User::find($id);
        return $user->name;
        // return "s";
        // return $this->user();
    }      

}
