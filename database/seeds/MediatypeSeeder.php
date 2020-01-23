<?php

use Illuminate\Database\Seeder;

class MediatypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mediatypes')->updateOrInsert([
            ['name' => 'pdf', 'title' => 'PDF'],
            ['name' => 'url', 'title' => 'Website'],
            ['name' => 'book', 'title' => 'Book'],
            ['name' => 'audio', 'title' => 'Audio'],
            ['name' => 'video', 'title' => 'Video'],
        ]);
    }
}
