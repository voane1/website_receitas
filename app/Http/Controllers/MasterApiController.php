<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Api\ApiReceitasController;
Use App\Http\Controllers\Api\ApiUtilizadorControllerR;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Intervention\Image\ImageManagerStatic as Image;
Use Illuminate\Support\Facades\Storage;


class MasterApiController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index(){//tras dados das tabelas

        $data=$this->model->all();
        return response()->json($data);
    }

    /**
     * Inserir dados na BD
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, $this->model->rules());
        $dataForm = $request->all();

        if ($request->hasFile($this->upload) && $request->file($this->upload)->isValid()) {
            $file_name = time().'.'.$request->file($this->upload)->getClientOriginalExtension();
            $upload = Image::make($dataForm['url_imagem_receita'])->resize(177, 236)->save(storage_path("app\\public\\imagens\\$file_name", 70));
            if (!$upload) {
                return response()->json(['erro' => 'Falha ao fazer upload'], 500);
            } else {
                $dataForm[$this->upload] = $file_name;
            }
        }
        $data = $this->model->create($dataForm);

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

        if (!$data = $this->model->find($id)){
            return response()->json(['erro'=>'Nada foi encontrado!'],400);
        }else{
            return response()->json($data);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */

    public function update(Request $request, $id)
    {
        if (!$data = $this->model->find($id))
            return response()->json(['erro'=>'Nada foi encontrado!'],400);

        $this->validate($request, $this->model->rules());

        $dataForm = $request->all();

        if ($request->hasFile($this->upload) && $request->file($this->upload)->isValid()) {
            if($data->url_imagem_receita){
                Storage::disk('public')->delete("\\imagens\\$data->url_imagem_receita");
            }

            $file_name = time().'.'.$request->file($this->upload)->getClientOriginalExtension();
            $upload = Image::make($dataForm[$this->upload])->resize(177, 236)->save(storage_path("app\\public\\imagens\\$file_name", 70));
            if (!$upload) {
                return response()->json(['erro' => 'Falha ao fazer upload'], 500);
            } else {
                $dataForm[$this->upload] = $file_name;
            }
        }
        $data->update($dataForm);

        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        if (!$data = $this->model->find($id))
            return response()->json(['erro'=>'Nada foi encontrado!'],400);
        if($data->url_imagem_receita){
            Storage::disk('public')->delete("\\imagens\\$data->url_imagem_receita");
        }
        $data->delete();
        return response()->json(['Success'=> 'Deletado com Sucesso']);
    }

}
