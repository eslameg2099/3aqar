<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use App\Models\User;
use Laravel\Sanctum\Sanctum;

class ProfileTest extends TestCase
{
    /** @test */
    public function onlyToAuthenticatedUserCanDisplayHisProfile()
    {
        $user = User::factory()->create();

        $this->getJson(route('api.profile.show'))
            ->assertStatus(401);

        Sanctum::actingAs($user, ['*']);

        $this->getJson(route('api.profile.show'))
            ->assertSuccessful();
    }

    /** @test */
    public function onlyToAuthenticatedUserCanUpdateHisProfile()
    {
        $user = User::factory()->create([
            'name' => 'Ahmed',
            'email' => 'ahmed@demo.com',
            'phone' => '123456789',
        ]);

        $this->putJson(route('api.profile.update'))
            ->assertStatus(401);

        Sanctum::actingAs($user, ['*']);

        // test validation
        $this->putJson(route('api.profile.update'), [
            'name' => null,
            'email' => null,
            'phone' => null,
            'password' => 'password',
        ])
            ->assertJsonValidationErrors(['name', 'email', 'phone', 'old_password', 'password']);

        $this->putJson(route('api.profile.update'), [
            'name' => 'Mohamed',
            'email' => 'mohamed@demo.com',
            'phone' => '12345678',
        ])->assertSuccessful();
    }
}
