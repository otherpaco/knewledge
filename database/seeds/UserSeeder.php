<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class)->create(['name' => 'John', 'email' => 'john@example.com']);
        factory(User::class)->create(['name' => 'Jane', 'email' => 'jane@example.com']);
    }
}
