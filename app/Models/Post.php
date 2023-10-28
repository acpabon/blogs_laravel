<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Photo;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'extract', 'description', 'status', 'category_id', 'user_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function category(){
        return $this->belongsTo('App\Models\Category');
    }

    public function photo(){
        return $this->morphOne(Photo::class, 'photoable');
    }

    public function comments(){
        return $this->morphMany('App\Models\Comment', 'commentable');
    }

    public function tags(){
        return $this->morphToMany('App\Models\Tag', 'taggable');
    }
}
