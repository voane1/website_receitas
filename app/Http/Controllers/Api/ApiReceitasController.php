<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\MasterApiController;
use Illuminate\Http\Request;
use App\Models\Receitas;


class ApiReceitasController extends MasterApiController
{
    protected $model;
    protected $path = 'receitas';
    protected $upload = 'url_imagem_receita';

    private $request;


    public function __construct(Request $request, Receitas $receitas)
    {
        $this->model = $receitas;
        $this->request = $request;

    }


}
