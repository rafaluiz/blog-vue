<?php

namespace App\Models;
use App\User;

use Illuminate\Database\Eloquent\Model;

class Coment extends Model
{
    protected $fillable = ['post_id','user_id','title','body'];

     public function post(){
        return $this->belongsTo(Post::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
