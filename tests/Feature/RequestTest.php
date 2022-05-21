<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

 /** @test */
 public function a_user_can_register()
{
    $user = [
      'name' => 'Joe',
      'last_name' => 'Smith',
      'function' => 'Rental Clerk',
      'email' => 'testemail@test.com',
      'password' => 'passwordtest',
      'password_confirmation' => 'passwordtest'
    ];

    $response = $this->post('/registreer', $user);

    $response
        ->assertRedirect('/register')
        ->assertSessionHas('status', 'Zodra uw account is goedgekeurd ontvangt u een email');

    //Remove password and password_confirmation from array
    array_splice($user,4, 2);

    $this->assertDatabaseHas('users', $user);
}
}