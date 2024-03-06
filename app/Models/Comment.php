<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $guarded = [];

    //Relacion uno a muchos inversa
    public function route(){
        return $this->belongsTo(Route::class);
    }
}
