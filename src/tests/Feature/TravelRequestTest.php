<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\TravelRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TravelRequestTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_create_a_travel_request()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->postJson('/api/travel-request', [
            'destination' => 'Xique Xique Bahia',
            'departure_date' => '2025-10-25',
            'return_date' => '2025-10-30'
        ]);

        $response->assertStatus(200);
        $this->assertDatabaseHas('travel_requests', ['destination' => 'Xique Xique Bahia']);
    }

    /** @test */
    public function guest_cannot_create_travel_request()
    {
        $response = $this->postJson('/api/travel-request', [
            'destination' => 'Varginha',
            'departure_date' => '2025-10-25',
            'return_date' => '2025-10-30',
        ]);

        $response->assertStatus(401); // tentar criar sem estar autenticado
    }

    /** @test */
    public function user_cannot_create_travel_request_with_invalid_dates()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->postJson('/api/travel-request', [
            'destination' => 'São Paulo',
            'departure_date' => '2025-10-30',
            'return_date' => '2025-10-25', // data de retorno menor que saída
        ]);

        $response->assertStatus(422) // Unprocessable Entity
                 ->assertJsonValidationErrors(['return_date']);
    }

    /** @test */
    public function user_cannot_create_travel_request_without_destination()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->postJson('/api/travel-request', [
            'departure_date' => '2025-10-25',
            'return_date' => '2025-10-30',
        ]);

        $response->assertStatus(422)
                 ->assertJsonValidationErrors(['destination']);
    }
    /** @test */
    public function guest_cannot_access_travel_requests()
    {
        $response = $this->getJson('/api/travel-requests');

        $response->assertStatus(401); // tentar acessar as viagens sem estar autenticado
    }
}
