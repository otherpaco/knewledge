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
}
