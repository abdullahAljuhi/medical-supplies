<?php

namespace Database\Seeders;

use App\Models\Governorate;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GovernorateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $governorates = [
            ['name' => ' حضرموت'],
            ['name' => ' المهره'],
            ['name' => ' عدن'], 
       ];
       Governorate::insert($governorates);
    }
}
