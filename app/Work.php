<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    public $guarded = [];

    public function client(){
        return $this->belongsTo(Client::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
