<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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



}
