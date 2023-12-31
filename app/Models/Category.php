<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug'];

    public function posts(){
        return $this->hasMany('App\Models\Post');
    }

    public function videos(){
        return $this->hasMany('App\Models\Video');
    }
}
