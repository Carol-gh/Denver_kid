<?php

namespace App\Http\Controllers;
use App\Models\Area;
use App\Models\DenverEscala;
use App\Models\Edad;
use App\Models\EvaluacionDenver;
use App\Models\Pregunta;
use App\Models\ResultadoDenver;
use App\Models\Infante;
use Illuminate\Http\Request;

class PreguntasController extends Controller
{
   public function getItem($id_area, $evaluacionId)
    { 
        $area=Area::findOrFail($id_area);
        $edades = Edad::all();
        $edad_id=0;
        $infante_edad=EvaluacionDenver::where('id', $evaluacionId)->pluck('edadMeses')->first();
        foreach ($edades as $edad) {
            if ($infante_edad >= $edad->rangoInicial && $infante_edad <= $edad-> rangoFinal){
                $edad_id = $edad->id;
                break;
            }
        }
        $preguntas = Pregunta::where('edadId', $edad_id)
        ->where('areaId', $area->id)
        ->get();

        /*create evaluar */

        $denverEscala=DenverEscala::all();
        return view('evaluaciones.evaluar', compact('preguntas', 'denverEscala', 'area','evaluacionId'));
    } 

    public function respuestas(Request $request, $evaluacionId)
    { 
        $preguntas = $request->except('_token');

        foreach ($preguntas as $pregunta => $respuesta) {
            if (substr($pregunta, 0, 9) === 'pregunta_') {
            $preguntaId = substr($pregunta, 9);
            $resultado = new ResultadoDenver();
            $resultado->denverescalaId = DenverEscala::where('etiqueta', $respuesta)->pluck('id')->first();
            $resultado->evaluacionId = $evaluacionId;
            $resultado->preguntaId = $preguntaId;
            $resultado->areaId = Pregunta::find($preguntaId)->area->id;
            $resultado->save();
            }
           

        }
        $areas=Area::all();
        $evaluaciondenver=EvaluacionDenver::findOrFail($evaluacionId);
        return view('evaluaciones.areas', compact('evaluaciondenver', 'areas'));
    } 

}
