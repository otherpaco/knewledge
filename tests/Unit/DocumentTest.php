<?php

namespace Tests\Unit;

use App\Document;
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

    // it has - language_code
    // - media_type_id
    // - author (many-to-many)
    // - publisher (many-to-many)
    // - principal (many-to-many)
    // - actor (many-to-many)
    // - link (many-to-one)
}
