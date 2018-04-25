<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Role extends Model 
{
    protected $fillable = [
       'name'
    ];

    public function user()
    {
        $this->hasMany('App/Model/User');
    }
}
