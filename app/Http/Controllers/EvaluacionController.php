<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EvaluacionDenver;
use App\Models\Infante;
use App\Models\Personal;
use App\Models\Area;
use App\Models\ResultadoDenver;
use Carbon\Carbon;
use App\Models\Pregunta;

class EvaluacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $evaluaciones = EvaluacionDenver::paginate(5);
        $evaluaciones->load('infante');

        return view('evaluaciones.index', compact('evaluaciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $evaluacion = EvaluacionDenver::find($id);
        $evaluacion->load('personal');
        $evaluacion->load('infante');
        $result = ResultadoDenver::where('evaluacionId', $id)->where('denverescalaId', 1)->get();
        $MG = Pregunta::whereIn('id', $result->pluck('preguntaId'))
        ->where('areaId', 1)
        ->get();
        $MF = Pregunta::whereIn('id', $result->pluck('preguntaId'))
        ->where('areaId', 2)
        ->get();
        $AL =  Pregunta::whereIn('id', $result->pluck('preguntaId'))
        ->where('areaId', 3)
        ->get();
        $PS =  Pregunta::whereIn('id', $result->pluck('preguntaId'))
        ->where('areaId', 4)
        ->get();
    
        return view('evaluaciones.ver',compact('evaluacion', 'MG', 'MF', 'AL', 'PS'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function evaluar($id)
    {
        $infante = Infante::findOrFail($id);
        $evaluaciondenver = new EvaluacionDenver();
        $evaluaciondenver->fecha = Carbon::now();
        $evaluaciondenver->edadMeses = $infante->edad;
        $evaluaciondenver->personalId = Personal::where('userId', auth()->user()->id)->first()->id;
        $evaluaciondenver->infanteId = $id;
        $evaluaciondenver->save();
        $areas=Area::all();
        return view('evaluaciones.areas', compact('evaluaciondenver', 'areas'));
    }
}
