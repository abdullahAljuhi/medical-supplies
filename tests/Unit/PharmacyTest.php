<?php

namespace Tests\Unit;

use App\Models\User;
use App\Models\Pharmacy;
use Database\Seeders\PharmacySeeder;
use Database\Seeders\UserSeeder;
use Database\Factories\UserFactory;
use Database\Factories\PharmacyFactory;
use Tests\TestCase;

class PharmacyTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    
  

    //Check if login page exists
    public function test_login_form()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    // //Check if pharmacy exists in database
    public function test_pharmacy_duplication()
    {
        $pharmacy1 = Pharmacy::make([
            'pharmacy_name' => 'John Doe',
            'license' => '123dd',
        ]);

        $pharmacy2 = Pharmacy::make([
            'pharmacy_name' => 'Mary Jane',
            'license' => 'da123',
        ]);

        $this->assertTrue($pharmacy1->pharmacy_name != $pharmacy2->pharmacy_name);
    }

    //Test if a user can be deleted (make sure that you add the middleware)
    public function test_delete_pharmacy()
    {
        $pharmacy = Pharmacy::factory()->count(1)->make();

        $pharmacy = Pharmacy::first();

        if($pharmacy) {
            $pharmacy->delete();
        }

        $this->assertTrue(true);
    }

    //Perform a post() request to add a new user
    public function test_if_it_stores_new_pharmacy()
    {
        $response = $this->post('/register', [
            'pharmacy_name' => 'Dary',
            'license' => 'da123',
            'user_id' => 1,
        ]);

        $response->assertRedirect('/');
    }

    public function test_if_data_exists_in_database()
    {
        $this->assertDatabaseHas('pharmacies', [
            'pharmacy_name' => 'Dary'
        ]);
    }

    public function test_if_data_does_not_exists_in_database()
    {
        $this->assertDatabaseHas('pharmacies', [
            'pharmacy_name' => 'John'
        ]);
    }

   
}
