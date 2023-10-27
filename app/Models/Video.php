<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo('App\Models\User', 'photoable');
    }

    public function category(){
        return $this->belongsTo('App\Models\Category');
    }

    public function comments(){
        return $this->morphMany('App\Models\Comment', 'commentable');
    }
    
    public function tags(){
        return $this->morphToMany('App\Models\Tag', 'taggable');
    }
}
