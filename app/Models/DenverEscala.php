<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class DenverEscala extends Model
{
    use HasFactory;
    protected $table = 'denverescala';
    protected $fillable = [
        'etiqueta',
        'abreviatura'
    ];
}
