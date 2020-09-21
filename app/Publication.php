<?php

namespace App;

use App\Traits\HandlerImage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Publication extends Model
{
    use Notifiable, HandlerImage;
    
    public $guarded = [];

    public function imagenes()
    {
        return $this->hasMany(Image::class, 'publication_id');
    }
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    public function subsubcategory()
    {
        return $this->belongsTo(Subsubcategory::class);
    }
}
