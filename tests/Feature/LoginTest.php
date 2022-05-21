<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    // public function test_example()
    // {
    //     $response = $this->get('/');

    //     $response->assertStatus(200);
    // }

    use RefreshDatabase;
    /** @test */
    public function testLoginPost(){
        //Session::start();
        $response = $this->call('GET', '/login', [
            'email' => 'badUsername@gmail.com',
            'password' => 'badPass',
            '_token' => csrf_token()
        ]);
        $this->assertEquals(200, $response->getStatusCode());

        $this->assertEquals('auth.login', $response->original->name());
    }
}
