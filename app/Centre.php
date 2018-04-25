<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Centre extends Model 
{
    protected $fillable = [
        'name',
        'location',
        'isAvailable',
        'capacity',
        'facilities'
    ];

    public function events()
    {
        $this->hasMany('App\Model\Events');
    }
}
