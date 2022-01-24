<?php

namespace App\Http\Controllers;

use App\Models\Receitas;

use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;


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

        $receita = new Receitas();

        $this->validate($request, $receita->rules());

        //$teste = $request->all();
        //dd($teste);
        //$file_name = time().'.'.$request->file($this->upload)->getClientOriginalExtension();
        $receita->nome_receita = $request->input('nome_receita');

        $receita->pais = $request->input('pais');
        $receita->url_imagem_receita = $request->input('url_imagem_receita');
        $receita->ingredientes_receita = $request->input('ingredientes_receita') ;
        $receita->preparo_receita = $request->input('preparo_receita');
        $receita->url_video = $request->input('url_video');
        $receita->id_utilizador = $request->input('id_utilizador');
        $receita->tempo_preparo = $request->input('tempo_preparo');

        if ($request->hasFile('url_imagem_receita') && $request->file('url_imagem_receita')->isValid()) {
            $imagem_receita = $request->file('url_imagem_receita');
            $file_name = time() . '.' . $imagem_receita->getClientOriginalExtension();
            Image::make($imagem_receita)->resize(177, 236)->save(storage_path("app\\public\\imagens\\$file_name", 70));
            $receita->url_imagem_receita = $file_name;
        }
        $receita->save();

        return redirect('/inserirReceitas')->with('success', 'Receita Adicionada');

    }

    public function edit(Request $request,$id)
    {
        $receita = Receitas::find($id);

        return view('editReceitas', compact('receita'));
    }

    public function update(Request $request, $id){
        $receita = new Receitas();
        $this->validate($request, $receita->rules());

        $recipe = Receitas::findOrFail($id);
        $this->authorize('update', $recipe);
        $recipe->nome_receita = $request->input('nome_receita');
        $recipe->pais = $request->input('pais');
        $recipe->url_imagem_receita = $request->input('url_imagem_receita');
        $recipe->ingredientes_receita = $request->input('ingredientes_receita') ;
        $recipe->preparo_receita = $request->input('preparo_receita');
        $recipe->url_video = $request->input('url_video');
        $recipe->id_utilizador = $request->input('id_utilizador');
        $recipe->tempo_preparo = $request->input('tempo_preparo');

        if ($request->hasFile('url_imagem_receita') && $request->file('url_imagem_receita')->isValid()) {
            Storage::disk('public')->delete("\\imagens\\$recipe->url_imagem_receita");

            $file_name = time() . '.' . $request->file('url_imagem_receita')->getClientOriginalExtension();
            Image::make($recipe->url_imagem_receita)->resize(177, 236)->save(storage_path("app\\public\\imagens\\$file_name", 70));
        }
        $recipe->save();

            return redirect('/minhasReceitas')->with('success','Recipe has been updated successfully.');


    }

    public function destroy($id)
    {
        $recipe = Receitas::findOrFail($id);
        $recipe->delete();

        return redirect('/minhasReceitas')->with('status', 'Receita Excluída');

    }
}
