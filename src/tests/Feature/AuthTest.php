<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_login_with_valid_credentials()
    {
        $user = User::factory()->create([
            'email' => 'admin@mail.com',
            'password' => bcrypt('admmin123'),
        ]);

        $response = $this->postJson('/api/login', [
            'email' => 'admin@mail.com',
            'password' => 'admmin123',
        ]);

        $response->assertStatus(200)
                ->assertJsonStructure(['token']);
    }
}
