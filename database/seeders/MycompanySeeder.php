<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class MycompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = [
            'name' => "Dev2Fact RE",
            'address' => '87 rue de la poesie',
            'postcode' => 97427,
            'siret' => 'AED6-SQ54-S77',
            'city' => 'Etang-sale'
        ];

        DB::table('mycompany')->insert(
            $array
        );
    }
}
