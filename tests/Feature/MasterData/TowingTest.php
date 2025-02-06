<?php

namespace Tests\Feature\MasterData;

use App\Domain\MasterData\Entities\Towing;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class TowingTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;

    public function test_get_data()
    {
        $response = $this->getJson('/api/admin/towing');

        $response->assertOk();
    }

    public function test_create_data()
    {
        $response = $this->postJson('/api/admin/towing', [
            'name' => 'towing test',
        ]);

        $response->assertOk();
    }

    public function test_error_when_not_fill_name()
    {
        $response = $this->postJson('/api/admin/towing', []);

        $response->assertStatus(422);
    }

    public function test_update_data()
    {
        $towing = Towing::factory()->create([
            'name' => 'towing old',
        ]);

        $response = $this->putJson('/api/admin/towing/' . $towing->id, [
            'name' => 'towing new',
        ]);

        $response->assertOk();
    }

    public function test_error_when_not_fill_field_update()
    {
        $towing = Towing::factory()->create([
            'name' => 'towing old',
        ]);

        $response = $this->putJson('/api/admin/towing/' . $towing->id, []);

        $response->assertStatus(422);
    }

    public function test_delete_data()
    {
        $towing = Towing::factory()->create([
            'name' => 'towing old',
        ]);

        $response = $this->deleteJson('/api/admin/towing/' . $towing->id);

        $response->assertOk();
    }
}
