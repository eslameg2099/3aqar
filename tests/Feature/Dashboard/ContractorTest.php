<?php

namespace Tests\Feature\Dashboard;

use Tests\TestCase;
use App\Models\Contractor;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ContractorTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_display_a_list_of_contractors()
    {
        $this->actingAsAdmin();

        Contractor::factory()->create(['name' => 'Foo']);

        $this->get(route('dashboard.contractors.index'))
            ->assertSuccessful()
            ->assertSee('Foo');
    }

    /** @test */
    public function it_can_display_the_contractor_details()
    {
        $this->actingAsAdmin();

        $contractor = Contractor::factory()->create(['name' => 'Foo']);

        $this->get(route('dashboard.contractors.show', $contractor))
            ->assertSuccessful()
            ->assertSee('Foo');
    }

    /** @test */
    public function it_can_display_contractors_create_form()
    {
        $this->actingAsAdmin();

        $this->get(route('dashboard.contractors.create'))
            ->assertSuccessful();
    }

    /** @test */
    public function it_can_create_a_new_contractor()
    {
        $this->actingAsAdmin();

        $contractorsCount = Contractor::count();

        $response = $this->post(
            route('dashboard.contractors.store'),
            Contractor::factory()->raw([
                'name' => 'Foo'
            ])
        );

        $response->assertRedirect();

        $contractor = Contractor::all()->last();

        $this->assertEquals(Contractor::count(), $contractorsCount + 1);

        $this->assertEquals($contractor->name, 'Foo');
    }

    /** @test */
    public function it_can_display_the_contractors_edit_form()
    {
        $this->actingAsAdmin();

        $contractor = Contractor::factory()->create();

        $this->get(route('dashboard.contractors.edit', $contractor))
            ->assertSuccessful();
    }

    /** @test */
    public function it_can_update_the_contractor()
    {
        $this->actingAsAdmin();

        $contractor = Contractor::factory()->create();

        $response = $this->put(
            route('dashboard.contractors.update', $contractor),
            Contractor::factory()->raw([
                'name' => 'Foo'
            ])
        );

        $contractor->refresh();

        $response->assertRedirect();

        $this->assertEquals($contractor->name, 'Foo');
    }

    /** @test */
    public function it_can_delete_the_contractor()
    {
        $this->actingAsAdmin();

        $contractor = Contractor::factory()->create();

        $contractorsCount = Contractor::count();

        $response = $this->delete(route('dashboard.contractors.destroy', $contractor));

        $response->assertRedirect();

        $this->assertEquals(Contractor::count(), $contractorsCount - 1);
    }

    /** @test */
    public function it_can_display_trashed_contractors()
    {
        if (! $this->useSoftDeletes($model = Contractor::class)) {
            $this->markTestSkipped("The '$model' doesn't use soft deletes trait.");
        }

        Contractor::factory()->create(['deleted_at' => now(), 'name' => 'Ahmed']);

        $this->actingAsAdmin();

        $response = $this->get(route('dashboard.contractors.trashed'));

        $response->assertSuccessful();

        $response->assertSee('Ahmed');
    }

    /** @test */
    public function it_can_display_trashed_contractor_details()
    {
        if (! $this->useSoftDeletes($model = Contractor::class)) {
            $this->markTestSkipped("The '$model' doesn't use soft deletes trait.");
        }

        $contractor = Contractor::factory()->create(['deleted_at' => now(), 'name' => 'Ahmed']);

        $this->actingAsAdmin();

        $response = $this->get(route('dashboard.contractors.trashed.show', $contractor));

        $response->assertSuccessful();

        $response->assertSee('Ahmed');
    }

    /** @test */
    public function it_can_restore_deleted_contractor()
    {
        if (! $this->useSoftDeletes($model = Contractor::class)) {
            $this->markTestSkipped("The '$model' doesn't use soft deletes trait.");
        }

        $contractor = Contractor::factory()->create(['deleted_at' => now()]);

        $this->actingAsAdmin();

        $response = $this->post(route('dashboard.contractors.restore', $contractor));

        $response->assertRedirect();

        $this->assertNull($contractor->refresh()->deleted_at);
    }

    /** @test */
    public function it_can_force_delete_contractor()
    {
        if (! $this->useSoftDeletes($model = Contractor::class)) {
            $this->markTestSkipped("The '$model' doesn't use soft deletes trait.");
        }

        $contractor = Contractor::factory()->create(['deleted_at' => now()]);

        $contractorCount = Contractor::withTrashed()->count();

        $this->actingAsAdmin();

        $response = $this->delete(route('dashboard.contractors.forceDelete', $contractor));

        $response->assertRedirect();

        $this->assertEquals(Contractor::withoutTrashed()->count(), $contractorCount - 1);
    }

    /** @test */
    public function it_can_filter_contractors_by_name()
    {
        $this->actingAsAdmin();

        Contractor::factory()->create([
            'name' => 'Foo',
        ]);

        Contractor::factory()->create([
            'name' => 'Bar',
        ]);

        $this->get(route('dashboard.contractors.index', [
            'name' => 'Fo',
        ]))
            ->assertSuccessful()
            ->assertSee(trans('contractors.filter'))
            ->assertSee('Foo')
            ->assertDontSee('Bar');
    }
}
