<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    protected $guarded = [];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts()
    {
        return $this->hasmany('App\Post','user_id');
    }

    public function likes()
    {
        return $this->hasmany('App\Like','user_id');
    }

    public function publish(Post $post)
    {
        $this->posts()->save($post);

    }
    public function publications()
    {
        return $this->hasmany('App\Publication','user_comment_id');
    }

    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }

    public function hasRole($roleName)
    {
        $role = Role::where('name',$roleName)->get()->first();
        if ($this->roles()->get()->contains($role)){
            return True;
        }else{
            return False;
        }
        
    }

    public function hasAnyRole($roles){
        if(is_array($roles)){
            foreach ($roles as $role){
                if($this->hasRole($role)){
                    return true;
                }
            }
        } else {
            if($this->hasRole($roles)){
                return true;
            }
        }
        return false;
    }

    public function isAdmin()
    {
        $roleName = 'AdminRole';
        
        $role = Role::where('name',$roleName)->get()->first();
        if ($this->roles()->get()->contains($role)){
            return True;
        }else{
            return False;
        }
        
    }

}
