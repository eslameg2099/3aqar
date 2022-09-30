<?php

namespace Tests\Feature\Dashboard;

use Tests\TestCase;
use App\Models\OfficeOwner;

class OfficeOwnerTest extends TestCase
{
    /** @test */
    public function itCanDisplayListOfOffices()
    {
        $this->actingAsAdmin();

        OfficeOwner::factory()->create(['name' => 'Ahmed']);

        $response = $this->get(route('dashboard.offices.index'));

        $response->assertSuccessful();

        $response->assertSee('Ahmed');
    }

    /** @test */
    public function itCanDisplayOfficeDetails()
    {
        $this->actingAsAdmin();

        $office = OfficeOwner::factory()->create(['name' => 'Ahmed']);

        $response = $this->get(route('dashboard.offices.show', $office));

        $response->assertSuccessful();

        $response->assertSee('Ahmed');
    }

    /** @test */
    public function itCanDisplayOfficeCreateForm()
    {
        $this->actingAsAdmin();

        $response = $this->get(route('dashboard.offices.create'));

        $response->assertSuccessful();

        $response->assertSee(trans('offices.actions.create'));
    }

    /** @test */
    public function itCanCreateOffices()
    {
        $this->actingAsAdmin();

        $officesCount = OfficeOwner::count();

        $response = $this->postJson(
            route('dashboard.offices.store'),
            OfficeOwner::factory()->raw([
                'name' => 'Office',
                'password' => 'password',
                'password_confirmation' => 'password',
            ])
        );

        $response->assertRedirect();

        $this->assertEquals(OfficeOwner::count(), $officesCount + 1);
    }

    /** @test */
    public function itCanDisplayOfficeEditForm()
    {
        $this->actingAsAdmin();

        $office = OfficeOwner::factory()->create();

        $response = $this->get(route('dashboard.offices.edit', $office));

        $response->assertSuccessful();

        $response->assertSee(trans('offices.actions.edit'));
    }

    /** @test */
    public function itCanUpdateOffices()
    {
        $this->actingAsAdmin();

        $office = OfficeOwner::factory()->create();

        $response = $this->put(
            route('dashboard.offices.update', $office),
            OfficeOwner::factory()->raw([
                'name' => 'Office',
                'password' => 'password',
                'password_confirmation' => 'password',
            ])
        );

        $response->assertRedirect();

        $office->refresh();

        $this->assertEquals($office->name, 'Office');
    }

    /** @test */
    public function itCanDeleteOffice()
    {
        $this->actingAsAdmin();

        $office = OfficeOwner::factory()->create();

        $officesCount = OfficeOwner::count();

        $response = $this->delete(route('dashboard.offices.destroy', $office));
        $response->assertRedirect();

        $this->assertEquals(OfficeOwner::count(), $officesCount - 1);
    }

    /** @test */
    public function itCanDisplayTrashedOffices()
    {
        if (! $this->useSoftDeletes($model = OfficeOwner::class)) {
            $this->markTestSkipped("The '$model' doesn't use soft deletes trait.");
        }

        OfficeOwner::factory()->create(['deleted_at' => now(), 'name' => 'Ahmed']);

        $this->actingAsAdmin();

        $response = $this->get(route('dashboard.offices.trashed'));

        $response->assertSuccessful();

        $response->assertSee('Ahmed');
    }

    /** @test */
    public function itCanDisplayTrashedOfficeDetails()
    {
        if (! $this->useSoftDeletes($model = OfficeOwner::class)) {
            $this->markTestSkipped("The '$model' doesn't use soft deletes trait.");
        }

        $office = OfficeOwner::factory()->create(['deleted_at' => now(), 'name' => 'Ahmed']);

        $this->actingAsAdmin();

        $response = $this->get(route('dashboard.offices.trashed.show', $office));

        $response->assertSuccessful();

        $response->assertSee('Ahmed');
    }

    /** @test */
    public function itCanRestoreDeletedOffice()
    {
        if (! $this->useSoftDeletes($model = OfficeOwner::class)) {
            $this->markTestSkipped("The '$model' doesn't use soft deletes trait.");
        }

        $office = OfficeOwner::factory()->create(['deleted_at' => now()]);

        $this->actingAsAdmin();

        $response = $this->post(route('dashboard.offices.restore', $office));

        $response->assertRedirect();

        $this->assertNull($office->refresh()->deleted_at);
    }

    /** @test */
    public function itCanForceDeleteOffice()
    {
        if (! $this->useSoftDeletes($model = OfficeOwner::class)) {
            $this->markTestSkipped("The '$model' doesn't use soft deletes trait.");
        }

        $office = OfficeOwner::factory()->create(['deleted_at' => now()]);

        $officeCount = OfficeOwner::withTrashed()->count();

        $this->actingAsAdmin();

        $response = $this->delete(route('dashboard.offices.forceDelete', $office));

        $response->assertRedirect();

        $this->assertEquals(OfficeOwner::withoutTrashed()->count(), $officeCount - 1);
    }

    /** @test */
    public function itCanFilterOfficesByName()
    {
        $this->actingAsAdmin();

        OfficeOwner::factory()->create(['name' => 'Ahmed']);

        OfficeOwner::factory()->create(['name' => 'Mohamed']);

        $this->get(route('dashboard.offices.index', [
            'name' => 'ahmed',
        ]))
            ->assertSuccessful()
            ->assertSee('Ahmed')
            ->assertDontSee('Mohamed');
    }

    /** @test */
    public function itCanFilterOfficesByEmail()
    {
        $this->actingAsAdmin();

        OfficeOwner::factory()->create([
            'name' => 'FooBar1',
            'email' => 'user1@demo.com',
        ]);

        OfficeOwner::factory()->create([
            'name' => 'FooBar2',
            'email' => 'user2@demo.com',
        ]);

        $this->get(route('dashboard.offices.index', [
            'email' => 'user1@',
        ]))
            ->assertSuccessful()
            ->assertSee('FooBar1')
            ->assertDontSee('FooBar2');
    }

    /** @test */
    public function itCanFilterOfficesByPhone()
    {
        $this->actingAsAdmin();

        OfficeOwner::factory()->create([
            'name' => 'FooBar1',
            'phone' => '123',
        ]);

        OfficeOwner::factory()->create([
            'name' => 'FooBar2',
            'email' => '456',
        ]);

        $this->get(route('dashboard.offices.index', [
            'phone' => '123',
        ]))
            ->assertSuccessful()
            ->assertSee('FooBar1')
            ->assertDontSee('FooBar2');
    }
}
