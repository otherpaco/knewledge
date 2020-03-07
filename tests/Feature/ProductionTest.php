<?php

namespace Tests\Feature;

use Tests\TestCase;
use ProductionSeeder;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductionTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_has_a_production_seeder()
    {
        $this->seed(ProductionSeeder::class);
        $this->assertDatabaseHas('media_types', ['name' => 'pdf']);
    }
}
