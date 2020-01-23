<?php

namespace Tests\Unit;

use App\Mediatype;
use Tests\TestCase;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

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

    /** @test */
    public function its_names_are_unique()
    {
        Mediatype::create(['name' => 'unique']);
        $this->expectException(QueryException::class);
        $this->expectExceptionMessageRegExp('/UNIQUE constraint failed/');
        Mediatype::create(['name' => 'unique']);
    }
}
