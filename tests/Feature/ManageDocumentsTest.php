<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

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
}
