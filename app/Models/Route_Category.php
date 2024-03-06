<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Route_Category extends Model
{
    use HasFactory;

    protected $guarded = [];

    //Relacion uno a muchos inversa
/*     public function route(){
        return $this->belongsTo(Route::class);
    } */

    //Relacion uno a muchos inversa
    public function routes(){
        return $this->hasMany(Route::class);
    }
}
