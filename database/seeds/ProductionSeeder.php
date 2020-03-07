<?php

use Illuminate\Database\Seeder;

class ProductionSeeder extends Seeder
{
    /**
     * Seed the production database.
     *
     * Rows should be created with 'updateOrInsert' to be idempotent (i.e. the ProductionSeeder
     * can be run multiple times without errors).
     *
     * @return void
     */
    public function run()
    {
        $this->call(MediaTypeSeeder::class);
    }
}
