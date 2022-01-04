<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\MasterApiController;
use App\Models\Comentarios;
use Illuminate\Http\Request;

class ApiComentariosController extends MasterApiController
{
    protected $model;
    protected $path = 'comentarios';
    protected $upload = 'url_imagem_receita';

    private $request;


    public function __construct(Request $request, Comentarios $comentarios)
    {
        $this->model = $comentarios;
        $this->request = $request;

    }
}
