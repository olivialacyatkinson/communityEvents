<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EventControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_event_index_page_is_rendered()
    {
        $user = User::factory()->create();
        $this->actingAs($user);


        $response = $this->get('/events');

        $response->assertStatus(200);
    }
}
