<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Requirements_professore extends Model
{
    //protected $table = 'requirements';
    public $timestamps = false;


    protected $fillable = ['user_id','titulacoe_id','graduacoes','posgraduacoes','mestrado','doutorado','posdoutorado','description'];

}
