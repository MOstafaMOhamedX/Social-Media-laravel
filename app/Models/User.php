<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
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
        return $this->hasMany('App\Models\Post');
    }
    public function permissions()
    {
        return $this->belongsToMany('App\Models\Permission');
    }
    public function roles()
    {
        return $this->belongsToMany('App\Models\Role');
    }
    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }
    public function hasRole($array)
    {
        foreach((array) $array as $role_name){    
            foreach ($this->roles as $role) {
                if($role_name == $role->name){
                    return true;
                }
            }
        }
        return false;
    }
}
