<?php

namespace App\Http\Controllers;

use App\Models\Infante;
use App\Models\Area;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
class InfanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $infantes = Infante::paginate(5);
        $areas = Area::all();
        return view('infantes.index', compact('infantes', 'areas')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usuario=User::all();
        return view('infantes.crear',compact('usuario'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required|string|max:50',
            'apellidoPaterno' => 'required|string|max:50',
            'apellidoMaterno' => 'required|string|max:50',
            'edad' => 'required',
            'sexo' => 'required',
            'fechaNacimiento' => 'required|date',
            'sala' => 'required',
            'nombreMadre' => 'required',
            'nombrePadre' => 'required',
            'telefonoEmergencia' => 'required',
            'email' => 'required|email|unique:users,email'

        ]);

        $user = new User();
        $user->name = $request->input('nombre');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('nombre'));
        $user->save();
        $user->assignRole('Padre');

        $infante= new Infante();
        $infante->nombre = $request->input('nombre');
        $infante->apellidoPaterno = $request->input('apellidoPaterno');
        $infante->apellidoMaterno = $request->input('apellidoMaterno');
        $infante->edad = $request->input('edad');
        $infante->sexo = $request->input('sexo');
        $infante->fechaNacimiento = $request->input('fechaNacimiento');
        $infante->sala = $request->input('sala');
        $infante->nombreMadre = $request->input('nombreMadre');
        $infante->nombrePadre = $request->input('nombrePadre');
        $infante->telefonoEmergencia = $request->input('telefonoEmergencia');
        $infante->userId = $user->id;
        $infante->save();

        return redirect()->route('infantes.index');
    }

    /**
     * Show the form for showing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $infante = Infante::find($id);

        return view('infantes.ver',compact('infante'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $infante = Infante::find($id);

        return view('infantes.editar',compact('infante'));
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
        $this->validate($request, [
            'nombre' => 'required|string|max:50',
            'apellidoPaterno' => 'required|string|max:50',
            'apellidoMaterno' => 'required|string|max:50',
            'edad' => 'required',
            'sexo' => 'required',
            'fechaNacimiento' => 'required|date',
            'sala' => 'required',
            'nombreMadre' => 'required',
            'nombrePadre' => 'required',
            'telefonoEmergencia' => 'required'
        ]);

        $input = $request->all();
        $infante = Infante::find($id);
        $infante->update($input);

        return redirect()->route('infantes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Infante::destroy($id);
        return redirect()->route('infantes.index');
    }

}
