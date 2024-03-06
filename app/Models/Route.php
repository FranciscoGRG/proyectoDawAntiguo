<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    use HasFactory;

    protected $guarded = [];

    //Relacion uno a muchos inversa
    public function user(){
        return $this->belongsTo(User::class);
    }

    //Relacion uno a muchos
    public function comments(){
        return $this->hasMany(Comment::class);
    }

    //Relacion uno a muchos
/*     public function categories(){
        return $this->hasMany(Route_Category::class);
    } */

    //Relacion uno a muchos inversa
    public function category(){
        return $this->belongsTo(Route_Category::class);
    }

    //Relacion uno a muchos polimorfica
    public function images(){
        return $this->morphMany(Image::class, 'imageable');
    }
}
