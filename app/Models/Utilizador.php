<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Receitas;

class Utilizador extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nome',
        'email',
        'password',
        'genero',
        'localizacao',

    ];

    public function rules(){
        return[
            'nome'=> 'required' ,
            'email'=> 'required',
            'password' => 'required',
            'genero'=> 'required',
            'localizacao'=> 'required'


        ];
    }

    public function receitas(){
        return $this->hasMany(Receitas::class, 'id_utilizador', 'id');

    }

    public function likes(){
        return $this->hasMany(Likes::class, 'id_utilizador', 'id');

    }

    public function comentarios(){
        return $this->hasMany(Comentarios::class, 'id_utilizador', 'id');

    }



}
