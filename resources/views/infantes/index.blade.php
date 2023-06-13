@extends('layouts.app')
@section('title')
    Infantes
@endsection
@section('content')
    <style>
        .custom-pagination {
            display: flex;
            justify-content: flex-end;
            align-items: center;
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

        .custom-pagination .pagination li.active a {
            background-color: #5B5188;
            color: #fff;
        }

        .custom-pagination .pagination li.disabled a {
            color: #aaa;
            pointer-events: none;
            cursor: not-allowed;
            border-color: #ddd;
        }

        .custom-pagination .pagination .page-range {
            margin-right: 10px;
        }
    </style>

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
                                    <tr>
                                        <th style="display: none">ID</th>
                                        <th style="color: #fff">Nombre</th>
                                        <th style="color: #fff">Apellido Paterno</th>
                                        <th style="color: #fff">Apellido Materno</th>
                                        <th style="color: #fff">Edad</th>
                                        <th style="color: #fff">Acciones</th>
                                    </tr>
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
                                                <a class="btn btn-primary" href="{{ route('evaluar', $infante->id) }}">Evaluar</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="custom-pagination">
                                <ul class="pagination">
                                    <li class="page-item {{ $infantes->currentPage() == 1 ? 'disabled' : '' }}">
                                        <a class="page-link" href="{{ $infantes->previousPageUrl() }}" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                    </li>
                                    <li class="page-item {{ $infantes->currentPage() == 1 ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $infantes->url(1) }}">1</a>
                                    </li>
                                    @if($infantes->currentPage() > 3)
                                        <li class="page-item disabled">
                                            <a class="page-link">...</a>
                                        </li>
                                    @endif
                                    @foreach(range($infantes->currentPage() - 2, $infantes->currentPage() + 2) as $page)
                                        @if($page > 1 && $page < $infantes->lastPage())
                                            <li class="page-item {{ $infantes->currentPage() == $page ? 'active' : '' }}">
                                                <a class="page-link" href="{{ $infantes->url($page) }}">{{ $page }}</a>
                                            </li>
                                        @endif
                                    @endforeach
                                    @if($infantes->currentPage() < $infantes->lastPage() - 2)
                                        <li class="page-item disabled">
                                            <a class="page-link">...</a>
                                        </li>
                                    @endif
                                    <li class="page-item {{ $infantes->currentPage() == $infantes->lastPage() ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $infantes->url($infantes->lastPage()) }}">{{ $infantes->lastPage() }}</a>
                                    </li>
                                    <li class="page-item {{ $infantes->currentPage() == $infantes->lastPage() ? 'disabled' : '' }}">
                                        <a class="page-link" href="{{ $infantes->nextPageUrl() }}" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </li>
                                    <li class="page-range">
                                        Página {{ $infantes->currentPage() }} de {{ $infantes->lastPage() }}
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

