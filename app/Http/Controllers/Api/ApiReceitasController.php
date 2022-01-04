<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use http\Env\Response;
use Illuminate\Http\Request;
use App\Models\Receitas;
use Intervention\Image\ImageManagerStatic as Image;
Use Illuminate\Support\Facades\Storage;

class ApiReceitasController extends Controller
{
    private $request;
    private $receitas;

    /**
     * @param $request
     * @param $receitas
     */
    public function __construct(Request $request, Receitas $receitas)
    {
        $this->request = $request;
        $this->receitas = $receitas;
    }

    public function index(){//tras dados das tabelas
        $data=$this->receitas->all();
        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Inserir dados na BD
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, $this->receitas->rules());
        $dataForm = $request->all();

      if ($request->hasFile('url_imagem_receita') && $request->file('url_imagem_receita')->isValid()) {
            $file_name = time().'.'.$request->file('url_imagem_receita')->getClientOriginalExtension();
            $upload = Image::make($dataForm['url_imagem_receita'])->resize(177, 236)->save(storage_path("app\\public\\imagens\\$file_name", 70));
            if (!$upload) {
                return response()->json(['erro' => 'Falha ao fazer upload'], 500);
            } else {
                $dataForm['url_imagem_receita'] = $file_name;
            }
        }
        $data = $this->receitas->create($dataForm);

        return response()->json($data, 400);
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {

       if (!$data = $this->receitas->find($id)){
           return response()->json(['erro'=>'Nada foi encontrado!'],400);
       }else{
           return response()->json($data);
       }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        if (!$data = $this->receitas->find($id))
            return response()->json(['erro'=>'Nada foi encontrado!'],400);
        if($data->url_imagem_receita){
            Storage::disk('public')->delete("\\imagens\\$data->url_imagem_receita");
        }

        $data->delete();
        return response()->json(['Success'=> 'Deletado com Sucesso']);
    }
}
