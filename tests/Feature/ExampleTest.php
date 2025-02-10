<?php

namespace Tests\Feature;

use Tests\TestCase;

class ExampleTest extends TestCase
{
    // use RefreshDatabase; //untuk merefresh database
    // use WithoutMiddleware; //untuk menonaktifkan middleware

    protected function loginUser($username = 'manager', $password = '12345')
    {
        $response = $this->postJson('/api/login', [
            'username' => $username,
            'password' => $password,
        ]);
        $this->assertAuthenticated();
        return $response;
    }
    public function test_the_application_returns_a_successful_response()
    {
        $this->loginUser();
        $response = $this->getJson('/api/public/data-store');

        $response->assertOk();
    }
}