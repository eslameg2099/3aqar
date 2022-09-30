<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use App\Models\Estate;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EstateTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_list_all_estates()
    {
        $this->actingAsAdmin();

        Estate::factory()->count(2)->create();

        $this->getJson(route('api.estates.index'))
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
    public function test_estates_select2_api()
    {
        Estate::factory()->count(5)->create();

        $response = $this->getJson(route('api.estates.select'))
            ->assertSuccessful()
            ->assertJsonStructure([
                'data' => [
                    '*' => ['id', 'text'],
                ],
            ]);

        $this->assertEquals($response->json('data.0.id'), 1);

        $this->assertCount(5, $response->json('data'));

        $response = $this->getJson(route('api.estates.select', ['selected_id' => 4]))
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
    public function it_can_display_the_estate_details()
    {
        $this->actingAsAdmin();

        $estate = Estate::factory(['name' => 'Foo'])->create();

        $response = $this->getJson(route('api.estates.show', $estate))
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
