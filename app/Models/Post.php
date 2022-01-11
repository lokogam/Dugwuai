<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Post extends Model
{
    use HasFactory;

    //relacion de uno amuchos inversa
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    //reacion de muchos a muchos 
    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

    //realñcion uno a uno polmorfica 
    public function image(){
        return $this->morphOne(Image::class, 'imageable');
    }
}
