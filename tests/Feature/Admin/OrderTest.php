<?php

namespace Tests\Feature\Admin;

use Tests\TestCase;

class OrderTest extends TestCase
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
    public function test_get_data_order_history()
    {
        $this->loginUser();
        $response = $this->getJson('/api/admin/order');

        $response->assertOk();
    }
    public function test_get_data_order_progress()
    {
        $this->loginUser();
        $response = $this->getJson('/api/admin/order-progress');

        $response->assertOk();
    }
}
