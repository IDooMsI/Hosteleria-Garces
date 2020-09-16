<?php

namespace App;

use App\Traits\HandlerImage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Publication extends Model
{
    use Notifiable, HandlerImage;
    
    public $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
