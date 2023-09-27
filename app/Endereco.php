<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    protected $fillable = [
        'cep',
        'endereco',
        'numero',
        'cidade',
        'bairro',
        'pais',
        'complemento',
        'tipo_endereco',
        'id_paciente',
    ];
}
