<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactPerson extends Model
{
    protected $fillable = ['institution_id','name','phone','email','location'];
    protected $table = 'contact_people';

    public function institution()
    {
        return $this->belongsTo(Institution::class, 'institution_id');
    }
}
