@extends('layouts.app')
@section('title')
    Evaluaciones
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Información</h3>
        </div>
        <div class="section-body">
            <div class="card mb-3" style="max-width: 740px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="{{ asset('img/prefile2.jpg') }}" class="img-fluid rounded-start"  style="height:90%;">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <p class="card-text">
                                <div class="author">
                                    <p class="card-text ">
                                        <label for="nombre" class="col-form-label">Nombre del menor: </label>
                                        {{ $evaluacion->infante->nombre }} {{ $evaluacion->infante->apellidoPaterno }} {{ $evaluacion->infante->apellidoMaterno }} <br>
                                        <label for="edad" class="col-form-label">Edad: </label>
                                        {{ $evaluacion->edadMeses }} meses<br>
                                        <label for="fecha" class="col-form-label">Fecha de evaluación: </label>
                                        {{ $evaluacion->fecha }} <br>
                                        <label for="personal" class="col-form-label">Nombre del Evaluador: </label>
                                        {{ $evaluacion->personal->nombre }} <br>
                                        <label for="resultadoMG" class="col-form-label">Total Motricidad Gruesa: </label>
                                        @foreach ($result as $mg)
                                                <br>{{ $mg->id }}<br>
                                        @endforeach
                                        
                                        <label for="resultadoMG" class="col-form-label">Total Motricidad Fino Adaptativa: </label>
                                        @foreach ($MF as $mf)
                                                {{ $mf->pregunta }}
                                                 <br>{{$MF}}<br>
                                        @endforeach

                                        <label for="resultadoMG" class="col-form-label">Total Audición y Lenguaje: </label>
                                        @foreach ($AL as $al)
                                                {{ $al->pregunta}}
                                                 <br>{{$AL}}<br>
                                        @endforeach
                                        
                                        <label for="resultadoMG" class="col-form-label">Total Personal Social: </label>
                                        @foreach ($PS as $ps)
                                                {{ $ps->pregunta}}
                                                 <br>{{$PS}}<br>
                                        @endforeach
                                    </p>
                                </div>
                            </p>
                            <div class="d-grid gap-2 col-6 mx-auto">
                                <a href="{{ route('evaluaciones.index')}}" class="btn btn-primary">Volver</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
