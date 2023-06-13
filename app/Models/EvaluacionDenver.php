<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvaluacionDenver extends Model
{
    use HasFactory;

    protected $table = 'evaluaciondenver';
    protected $fillable = [
        'fecha',
        'edadMeses',
        'personalId',
        'infanteId',
    ];

    public function personal() {
        return $this->belongsTo(Personal::class, 'personalId');
    }

    public function infante() {
        return $this->belongsTo(Infante::class, 'infanteId');
    }

    public function resultados() {
        return $this->hasMany(ResultadoDenver::class, 'evaluacionId');
    }

    public function getAllTests($infanteId) {
        return $this->where('infanteId', $infanteId)->orderBy('id', 'DESC')->get();
    }
}
