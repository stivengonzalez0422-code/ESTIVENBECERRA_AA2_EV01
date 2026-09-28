@extends('layouts.app')

@section('title', 'Detalle del criterio')

@section('content')
    <div class="d-flex flex-column flex-sm-row align-items-sm-center justify-content-between gap-3 mb-4">
        <div>
            <h1 class="h2 mb-1">Detalle del criterio</h1>
            <p class="text-secondary mb-0">Registro #{{ $criterioBusqueda->id_criterio }}</p>
        </div>
        <div class="d-flex flex-wrap gap-2">
            <a class="btn btn-outline-secondary" href="{{ route('criterios.index') }}">Volver al listado</a>
            <a class="btn btn-primary" href="{{ route('criterios.edit', $criterioBusqueda) }}">Editar</a>
            <form
                action="{{ route('criterios.destroy', $criterioBusqueda) }}"
                method="post"
                data-confirm-delete
                data-confirm-message="¿Eliminar este criterio de búsqueda? Esta acción no se puede deshacer."
            >
                @csrf
                @method('DELETE')
                <button class="btn btn-outline-danger" type="submit">Eliminar</button>
            </form>
        </div>
    </div>

    <div class="card border-0 shadow-sm">
        <dl class="row card-body mb-0">
            <dt class="col-sm-4">ID de usuario</dt>
            <dd class="col-sm-8">{{ $criterioBusqueda->id_usuario }}</dd>

            <dt class="col-sm-4">Destino</dt>
            <dd class="col-sm-8">{{ $criterioBusqueda->destino }}</dd>

            <dt class="col-sm-4">Fecha de inicio</dt>
            <dd class="col-sm-8">{{ $criterioBusqueda->fecha_inicio->format('Y-m-d') }}</dd>

            <dt class="col-sm-4">Fecha de fin</dt>
            <dd class="col-sm-8">{{ $criterioBusqueda->fecha_fin->format('Y-m-d') }}</dd>

            <dt class="col-sm-4">Precio máximo</dt>
            <dd class="col-sm-8">{{ number_format((float) $criterioBusqueda->precio_maximo, 2, ',', '.') }}</dd>

            <dt class="col-sm-4">Horario</dt>
            <dd class="col-sm-8">{{ $criterioBusqueda->horario ?: '—' }}</dd>

            <dt class="col-sm-4">Preferencias</dt>
            <dd class="col-sm-8">{{ $criterioBusqueda->preferencias ?: '—' }}</dd>

            <dt class="col-sm-4">Fecha de creación</dt>
            <dd class="col-sm-8">{{ $criterioBusqueda->fecha_creacion->format('Y-m-d H:i') }}</dd>

            <dt class="col-sm-4">Estado</dt>
            <dd class="col-sm-8">{{ $criterioBusqueda->estado ? 'Activo' : 'Inactivo' }}</dd>
        </dl>
    </div>
@endsection
