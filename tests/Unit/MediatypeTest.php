<?php

namespace Tests\Unit;

use App\Mediatype;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MediatypeTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /** @test */
    public function it_has_a_name()
    {
        $name = $this->faker->word;
        $type = Mediatype::create(['name' => $name]);

        $this->assertDatabaseHas('mediatypes', ['name' => $name]);
        $this->assertEquals($name, $type->name);
    }
}
