<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'id_usuario',
    'destino',
    'fecha_inicio',
    'fecha_fin',
    'precio_maximo',
    'horario',
    'preferencias',
    'estado',
])]
class CriterioBusqueda extends Model
{
    protected $table = 'criterio_busqueda';

    protected $primaryKey = 'id_criterio';

    public $timestamps = false;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'id_usuario' => 'integer',
            'fecha_inicio' => 'date',
            'fecha_fin' => 'date',
            'precio_maximo' => 'decimal:2',
            'fecha_creacion' => 'datetime',
            'estado' => 'boolean',
        ];
    }
}
