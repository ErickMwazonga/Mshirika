<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Laravel\Scout\Searchable;

class Institution extends Model
{
    // use Searchable;

    protected $guarded = [];

    // protected $table="datables_institutions";

    public function searchableAs()
    {
        return 'name';
    }


    public function creator()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function interactions()
    {
        return $this->hasMany(Interaction::class);
    }

    public function scopeSearch($query, $search){
      return $query->where('name', 'LIKE', "%$search%");
                    // ->orWhere('status', 'LIKE', "%$search%")
                    // ->orWhere('cname', 'LIKE', "%$search%")
                    // ->orWhere('phone', 'LIKE', "%$search%")
                    // ->orWhere('email', 'LIKE', "%$search%");
    }
}
