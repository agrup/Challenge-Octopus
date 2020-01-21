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

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function addPublication($publication,$user_id)
    {
        // $post=$this->id;
        $this->publications()->create(compact('publication','user_id'));

    }

    public function publicationsUserName()
    {
        $publications = $this->publications;
        
        // foreach ($Publications as $publication) {
            
        // }
        return $publications;
    }


}
