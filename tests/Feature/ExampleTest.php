<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase; //untuk merefresh database
    use WithoutMiddleware; //untuk menonaktifkan middleware
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->getJson('/api/public/data-store');

        $response->assertOk();
    }
}
