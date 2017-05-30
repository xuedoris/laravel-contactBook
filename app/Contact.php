<?php

namespace App;

use Carbon\Carbon;
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

    public static function getCollection($startTime = null, $endTime = null)
    {
        // no need to use the Threshold
        //Get data from the day before yesterday.
        $startTime = Carbon::create(2017, 2, 3, 0)->subDays(2);
        $endTime = Carbon::create(2017, 2, 3, 0)->subDays(1);

        $contacts = self::whereBetween('updated_at', [$startTime, $endTime])
                        ->orderBy('updated_at', 'DESC')
                        ->get();
        $filtered = $contacts->filter(function ($value, $key) {
            $emailField = json_decode($value->email, true);
            return is_array($emailField);
        });
        return $filtered;
    }

    public function groups()
    {
        return $this->belongsToMany('App\Group');
    }
}
