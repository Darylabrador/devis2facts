<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = [
                'name' => 'xylophone',
                'email' => 'telephone@instrument.com'
        ];

        DB::table('clients')->insert(
            $array
        );
    }
}
