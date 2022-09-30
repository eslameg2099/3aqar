<?php

namespace Tests\Feature\Dashboard;

use Tests\TestCase;
use App\Models\City;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Astrotomic\Translatable\Validation\RuleFactory;

class CityTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function itCanDisplayAListOfCities()
    {
        $this->actingAsAdmin();

        City::factory()->create(['name' => 'Foo']);

        $this->get(route('dashboard.cities.index'))
            ->assertSuccessful()
            ->assertSee('Foo');
    }

    /** @test */
    public function itCanDisplayTheCityDetails()
    {
        $this->actingAsAdmin();

        $city = City::factory()->create(['name' => 'Foo']);

        $this->get(route('dashboard.cities.show', $city))
            ->assertSuccessful()
            ->assertSee('Foo');
    }

    /** @test */
    public function itCanDisplayCitiesCreateForm()
    {
        $this->actingAsAdmin();

        $this->get(route('dashboard.cities.create'))
            ->assertSuccessful();
    }

    /** @test */
    public function itCanCreateANewCity()
    {
        $this->actingAsAdmin();

        $citiesCount = City::count();

        $response = $this->post(
            route('dashboard.cities.store'),
            City::factory()->raw(
                RuleFactory::make([
                    '%name%' => 'Foo',
                ])
            )
        );

        $response->assertRedirect();

        $city = City::all()->last();

        $this->assertEquals(City::count(), $citiesCount + 1);

        $this->assertEquals($city->name, 'Foo');
    }

    /** @test */
    public function itCanDisplayTheCitiesEditForm()
    {
        $this->actingAsAdmin();

        $city = City::factory()->create();

        $this->get(route('dashboard.cities.edit', $city))
            ->assertSuccessful();
    }

    /** @test */
    public function itCanUpdateTheCity()
    {
        $this->actingAsAdmin();

        $city = City::factory()->create();

        $response = $this->put(
            route('dashboard.cities.update', $city),
            City::factory()->raw(
                RuleFactory::make([
                    '%name%' => 'Foo',
                ])
            )
        );

        $city->refresh();

        $response->assertRedirect();

        $this->assertEquals($city->name, 'Foo');
    }

    /** @test */
    public function itCanDeleteTheCity()
    {
        $this->actingAsAdmin();

        $city = City::factory()->create();

        $citiesCount = City::count();

        $response = $this->delete(route('dashboard.cities.destroy', $city));

        $response->assertRedirect();

        $this->assertEquals(City::count(), $citiesCount - 1);
    }

    /** @test */
    public function itCanDisplayTrashedCities()
    {
        if (! $this->useSoftDeletes($model = City::class)) {
            $this->markTestSkipped("The '$model' doesn't use soft deletes trait.");
        }

        City::factory()->create(['deleted_at' => now(), 'name' => 'Ahmed']);

        $this->actingAsAdmin();

        $response = $this->get(route('dashboard.cities.trashed'));

        $response->assertSuccessful();

        $response->assertSee('Ahmed');
    }

    /** @test */
    public function itCanDisplayTrashedCityDetails()
    {
        if (! $this->useSoftDeletes($model = City::class)) {
            $this->markTestSkipped("The '$model' doesn't use soft deletes trait.");
        }

        $city = City::factory()->create(['deleted_at' => now(), 'name' => 'Ahmed']);

        $this->actingAsAdmin();

        $response = $this->get(route('dashboard.cities.trashed.show', $city));

        $response->assertSuccessful();

        $response->assertSee('Ahmed');
    }

    /** @test */
    public function itCanRestoreDeletedCity()
    {
        if (! $this->useSoftDeletes($model = City::class)) {
            $this->markTestSkipped("The '$model' doesn't use soft deletes trait.");
        }

        $city = City::factory()->create(['deleted_at' => now()]);

        $this->actingAsAdmin();

        $response = $this->post(route('dashboard.cities.restore', $city));

        $response->assertRedirect();

        $this->assertNull($city->refresh()->deleted_at);
    }

    /** @test */
    public function itCanForceDeleteCity()
    {
        if (! $this->useSoftDeletes($model = City::class)) {
            $this->markTestSkipped("The '$model' doesn't use soft deletes trait.");
        }

        $city = City::factory()->create(['deleted_at' => now()]);

        $cityCount = City::withTrashed()->count();

        $this->actingAsAdmin();

        $response = $this->delete(route('dashboard.cities.forceDelete', $city));

        $response->assertRedirect();

        $this->assertEquals(City::withoutTrashed()->count(), $cityCount - 1);
    }

    /** @test */
    public function itCanFilterCitiesByName()
    {
        $this->actingAsAdmin();

        City::factory()->create([
            'name' => 'Foo',
        ]);

        City::factory()->create([
            'name' => 'Bar',
        ]);

        $this->get(route('dashboard.cities.index', [
            'name' => 'Fo',
        ]))
            ->assertSuccessful()
            ->assertSee(trans('cities.filter'))
            ->assertSee('Foo')
            ->assertDontSee('Bar');
    }
}
