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

    /** test */
    public function documentpage_shows_document_properties()
    {
        $mediaType = factory(MediaType::class)->create();

        $actors = [
            $author0,
            $publisher0,
            $principal0,
            $actor0,
            $author1,
            $publisher1,
            $principal1,
            $actor1,
        ];

        $actors = factory(Actor:class, 8)->create();

        $links = [
            $link0,
            $link1
        ];

        $links = factory(Link::class, 2)->create();

        $attributes = [
            // 'title' => '',
            // 'subtitle' => '',
            // 'abstract' => '',
            // 'release_date' => '',
            'language_code' => 'es',
            'media_type_id' => $mediaType->id,
        ];

        $document = factory(Document::class)->create($attributes);
        //TODO create documents with blank values for optional attributes

        $document->authors()->attach($author0->id);
        $document->authors()->attach($author1->id);

        $document->publishers()->attach($publisher0->id);
        $document->publishers()->attach($publisher1->id);

        $document->principals()->attach($principal0->id);
        $document->principals()->attach($principal1->id);

        $document->actors()->attach($actor0->id);
        $document->actors()->attach($actor1->id);

        $document->links()->attach($link0->id);
        $document->links()->attach($link1->id);

        $response = $this->get(route('document.show',['document' => $document->id]))
            ->assertSee($document->id)
            ->assertSee($document->title)
            ->assertSee($document->subtitle)
            ->assertSee($document->abstract)
            ->assertSee($document->release_date->format('Y')) //maybe modified
            ->assertSee('spanisch') //language_code
            ->assertSee($mediaType->name); //media_type_id

        foreach ($actors as $actor) {
            $response->assetSee($actor->name)
            ->assetSee($actor->description)
            ->assetSee($actor->url);
        }

        foreach ($links as $link) {
            $response->assetSee($link->title)
            ->assetSee($link->url);
        }

    }
}
