<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubSubcategory extends Model
{
    protected $guarded = [];
    protected $table = 'subsubcategories';

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }
}
