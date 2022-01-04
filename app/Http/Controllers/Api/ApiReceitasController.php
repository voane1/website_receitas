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

    public function utilizador($id){

        if (!$data = $this->model->with('utilizador')->find($id)){
            return response()->json(['erro'=>'Nada foi encontrado!'],400);
        }else{
            return response()->json($data);
        }

    }


}
