<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $table = "carros";

    protected $fillable = [
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
        'updated_at'	
    ];

}
