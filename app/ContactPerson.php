<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactPerson extends Model
{
    protected $guarded = [];

    public function institution()
    {
        return $this->belongsTo(Institution::class, 'institution_id');
    }
}
