<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RideRequest extends Model
{
    protected $fillable = ['passanger_id','driver_id','destination'];

    protected $casts = [
        'geopoint' => 'array',
    ];

    public function passanger()
    {
        return $this->belongsTo('App\User','passanger_id');
    }

    public function driver()
    {
        return $this->belongsTo('App\User','driver_id');
    }
}
