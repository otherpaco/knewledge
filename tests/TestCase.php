<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public function setUp(): void
    {
        parent::setUp();

        app()->setLocale('en');

        $this->withoutExceptionHandling();
    }

    protected function signIn($user = null)
    {
        $user = $user ?: factory(\App\User::class)->create();
        $this->actingAs($user);
        return $user;
    }
}
