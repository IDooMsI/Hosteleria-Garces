<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];

    public function category()
    {
        return $this->hasMany(Category::class, 'category_id');
    }

    public function subcategories()
    {
        return $this->hasMany(Subcategory::class, 'category_id');
    }

    public function subsubcategories()
    {
        return $this->hasMany(Subsubcategory::class, 'category_id');
    }
}
