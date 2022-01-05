<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\MasterApiController;
use App\Models\Likes;
use Illuminate\Http\Request;

class ApiLikeController extends MasterApiController
{
    protected $model;
    protected $path = 'like';
    protected $upload = 'url_imagem_receita';

    private $request;


    public function __construct(Request $request, Likes $likes)
    {
        $this->model = $likes;
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
