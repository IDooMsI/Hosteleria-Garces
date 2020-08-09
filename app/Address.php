<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    public $guarded = [];

    public function locality()
    {
        return $this->belongsTo(Locality::class);
    }
}
