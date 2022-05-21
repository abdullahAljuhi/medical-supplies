<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AuthTest extends TestCase
{
    use RefreshDatabase;
    use HasFactory;

    public function test_it_redirects_guest_to_login_when_he_visit_home_page()
    {
        $response = $this->get('/home');

        $response->assertRedirect('/login');
    }

 /** @test */
        public function login_authenticates_and_redirects_user()
        {
            $user = User::factory()->create();
            
            $response = $this->post(route('login'), [
                'email' => $user->email,
                'password' => 'password'
            ]);
    
            $response->assertRedirect(route('home'));

            $this->assertAuthenticatedAs($user);
        }
    
}