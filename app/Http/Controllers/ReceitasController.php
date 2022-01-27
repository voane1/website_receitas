<?php

namespace App\Http\Controllers;

use App\Models\Receitas;

use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
      /*  $receita = new Receitas();
        $this->validate($request, $receita->rules());*/

      /*  $data=$request->all();
        dd($data);*/

        $recipe = Receitas::findOrFail($id);
        $recipe->nome_receita = $request->input('nome_receita');
        $recipe->pais = $request->input('pais');
        $recipe->url_imagem_receita = $request->input('url_imagem_receita');
        $recipe->ingredientes_receita = $request->input('ingredientes_receita') ;
        $recipe->preparo_receita = $request->input('preparo_receita');
        $recipe->url_video = $request->input('url_video');
        //$recipe->id_utilizador = $request->input('id_utilizador');
        $recipe->tempo_preparo = $request->input('tempo_preparo');

        if ($request->hasFile('url_imagem_receita') && $request->file('url_imagem_receita')->isValid()) {

            $destino =storage_path("app\\public\\imagens\\$recipe->url_imagem_receita", 70);
            if(File::exists($destino)){
                File::delete($destino);
            }
            $imagem_receita = $request->file('url_imagem_receita');
            $file_name = time() . '.' . $imagem_receita->getClientOriginalExtension();
            Image::make($imagem_receita)->resize(177, 236)->save(storage_path("app\\public\\imagens\\$file_name", 70));
            $recipe->url_imagem_receita = $file_name;
        }
        $recipe->update();

            return redirect('/minhasReceitas')->with('success','Recipe has been updated successfully.');


    }

    public function destroy($id)
    {
        $recipe = Receitas::findOrFail($id);
        $recipe->delete();

        return redirect('/minhasReceitas')->with('status', 'Receita Excluída');

    }

   /* public function consulta(Request $request){
        $consulta = $request->get('nome_receita');
        $resultado = Receitas::where('nome_receita', 'like', '%'.$consulta.'%')->get();

        return view('/resultadoPesquisa',compact('resultado'));

    }*/

    public function item(Request $request, $id){

        $receita = Receitas::findOrFail($id);
        //dd($receita);


        return view('/itemPesquisa', compact('receita'));
    }
}
