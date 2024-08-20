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
        $response = $this->post('/login', ['email' => 'machin@machin.machin', 'password' => 'machin']);

        $response->assertStatus(302);
    }

    public function test_right_password(): void
    {
        $response = $this->post('/login', ['email' => 'machin@machin.machin', 'password' => 'machinmachin']);

        $response->assertStatus(302);
        $response->assertRedirectToRoute('dashboard');
    }

    public function test_register_incorrect_form_email(): void
    {
        $response = $this->post('/register', ['name' => 'machin', 'email' => 'machinmachin.machin', 'password' => 'machinmachin']);
        $response->assertSessionHasErrors('email');
        $response->assertStatus(302);

        $this->assertDatabaseMissing('users', ['name' => 'machin', 'email' => 'machinmachin.machin']);
    }

    public function test_email_already_exists(): void
    {
        $response = $this->post('/register', ['name' => 'machin', 'email' => 'machin@machin.machin', 'password' => 'machinmachin']);
        $response->assertSessionHasErrors('email');
        $response->assertStatus(302);

        $this->assertDatabaseMissing('users', ['name' => 'machin', 'email' => 'machinmachin.machin']);
    }

    /* public function test_can_create_new_user(): void {
        $response = $this->post('/register', ['name' => 'test', 'email' => 'test@test.test', 'password' => 'password']);
        $response->assertStatus(302);

        $this->assertDatabaseHas('users', ['name' => 'test', 'email' => 'test@test.test']);
    } */

}
