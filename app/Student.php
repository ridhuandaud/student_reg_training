<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $casts = [
        'dob' => 'datetime',
    ];

    public function gender()
    {
        return $this->belongsTo('App\Gender');
    }

    public function religion()
    {
        return $this->belongsTo('App\Religion');
    }

    public function race()
    {
        return $this->belongsTo('App\Race');
    }

    public function getDobAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('d/m/Y');
    }
}
