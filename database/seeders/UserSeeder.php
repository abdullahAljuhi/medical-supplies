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
        $users = [
            [ 'name' => 'عبدالله الجوهي', 'email' => 'a139@gmail.com', 'email_verified_at'=>'2022-05-14 19:25:19', 'password' => bcrypt('12345678'),'type'=>'1'],
        ];
        User::insert($users);
    }
}
