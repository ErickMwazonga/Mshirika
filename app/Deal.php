<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deal extends Model
{
    protected $guarded = [];

    public function interaction()
    {
        return $this->belongsTo(Interaction::class, 'interaction_id');
    }
}
