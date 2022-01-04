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
}
