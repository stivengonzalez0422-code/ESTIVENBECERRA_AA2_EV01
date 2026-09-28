@extends('layouts.app')

@section('title', 'Criterios de búsqueda')

@section('content')
    <div class="d-flex flex-column flex-sm-row align-items-sm-center justify-content-between gap-3 mb-4">
        <div>
            <h1 class="h2 mb-1">Criterios de búsqueda</h1>
            <p class="text-secondary mb-0">Consulta y administra los criterios registrados.</p>
        </div>
        <a class="btn btn-primary" href="{{ route('criterios.create') }}">Crear criterio</a>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body p-0">
            @if ($criteriosBusqueda->isEmpty())
                <p class="text-secondary text-center my-0 p-4">Aún no hay criterios de búsqueda registrados.</p>
            @else
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Usuario</th>
                                <th scope="col">Destino</th>
                                <th scope="col">Fechas</th>
                                <th scope="col">Precio máximo</th>
                                <th scope="col">Estado</th>
                                <th scope="col"><span class="visually-hidden">Acciones</span></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($criteriosBusqueda as $criterioBusqueda)
                                <tr>
                                    <td>{{ $criterioBusqueda->id_criterio }}</td>
                                    <td>{{ $criterioBusqueda->id_usuario }}</td>
                                    <td>{{ $criterioBusqueda->destino }}</td>
                                    <td>
                                        {{ $criterioBusqueda->fecha_inicio->format('Y-m-d') }}
                                        <span aria-hidden="true">–</span>
                                        {{ $criterioBusqueda->fecha_fin->format('Y-m-d') }}
                                    </td>
                                    <td>{{ number_format((float) $criterioBusqueda->precio_maximo, 2, ',', '.') }}</td>
                                    <td>
                                        @if ($criterioBusqueda->estado)
                                            <span class="badge text-bg-success">Activo</span>
                                        @else
                                            <span class="badge text-bg-secondary">Inactivo</span>
                                        @endif
                                    </td>
                                    <td class="text-nowrap">
                                        <a class="btn btn-sm btn-outline-primary" href="{{ route('criterios.show', $criterioBusqueda) }}">
                                            Ver
                                        </a>
                                        <a class="btn btn-sm btn-outline-secondary" href="{{ route('criterios.edit', $criterioBusqueda) }}">
                                            Editar
                                        </a>
                                        <form
                                            class="d-inline"
                                            action="{{ route('criterios.destroy', $criterioBusqueda) }}"
                                            method="post"
                                            data-confirm-delete
                                            data-confirm-message="¿Eliminar este criterio de búsqueda? Esta acción no se puede deshacer."
                                        >
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-outline-danger" type="submit">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
@endsection
