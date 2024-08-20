<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/welcome');

        $response->assertStatus(200);
    }

    public function test_wrong_password(): void
    {
        $response = $this->post('/login', ['email' => 'truc@truc.truc', 'password' => 'machin']);

        $response->assertStatus(302);
    }

    public function test_right_password(): void
    {
        $response = $this->post('/login', ['email' => 'truc@truc.truc', 'password' => 'tructruc']);

        $response->assertStatus(302);
        $response->assertRedirectToRoute('dashboard');
    }
}
