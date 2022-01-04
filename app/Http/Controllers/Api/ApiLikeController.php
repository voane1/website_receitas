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
}
