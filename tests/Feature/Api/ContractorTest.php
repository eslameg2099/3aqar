<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use App\Models\Contractor;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ContractorTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_list_all_contractors()
    {
        $this->actingAsAdmin();

        Contractor::factory()->count(2)->create();

        $this->getJson(route('api.contractors.index'))
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
    public function test_contractors_select2_api()
    {
        Contractor::factory()->count(5)->create();

        $response = $this->getJson(route('api.contractors.select'))
            ->assertSuccessful()
            ->assertJsonStructure([
                'data' => [
                    '*' => ['id', 'text'],
                ],
            ]);

        $this->assertEquals($response->json('data.0.id'), 1);

        $this->assertCount(5, $response->json('data'));

        $response = $this->getJson(route('api.contractors.select', ['selected_id' => 4]))
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
    public function it_can_display_the_contractor_details()
    {
        $this->actingAsAdmin();

        $contractor = Contractor::factory(['name' => 'Foo'])->create();

        $response = $this->getJson(route('api.contractors.show', $contractor))
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
