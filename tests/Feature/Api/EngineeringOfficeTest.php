<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use App\Models\EngineeringOffice;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EngineeringOfficeTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_list_all_engineering_offices()
    {
        $this->actingAsAdmin();

        EngineeringOffice::factory()->count(2)->create();

        $this->getJson(route('api.engineering_offices.index'))
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
    public function test_engineering_offices_select2_api()
    {
        EngineeringOffice::factory()->count(5)->create();

        $response = $this->getJson(route('api.engineering_offices.select'))
            ->assertSuccessful()
            ->assertJsonStructure([
                'data' => [
                    '*' => ['id', 'text'],
                ],
            ]);

        $this->assertEquals($response->json('data.0.id'), 1);

        $this->assertCount(5, $response->json('data'));

        $response = $this->getJson(route('api.engineering_offices.select', ['selected_id' => 4]))
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
    public function it_can_display_the_engineering_office_details()
    {
        $this->actingAsAdmin();

        $engineering_office = EngineeringOffice::factory(['name' => 'Foo'])->create();

        $response = $this->getJson(route('api.engineering_offices.show', $engineering_office))
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
