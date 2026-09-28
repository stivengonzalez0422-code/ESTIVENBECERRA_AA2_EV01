<?php

namespace Tests\Feature;

use App\Models\CriterioBusqueda;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class CriterioBusquedaTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_displays_an_empty_state(): void
    {
        $this->get(route('criterios.index'))
            ->assertOk()
            ->assertSee('Aún no hay criterios de búsqueda registrados.');
    }

    public function test_store_persists_a_criterion_and_redirects_to_its_detail(): void
    {
        $userId = $this->createUser();

        $response = $this->post(route('criterios.store'), $this->validCriterionData($userId));

        $criterion = CriterioBusqueda::query()->firstOrFail();

        $response->assertRedirect(route('criterios.show', $criterion));
        $response->assertSessionHas('success', 'El criterio de búsqueda se creó correctamente.');
        $this->assertDatabaseHas('criterio_busqueda', [
            'id_criterio' => $criterion->id_criterio,
            'id_usuario' => $userId,
            'destino' => 'Bogotá',
        ]);
    }

    public function test_show_displays_a_criterion(): void
    {
        $criterion = $this->createCriterion();

        $this->get(route('criterios.show', $criterion))
            ->assertOk()
            ->assertSee('Bogotá');
    }

    public function test_update_changes_a_criterion(): void
    {
        $criterion = $this->createCriterion();
        $data = $this->validCriterionData($criterion->id_usuario);
        $data['destino'] = 'Medellín';

        $response = $this->put(route('criterios.update', $criterion), $data);

        $response->assertRedirect(route('criterios.show', $criterion));
        $response->assertSessionHas('success', 'El criterio de búsqueda se actualizó correctamente.');
        $this->assertDatabaseHas('criterio_busqueda', [
            'id_criterio' => $criterion->id_criterio,
            'destino' => 'Medellín',
        ]);
    }

    public function test_destroy_deletes_a_criterion(): void
    {
        $criterion = $this->createCriterion();

        $response = $this->delete(route('criterios.destroy', $criterion));

        $response->assertRedirect(route('criterios.index'));
        $response->assertSessionHas('success', 'El criterio de búsqueda se eliminó correctamente.');
        $this->assertDatabaseMissing('criterio_busqueda', [
            'id_criterio' => $criterion->id_criterio,
        ]);
    }

    public function test_store_rejects_a_missing_user_invalid_dates_and_negative_price(): void
    {
        $data = $this->validCriterionData(999);
        $data['fecha_fin'] = '2026-01-01';
        $data['precio_maximo'] = '-1';

        $this->post(route('criterios.store'), $data)
            ->assertSessionHasErrors(['id_usuario', 'fecha_fin', 'precio_maximo']);

        $this->assertDatabaseCount('criterio_busqueda', 0);
    }

    /**
     * @return array<string, bool|int|string>
     */
    private function validCriterionData(int $userId): array
    {
        return [
            'id_usuario' => $userId,
            'destino' => 'Bogotá',
            'fecha_inicio' => '2026-02-01',
            'fecha_fin' => '2026-02-10',
            'precio_maximo' => '250.50',
            'horario' => 'Mañana',
            'preferencias' => 'Asiento de ventana',
            'estado' => true,
        ];
    }

    private function createCriterion(): CriterioBusqueda
    {
        $userId = $this->createUser();

        return CriterioBusqueda::query()->create($this->validCriterionData($userId));
    }

    private function createUser(): int
    {
        return (int) DB::table('usuario')->insertGetId([
            'nombre' => 'Usuario',
            'apellido' => 'De prueba',
            'cedula' => 'test-'.fake()->unique()->numerify('########'),
            'fecha_nacimiento' => '1990-01-01',
            'correo' => fake()->unique()->safeEmail(),
            'contraseña' => 'no-usable-test-value',
            'fecha_registro' => now(),
            'estado' => true,
        ]);
    }
}
