<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\ItemLocation;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ItemLocationTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $user = User::factory()->create(['email' => 'admin@admin.com']);

        Sanctum::actingAs($user, [], 'web');

        $this->seed(\Database\Seeders\PermissionsSeeder::class);

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_gets_item_locations_list()
    {
        $itemLocations = ItemLocation::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.item-locations.index'));

        $response->assertOk()->assertSee($itemLocations[0]->id);
    }

    /**
     * @test
     */
    public function it_stores_the_item_location()
    {
        $data = ItemLocation::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.item-locations.store'), $data);

        $this->assertDatabaseHas('item_locations', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_item_location()
    {
        $itemLocation = ItemLocation::factory()->create();

        $data = [
            'item_id' => $this->faker->randomNumber,
            'department_id' => $this->faker->randomNumber,
            'location_id' => $this->faker->randomNumber,
            'quantity' => $this->faker->randomNumber,
            'description' => $this->faker->text,
        ];

        $response = $this->putJson(
            route('api.item-locations.update', $itemLocation),
            $data
        );

        $data['id'] = $itemLocation->id;

        $this->assertDatabaseHas('item_locations', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_item_location()
    {
        $itemLocation = ItemLocation::factory()->create();

        $response = $this->deleteJson(
            route('api.item-locations.destroy', $itemLocation)
        );

        $this->assertModelMissing($itemLocation);

        $response->assertNoContent();
    }
}
