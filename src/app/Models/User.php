<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'status',
        'role',
        'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function courses()
    {
        return $this->hasMany('App\Models\Course\Course');
    }

    public function Modules()
    {
        return $this->hasMany('App\Models\Course\Module');
    }

    public function moduleContents()
    {
        return $this->hasMany('App\Models\Course\ModuleContent');
    }

    public function subscriptions()
    {
        return $this->belongsToMany('App\Models\Course\Course', 'subscriptions');
    }

    public function attendedClasses()
    {
        return $this->belongsToMany('App\Models\Course\ModuleContent', 'attended_classes');
    }

}
