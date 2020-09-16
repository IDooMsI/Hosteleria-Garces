<?php

namespace App;
use App\Traits\HandlerImage;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Work extends Model
{
    use Notifiable, HandlerImage;

    public $guarded = [];

    public function client(){
        return $this->belongsTo(Client::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
