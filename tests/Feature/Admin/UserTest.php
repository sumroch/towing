<?php

namespace Tests\Feature\Admin;

use Illuminate\Support\Str;
use Tests\TestCase;

class UserTest extends TestCase
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
        $response = $this->getJson('/api/admin/user');

        $response->assertOk();
    }
    public function test_create_data()
    {
        $this->loginUser();
        $response = $this->postJson('/api/admin/user', [
            'username' => 'idad',
            'password' => bcrypt('12345'),
            'store_id' => '1',
            'remember_token' => Str::random(10),
            'role' => '店舗'
        ]);

        $response->assertOk();
    }

    public function test_error_when_not_fill_name()
    {
        $this->loginUser();
        $response = $this->postJson('/api/admin/user', [
            'username' => '',
            'password' => bcrypt('12345'),
            'store_id' => '1',
            'remember_token' => Str::random(10),
            'role' => '店舗'
        ]);

        $response->assertStatus(422);
        $response->assertJsonValidationErrors('username');
    }
    public function test_update_data()
    {
        $this->loginUser();

        $response = $this->putJson('/api/admin/user/7', [
            'username' => 'idad',
            'password' => '12346',
            'store_id' => '1',
            'role' => '店舗'
        ]);

        $response->assertOk();
    }
    public function test_update_data_with_invalid_credentials()
    {
        $this->loginUser();
        $response = $this->putJson('/api/admin/user/4', [
            'username' => 'idad',
            'password' => '12346',
            'store_id' => '1',
            'role' => ''
        ]);

        $response->assertStatus(422);
    }
    public function test_delete_data()
    {
        $this->loginUser();
        $response = $this->deleteJson('/api/admin/user/7');

        $response->assertOk();
    }
    public function test_delete_data_with_invalid_credentials()
    {
        $this->loginUser();
        $response = $this->deleteJson('/api/admin/user/7121');

        $response->assertStatus(404);
    }
}