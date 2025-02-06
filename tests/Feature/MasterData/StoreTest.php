<?php

namespace Tests\Feature\MasterData;

use App\Domain\MasterData\Entities\Group;
use App\Domain\MasterData\Entities\Store;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class StoreTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;

    public function test_get_data()
    {
        $response = $this->getJson('/api/admin/store');

        $response->assertOk();
    }

    public function test_create_data()
    {
        $group = Group::factory()->create();

        $response = $this->postJson('/api/admin/store', [
            'name' => 'store test',
            'group_id' => $group->id,
        ]);

        $response->assertOk();
    }

    public function test_error_when_not_fill_name()
    {
        $response = $this->postJson('/api/admin/store', []);

        $response->assertStatus(422);
    }

    public function test_update_data()
    {
        $group = Group::factory()->create();
        $store = Store::factory()->create([
            'name' => 'store old',
            'group_id' => $group->id,
        ]);

        $response = $this->putJson('/api/admin/store/' . $store->id, [
            'name' => 'store new',
            'group_id' => $group->id,
        ]);

        $response->assertOk();
    }

    public function test_error_when_not_fill_field_update()
    {
        $group = Group::factory()->create();
        $store = Store::factory()->create([
            'name' => 'store old',
            'group_id' => $group->id,
        ]);

        $response = $this->putJson('/api/admin/store/' . $store->id, []);

        $response->assertStatus(422);
    }

    public function test_delete_data()
    {
        $group = Group::factory()->create();
        $store = Store::factory()->create([
            'name' => 'store old',
            'group_id' => $group->id,
        ]);

        $response = $this->deleteJson('/api/admin/store/' . $store->id);

        $response->assertOk();
    }
}
