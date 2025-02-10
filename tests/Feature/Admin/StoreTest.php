<?php

namespace Tests\Feature\Admin;

use Tests\TestCase;

class StoreTest extends TestCase
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
        $response = $this->getJson('/api/admin/store');

        $response->assertOk();
    }
    public function test_create_data()
    {
        $this->loginUser();
        $response = $this->postJson('/api/admin/store', [
            'name'      => 'store test',
            'group_id'  => '1',
        ]);

        $response->assertOk();
    }
    public function test_error_when_not_fill_name()
    {
        $this->loginUser();
        $response = $this->postJson('/api/admin/store', [
            'name'      => '',
            'group_id'  => '1',
        ]);

        $response->assertStatus(422);
        $response->assertJsonValidationErrors('name');
    }
    public function test_update_data()
    {
        $this->loginUser();
        $response = $this->putJson('/api/admin/store/26', [
            'name'      => 'store new',
            'group_id'  => '1',
        ]);

        $response->assertOk();
    }
    public function test_error_when_not_fill_field_update()
    {
        $this->loginUser();
        $response = $this->putJson('/api/admin/store/26', [
            'name'      => '',
            'group_id'  => '1',
        ]);

        $response->assertStatus(422);
        $response->assertJsonValidationErrors('name');
    }
    public function test_delete_data()
    {
        $this->loginUser();
        $response = $this->deleteJson('/api/admin/store/26');

        $response->assertOk();
    }
    public function test_delete_data_with_invalid_credentials()
    {
        $this->loginUser();
        $response = $this->deleteJson('/api/admin/store/100');

        $response->assertStatus(404);
    }
}