<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DadosClinicos extends Model
{
    protected $fillable = [
        'id_dados_clinicos',
        'leucocitos',
        'pcr',
        'temperatura',
        'balanco_hidrico',
        'diurese',
        'observacao',
        'dieta',
        'medicamentos_em_uso',
        'plano_terapeutico',
        'id_internacao',
    ];
}
