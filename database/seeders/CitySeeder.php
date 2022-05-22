<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities = [
            [
                'name' => ' المكلا',
                'governorate_id' => 1
                ,'is_active'=>1
            ],
            [
                'name' => ' الشحر',
                'governorate_id' => 1
                ,'is_active'=>1
            ],
            [
                'name' => ' الغيظه',
                'governorate_id' => 2
                ,'is_active'=>1
            ],
            [
                'name' => ' خور مكسر',
                'governorate_id' => 3
                ,'is_active'=>1
            ],
        ];
        City::insert($cities);
    }
}
