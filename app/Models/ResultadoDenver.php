<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResultadoDenver extends Model
{
    use HasFactory;

    protected $table = 'resultadosdenver';
    protected $fillable = [
        'denverescalaId',
        'evaluacionId',
        'preguntaId',
        'areaId',

    ];

    public function evaluacion() {
        return $this->belongsTo(EvaluacionDenver::class, 'evaluacionId');
    }

    public function pregunta() {
        return $this->belongsTo(Pregunta::class, 'preguntaId');
    }
}
