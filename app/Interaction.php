<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Interaction extends Model
{
    protected $guarded = [];

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function institution()
    {
        return $this->belongsTo(Institution::class, 'institution_id');
    }
    public function deal()
    {
        return $this->hasOne('App\Deal');
    }
    public function schedules()
    {
        return $this->hasmany('App\Schedule');
    }
}
