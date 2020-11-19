<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DevisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $array = [
            'client_id' => 1,
            'filename' => 'qsd.pdf',
            'tva' => 8.5,
            'is_accepted' => true,


    ];

    DB::table('devis')->insert(
        $array
    );
    }
}
