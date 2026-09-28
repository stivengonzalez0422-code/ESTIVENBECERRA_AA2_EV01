<form class="card border-0 shadow-sm" action="{{ $action }}" method="post">
    @csrf
    @if ($httpMethod !== 'POST')
        @method($httpMethod)
    @endif

    <div class="card-body">
        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label" for="id_usuario">ID de usuario</label>
                <input
                    class="form-control @error('id_usuario') is-invalid @enderror"
                    type="number"
                    id="id_usuario"
                    name="id_usuario"
                    min="1"
                    value="{{ old('id_usuario', $criterioBusqueda?->id_usuario) }}"
                    required
                >
                @error('id_usuario')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6">
                <label class="form-label" for="destino">Destino</label>
                <input
                    class="form-control @error('destino') is-invalid @enderror"
                    type="text"
                    id="destino"
                    name="destino"
                    maxlength="100"
                    value="{{ old('destino', $criterioBusqueda?->destino) }}"
                    required
                >
                @error('destino')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6">
                <label class="form-label" for="fecha_inicio">Fecha de inicio</label>
                <input
                    class="form-control @error('fecha_inicio') is-invalid @enderror"
                    type="date"
                    id="fecha_inicio"
                    name="fecha_inicio"
                    value="{{ old('fecha_inicio', $criterioBusqueda?->fecha_inicio?->format('Y-m-d')) }}"
                    required
                >
                @error('fecha_inicio')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6">
                <label class="form-label" for="fecha_fin">Fecha de fin</label>
                <input
                    class="form-control @error('fecha_fin') is-invalid @enderror"
                    type="date"
                    id="fecha_fin"
                    name="fecha_fin"
                    value="{{ old('fecha_fin', $criterioBusqueda?->fecha_fin?->format('Y-m-d')) }}"
                    required
                >
                @error('fecha_fin')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6">
                <label class="form-label" for="precio_maximo">Precio máximo</label>
                <input
                    class="form-control @error('precio_maximo') is-invalid @enderror"
                    type="number"
                    id="precio_maximo"
                    name="precio_maximo"
                    min="0"
                    max="9999999999.99"
                    step="0.01"
                    value="{{ old('precio_maximo', $criterioBusqueda?->precio_maximo) }}"
                    required
                >
                @error('precio_maximo')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6">
                <label class="form-label" for="horario">Horario</label>
                <input
                    class="form-control @error('horario') is-invalid @enderror"
                    type="text"
                    id="horario"
                    name="horario"
                    maxlength="100"
                    value="{{ old('horario', $criterioBusqueda?->horario) }}"
                >
                @error('horario')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-12">
                <label class="form-label" for="preferencias">Preferencias</label>
                <textarea
                    class="form-control @error('preferencias') is-invalid @enderror"
                    id="preferencias"
                    name="preferencias"
                    rows="4"
                >{{ old('preferencias', $criterioBusqueda?->preferencias) }}</textarea>
                @error('preferencias')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-12">
                <input type="hidden" name="estado" value="0">
                <div class="form-check">
                    <input
                        class="form-check-input @error('estado') is-invalid @enderror"
                        type="checkbox"
                        id="estado"
                        name="estado"
                        value="1"
                        @checked(old('estado', $criterioBusqueda?->estado ?? true))
                    >
                    <label class="form-check-label" for="estado">Activo</label>
                    @error('estado')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
    </div>

    <div class="card-footer bg-white d-flex flex-wrap gap-2">
        <button class="btn btn-primary" type="submit">
            {{ $httpMethod === 'POST' ? 'Guardar criterio' : 'Guardar cambios' }}
        </button>
        <a class="btn btn-outline-secondary" href="{{ $cancelUrl }}">Cancelar</a>
    </div>
</form>
