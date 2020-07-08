<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CivsTableSeeder extends Seeder
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

        // Loop through civ_array to populate civ table
        foreach ($civ_array as $civ) {
            DB::table('civs')->insert(
                array('id'=>$civ["id"], 'name'=>$civ["name"], 'expansion'=>$civ["expansion"],
                    'army_type'=>$civ["army_type"], 'team_bonus'=>$civ["team_bonus"])
            );
        }

    }
}
