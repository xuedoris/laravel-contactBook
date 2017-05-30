<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    public function contacts()
    {
        return $this->belongsToMany('App\Contact');
    }

    public function getRouteKeyName()
    {
        return 'groupname';
    }
}
