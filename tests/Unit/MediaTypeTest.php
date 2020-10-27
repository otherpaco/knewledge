<?php

namespace Tests\Unit;

use App\MediaType;
use Tests\TestCase;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MediaTypeTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /** @test */
    public function it_has_a_name()
    {
        $name = $this->faker->word;
        $type = factory(MediaType::class)->create(['name' => $name]);

        $this->assertDatabaseHas('media_types', ['name' => $name]);
        $this->assertEquals($name, $type->name);
    }

    /** @test */
    public function its_names_are_unique()
    {
        factory(MediaType::class)->create(['name' => 'unique']);
        $this->expectException(QueryException::class);
        $this->expectExceptionMessageMatches('/UNIQUE constraint failed/');
        factory(MediaType::class)->create(['name' => 'unique']);
    }
}
