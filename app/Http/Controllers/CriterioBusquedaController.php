<?php

namespace App\Http\Controllers;

use App\Http\Requests\CriterioBusquedaRequest;
use App\Models\CriterioBusqueda;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CriterioBusquedaController extends Controller
{
    public function index(): View
    {
        $criteriosBusqueda = CriterioBusqueda::query()->get();

        return view('criterios.index', compact('criteriosBusqueda'));
    }

    public function create(): View
    {
        return view('criterios.create');
    }

    public function store(CriterioBusquedaRequest $request): RedirectResponse
    {
        $criterioBusqueda = CriterioBusqueda::query()->create($request->validated());

        return redirect()
            ->route('criterios.show', $criterioBusqueda)
            ->with('success', 'El criterio de búsqueda se creó correctamente.');
    }

    public function show(CriterioBusqueda $criterioBusqueda): View
    {
        return view('criterios.show', compact('criterioBusqueda'));
    }

    public function edit(CriterioBusqueda $criterioBusqueda): View
    {
        return view('criterios.edit', compact('criterioBusqueda'));
    }

    public function update(
        CriterioBusquedaRequest $request,
        CriterioBusqueda $criterioBusqueda
    ): RedirectResponse {
        $criterioBusqueda->update($request->validated());

        return redirect()
            ->route('criterios.show', $criterioBusqueda)
            ->with('success', 'El criterio de búsqueda se actualizó correctamente.');
    }

    public function destroy(CriterioBusqueda $criterioBusqueda): RedirectResponse
    {
        $criterioBusqueda->delete();

        return redirect()
            ->route('criterios.index')
            ->with('success', 'El criterio de búsqueda se eliminó correctamente.');
    }
}
