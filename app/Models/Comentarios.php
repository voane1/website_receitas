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

}
