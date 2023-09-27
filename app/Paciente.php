<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    protected $fillable = [
        'nome_paciente',
        'telefone_paciente',
        'data_nascimento',
        'cpf_paciente',
        'celular_paciente',
        'email_paciente',
        'naturalidade_paciente',
        'nacionalidade_paciente',
        'contato_paciente_nome',
        'contato_paciente_telefone',
        'nome_pai',
        'nome_mae',
        'data_nascimento',
        'plano_saude',
    ];
}
