<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Document;

class ManageDocumentsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_guest_cannot_visit_the_admin_area()
    {
        $this->withExceptionHandling();
        $this->get('/admin')
            ->assertRedirect('/login');
    }

    /** @test */
    public function frontpage_shows_five_recent_documents()
    {
        $first = factory(Document::class)->create(['created_at' => now()->subMinute()]);
        $middle = factory(Document::class, 4)->create();
        $last = factory(Document::class)->create(['created_at' => now()->addMinute()]);

        $response = $this->get(route('home.index'))
            ->assertSee($last->title)
            ->assertDontSee($first->title);
        foreach ($middle as $item) {
            $response->assertSee($item->title);
        }
    }
}
