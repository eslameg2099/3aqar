<?php

namespace Tests\Feature\Dashboard;

use Tests\TestCase;
use App\Models\Customer;

class CustomerTest extends TestCase
{
    /** @test */
    public function itCanDisplayListOfCustomers()
    {
        $this->actingAsAdmin();

        Customer::factory()->create(['name' => 'Ahmed']);

        $response = $this->get(route('dashboard.customers.index'));

        $response->assertSuccessful();

        $response->assertSee('Ahmed');
    }

    /** @test */
    public function itCanDisplayCustomerDetails()
    {
        $this->actingAsAdmin();

        $customer = Customer::factory()->create(['name' => 'Ahmed']);

        $response = $this->get(route('dashboard.customers.show', $customer));

        $response->assertSuccessful();

        $response->assertSee('Ahmed');
    }

    /** @test */
    public function itCanDisplayCustomerCreateForm()
    {
        $this->actingAsAdmin();

        $response = $this->get(route('dashboard.customers.create'));

        $response->assertSuccessful();

        $response->assertSee(trans('customers.actions.create'));
    }

    /** @test */
    public function itCanCreateCustomers()
    {
        $this->actingAsAdmin();

        $customersCount = Customer::count();

        $response = $this->postJson(
            route('dashboard.customers.store'),
            Customer::factory()->raw([
                'name' => 'Customer',
                'password' => 'password',
                'password_confirmation' => 'password',
            ])
        );

        $response->assertRedirect();

        $this->assertEquals(Customer::count(), $customersCount + 1);
    }

    /** @test */
    public function itCanDisplayCustomerEditForm()
    {
        $this->actingAsAdmin();

        $customer = Customer::factory()->create();

        $response = $this->get(route('dashboard.customers.edit', $customer));

        $response->assertSuccessful();

        $response->assertSee(trans('customers.actions.edit'));
    }

    /** @test */
    public function itCanUpdateCustomers()
    {
        $this->actingAsAdmin();

        $customer = Customer::factory()->create();

        $response = $this->put(
            route('dashboard.customers.update', $customer),
            Customer::factory()->raw([
                'name' => 'Customer',
                'password' => 'password',
                'password_confirmation' => 'password',
            ])
        );

        $response->assertRedirect();

        $customer->refresh();

        $this->assertEquals($customer->name, 'Customer');
    }

    /** @test */
    public function itCanDeleteCustomer()
    {
        $this->actingAsAdmin();

        $customer = Customer::factory()->create();

        $customersCount = Customer::count();

        $response = $this->delete(route('dashboard.customers.destroy', $customer));
        $response->assertRedirect();

        $this->assertEquals(Customer::count(), $customersCount - 1);
    }

    /** @test */
    public function itCanDisplayTrashedCustomers()
    {
        if (! $this->useSoftDeletes($model = Customer::class)) {
            $this->markTestSkipped("The '$model' doesn't use soft deletes trait.");
        }

        Customer::factory()->create(['deleted_at' => now(), 'name' => 'Ahmed']);

        $this->actingAsAdmin();

        $response = $this->get(route('dashboard.customers.trashed'));

        $response->assertSuccessful();

        $response->assertSee('Ahmed');
    }

    /** @test */
    public function itCanDisplayTrashedCustomerDetails()
    {
        if (! $this->useSoftDeletes($model = Customer::class)) {
            $this->markTestSkipped("The '$model' doesn't use soft deletes trait.");
        }

        $customer = Customer::factory()->create(['deleted_at' => now(), 'name' => 'Ahmed']);

        $this->actingAsAdmin();

        $response = $this->get(route('dashboard.customers.trashed.show', $customer));

        $response->assertSuccessful();

        $response->assertSee('Ahmed');
    }

    /** @test */
    public function itCanRestoreDeletedCustomer()
    {
        if (! $this->useSoftDeletes($model = Customer::class)) {
            $this->markTestSkipped("The '$model' doesn't use soft deletes trait.");
        }

        $customer = Customer::factory()->create(['deleted_at' => now()]);

        $this->actingAsAdmin();

        $response = $this->post(route('dashboard.customers.restore', $customer));

        $response->assertRedirect();

        $this->assertNull($customer->refresh()->deleted_at);
    }

    /** @test */
    public function itCanForceDeleteCustomer()
    {
        if (! $this->useSoftDeletes($model = Customer::class)) {
            $this->markTestSkipped("The '$model' doesn't use soft deletes trait.");
        }

        $customer = Customer::factory()->create(['deleted_at' => now()]);

        $customerCount = Customer::withTrashed()->count();

        $this->actingAsAdmin();

        $response = $this->delete(route('dashboard.customers.forceDelete', $customer));

        $response->assertRedirect();

        $this->assertEquals(Customer::withoutTrashed()->count(), $customerCount - 1);
    }

    /** @test */
    public function itCanFilterCustomersByName()
    {
        $this->actingAsAdmin();

        Customer::factory()->create(['name' => 'Ahmed']);

        Customer::factory()->create(['name' => 'Mohamed']);

        $this->get(route('dashboard.customers.index', [
            'name' => 'ahmed',
        ]))
            ->assertSuccessful()
            ->assertSee('Ahmed')
            ->assertDontSee('Mohamed');
    }

    /** @test */
    public function itCanFilterCustomersByEmail()
    {
        $this->actingAsAdmin();

        Customer::factory()->create([
            'name' => 'FooBar1',
            'email' => 'user1@demo.com',
        ]);

        Customer::factory()->create([
            'name' => 'FooBar2',
            'email' => 'user2@demo.com',
        ]);

        $this->get(route('dashboard.customers.index', [
            'email' => 'user1@',
        ]))
            ->assertSuccessful()
            ->assertSee('FooBar1')
            ->assertDontSee('FooBar2');
    }

    /** @test */
    public function itCanFilterCustomersByPhone()
    {
        $this->actingAsAdmin();

        Customer::factory()->create([
            'name' => 'FooBar1',
            'phone' => '123',
        ]);

        Customer::factory()->create([
            'name' => 'FooBar2',
            'email' => '456',
        ]);

        $this->get(route('dashboard.customers.index', [
            'phone' => '123',
        ]))
            ->assertSuccessful()
            ->assertSee('FooBar1')
            ->assertDontSee('FooBar2');
    }
}
