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

    public function receitas($id){

        if (!$data = $this->model->with('receitas')->find($id)){
            return response()->json(['erro'=>'Nada foi encontrado!'],400);
        }else{
            return response()->json($data);
        }

    }

    public function likes($id){

        if (!$data = $this->model->with('likes')->find($id)){
            return response()->json(['erro'=>'Nada foi encontrado!'],400);
        }else{
            return response()->json($data);
        }

    }

    public function comentarios($id){

        if (!$data = $this->model->with('comentarios')->find($id)){
            return response()->json(['erro'=>'Nada foi encontrado!'],400);
        }else{
            return response()->json($data);
        }

    }


}
