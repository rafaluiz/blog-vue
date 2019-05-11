<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class profile_user extends Model
{
    protected $table = 'profile_user';
    public $timestamps = false;


    protected $fillable = ['user_id', 'profile_id'];

}
