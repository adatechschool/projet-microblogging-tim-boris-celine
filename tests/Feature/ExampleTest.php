<?php

namespace Tests\Feature;

use App\Models\User;
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

    //Login
    /**
     * @group login
     */
    public function test_wrong_password(): void
    {
        $response = $this->post('/login', ['email' => 'machin@machin.machin', 'password' => 'machin']);

        $response->assertStatus(302);
        $this->assertGuest();
    }

    /**
     * @group login
     */
    public function test_right_password(): void
    {
        $response = $this->post('/login', ['email' => 'machin@machin.machin', 'password' => 'machinmachin']);

        $response->assertStatus(302);
        $response->assertRedirectToRoute('dashboard');
        $this->assertAuthenticated();
    }


    //Register
    /**
     * @group register
     */
    public function test_register_when_email_is_invalid(): void
    {
        $response = $this->post('/register', ['name' => 'machin', 'email' => 'machinmachin.machin', 'password' => 'machinmachin']);
        $response->assertSessionHasErrors('email');
        $response->assertStatus(302);

        $this->assertDatabaseMissing('users', ['name' => 'machin', 'email' => 'machinmachin.machin']);
    }

    /**
     * @group register
     */
    public function test_register_when_email_already_exists(): void
    {
        $response = $this->post('/register', ['name' => 'machin', 'email' => 'machin@machin.machin', 'password' => 'machinmachin']);
        $response->assertSessionHasErrors('email');
        $response->assertStatus(302);

        $this->assertDatabaseMissing('users', ['name' => 'machin', 'email' => 'machinmachin.machin']);
    }

    /**
     * @group register
     */
    public function test_can_create_new_user(): void {
        $user = User::factory()->create();
        $response = $this->post('/register', ['name' => $user->name, 'email' => $user->email, 'password' => 'password']);

        $this->assertDatabaseHas('users', ['name' => $user->name, 'email' => $user->email]);
    }

    /**
     * @group redirect
     */
    public function test_welcome_redirects_to_dashboard(): void
    {
        $response = $this->get('/');
        $response->assertStatus(302);
        $response->assertRedirectToRoute('dashboard');
    }

    /**
     * @group redirect
     */
    public function test_dashboard_redirects_to_welcome_if_not_logged_in(): void
    {
        $response = $this->get('/dashboard');
        $response->assertStatus(302);
        $response->assertRedirectToRoute('welcome');
    }

    /**
     * @group redirect
     */
    public function test_redirect_to_dashboard_if_logged_in(): void
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get('/');
        $response->assertStatus(302);
    }
}
