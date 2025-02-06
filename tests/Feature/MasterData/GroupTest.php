<?php

namespace Tests\Feature\MasterData;

use App\Domain\MasterData\Entities\Group;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class GroupTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;

    public function test_get_data()
    {
        $response = $this->getJson('/api/admin/group');

        $response->assertOk();
    }
    public function test_create_data()
    {
        $response = $this->postJson('/api/admin/group', [
            'name' => 'group test',
        ]);

        $response->assertOk();
    }

    public function test_error_when_not_fill_name()
    {
        $response = $this->postJson('/api/admin/group', []);

        $response->assertStatus(422);
    }

    public function test_update_data()
    {
        $group = Group::factory()->create([
            'name' => 'group old',
        ]);

        $response = $this->putJson('/api/admin/group/' . $group->id, [
            'name' => 'group new',
        ]);

        $response->assertOk();
    }

    public function test_error_when_not_fill_field_update()
    {
        $group = Group::factory()->create([
            'name' => 'group old',
        ]);

        $response = $this->putJson('/api/admin/group/' . $group->id, []);

        $response->assertStatus(422);
    }

    public function test_delete_data()
    {
        $group = Group::factory()->create([
            'name' => 'group old',
        ]);

        $response = $this->deleteJson('/api/admin/group/' . $group->id);

        $response->assertOk();
    }
}
