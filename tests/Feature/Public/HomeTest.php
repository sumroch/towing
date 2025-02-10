<?php

namespace Tests\Feature\Public;

use Tests\TestCase;

class HomeTest extends TestCase
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
        $response = $this->get('/api/public/home');

        $response->assertOk();
    }

    public function test_get_data_calender()
    {
        $this->loginUser();
        $response = $this->get('/api/public/calender');

        $response->assertOk();
    }

    public function test_get_data_order_list()
    {
        $this->loginUser();
        $response = $this->get('/api/public/store/1');

        $response->assertOk();
    }
}