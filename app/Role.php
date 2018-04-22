<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Role extends Model 
{
    protected $fillable = [
        'isAdmin'
    ];

    public function user()
    {
        $this->belongsTo('App/Model/User');
    }
}
