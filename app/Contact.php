<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'contactname', 'phonenumber', 'phonetype_id', 'email',
    ];

    public function getShortPhonenumberAttribute()
    {
        return substr($this->phonenumber, 0, 7).'...';
    }
}
