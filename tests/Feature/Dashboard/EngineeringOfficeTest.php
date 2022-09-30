<?php

namespace Tests\Feature\Dashboard;

use Tests\TestCase;
use App\Models\EngineeringOffice;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Astrotomic\Translatable\Validation\RuleFactory;

class EngineeringOfficeTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_display_a_list_of_engineering_offices()
    {
        $this->actingAsAdmin();

        EngineeringOffice::factory()->create(['name' => 'Foo']);

        $this->get(route('dashboard.engineering_offices.index'))
            ->assertSuccessful()
            ->assertSee('Foo');
    }

    /** @test */
    public function it_can_display_the_engineering_office_details()
    {
        $this->actingAsAdmin();

        $engineering_office = EngineeringOffice::factory()->create(['name' => 'Foo']);

        $this->get(route('dashboard.engineering_offices.show', $engineering_office))
            ->assertSuccessful()
            ->assertSee('Foo');
    }

    /** @test */
    public function it_can_display_engineering_offices_create_form()
    {
        $this->actingAsAdmin();

        $this->get(route('dashboard.engineering_offices.create'))
            ->assertSuccessful();
    }

    /** @test */
    public function it_can_create_a_new_engineering_office()
    {
        $this->actingAsAdmin();

        $engineering_officesCount = EngineeringOffice::count();

        $response = $this->post(
            route('dashboard.engineering_offices.store'),
            EngineeringOffice::factory()->raw(
                RuleFactory::make([
                    '%name%' => 'Foo',
                ])
            )
        );

        $response->assertRedirect();

        $engineering_office = EngineeringOffice::all()->last();

        $this->assertEquals(EngineeringOffice::count(), $engineering_officesCount + 1);

        $this->assertEquals($engineering_office->name, 'Foo');
    }

    /** @test */
    public function it_can_display_the_engineering_offices_edit_form()
    {
        $this->actingAsAdmin();

        $engineering_office = EngineeringOffice::factory()->create();

        $this->get(route('dashboard.engineering_offices.edit', $engineering_office))
            ->assertSuccessful();
    }

    /** @test */
    public function it_can_update_the_engineering_office()
    {
        $this->actingAsAdmin();

        $engineering_office = EngineeringOffice::factory()->create();

        $response = $this->put(
            route('dashboard.engineering_offices.update', $engineering_office),
            EngineeringOffice::factory()->raw(
                RuleFactory::make([
                    '%name%' => 'Foo',
                ])
            )
        );

        $engineering_office->refresh();

        $response->assertRedirect();

        $this->assertEquals($engineering_office->name, 'Foo');
    }

    /** @test */
    public function it_can_delete_the_engineering_office()
    {
        $this->actingAsAdmin();

        $engineering_office = EngineeringOffice::factory()->create();

        $engineering_officesCount = EngineeringOffice::count();

        $response = $this->delete(route('dashboard.engineering_offices.destroy', $engineering_office));

        $response->assertRedirect();

        $this->assertEquals(EngineeringOffice::count(), $engineering_officesCount - 1);
    }

    /** @test */
    public function it_can_display_trashed_engineering_offices()
    {
        if (! $this->useSoftDeletes($model = EngineeringOffice::class)) {
            $this->markTestSkipped("The '$model' doesn't use soft deletes trait.");
        }

        EngineeringOffice::factory()->create(['deleted_at' => now(), 'name' => 'Ahmed']);

        $this->actingAsAdmin();

        $response = $this->get(route('dashboard.engineering_offices.trashed'));

        $response->assertSuccessful();

        $response->assertSee('Ahmed');
    }

    /** @test */
    public function it_can_display_trashed_engineering_office_details()
    {
        if (! $this->useSoftDeletes($model = EngineeringOffice::class)) {
            $this->markTestSkipped("The '$model' doesn't use soft deletes trait.");
        }

        $engineering_office = EngineeringOffice::factory()->create(['deleted_at' => now(), 'name' => 'Ahmed']);

        $this->actingAsAdmin();

        $response = $this->get(route('dashboard.engineering_offices.trashed.show', $engineering_office));

        $response->assertSuccessful();

        $response->assertSee('Ahmed');
    }

    /** @test */
    public function it_can_restore_deleted_engineering_office()
    {
        if (! $this->useSoftDeletes($model = EngineeringOffice::class)) {
            $this->markTestSkipped("The '$model' doesn't use soft deletes trait.");
        }

        $engineering_office = EngineeringOffice::factory()->create(['deleted_at' => now()]);

        $this->actingAsAdmin();

        $response = $this->post(route('dashboard.engineering_offices.restore', $engineering_office));

        $response->assertRedirect();

        $this->assertNull($engineering_office->refresh()->deleted_at);
    }

    /** @test */
    public function it_can_force_delete_engineering_office()
    {
        if (! $this->useSoftDeletes($model = EngineeringOffice::class)) {
            $this->markTestSkipped("The '$model' doesn't use soft deletes trait.");
        }

        $engineering_office = EngineeringOffice::factory()->create(['deleted_at' => now()]);

        $engineering_officeCount = EngineeringOffice::withTrashed()->count();

        $this->actingAsAdmin();

        $response = $this->delete(route('dashboard.engineering_offices.forceDelete', $engineering_office));

        $response->assertRedirect();

        $this->assertEquals(EngineeringOffice::withoutTrashed()->count(), $engineering_officeCount - 1);
    }

    /** @test */
    public function it_can_filter_engineering_offices_by_name()
    {
        $this->actingAsAdmin();

        EngineeringOffice::factory()->create([
            'name' => 'Foo',
        ]);

        EngineeringOffice::factory()->create([
            'name' => 'Bar',
        ]);

        $this->get(route('dashboard.engineering_offices.index', [
            'name' => 'Fo',
        ]))
            ->assertSuccessful()
            ->assertSee(trans('engineering_offices.filter'))
            ->assertSee('Foo')
            ->assertDontSee('Bar');
    }
}
