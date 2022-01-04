<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Utilizador;

class Receitas extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nome_receita',
        'pais',
        'url_imagem_receita',
        'ingredientes_receita',
        'preparo_receita',
        'url_video',
        'id_utilizador',
        'tempo_preparo',



    ];

    public function rules(){
        return[
            'nome_receita'=> 'required' ,
            'pais'=> 'required',
            'url_imagem_receita' => 'image',
            'ingredientes_receita'=> 'required',
            'preparo_receita'=> 'required',
            'url_video'=> 'required',
            'id_utilizador'=> 'required',
            'tempo_preparo'=> 'required'

        ];
    }

    public function utilizador(){
        return $this->belongsTo(Utilizador::class, 'id_utilizador', 'id');


    }
}
