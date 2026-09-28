@extends('layouts.app')

@section('title', 'Editar criterio')

@section('content')
    <h1 class="h2 mb-4">Editar criterio #{{ $criterioBusqueda->id_criterio }}</h1>

    @include('criterios._form', [
        'action' => route('criterios.update', $criterioBusqueda),
        'httpMethod' => 'PUT',
        'cancelUrl' => route('criterios.show', $criterioBusqueda),
    ])
@endsection
