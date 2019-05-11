<?php
namespace App\Http\Controllers\Painel;

use App\Http\Controllers\StandardController;
use App\Models\Curso;

class CursoController extends StandardController
{
    protected $model;
    protected $name     = 'cursos';
    protected $view     = 'painel.cursos';
    //protected $upload   = ['name', 'path' => 'instituicoes'];
    protected $route    = 'cursos';

    public function __construct(Curso $cursos)
    {
        $this->model = $cursos;

        //$this->middleware('can:instituicoes');
        //$this->middleware('can:users')            ;

      /*  $this->middleware('can:update_categoria')
            ->only(['edit', 'update']);*/
    }
}
