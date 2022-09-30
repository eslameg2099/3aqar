<?php

namespace Tests\Feature\Dashboard;

use Tests\TestCase;
use App\Models\Type;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Astrotomic\Translatable\Validation\RuleFactory;

class TypeTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_display_a_list_of_types()
    {
        $this->actingAsAdmin();

        Type::factory()->create(['name' => 'Foo']);

        $this->get(route('dashboard.types.index'))
            ->assertSuccessful()
            ->assertSee('Foo');
    }

    /** @test */
    public function it_can_display_the_type_details()
    {
        $this->actingAsAdmin();

        $type = Type::factory()->create(['name' => 'Foo']);

        $this->get(route('dashboard.types.show', $type))
            ->assertSuccessful()
            ->assertSee('Foo');
    }

    /** @test */
    public function it_can_display_types_create_form()
    {
        $this->actingAsAdmin();

        $this->get(route('dashboard.types.create'))
            ->assertSuccessful();
    }

    /** @test */
    public function it_can_create_a_new_type()
    {
        $this->actingAsAdmin();

        $typesCount = Type::count();

        $response = $this->post(
            route('dashboard.types.store'),
            Type::factory()->raw(
                RuleFactory::make([
                    '%name%' => 'Foo',
                ])
            )
        );

        $response->assertRedirect();

        $type = Type::all()->last();

        $this->assertEquals(Type::count(), $typesCount + 1);

        $this->assertEquals($type->name, 'Foo');
    }

    /** @test */
    public function it_can_display_the_types_edit_form()
    {
        $this->actingAsAdmin();

        $type = Type::factory()->create();

        $this->get(route('dashboard.types.edit', $type))
            ->assertSuccessful();
    }

    /** @test */
    public function it_can_update_the_type()
    {
        $this->actingAsAdmin();

        $type = Type::factory()->create();

        $response = $this->put(
            route('dashboard.types.update', $type),
            Type::factory()->raw(
                RuleFactory::make([
                    '%name%' => 'Foo',
                ])
            )
        );

        $type->refresh();

        $response->assertRedirect();

        $this->assertEquals($type->name, 'Foo');
    }

    /** @test */
    public function it_can_delete_the_type()
    {
        $this->actingAsAdmin();

        $type = Type::factory()->create();

        $typesCount = Type::count();

        $response = $this->delete(route('dashboard.types.destroy', $type));

        $response->assertRedirect();

        $this->assertEquals(Type::count(), $typesCount - 1);
    }

    /** @test */
    public function it_can_display_trashed_types()
    {
        if (! $this->useSoftDeletes($model = Type::class)) {
            $this->markTestSkipped("The '$model' doesn't use soft deletes trait.");
        }

        Type::factory()->create(['deleted_at' => now(), 'name' => 'Ahmed']);

        $this->actingAsAdmin();

        $response = $this->get(route('dashboard.types.trashed'));

        $response->assertSuccessful();

        $response->assertSee('Ahmed');
    }

    /** @test */
    public function it_can_display_trashed_type_details()
    {
        if (! $this->useSoftDeletes($model = Type::class)) {
            $this->markTestSkipped("The '$model' doesn't use soft deletes trait.");
        }

        $type = Type::factory()->create(['deleted_at' => now(), 'name' => 'Ahmed']);

        $this->actingAsAdmin();

        $response = $this->get(route('dashboard.types.trashed.show', $type));

        $response->assertSuccessful();

        $response->assertSee('Ahmed');
    }

    /** @test */
    public function it_can_restore_deleted_type()
    {
        if (! $this->useSoftDeletes($model = Type::class)) {
            $this->markTestSkipped("The '$model' doesn't use soft deletes trait.");
        }

        $type = Type::factory()->create(['deleted_at' => now()]);

        $this->actingAsAdmin();

        $response = $this->post(route('dashboard.types.restore', $type));

        $response->assertRedirect();

        $this->assertNull($type->refresh()->deleted_at);
    }

    /** @test */
    public function it_can_force_delete_type()
    {
        if (! $this->useSoftDeletes($model = Type::class)) {
            $this->markTestSkipped("The '$model' doesn't use soft deletes trait.");
        }

        $type = Type::factory()->create(['deleted_at' => now()]);

        $typeCount = Type::withTrashed()->count();

        $this->actingAsAdmin();

        $response = $this->delete(route('dashboard.types.forceDelete', $type));

        $response->assertRedirect();

        $this->assertEquals(Type::withoutTrashed()->count(), $typeCount - 1);
    }

    /** @test */
    public function it_can_filter_types_by_name()
    {
        $this->actingAsAdmin();

        Type::factory()->create([
            'name' => 'Foo',
        ]);

        Type::factory()->create([
            'name' => 'Bar',
        ]);

        $this->get(route('dashboard.types.index', [
            'name' => 'Fo',
        ]))
            ->assertSuccessful()
            ->assertSee(trans('types.filter'))
            ->assertSee('Foo')
            ->assertDontSee('Bar');
    }
}
