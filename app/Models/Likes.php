<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Likes extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_receita',
        'id_utilizador',

    ];

    public function rules(){
        return[
            'id_receita'=> 'required ',
            'id_utilizador'=> 'required '
        ];
    }

    public function utilizador(){
        return $this->belongsTo(Utilizador::class, 'id_utilizador', 'id');
    }

    public function receitas(){
        return $this->belongsTo(Receitas::class, 'id_receita', 'id');
    }
}
