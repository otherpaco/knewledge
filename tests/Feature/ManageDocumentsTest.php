<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Document;
use App\MediaType;

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

    /** @test */
    public function documentpage_shows_document_properties()
    {
        $mediaType = factory(MediaType::class)->create();

        $actors = factory(Actor::class, 8)->create();

        [
            $author0,
            $publisher0,
            $principal0,
            $actor0,
            $author1,
            $publisher1,
            $principal1,
            $actor1,
        ] = $actors;

        $links = factory(Link::class, 2)->create();

        [
            $link0,
            $link1
        ] = $links;

        $attributes = [
            'language_code' => 'es',
            'media_type_id' => $mediaType->id,
        ];

        $document = factory(Document::class)->create($attributes);

        $document->authors()->attach($author0);
        $document->authors()->attach($author1);

        $document->publishers()->attach($publisher0);
        $document->publishers()->attach($publisher1);

        $document->principals()->attach($principal0);
        $document->principals()->attach($principal1);

        $document->actors()->attach($actor0);
        $document->actors()->attach($actor1);

        $document->links()->attach($link0);
        $document->links()->attach($link1);

        $response = $this->get(route('documents.show', ['document' => $document->id]))
            ->assertSee($document->title)
            ->assertSee($document->subtitle)
            ->assertSee($document->abstract)
            ->assertSee($document->release_date->format('Y'))
            ->assertSee('Spanish')
            ->assertSee($mediaType->name);

        foreach ($actors as $actor) {
            $response->assertSee($actor->name);
        }

        foreach ($links as $link) {
            $response->assertSee($link->title)
                ->assertSee($link->url);
        }
    }
}
