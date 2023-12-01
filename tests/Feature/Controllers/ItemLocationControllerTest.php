<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\ItemLocation;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ItemLocationControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $this->actingAs(
            User::factory()->create(['email' => 'admin@admin.com'])
        );

        $this->seed(\Database\Seeders\PermissionsSeeder::class);

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_displays_index_view_with_item_locations()
    {
        $itemLocations = ItemLocation::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('item-locations.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.item_locations.index')
            ->assertViewHas('itemLocations');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_item_location()
    {
        $response = $this->get(route('item-locations.create'));

        $response->assertOk()->assertViewIs('app.item_locations.create');
    }

    /**
     * @test
     */
    public function it_stores_the_item_location()
    {
        $data = ItemLocation::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('item-locations.store'), $data);

        $this->assertDatabaseHas('item_locations', $data);

        $itemLocation = ItemLocation::latest('id')->first();

        $response->assertRedirect(route('item-locations.edit', $itemLocation));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_item_location()
    {
        $itemLocation = ItemLocation::factory()->create();

        $response = $this->get(route('item-locations.show', $itemLocation));

        $response
            ->assertOk()
            ->assertViewIs('app.item_locations.show')
            ->assertViewHas('itemLocation');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_item_location()
    {
        $itemLocation = ItemLocation::factory()->create();

        $response = $this->get(route('item-locations.edit', $itemLocation));

        $response
            ->assertOk()
            ->assertViewIs('app.item_locations.edit')
            ->assertViewHas('itemLocation');
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

        $response = $this->put(
            route('item-locations.update', $itemLocation),
            $data
        );

        $data['id'] = $itemLocation->id;

        $this->assertDatabaseHas('item_locations', $data);

        $response->assertRedirect(route('item-locations.edit', $itemLocation));
    }

    /**
     * @test
     */
    public function it_deletes_the_item_location()
    {
        $itemLocation = ItemLocation::factory()->create();

        $response = $this->delete(
            route('item-locations.destroy', $itemLocation)
        );

        $response->assertRedirect(route('item-locations.index'));

        $this->assertModelMissing($itemLocation);
    }
}
