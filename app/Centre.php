<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Centre extends Model 
{
    protected $fillable = [
        'centre_name',
        'location',
        'isAvailable'
    ];

    public function events()
    {
        $this->hasMany('App\Model\Events');
    }
}
