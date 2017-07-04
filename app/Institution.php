<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Institution extends Model
{
    protected $guarded = [];

    public function creator()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function interactions()
    {
        return $this->hasMany(Interaction::class);
    }

    public function contactPersons()
    {
        return $this->hasMany(ContactPerson::class);
    }
}
