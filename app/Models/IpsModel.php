<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IpsModel extends Model
{
    use HasFactory;

    public $table = 'ips';

    protected $fillable = [
        'id',	
        'user',
        'keyuser',
        'ip',	
        'date',
    ];
}
