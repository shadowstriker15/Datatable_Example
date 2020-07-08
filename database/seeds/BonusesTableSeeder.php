<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BonusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Use helper file to access civ_array
        $civ_array = get_civs();

        // Loop through bonus arrays to populate bonus table
        foreach ($civ_array as $civ) {
            foreach($civ["civilization_bonus"] as $bonus)
                DB::table('bonuses')->insert(
                    array('civ_id'=>$civ["id"], 'bonus_type'=>$bonus)
                );
        }
    }
}
