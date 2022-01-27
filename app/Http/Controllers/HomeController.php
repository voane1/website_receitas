<?php

namespace App\Http\Controllers;
use App\Models\Receitas;

use App\Models\Utilizador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function Sodium\add;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   /* public function __construct()
    {
        $this->middleware('auth');
    }
*/
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $receitas = Receitas::join('utilizadors', 'utilizadors.id', '=', 'receitas.id_utilizador')
                       ->get(['receitas.*', 'utilizadors.nome']);

        //dd($receitas);

        return view('welcome', compact('receitas'));
    }

    public function consulta(Request $request)   {

        $consulta = $request->get('nome_receita');

        $resultado = Receitas::where('nome_receita', 'like', '%'.$consulta.'%')->get();
       //dd($resultado);

        return view('/resultadoPesquisa',compact('resultado', 'consulta'));
    }
}
