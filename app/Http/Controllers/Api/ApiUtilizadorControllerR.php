<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\MasterApiController;
use App\Models\Utilizador;
use Illuminate\Http\Request;

class ApiUtilizadorControllerR extends MasterApiController
{

    protected $model;
    protected $path = 'user';
    protected $upload = 'url_imagem_receita';

    private $request;



    public function __construct(Request $request, Utilizador $user)
    {
        $this->model = $user;
        $this->request = $request;

    }


}
