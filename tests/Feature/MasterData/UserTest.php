<?php

namespace Tests\Feature\MasterData;

use Illuminate\Support\Str;
use App\Domain\MasterData\Entities\Store;
use App\Domain\MasterData\Entities\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase, WithoutMiddleware;
    public function test_get_data()
    {
        $response = $this->getJson('/api/admin/user');

        $response->assertOk();
    }

    public function test_create_data()
    {
        $store = Store::factory()->create();
        $role = Role::create(['name' => '店舗']);
        $response = $this->postJson('/api/admin/user', [
            'username' => 'idad',
            'password' => bcrypt('12345'),
            'store_id' => $store->id,
            'remember_token' => Str::random(10),
            'role' => $role->name
        ]);

        $response->assertOk();
    }

    public function test_error_when_not_fill_name()
    {
        $response = $this->postJson('/api/admin/user', []);

        $response->assertStatus(422);
    }

    public function test_update_data()
    {
        $store = Store::factory()->create();
        $role = Role::create(['name' => 'マネジャー']);
        $user = User::factory()->create();
        $response = $this->putJson('/api/admin/user/' . $user->id, [
            'username' => 'idad',
            'password' => '12346',
            'store_id' => $store->id,
            'remember_token' => Str::random(10),
            'role' => $role->name
        ]);

        $response->assertOk();
    }

    public function test_delete_data()
    {
        $role = Role::firstOrCreate(['name' => 'マネジャー', 'guard_name' => 'web']);
        //buat user dengan role
        $user = User::factory()->create();
        $user->assignRole($role->name);

        //delete user
        $response = $this->deleteJson('/api/admin/user/' . $user->id);

        $response->assertOk();
        $this->assertSoftDeleted('users', ['id' => $user->id]); //utk memastikan ke hapus
    }
}
