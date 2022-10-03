<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TomatesModel extends Model
{
    use HasFactory;

    public $table = 'tomates';

    protected $fillable = [
        'id',	
        'iduser',	
        'quantity',
        'time',
        'create_datetime',
    ];
}
