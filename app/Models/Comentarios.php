<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentarios extends Model
{
    use HasFactory;
    protected $fillable = [

        'id_utilizador',
        'id_receita',
        'texto_comments',

    ];

    public function rules(){
        return[

            'id_utilizador'=> 'required ',
            'id_receita'=> 'required ',
            'texto_comments'=> 'required'

        ];
    }

    public function utilizador(){
        return $this->belongsTo(Utilizador::class, 'id_utilizador', 'id');

    }
    public function receitas (){
        return $this->belongsTo(Receitas::class, 'id_receita', 'id');

    }

}
