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

    public function utilizador($id){

        if (!$data = $this->model->with('utilizador')->find($id)){
            return response()->json(['erro'=>'Nada foi encontrado!'],400);
        }else{
            return response()->json($data);
        }

    }
    public function receitas($id){

        if (!$data = $this->model->with('receitas')->find($id)){
            return response()->json(['erro'=>'Nada foi encontrado!'],400);
        }else{
            return response()->json($data);
        }

    }
}
