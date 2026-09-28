@extends('layouts.app')

@section('title', 'Crear criterio')

@section('content')
    <h1 class="h2 mb-4">Crear criterio de búsqueda</h1>

    @include('criterios._form', [
        'action' => route('criterios.store'),
        'httpMethod' => 'POST',
        'criterioBusqueda' => null,
        'cancelUrl' => route('criterios.index'),
    ])
@endsection
