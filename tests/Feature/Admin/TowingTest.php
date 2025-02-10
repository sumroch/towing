<?php

namespace Tests\Feature\Admin;

use App\Domain\MasterData\Entities\Towing;
use Tests\TestCase;

class TowingTest extends TestCase
{
    protected function loginUser($username = 'manager', $password = '12345')
    {
        $response = $this->postJson('/api/login', [
            'username' => $username,
            'password' => $password,
        ]);
        $this->assertAuthenticated();
        return $response;
    }
    public function test_get_data()
    {
        $this->loginUser();
        $response = $this->getJson('/api/admin/towing');

        $response->assertOk();
    }
    public function test_create_data()
    {
        $this->loginUser();
        $response = $this->postJson('/api/admin/towing', [
            'name' => 'towing test',
        ]);

        $response->assertOk();
    }
    public function test_error_when_not_fill_name()
    {
        $this->loginUser();
        $response = $this->postJson('/api/admin/towing', [
            'name' => '',
        ]);

        $response->assertStatus(422);
        $response->assertJsonValidationErrors('name');
    }
    public function test_update_data()
    {
        $this->loginUser();
        $response = $this->putJson('/api/admin/towing/5', [
            'name' => 'towing new',
        ]);

        $response->assertOk();
    }
    public function test_error_when_not_fill_field_update()
    {
        $this->loginUser();
        $response = $this->putJson('/api/admin/towing/5', [
            'name' => '',
        ]);

        $response->assertStatus(422);
        $response->assertJsonValidationErrors('name');
    }
    public function test_delete_data()
    {
        $this->loginUser();
        $response = $this->deleteJson('/api/admin/towing/5');

        $response->assertOk();
    }
    public function test_delete_data_with_invalid_credentials()
    {
        $this->loginUser();
        $response = $this->deleteJson('/api/admin/towing/100');

        $response->assertStatus(404);
    }
}