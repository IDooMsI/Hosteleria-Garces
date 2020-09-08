<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function SubSubcategory()
    {
        return $this->hasMany(Subsubcategory::class,'subcategory_id');
    }
    
}
