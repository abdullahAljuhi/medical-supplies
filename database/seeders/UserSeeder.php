<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('users')->insert([
        //     'name' => "abdullah",
        //     'email' => 'abdullah@gmail.com',
        //     'password' => Hash::make('password'),
        //     'email_verified_at'=>
        // ]);
        $users = [
            [ 'name' => 'عبدالله الجوهي', 'email' => 'a139@gmil.com', 'password' => bcrypt('12345678'),'type'=>'1'],
            [ 'name' => 'عبدالله باعبود',  'email' => 'B@gmail.com', 'password' => bcrypt('12345678'),'type'=>'2'],
            [ 'name' => ' مراد العمودي', 'email' => 'Mm@gmil.com', 'password' => bcrypt('12345678'),'type'=>'0'],
            [ 'name' => ' احلام مقرم',  'email' => 'Ah@gmail.com', 'password' => bcrypt('12345678'),'type'=>'0'],
        ];
        User::insert($users);
    }
}
