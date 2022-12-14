<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use App\Models\Customer;
use App\Models\Verification;
use App\Events\VerificationCreated;
use Illuminate\Support\Facades\Event;

class PhoneVerificationTest extends TestCase
{
    /** @test */
    public function itCanDetermineIfTheAuthenticatedUserPasswordIsCorrect()
    {
        $this->postJson(route('api.password.check'), [
            'password' => 'password',
        ])->assertStatus(401);

        $customer = $this->actingAsCustomer();

        $this->postJson(route('api.password.check'), [
            'password' => '123456',
        ])->assertJsonValidationErrors(['password']);

        $response = $this->postJson(route('api.password.check'), [
            'password' => 'password',
        ])->assertSuccessful();

        $this->assertEquals($response->json('data.name'), $customer->name);
    }

    /** @test */
    public function itCanSendOrResendThePhoneVerificationCode()
    {
        $this->actingAsCustomer();

        Event::fake();

        Customer::factory(['phone' => '123456789'])->create();

        $this->postJson(route('api.verification.send'), [
            'phone' => '123456',
        ])->assertSuccessful();

        Event::assertDispatched(VerificationCreated::class);
    }

    /** @test */
    public function itCanVerifyThePhoneNumber()
    {
        $customer = $this->actingAsCustomer();

        Event::fake();

        Verification::create([
            'user_id' => $customer->id,
            'phone' => '12345678',
            'code' => 'foobar',
        ]);

        $this->assertEquals(Verification::count(), 1);

        $this->postJson(route('api.verification.verify'), [
            'code' => 'foo',
        ])->assertJsonValidationErrors(['code']);

        $this->travelTo(now()->addMinutes(5));

        $this->postJson(route('api.verification.verify'), [
            'code' => 'foobar',
        ])->assertJsonValidationErrors(['code']);

        $this->travelBack();

        $this->postJson(route('api.verification.verify'), [
            'code' => 'foobar',
        ])->assertSuccessful();

        $this->assertEquals(Verification::count(), 0);

        $this->assertNotNull($customer->refresh()->phone_verified_at);
        $this->assertEquals($customer->phone, '12345678');
    }
}
