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
        $this->HasOne('App/Model/User');
    }
}
