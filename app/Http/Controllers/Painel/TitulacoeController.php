<?php
namespace App\Http\Controllers\Painel;

use App\Http\Controllers\StandardController;
use App\Models\Titulacoe;

class TitulacoeController extends StandardController
{
    protected $model;
    protected $name     = 'titulacoes';
    protected $view     = 'painel.titulacoes';
    //protected $upload   = ['name', 'path' => 'instituicoes'];
    protected $route    = 'titulacoes';

    public function __construct(Titulacoe $titulacoes)
    {
        $this->model = $titulacoes;

        //$this->middleware('can:instituicoes');
        //$this->middleware('can:users')            ;

      /*  $this->middleware('can:update_categoria')
            ->only(['edit', 'update']);*/
    }
}
