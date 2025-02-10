<?php

namespace Tests\Feature\Admin;

use Tests\TestCase;

class GroupTest extends TestCase
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
        $response = $this->getJson('/api/admin/group');

        $response->assertOk();
    }
    public function test_create_data()
    {
        $this->loginUser();
        $response = $this->postJson('/api/admin/group', [
            'name' => 'group test',
        ]);

        $response->assertOk();
    }
    public function test_error_when_not_fill_name()
    {
        $this->loginUser();
        $response = $this->postJson('/api/admin/group', [
            'name' => '',
        ]);

        $response->assertStatus(422);
        $response->assertJsonValidationErrors('name');
    }
    public function test_update_data()
    {
        // $group = Group::factory()->create([
        //     'name' => 'group old',
        // ]);
        $this->loginUser();
        $response = $this->putJson('/api/admin/group/4', [
            'name' => 'group new',
        ]);

        $response->assertOk();
    }
    public function test_error_when_not_fill_field_update()
    {
        $this->loginUser();
        $response = $this->putJson('/api/admin/group/4', [
            'name' => '',
        ]);

        $response->assertStatus(422);
        $response->assertJsonValidationErrors('name');
    }
    public function test_delete_data()
    {
        $this->loginUser();
        $response = $this->deleteJson('/api/admin/group/4');

        $response->assertOk();
    }
    public function test_delete_data_with_invalid_credentials()
    {
        $this->loginUser();
        $response = $this->deleteJson('/api/admin/group/100');

        $response->assertStatus(404);
    }
}