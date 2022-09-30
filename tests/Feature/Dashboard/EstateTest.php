<?php

namespace Tests\Feature\Dashboard;

use Tests\TestCase;
use App\Models\Estate;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EstateTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_display_a_list_of_estates()
    {
        $this->actingAsAdmin();

        Estate::factory()->create(['name' => 'Foo']);

        $this->get(route('dashboard.estates.index'))
            ->assertSuccessful()
            ->assertSee('Foo');
    }

    /** @test */
    public function it_can_display_the_estate_details()
    {
        $this->actingAsAdmin();

        $estate = Estate::factory()->create(['name' => 'Foo']);

        $this->get(route('dashboard.estates.show', $estate))
            ->assertSuccessful()
            ->assertSee('Foo');
    }

    /** @test */
    public function it_can_display_estates_create_form()
    {
        $this->actingAsAdmin();

        $this->get(route('dashboard.estates.create'))
            ->assertSuccessful();
    }

    /** @test */
    public function it_can_create_a_new_estate()
    {
        $this->actingAsAdmin();

        $estatesCount = Estate::count();

        $response = $this->post(
            route('dashboard.estates.store'),
            Estate::factory()->raw([
                'name' => 'Foo'
            ])
        );

        $response->assertRedirect();

        $estate = Estate::all()->last();

        $this->assertEquals(Estate::count(), $estatesCount + 1);

        $this->assertEquals($estate->name, 'Foo');
    }

    /** @test */
    public function it_can_display_the_estates_edit_form()
    {
        $this->actingAsAdmin();

        $estate = Estate::factory()->create();

        $this->get(route('dashboard.estates.edit', $estate))
            ->assertSuccessful();
    }

    /** @test */
    public function it_can_update_the_estate()
    {
        $this->actingAsAdmin();

        $estate = Estate::factory()->create();

        $response = $this->put(
            route('dashboard.estates.update', $estate),
            Estate::factory()->raw([
                'name' => 'Foo'
            ])
        );

        $estate->refresh();

        $response->assertRedirect();

        $this->assertEquals($estate->name, 'Foo');
    }

    /** @test */
    public function it_can_delete_the_estate()
    {
        $this->actingAsAdmin();

        $estate = Estate::factory()->create();

        $estatesCount = Estate::count();

        $response = $this->delete(route('dashboard.estates.destroy', $estate));

        $response->assertRedirect();

        $this->assertEquals(Estate::count(), $estatesCount - 1);
    }

    /** @test */
    public function it_can_display_trashed_estates()
    {
        if (! $this->useSoftDeletes($model = Estate::class)) {
            $this->markTestSkipped("The '$model' doesn't use soft deletes trait.");
        }

        Estate::factory()->create(['deleted_at' => now(), 'name' => 'Ahmed']);

        $this->actingAsAdmin();

        $response = $this->get(route('dashboard.estates.trashed'));

        $response->assertSuccessful();

        $response->assertSee('Ahmed');
    }

    /** @test */
    public function it_can_display_trashed_estate_details()
    {
        if (! $this->useSoftDeletes($model = Estate::class)) {
            $this->markTestSkipped("The '$model' doesn't use soft deletes trait.");
        }

        $estate = Estate::factory()->create(['deleted_at' => now(), 'name' => 'Ahmed']);

        $this->actingAsAdmin();

        $response = $this->get(route('dashboard.estates.trashed.show', $estate));

        $response->assertSuccessful();

        $response->assertSee('Ahmed');
    }

    /** @test */
    public function it_can_restore_deleted_estate()
    {
        if (! $this->useSoftDeletes($model = Estate::class)) {
            $this->markTestSkipped("The '$model' doesn't use soft deletes trait.");
        }

        $estate = Estate::factory()->create(['deleted_at' => now()]);

        $this->actingAsAdmin();

        $response = $this->post(route('dashboard.estates.restore', $estate));

        $response->assertRedirect();

        $this->assertNull($estate->refresh()->deleted_at);
    }

    /** @test */
    public function it_can_force_delete_estate()
    {
        if (! $this->useSoftDeletes($model = Estate::class)) {
            $this->markTestSkipped("The '$model' doesn't use soft deletes trait.");
        }

        $estate = Estate::factory()->create(['deleted_at' => now()]);

        $estateCount = Estate::withTrashed()->count();

        $this->actingAsAdmin();

        $response = $this->delete(route('dashboard.estates.forceDelete', $estate));

        $response->assertRedirect();

        $this->assertEquals(Estate::withoutTrashed()->count(), $estateCount - 1);
    }

    /** @test */
    public function it_can_filter_estates_by_name()
    {
        $this->actingAsAdmin();

        Estate::factory()->create([
            'name' => 'Foo',
        ]);

        Estate::factory()->create([
            'name' => 'Bar',
        ]);

        $this->get(route('dashboard.estates.index', [
            'name' => 'Fo',
        ]))
            ->assertSuccessful()
            ->assertSee(trans('estates.filter'))
            ->assertSee('Foo')
            ->assertDontSee('Bar');
    }
}
