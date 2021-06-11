<?php

namespace Tests\Feature\Livewire\App;

use App\Http\Livewire\App\Discover;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class DiscoverTest extends TestCase
{
    /** @test */
    public function the_component_can_render()
    {
        $component = Livewire::test(Discover::class);

        $component->assertStatus(200);
    }
}
