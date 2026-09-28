<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CriterioBusquedaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, array<int, string>>
     */
    public function rules(): array
    {
        return [
            'id_usuario' => ['required', 'integer', 'exists:usuario,id_usuario'],
            'destino' => ['required', 'string', 'max:100'],
            'fecha_inicio' => ['required', 'date'],
            'fecha_fin' => ['required', 'date', 'after_or_equal:fecha_inicio'],
            'precio_maximo' => ['required', 'numeric', 'decimal:0,2', 'min:0', 'max:9999999999.99'],
            'horario' => ['nullable', 'string', 'max:100'],
            'preferencias' => ['nullable', 'string'],
            'estado' => ['sometimes', 'boolean'],
        ];
    }

    /**
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'id_usuario.required' => 'El usuario es obligatorio.',
            'id_usuario.integer' => 'El usuario debe ser un identificador válido.',
            'id_usuario.exists' => 'El usuario seleccionado no existe.',
            'destino.required' => 'El destino es obligatorio.',
            'destino.string' => 'El destino debe ser texto.',
            'destino.max' => 'El destino no puede superar los 100 caracteres.',
            'fecha_inicio.required' => 'La fecha de inicio es obligatoria.',
            'fecha_inicio.date' => 'La fecha de inicio no es válida.',
            'fecha_fin.required' => 'La fecha de fin es obligatoria.',
            'fecha_fin.date' => 'La fecha de fin no es válida.',
            'fecha_fin.after_or_equal' => 'La fecha de fin debe ser igual o posterior a la fecha de inicio.',
            'precio_maximo.required' => 'El precio máximo es obligatorio.',
            'precio_maximo.numeric' => 'El precio máximo debe ser numérico.',
            'precio_maximo.decimal' => 'El precio máximo puede tener hasta dos decimales.',
            'precio_maximo.min' => 'El precio máximo no puede ser negativo.',
            'precio_maximo.max' => 'El precio máximo excede el límite permitido por la base de datos.',
            'horario.string' => 'El horario debe ser texto.',
            'horario.max' => 'El horario no puede superar los 100 caracteres.',
            'preferencias.string' => 'Las preferencias deben ser texto.',
            'estado.boolean' => 'El estado debe ser activo o inactivo.',
        ];
    }
}
