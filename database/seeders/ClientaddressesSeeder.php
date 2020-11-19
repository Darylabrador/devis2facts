<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientaddressesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = [
            'address' => '12 rue de la musique',
            'client_id' => 1,
            'postcode' => 97427,
            'city' => 'Etang-sale'
        ];

        DB::table('clientaddresses')->insert(
            $array
        );
    }
}
