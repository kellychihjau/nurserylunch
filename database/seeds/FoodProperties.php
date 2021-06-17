<?php

use Illuminate\Database\Seeder;
use App\Propertie;

class FoodProperties extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //select csv file not inclusive header  
        //each data in csv array is array of each row of csv file 
        $csv = array_map('str_getcsv', file('database/seeds/database/food_full_15June2021.csv'));
        foreach ($csv as $key => $item) {
            $composition = new Propertie();
            $composition->food_id = $item[0];
            $composition->age6_8mo = $item[4];
            $composition->age9_11mo = $item[5];
            $composition->age1_2y = $item[6];
            $composition->age2_3y = $item[7];
            $composition->is_safe_muslim = $item[17];
            $composition->is_safe_allegic_egg = $item[18];
            $composition->is_safe_allegic_fish = $item[19];
            $composition->is_safe_allegic_shrimp = $item[20];
            $composition->is_safe_allegic_wheat = $item[21];
            $composition->is_safe_vege = $item[22];
            $composition->is_safe_allegic_milk = $item[23];
            $composition->is_safe_vegan = $item[24];
            $composition->is_safe_allegic_peanut = $item[25];
            $composition->is_safe_allegic_soybean = $item[26];

            $composition->save();

        }
    }
}
