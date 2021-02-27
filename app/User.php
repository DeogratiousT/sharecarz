<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role_id', 'phone_number', 'gender', 'car_model', 'car_plate_number', 'car_capacity', 'active_account','geopoint'
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
        'geopoint' => 'array',
    ];

    public function role()
    {
        return $this->belongsTo('App\Models\Role');
    }

    public function inRole(Array $roleSlugs)
    {
        return $this->role->hasRole($roleSlugs);
    }
}
