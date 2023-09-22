<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Avaliacao extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'peso',
        'tipo_avaliacao',
        'disciplina_id',
        'matricula_id',
        'valor',
        'id_trimestre'
    ];
}
