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
        'user_id', 'contactname', 'phonenumber', 'phonetype_id', 'email', 'bday'
    ];

    /*
    By default, created_at column is a Carbon instance. To add another column to be Carbon instance, a date mutator needs to be as follow
    */
    protected $dates = [
        'bday',
    ];

    public function getShortPhonenumberAttribute()
    {
        return substr($this->phonenumber, 0, 7).'...';
    }

    public function scopeFilter($query, $filters)
    {
        $query->where('contactname', 'LIKE', $filters.'%')
            ->orWhere('phonenumber', 'LIKE', $filters.'%');
    }
}
