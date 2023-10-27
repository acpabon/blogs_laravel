<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Profile extends Model
{
    use HasFactory;

    public function user(){
        // $user = User::find($this->user_id);
        // return $user;

        return $this->belongsTo(User::class);
    }
}
