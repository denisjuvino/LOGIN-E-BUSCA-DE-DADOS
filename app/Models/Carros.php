<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carros extends Model
{
    protected $table = 'table_carros';

    protected $fillable = [
        'id',
        'user_id',
        'nome_veiculo',
        'link',
        'ano',
        'combustivel',
        'portas',
        'quilometragem',
        'cambio',
        'cor',
        'created_at',
        'updated_at',
    ];
}
