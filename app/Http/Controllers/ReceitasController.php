<?php

namespace App\Http\Controllers;

use App\Models\Receitas;
use Illuminate\Http\Request;

class ReceitasController extends Controller
{
    public function index(Request $request)
    {
        $receitas = Receitas::get();
        return view('minhasReceitas', compact('receitas'));
    }
    public function create()
    {

        return view('inserirReceitas', );
    }

    public function store(Request $request){
        //excluir atributos $request->exception([nome_coluna, nome_coluna])
        //mostrar somente $request->only([nome_coluna, nome_coluna])
        $request->all();
        $receitas = Receitas::create([
            'nome_receita'=> $request->input('nome_receita'),
            'pais'=> $request->input('pais'),
            'url_imagem_receita' => $request->input('url_imagem_receita'),
            'ingredientes_receita'=> $request->input('ingredientes_receita'),
            'preparo_receita'=> $request->input('preparo_receita') ,
            'url_video'=> $request->input('url_video'),
            'id_utilizador'=> $request->input('id_utilizador'),
            'tempo_preparo'=> $request->input('tempo_preparo'),
        ]);

        return redirect('/inserirReceitas');

    }
}
