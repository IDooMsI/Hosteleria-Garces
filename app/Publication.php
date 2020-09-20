<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    public $guarded = [];

    public function imagenes()
    {
        return $this->hasMany(Image::class, 'publication_id');
    }
}
