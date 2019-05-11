<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Requirement extends Model
{
    //protected $table = 'requirements';
    public $timestamps = false;


    protected $fillable = [
      'user_id',
      'curso_id',
      'instituicoe_id',
      'inicioprocesso',
      'previsaoprojeto',
      'previsaofinal',
      'description'
    ];

}
