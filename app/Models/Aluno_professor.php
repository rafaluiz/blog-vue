<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aluno_professor extends Model
{
  protected $table = 'alunos_professores';
    public $timestamps = false;


    protected $fillable = ['aluno_id', 'professor_id'];
    public function coments(){
    return $this->hasMany(Coment::class);
}

}
