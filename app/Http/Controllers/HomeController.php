<?php

namespace App\Http\Controllers;
use App\Models\Receitas;

use App\Models\Utilizador;
use Illuminate\Http\Request;

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
        $receitas = Receitas::get();
        $user = Utilizador::get();
        return view('welcome', compact('receitas', 'user'));
    }
}
