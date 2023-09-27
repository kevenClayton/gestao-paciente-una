<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estabelecimento extends Model
{
    protected $fillable = [
        'nome_estabelecimento',
        'id_tipo_estabelecimento',
    ];
}
