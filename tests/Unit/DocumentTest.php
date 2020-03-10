<?php

namespace Tests\Unit;

use App\Actor;
use App\Document;
use App\Link;
use App\MediaType;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DocumentTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_has_a_media_type()
    {
        $mediaType = factory(MediaType::class)->create();
        $document = factory(Document::class)->create(['media_type_id' => $mediaType->id]);

        $this->assertEquals($mediaType->id, $document->mediaType->id);
    }

    /** @test */
    public function it_has_a_language()
    {
        $document = factory(Document::class)->create(['language_code' => 'en']);

        $this->assertEquals('English', $document->language->name);
    }

    /** @test */
    public function it_has_an_author()
    {
        $document = factory(Document::class)->create();
        $document->authors()->attach(factory(Actor::Class)->create());

        $this->assertDatabaseHas('author_document', [
            'author_id' => $document->authors[0]->id,
            'document_id' => $document->id,
        ]);
    }

    /** @test */
    public function it_has_a_publisher()
    {
        $document = factory(Document::class)->create();
        $document->publishers()->attach(factory(Actor::Class)->create());

        $this->assertDatabaseHas('document_publisher', [
            'publisher_id' => $document->publishers[0]->id,
            'document_id' => $document->id,
        ]);
    }

    /** @test */
    public function it_has_a_principal()
    {
        $document = factory(Document::class)->create();
        $document->principals()->attach(factory(Actor::Class)->create());

        $this->assertDatabaseHas('document_principal', [
            'principal_id' => $document->principals[0]->id,
            'document_id' => $document->id,
        ]);
    }

    /** @test */
    public function it_has_an_actor()
    {
        $document = factory(Document::class)->create();
        $document->actors()->attach(factory(Actor::Class)->create());

        $this->assertDatabaseHas('actor_document', [
            'actor_id' => $document->actors[0]->id,
            'document_id' => $document->id,
        ]);
    }

    /** @test */
    public function it_has_a_link()
    {
        $document = factory(Document::class)->create();
        $link = factory(Link::class)->create(['document_id' => $document->id]);

        $this->assertEquals($link->id, $document->links[0]->id);
        $this->assertEquals($document->id, $link->document->id);
    }
}
