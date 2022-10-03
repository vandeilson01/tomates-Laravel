<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class PontosModel extends Model
{
    use HasFactory;

    public $table = 'scores';

    protected $fillable = [
        'id',	
        'keys',
        'pontos',
        'pontos2',
        'ip',
        'userid',
        'print',	
        'up_datetime',
        'del_datetime',
        'create_datetime',
    ];
}
