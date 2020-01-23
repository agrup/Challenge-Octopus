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
        return $this->hasMany('App\Like');
    }    

    public function user()
    {
        return $this->belongsTo('App\User');
    }


    public function addPublication($publication,$user_id)
    {
        $this->publications()->create(compact('publication','user_id'));

    }

    public function addLike($user_id)
    {
        
        $this->likes()->create(compact('user_id'));
        return $this;
        
    }    
    
    public function dellLike($user_id)
    {
        
        ($this->likes()->where('user_id',$user_id)->first())->delete();
        return $this;
    }

    public function publicationsUserName()
    {
        $publications = $this->publications;

        return $publications;
    }


}
