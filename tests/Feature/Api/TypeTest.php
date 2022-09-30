<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use App\Models\Type;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TypeTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_list_all_types()
    {
        $this->actingAsAdmin();

        Type::factory()->count(2)->create();

        $this->getJson(route('api.types.index'))
            ->assertSuccessful()
            ->assertJsonStructure([
                'data' => [
                    '*' => [
                        'id',
                        'name',
                    ],
                ],
            ]);
    }

    /** @test */
    public function test_types_select2_api()
    {
        Type::factory()->count(5)->create();

        $response = $this->getJson(route('api.types.select'))
            ->assertSuccessful()
            ->assertJsonStructure([
                'data' => [
                    '*' => ['id', 'text'],
                ],
            ]);

        $this->assertEquals($response->json('data.0.id'), 1);

        $this->assertCount(5, $response->json('data'));

        $response = $this->getJson(route('api.types.select', ['selected_id' => 4]))
            ->assertSuccessful()
            ->assertJsonStructure([
                'data' => [
                    '*' => ['id', 'text'],
                ],
            ]);

        $this->assertEquals($response->json('data.0.id'), 4);

        $this->assertCount(5, $response->json('data'));
    }

    /** @test */
    public function it_can_display_the_type_details()
    {
        $this->actingAsAdmin();

        $type = Type::factory(['name' => 'Foo'])->create();

        $response = $this->getJson(route('api.types.show', $type))
            ->assertSuccessful()
            ->assertJsonStructure([
                'data' => [
                    'id',
                    'name',
                ],
            ]);

        $this->assertEquals($response->json('data.name'), 'Foo');
    }
}
