<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Leito extends Model
{
    protected $fillable = [
        'id_leito',
        'id_setor',
        'nome_leito',
    ];
}
