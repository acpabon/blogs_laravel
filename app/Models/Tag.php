<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'color'];

    // public function taggables(){
    //     return $this->belongsTo('App\Models\Taggable');
    // }

    // Función inversa muchos a muchos
    public function posts(){
        return $this->morphedByMany('App\Models\Post', 'taggable');
    }

    // Función inversa muchos a muchos
    public function videos(){
        return $this->morphedByMany('App\Models\Video', 'taggable');
    }
}
