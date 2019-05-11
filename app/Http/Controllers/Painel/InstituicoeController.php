<?php
namespace App\Http\Controllers\Painel;

use App\Http\Controllers\StandardController;
use App\Models\Instituicoe;

class InstituicoeController extends StandardController
{
    protected $model;
    protected $name     = 'Instituicoes';
    protected $view     = 'painel.instituicoes';
    //protected $upload   = ['name', 'path' => 'instituicoes'];
    protected $route    = 'instituicoes';

    public function __construct(Instituicoe $instituicoe)
    {
        $this->model = $instituicoe;

        //$this->middleware('can:instituicoes');
        //$this->middleware('can:users')            ;

      /*  $this->middleware('can:update_categoria')
            ->only(['edit', 'update']);*/
    }
}
