<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Internacao extends Model
{
    protected $fillable = [
        'id_paciente',
        'id_setor',
        'id_leito',
        'id_estabelecimento',
        'data_internacao',
        'id_status',
    ];
}
