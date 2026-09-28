<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Criterios de búsqueda') | Agenda con tu asistente virtual</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
        crossorigin="anonymous"
    >
    <link rel="stylesheet" href="{{ asset('css/criterios.css') }}">
</head>
<body>
    <nav class="navbar bg-white border-bottom">
        <div class="container d-flex flex-column flex-sm-row align-items-sm-center justify-content-between gap-2">
            <a class="navbar-brand mb-0" href="{{ route('criterios.index') }}">
                Agenda con tu asistente virtual
            </a>
            <div class="d-flex flex-wrap align-items-center gap-3">
                <a class="nav-link" href="{{ route('criterios.index') }}">Criterios de búsqueda</a>
                <a class="btn btn-primary" href="{{ route('criterios.create') }}">Nuevo criterio</a>
            </div>
        </div>
    </nav>

    <main class="container py-4">
        @if (session('success'))
            <div class="alert alert-success" role="status">{{ session('success') }}</div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <p class="fw-semibold mb-1">Revisa los datos ingresados:</p>
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')
    </main>

    <script src="{{ asset('js/criterios.js') }}" defer></script>
</body>
</html>
