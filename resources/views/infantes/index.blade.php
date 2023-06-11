@extends('layouts.app')
@section('title')
    Infantes
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Infantes</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @can('crear-infante')
                                <a class="btn btn-warning" href="{{ route('infantes.create') }}">Nuevo</a>
                            @endcan
                            <table class="table table-striped mt-2">
                                <thead style="background-color: #5B5188">
                                    <th style="display: none">ID</th>
                                    <th style="color: #fff">Nombre</th>
                                    <th style="color: #fff">Apellido Paterno</th>
                                    <th style="color: #fff">Apellido Materno</th>
                                    <th style="color: #fff">Edad</th>
                                    <th style="color: #fff">Acciones</th>
                                </thead>
                                <tbody>
                                    @foreach ($infantes as $infante)
                                        <tr>
                                            <td style="display: none">{{ $infante->id }}</td>
                                            <td>{{ $infante->nombre }}</td>
                                            <td>{{ $infante->apellidoPaterno }}</td>
                                            <td>{{ $infante->apellidoMaterno }}</td>
                                            <td>{{ $infante->edad }}</td>
                                            <td>
                                                @can('ver-infante')
                                                    <a class="btn btn-secondary"
                                                        href="{{ route('infantes.show', $infante->id) }}">Ver</a>
                                                @endcan
                                                @can('editar-infante')
                                                    <a class="btn btn-success"
                                                        href="{{ route('infantes.edit', $infante->id) }}">Editar</a>
                                                @endcan
                                                @can('borrar-infante')
                                                    {!! Form::open([
                                                        'method' => 'DELETE',
                                                        'route' => ['infantes.destroy', $infante->id],
                                                        'style' => 'display:inline',
                                                    ]) !!}
                                                    {!! Form::submit('Borrar', ['class' => 'btn btn-danger']) !!}
                                                    {!! Form::close() !!}
                                                @endcan
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#evaluarModal{{ $infante->id }}">Evaluar</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="pagination justify-content-end">
                                {!! $infantes->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@foreach ($infantes as $infante)
    <!-- Formulario modal para evaluar -->
    <div class="modal fade" id="evaluarModal{{ $infante->id }}" tabindex="-1" role="dialog" aria-labelledby="evaluarModalLabel{{ $infante->id }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                   <h5 class="modal-title" id="evaluarModalLabel{{ $infante->id }}" style="font-size: 24px; color: #333; font-weight: bold;">Evaluar Infante {{ $infante->nombre }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {!! Form::open(['route' => ['evaluar', $infante->id]]) !!}
                    <div class="form-group">
                        <label>Opciones de evaluación:</label><br>
                        <div class="row">
                           @foreach ($areas as $area)
                                <div class="col-md-6 mb-3" onclick="selectCard(this)">
                                    <a href="{{ route('evaluar', ['id' => $area->id]) }}">
                                        <div class="card card-selectable bg-primary">
                                            <img src="{{ asset('img/' . $area->id . '.jpg') }}" class="card-img-top img-fluid" alt="Imagen 1" style="height: 200px; object-fit: cover;">
                                            <div class="card-body text-white">
                                                <p class="card-text" style="font-size: 24px; font-family: 'Arial', sans-serif;">{{ $area->nombre}}</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endforeach
@endsection
