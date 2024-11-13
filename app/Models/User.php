<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
// use App\Models\Device;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    // use SoftDeletes;

    protected $dates = ['deleted_at'];

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

    public function eventlog()
    {
        return $this->hasMany('App\Models\Eventlog');
    }

    public function devices()
    {
        return $this->hasMany('App\Models\Device');
    }

    public function parent()
    {
        return $this->hasOne('App\Models\User', 'parent_id', 'id');
    }

    public function children()
    {
        return $this->hasMany('App\Models\User', 'parent_id', 'id');
    }

    public function role()
    {
        return $this->belongsTo('App\Models\Role');
    }

    public function isAdministrator()
    {
        if ($this->role->name == 'admin') {
            return true;
        }
        return false;
    }

    public function isParent()
    {
        if ($this->role->name == 'parent') {
            return true;
        }
        return false;
    }

    public function isEngineer()
    {
        if ($this->role->name == 'engineer') {
            return true;
        }
        return false;
    }

    

    // public function setRoleIdAttribute($value)
    // {
    //     $user = User::all();
    //     if ($user->email = 'quantumxcontrol@gmail.com') {
    //         $this->attributes['role_id'] = "1";
    //     }
    // }
}
