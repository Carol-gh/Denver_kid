@extends('layouts.app')
@section('title')
    Evaluaciones
@endsection
@section('content')
    <style>
        .custom-pagination {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            margin-top: 20px;
        }

        .custom-pagination .pagination {
            margin: 0;
            padding: 0;
            list-style-type: none;
            display: flex;
            align-items: center;
        }

        .custom-pagination .pagination li {
            margin-right: 5px;
        }

        .custom-pagination .pagination li a {
            display: inline-block;
            padding: 6px 12px;
            color: #5B5188;
            border: 1px solid #5B5188;
            text-decoration: none;
            border-radius: 4px;
        }

        .custom-pagination .pagination li.disabled a {
            color: #aaa;
            pointer-events: none;
            cursor: not-allowed;
            border-color: #ddd;
        }

        .custom-pagination .pagination li.active a {
            background-color: #5B5188;
            color: #fff;
        }

        .custom-pagination .pagination .arrow {
            padding: 6px 10px;
            background-color: #5B5188;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 14px;
            cursor: pointer;
        }
    </style>

    <section class="section">
        <div class="section-header" style="display: flex; justify-content: space-between;">
            <h3 class="page__heading">Evaluaciones</h3>
            <div class="text-right">
                <a class="btn btn-primary" href="{{ route('evaluaciones.create') }}">Crear Evaluación</a>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-striped mt-2">
                                <thead style="background-color: #5B5188">
                                    <tr>
                                        <th style="display: none">ID</th>
                                        <th style="color: #fff">Estudiante</th>
                                        <th style="color: #fff">Fecha de Evaluación</th>
                                        <th style="color: #fff">Total</th>
                                        <th style="color: #fff">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($evaluaciones as $evaluacion)
                                        <tr>
                                            <td style="display: none">{{$evaluacion->id}}</td>
                                            <td>{{ $evaluacion->infante->nombre }} {{ $evaluacion->infante->apellidoPaterno }}</td>
                                            <td>{{ $evaluacion->fecha }}</td>
                                            <td>{{ $evaluacion->total }}</td>
                                            <td>
                                                <a class="btn btn-secondary" href="{{route('evaluaciones.show', $evaluacion->id)}}">Ver</a>
                                                @can('ver-rol')
                                                <a class="btn btn-success" href="{{route('evaluaciones.edit', $evaluacion->id)}}">Editar</a>
                                                {!! Form::open(['method' => 'DELETE', 'route' => ['evaluaciones.destroy', $evaluacion->id], 'style'=>'display:inline']) !!}
                                                    {!! Form::submit('Borrar', ['class'=>'btn btn-danger']) !!}
                                                {!! Form::close() !!}
                                                @endcan
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="custom-pagination">
                                <ul class="pagination">
                                    @if ($evaluaciones->onFirstPage())
                                        <li class="disabled"><a class="arrow" href="#">&laquo;</a></li>
                                    @else
                                        <li><a class="arrow" href="{{ $evaluaciones->previousPageUrl() }}">&laquo;</a></li>
                                    @endif

                                    @foreach ($evaluaciones->getUrlRange(1, $evaluaciones->lastPage()) as $page => $url)
                                        @if ($page == $evaluaciones->currentPage())
                                            <li class="active"><a href="{{ $url }}">{{ $page }}</a></li>
                                        @else
                                            <li><a href="{{ $url }}">{{ $page }}</a></li>
                                        @endif
                                    @endforeach

                                    @if ($evaluaciones->hasMorePages())
                                        <li><a class="arrow" href="{{ $evaluaciones->nextPageUrl() }}">&raquo;</a></li>
                                    @else
                                        <li class="disabled"><a class="arrow" href="#">&raquo;</a></li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
