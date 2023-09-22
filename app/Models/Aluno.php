<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Aluno extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'primeiro_nome',
        'nome_meio',
        'ultimo_nome',
        'data_nascimento',
        'genero',
        'nacionalidade',
        'endereco',
        'numero_telefone',
        'email',
        'numero_bi',
        'nome_responsavel',
        'nome_pai',
        'nome_mae',
        'contato_responsavel',
        'parentesco_responsavel',
        'escola_anterior',
        'certificados',
        'estado_civil',
        'naturalidade',
        'provincia',
        'deficiencia',
        'vc_foto',
    ];

    protected $dates = ['deleted_at'];
}
