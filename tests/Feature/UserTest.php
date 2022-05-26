<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test user.
     *
     * @return void
     */
    public function test_user()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
